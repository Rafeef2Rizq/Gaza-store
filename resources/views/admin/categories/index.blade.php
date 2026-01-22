@extends('admin.master')
@section('content')
    <h1 class="h3 mb-4 text-gray-800">All categories</h1>
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
            <th scope="col">Products Count</th>
            <th scope="col">Actions</th>
        </tr>

        <tbody>
            @forelse ($categories as $category)

                <tr>
                    <th>{{ $loop->iteration}}</th>
                    <td>
                        <img width="100" src="{{ $category->img_path }}" alt="">
                    </td>
                    <td>{{ $category->trans_name  }}</td>
                    <td>{{ $category->trans_description }}</td>

                    <td>
                        <a class="btn btn-sm btn-info" href="{{ route('admin.categories.edit', $category->id) }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form class="d-inline" action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger"><i
                                    class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No categories found</td>
                </tr>
            @endforelse






        </tbody>
    </table>
    {{ $categories->links() }}

@endsection
@section('title', 'Category')