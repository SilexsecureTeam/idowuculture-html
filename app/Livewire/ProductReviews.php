<?php

namespace App\Livewire;

use App\Models\Review;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class ProductReviews extends Component
{
    public $product;
    public $reviewRating;
    public $reviewComment;
    public $hasReviewed = false;
    public $reviews;

    public $userReviewId;
    public $editReview = false;


    public function mount($product)
    {
        $this->product = $product;
        $this->reviews = $product->reviews()->latest()->get();

        if (auth()->check()) {
            $this->hasReviewed = $this->product->reviews()->where('user_id', auth()->id())->exists();
            $userReview = $this->product->reviews()->where('user_id', auth()->id())->first();

            if ($userReview) {
                $this->hasReviewed = true;
                $this->userReviewId = $userReview->id;
                $this->reviewRating = $userReview->rating;
                $this->reviewComment = $userReview->comment;
            } else {
            // User has not reviewed yet
            $this->hasReviewed = false;
            $this->userReviewId = null;
            $this->reviewRating = null;
            $this->reviewComment = null;
        }
        }
    }

    public function submitReview()
    {
        if ($this->hasReviewed) {
            LivewireAlert::title('Opps!')
                ->text('Review already submitted.')
                ->warning()
                ->toast()
                ->position('top-end')
                ->show();
            return;
        }
        $this->validate([
            'reviewRating' => 'required|integer|min:1|max:5',
            'reviewComment' => 'nullable|string|max:1000',
        ]);

        Review::create([
            'user_id' => auth()->id(),
            'product_id' => $this->product->id,
            'rating' => $this->reviewRating,
            'comment' => $this->reviewComment,
        ]);

        LivewireAlert::title('Review!')
            ->text('Review submitted.')
            ->success()
            ->toast()
            ->position('top-end')
            ->show();
        $this->reset(['reviewRating', 'reviewComment']);
        return;
    }

    public function enableEdit()
    {
        $this->editReview = true;
    }

    public function updateReview()
    {
        $this->validate([
            'reviewRating' => 'required|integer|min:1|max:5',
            'reviewComment' => 'nullable|string|max:1000',
        ]);

        $review = Review::find($this->userReviewId);

        if (!$review || $review->user_id !== auth()->id()) {
            LivewireAlert::title('Unauthorized!')
            ->text('No available review.')
            ->error()
            ->toast()
            ->position('top-end')
            ->show();
            return;
        }

        $review->update([
            'rating' => $this->reviewRating,
            'comment' => $this->reviewComment,
        ]);

        $this->reviews = $this->product->reviews()->latest()->get();
        $this->editReview = false;

        LivewireAlert::title('Review!')
            ->text('Review Updated.')
            ->success()
            ->toast()
            ->position('top-end')
            ->show();
        return;
    }
}
