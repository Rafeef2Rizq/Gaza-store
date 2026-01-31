@extends('admin.master')
@section('css')
    <style>
        .prev-img {
            width: 200px;
            height: 200px;
            cursor: pointer;
            object-fit: cover;
            border-radius: 50%;
            padding: 5px;
            border: 1px dashed #b8b8b8;
            transform: all 0.3s ease;

        }

        .prev-img:hover {
            opacity: 0.8;
        }

        .pre-img-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 10000000;
            backdrop-filter: blur(8px);
            display: none;
        }

        .pre-img-modal img {
            max-width: 80%;
            max-height: 80%;
            border-radius: 10px;
            object-fit: cover;
        }

        .pass-wrapper {
            position: relative;
        }

        .pass-wrapper i {
            position: absolute;
            right: 10px;
            top: 12px;
        }
    </style>
@endsection
@section('content')

    <h1 class="h3 mb-4 text-gray-800">Profile page</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif
    @if(session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>

    @endif
    <form action="{{ route('admin.profile_data') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="pre-img-modal">
            <img src="" alt="">
        </div>
        <div class="row">
            @php
                if ($admin->image) {
                    $src = asset('images/' . $admin->image->path);
                } else {
                    $src = "https://ui-avatars.com/api/?background=0D8ABC&color=fff&name=" . urlencode($admin->name);
                }
            @endphp
            <div class="text-center">

                <img src="{{ $src }}" title="Edit Your photo" id="imagePreview" class="prev-img" alt="">
                <label for="image" class="mt-2 btn btn-sm btn-dark">Edit Image </label>

                <input type="file" id="image" onchange="showImg(event)" style="display: none;" name="image">

            </div>

        </div>
        <div class="col-md-9">

            <div class="mb-3">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $admin->name) }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" disabled value="{{ old('email', $admin->email) }}">
                </div>
                <br>
                <h4>Update your Password</h4>
                <div class="form-group">
                    <label for="name">Current Password</label>
                    <input type="password" class="form-control" id="current" name="current_password">
                </div>
                <div class="form-group">
                    <label for="name">New Password</label>
                    <div class="pass-wrapper">
                        <input type="password" disabled class="form-control new" id="new" name="password">
                        <i class="fas fa-eye"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name">Confirm Password</label>
                    <input type="password" disabled class="form-control new" id="confirm" name="password_confirmation">
                </div>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i>Update Password</button>
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
@endsection
@section('title', 'Profile')
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Set CSRF token in AJAX headers for Laravel
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        function showImg(event) {
            const file = event.target.files[0];
            if (file) {
                const preview = document.querySelector('#imagePreview');
                preview.src = URL.createObjectURL(file);
            }
        }
        $(document).ready(function () {
            $('.prev-img').on('click', function () {
                let url = $(this).attr('src');
                $('.pre-img-modal img').attr('src', url);
                $('.pre-img-modal').css('display', 'flex').hide().fadeIn();
            });
            $('.pre-img-modal').on('click', function () {
                $(this).fadeOut();
            });
        });
        // $('#current').keyup(function (event) {
        //     if ($(this).val().length > 0) {
        //         $('.new').prop('disabled', false);
        //     } else {
        //         $('.new').prop('disabled', true);
        //         $('.new').val('');
        //     }
        // });
        $('#current').blur(function (event) {
            $.ajax({
                'url': '{{ route("admin.check_password")}}',
                'method': 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    'password': $('#current').val()
                },
                success: function (response) {
                    if (response) {
                        $('.new').prop('disabled', false);
                        $('#current').removeClass('is-invalid');
                        $('#current').addClass('is-valid');
                    } else {
                        $('.new').prop('disabled', true);
                        $('.new').val('');
                        $('#current').addClass('is-invalid');
                        $('#current').removeClass('is-valid');
                    }
                }
            });
        });
        document.querySelector('.pass-wrapper i').onclick = function () {
            let pass = document.getElementById('new');
            if (pass.type == 'password') {
                pass.type = 'text';
            } else {
                pass.type = 'password';
            }

        }
    </script>
@endsection