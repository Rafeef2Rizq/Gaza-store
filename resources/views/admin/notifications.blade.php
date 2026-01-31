@extends('admin.master')
@section('content')
    <h1 class="h3 mb-4 text-gray-800">All notifications</h1>
    <div class="list-group">
        @foreach (Auth::user()->notifications as $notification)
            <a href="#" class="list-group-item list-group-item-action
                     {{ $notification->read_at ? '' : 'bg-gray-200' }}">
                {{ $notification->data['msg'] }}
            </a>
        @endforeach

    </div>
@endsection
@section('title', 'Dashboard')