@extends('layouts.app')

@section('content')
    <!-- Article List -->
    <div class="px-5 sm:px-10 lg:px-20 py-16 bg-white">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-10">Latest Articles</h1>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($articles as $article)
                    <div class="bg-white border rounded-lg shadow-sm overflow-hidden hover:shadow-md transition">
                        <img src="{{ asset('storage/' . $article->image ?? '/assets/default-article.jpg') }}" class="h-64 w-full object-cover"
                            alt="{{ $article->title }}">
                        <div class="p-4">
                            <h2 class="text-lg font-semibold text-gray-800 mb-2">{{ $article->title }}</h2>
                            <p class="text-sm text-gray-600 mb-4">
                                {!! Str::limit($article->content, 100) !!}
                            </p>
                            <a href="{{ route('articles.show', $article->slug) }}"
                                class="text-[#E0B654] font-semibold hover:underline">
                                Read more →
                            </a>
                        </div>
                    </div>
                @empty
                    <p>No articles found.</p>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-10">
                {{ $articles->links() }}
            </div>
        </div>
    </div>

@endsection
