@extends('admin.master')
@section('content')
    <h1 class="h3 mb-4 text-gray-800">All products</h1>
    @if (session()->has('msg'))
        <div class="alert alert-{{ session('type') }} alert-dismissible fade show" role="alert">
            {{ session('msg') }}

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <table class="table table-bordered table-hover">

        <tr class="bg-dark text-white">
            <th scope="col">ID</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Category</th>
            <th scope="col">Actions</th>
        </tr>

        <tbody>
            @forelse ($products as $product)

                <tr>
                    <th>{{ $loop->iteration}}</th>
                    <td>
                        <img width="100" src="{{ $product->img_path }}" alt="">
                    </td>
                    <td>{{ $product->trans_name  }}</td>
                    <td>${{ $product->price }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->quantity  }}</td>

                    <td>
                        <a class="btn btn-sm btn-info" href="{{ route('admin.products.edit', $product->id) }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form class="d-inline" action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger"><i
                                    class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No products found</td>
                </tr>
            @endforelse






        </tbody>
    </table>
    {{ $products->links() }}

@endsection
@section('title', 'product')