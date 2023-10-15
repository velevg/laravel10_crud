@extends('layouts.app')

@section('body')
    <div class="card">
        <div class="card-header">Profile</div>
        <div class="card-body">
            <div>
                <span>Име:</span>
                <span>{{ auth()->user()->name }}</span>
            </div>
            <div>
                <span>Имейл:</span>
                <span>{{ auth()->user()->email }}</span>
            </div>
        </div>
    </div>
@endsection
