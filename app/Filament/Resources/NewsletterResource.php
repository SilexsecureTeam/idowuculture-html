<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsletterResource\Pages;
use App\Filament\Resources\NewsletterResource\RelationManagers;
use App\Mail\NewsletterBroadcast;
use App\Models\Newsletter;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;

class NewsletterResource extends Resource
{
    protected static ?string $model = Newsletter::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('email')->searchable()->sortable(),
                TextColumn::make('created_at')->label('Subscribed On')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),

                    BulkAction::make('sendNewsletter')
                        ->label('Send Newsletter')
                        ->form([
                            TextInput::make('subject')->required(),
                            Textarea::make('message')->rows(5)->required(),
                        ])
                        ->action(function (Collection $records, array $data) {
                            foreach ($records as $subscriber) {
                                Mail::to($subscriber->email)->send(
                                    new NewsletterBroadcast($data['subject'], $data['message'])
                                );

                                // update last sent
                                $subscriber->update(['last_sent_at' => Carbon::now()]);
                            }
                        })
                        ->form([
                            TextInput::make('subject')->required(),
                            Textarea::make('message')->required()->rows(6),
                        ])
                        ->label('Send Newsletter')
                        ->modalHeading('Send Newsletter Broadcast')
                        ->modalDescription('Compose and send a newsletter email to the selected subscribers.')
                        ->modalSubmitActionLabel('Send Email')
                        ->successNotificationTitle('Newsletter sent successfully.')
                        ->deselectRecordsAfterCompletion()
                        ->successNotificationTitle('Newsletter sent!')
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNewsletters::route('/'),
            'create' => Pages\CreateNewsletter::route('/create'),
            'edit' => Pages\EditNewsletter::route('/{record}/edit'),
        ];
    }
}
