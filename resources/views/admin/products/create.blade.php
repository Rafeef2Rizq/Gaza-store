@extends('admin.master')
@section('content')
    <h1 class="h3 mb-4 text-gray-800">Add new Product</h1>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.products._form')
        <button type="submit" class="btn btn-info">Create</button>
    </form>

@endsection
@section('title', 'Product')
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