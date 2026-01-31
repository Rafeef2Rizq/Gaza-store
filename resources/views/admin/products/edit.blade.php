@extends('admin.master')
@section('content')
    <h1 class="h3 mb-4 text-gray-800">Add new Product</h1>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        @include('admin.products._form')
        <button type="submit" class="btn btn-info">Edit</button>
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
        function deleteImg(e, $id) {
            $.ajax({
                type: "GET",
                url: "/admin/delete-image/" + $id,
                success: function (response) {
                    if (response) {
                        e.target.parentElement.remove();
                    }

                },
                error: (err) => {
                    console.log(err);
                }
            });

        }
    </script>

@endsection