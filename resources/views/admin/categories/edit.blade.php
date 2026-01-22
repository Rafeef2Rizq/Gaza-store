@extends('admin.master')
@section('content')
    <h1 class="h3 mb-4 text-gray-800">Edit Category</h1>
    @if (session()->has('msg'))
        <div class="alert alert-{{ session('type') }} alert-dismissible fade show" role="alert">
            {{ session('msg') }}

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('admin.categories._form')
        <button type="submit" class="btn btn-info">Update</button>
    </form>

@endsection
@section('title', 'Category')
@section('js')
    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                preview.src = URL.createObjectURL(file);
            }

        }
    </script>

@endsection