@extends('layouts.app')

@section('content')
    <!-- articles Content -->
    <div class="px-5 sm:px-10 lg:px-20 py-16 bg-white">
        <div class="max-w-4xl mx-auto">
            <!-- Title -->
            <h1 class="text-3xl md:text-5xl font-bold text-gray-900 mb-4 leading-tight">
                {{ $articles->title }}
            </h1>

            <!-- Author and Date -->
            <div class="flex items-center gap-4 mb-8 text-sm text-gray-600">
                <img src="{{ asset('storage/' . $articles->image ?? '/assets/default-article.jpg') }}" class="w-10 h-10 rounded-full object-fill" alt="Author">
                <div>
                    <p class="font-semibold text-gray-800">{{ $articles->author ?? 'Idowu Couture' }}</p>
                    <p>{{ $articles->published_at ? $articles->published_at->format('F j, Y') : $articles->created_at->format('F j, Y') }}
                    </p>
                </div>
            </div>

            <!-- Body -->
            <div class="prose max-w-none text-gray-800 leading-relaxed">
                {!! ($articles->content) !!}
            </div>

            <!-- Tags + Sharing -->
            <div class="mt-10 border-t pt-6 flex items-center justify-between flex-wrap gap-4">
                {{-- <div class="text-sm text-gray-600">
                    <span class="font-semibold">Category:</span>
                    <span class="bg-gray-200 px-2 py-1 rounded-full text-xs">#News</span>
                </div> --}}
                <div class="flex items-center gap-3">
                    <span class="text-sm text-gray-600">Visit:</span>
                    <i class="fab fa-facebook text-blue-600 cursor-pointer"></i>
                    <i class="fab fa-twitter text-blue-400 cursor-pointer"></i>
                    <i class="fab fa-linkedin text-blue-700 cursor-pointer"></i>
                </div>
            </div>
        </div>
    </div>
   
@endsection
