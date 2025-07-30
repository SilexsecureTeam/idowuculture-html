@extends('layouts.app')

@section('content')
<!-- FAQ Section -->
<div class="px-5 sm:px-10 lg:px-20 py-20 bg-[#F9F9F9]">
    <div class="max-w-4xl mx-auto text-center mb-10">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-800">Frequently Asked Questions</h2>
        <p class="text-gray-600 mt-2">Need help? Check out our FAQs below</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-5xl mx-auto">
        @forelse ($faqs as $faq)
            <div x-data="{ open: false }" class="bg-white rounded-lg shadow-sm p-6 transition-all duration-300">
                <button @click="open = !open" class="w-full text-left flex justify-between items-center text-gray-800 font-semibold text-lg">
                    <span>{!! $faq->question !!}</span>
                    <svg :class="{ 'rotate-180': open }" class="w-5 h-5 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" x-collapse class="mt-4 text-gray-600">
                    {!! $faq->answer !!}
                </div>
            </div>
        @empty
            <p class="text-center text-gray-500 col-span-2">No FAQs available at the moment.</p>
        @endforelse
    </div>
</div>
@endsection
