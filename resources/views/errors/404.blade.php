@extends('layouts.app')
@section('content')
    <section>
        <div class="w-full max-w-2xl mx-auto py-10 px-5 shadow">
            <a href="{{ url()->previous() ? url()->previous() : '/' }}">
                <img src="{{ asset('assets/404-Error.gif') }}" alt="" class="w-full rounded">
            </a>
        </div>
    </section>
@endsection
