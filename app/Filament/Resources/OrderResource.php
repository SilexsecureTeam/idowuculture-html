<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Mail\OrderStatusUpdated;
use App\Models\Order;
use Filament\Forms;
use App\Models\Product;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Filament\Forms\Form;
use Filament\Infolists;
use Filament\Infolists\Components\ColorEntry;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Mail;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

protected static ?string $navigationIcon = null;
    protected static ?string $navigationGroup = 'Settings';
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
                // TextColumn::make('items.product.title')
                //     ->label('Product Name'),
                TextColumn::make('reference')
                    ->label('Order Ref'),
                TextColumn::make('address')
                    ->label('Delivery Location'),
                TextColumn::make('home_address')
                    ->label('Delivery Address'),
                TextColumn::make('status')
                    ->label('Delivery Status'),
                TextColumn::make('amount')
                    ->label('Total Amount'),
                // TextColumn::make('status')
                // ->label('Delivery Address'),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                // Tables\Actions\DeleteAction::make(),
                Action::make('changeStatus')
                    ->label('Change Status')
                    ->icon('heroicon-o-arrow-path')
                    ->form([
                        Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'processing' => 'Processing',
                                'shipped' => 'Shipped',
                                'delivered' => 'Delivered',
                            ])
                            ->required(),
                    ])
                    ->action(function (array $data, Order $record) {
                        $record->status = $data['status'];
                        $record->save();

                        // Send email to customer
                        if ($record->user && $record->user->email) {
                            Mail::to($record->user->email)->send(new OrderStatusUpdated($record));
                        }
                        Notification::make()
                            ->title('Order status updated')
                            ->body('The order status has been changed to ' . ucfirst($data['status']) . '.')
                            ->success()
                            ->send();
                    })
                    ->modalHeading('Update Order Status')
                    ->color('primary'),
            ])

            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListOrders::route('/'),
            // 'view' => Pages\ViewOrders::route('/{record}'),
            // 'create' => Pages\CreateOrder::route('/create'),
            // 'view' => Pages\ViewOrder::route('/{record}/edit'),
        ];
    }

    public static function infoList(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([

                InfoLists\Components\Section::make([
                    TextEntry::make('user')
                        ->label('Full Name')
                        ->formatStateUsing(fn($record) => $record->user->firstname . ' ' . $record->user->lastname),
                    TextEntry::make('user.email'),
                    TextEntry::make('amount')->label('Total Amount')->money('NGN'),
                    TextEntry::make('address'),
                    TextEntry::make('home_address')->label('Delivery'),
                    TextEntry::make('transaction.paid_at')->label('Payment Date'),
                    TextEntry::make('created_at')->label('Order Date')->dateTime(),
                ])->columnSpan(1)->columns(),

                InfoLists\Components\Section::make('Ordered Items')
                    ->schema([
                        RepeatableEntry::make('items')
                            ->label('Products Ordered')
                            ->schema([
                                TextEntry::make('product.title')
                                    ->label('Product Title'),
                                TextEntry::make('quantity')
                                    ->label('Qty'),
                                TextEntry::make('size')
                                    ->label('Size'),
                                TextEntry::make('color')
                                    ->label('Color'),
                            ])
                            ->columns(2),
                    ])
                    ->columnSpanFull(),

            ]);
    }
}
