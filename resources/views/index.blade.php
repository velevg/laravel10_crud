@extends('layouts.app')

@section('body')
    <div class="d-flex alignt-item-center justify-content-between">
        <h1 class="mb-0">Home</h1>
    </div>
@endsection
   {{-- @if (Route::has('login'))
            <div class="">
                @auth
                    <a href="{{ url('/home') }}" class="">Home</a>
                @else
                    <a href="{{ route('login') }}" class="">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="">Register</a>
                    @endif
                @endauth
            </div>
    @endif --}}
