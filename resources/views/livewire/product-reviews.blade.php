<section class="mt-16">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Customer Reviews</h2>

    <!-- Average Rating -->
    <div class="flex items-center mb-6">
        <div class="flex text-yellow-400">
            @php
                $averageRating = round($product->reviews->avg('rating'), 1);
                $totalReviews = $product->reviews->count();
            @endphp

            @for ($i = 1; $i <= 5; $i++)
                @if ($i <= floor($averageRating))
                    <i class="fas fa-star"></i>
                @elseif ($i - $averageRating < 1)
                    <i class="fas fa-star-half-alt"></i>
                @else
                    <i class="far fa-star"></i>
                @endif
            @endfor
        </div>
        <p class="ml-2 text-sm text-gray-600">
            {{ $averageRating }} out of 5 · {{ $totalReviews }} {{ Str::plural('Review', $totalReviews) }}
        </p>
    </div>


    <!-- Individual Reviews -->
    <div class="space-y-6">
        @foreach ($reviews as $review)
            <div class="border p-4 rounded-lg bg-white shadow-sm">
                <div class="flex justify-between items-center mb-2">
                    <h4 class="text-sm font-semibold text-gray-800">{{ $review->user->firstname }}</h4>
                    <span class="text-xs text-gray-400">{{ $review->created_at->diffForHumans() }}</span>
                </div>
                <div class="flex text-yellow-400 mb-1">
                    @for ($i = 0; $i < 5; $i++)
                        <i class="{{ $i < $review->rating ? 'fas fa-star' : 'far fa-star' }}"></i>
                    @endfor
                </div>
                <p class="text-gray-700 text-sm">{{ $review->comment }}</p>
                @if (auth()->check() && $review->user_id === auth()->id())
                    <div class="mt-2 flex items-center justify-end space-x-2">
                        <button wire:click="enableEdit"
                            class="bg-black p-1 rounded font-semibold text-sm text-white hover:underline">Edit</button>
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    <!-- Leave a Review -->
    <div class="mt-10">
        {{-- <h3 class="text-lg font-semibold text-gray-800 mb-2">Leave a Review</h3> --}}
        <div class="mt-10">
            @auth
                @if (!$hasReviewed || $editReview)
                    <form wire:submit.prevent="{{ $editReview ? 'updateReview' : 'submitReview' }}" class="my-6">
                        <div class="mb-2 flex items-center space-x-1">
                            @for ($i = 1; $i <= 5; $i++)
                                <svg wire:click="$set('reviewRating', {{ $i }})"
                                    class="w-6 h-6 cursor-pointer {{ $i <= $reviewRating ? 'text-yellow-500' : 'text-gray-300' }}"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 15l-5.878 3.09L5.636 12 .757 7.91l6.364-.929L10 1l2.879 5.981 6.364.929-4.879 4.09 1.514 5.181z" />
                                </svg>
                            @endfor
                        </div>

                        <textarea wire:model.defer="reviewComment" class="w-full border rounded p-2" placeholder="Write your review..."></textarea>

                        <button type="submit" class="mt-2 px-4 py-2 bg-black text-white rounded hover:bg-gray-800">
                            {{ $editReview ? 'Update Review' : 'Submit Review' }}
                        </button>
                    </form>
                @endif
                <h3 class="text-lg font-semibold text-gray-800 mb-2">
                    {{ $editReview ? 'Edit Your Review' : 'Leave a Review' }}
                </h3>

            @endauth
        </div>


    </div>
</section>
