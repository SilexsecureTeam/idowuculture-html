@extends('layouts.app')
@section('content')
    <!-- Banner Section -->
    <div class="relative w-full h-[50vh] overflow-hidden">
        <div class="absolute inset-0 min-w-[100vw] min-h-[50vh]">
            @if ($policy && $policy->terms_image > 0)
                <img src="{{ asset('storage/' . $policy->terms_image) }}" alt="terms Image" decoding="async"
                    class="h-full w-full object-cover object-center" data-loading="true" loading="lazy" width="1920"
                    height="600">
            @else
                <img src="/assets/term.png" alt="img" class="h-full w-full bg-gray-300 object-cover" />
            @endif
        </div>
        <div
            class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-[#181717de] px-5 py-3 md:text-5xl text-2xl font-bold text-white flex items-center gap-3">
            <i class="fa-solid fa-file-contract"></i>
            Terms & Condition
        </div>
    </div>

    <!-- Main Content -->
    <div class="px-5 md:px-10 text-black lg:px-20 py-20">
        <h4 class="font-normal mon text-[15px] md:text-[18px] mb-4">
            @if (!empty($policy->terms_and_conditions))
                {!! $policy->terms_and_conditions !!}
            @else
                <div class="w-full h-full bg-gray-300 flex items-center justify-center">
                    <span class="text-gray-500">Loading...</span>
                </div>
            @endif
    </div>
@endsection
