<style>
    .prev-img {
        width: 80px;
        height: 120px;
        object-fit: cover;
    }

    .galler-wrapper {
        display: flex;
        gap: 10px;
    }

    .galler-wrapper div {
        position: relative;
    }

    .galler-wrapper div span {
        position: absolute;
        top: 0;
        right: 0;
        background: red;
        color: white;
        padding: 2px 6px;
        border-radius: 50%;
        cursor: pointer;
        /* display: none; */
        opacity: 0;
        visibility: hidden;
    }

    .galler-wrapper div:hover span {
        opacity: 1;
        visibility: visible;
    }
</style>
<div class="row">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">English Name</label>
            <input type="text" class="form-control @error('name_en') is-invalid @enderror" id="name_en" name="name_en"
                placeholder="English name" value="{{ old('name_en', $product->name_en) }}">
            @error('name_en')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Arabic Name</label>
            <input type="text" class="form-control @error('name_ar') is-invalid @enderror" id="name_ar" name="name_ar"
                placeholder="Arabic name" value="{{ old('name_ar', $product->name_ar) }}">
            @error('name_ar')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="name"> Price</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                placeholder=" Add price" value="{{ old('price', $product->price) }}">
            @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="name"> Quantity</label>
            <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity"
                name="quantity" placeholder="Add Quantity" value="{{ old('quantity', $product->quantity) }}">
            @error('quantity')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="name"> Category</label>
            <select class="form-control @error('quantity') is-invalid @enderror" name="category_id" id="">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->trans_name }}</option>
                @endforeach

            </select>
            @error('category')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="description_en">English Description</label>
            <textarea name="description_en" id="description_en"
                class="form-control @error('description_en') is-invalid @enderror" placeholder="Arabic description"
                rows="4">{{ old('description_en', $product->description_en) }}</textarea>
            @error('description_en')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="description_ar">Arabic Description</label>
            <textarea name="description_ar" id="description_ar"
                class="form-control @error('description_ar') is-invalid @enderror" placeholder="Add description"
                rows="4">{{ old('description_ar', $product->description_ar) }}</textarea>
            @error('description_ar')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

    </div>



    <div class="col-md-6">
        <div class=" mb-3">
            <input type="file" onchange="previewImage(event)" class="custom-file-input " id="imageFile" name="image">
            <label class="custom-file-label" for="imageFile">Choose file</label>
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}

            @enderror
            </div>

            <img id="preview" class="prev-img" width="80px" src="{{$product->image ? $product->img_path : '' }} "
                alt="">
        </div>
        <div class="col-md-6">
            <div class=" mb-3">
                <input type="file" class="custom-file-input " id="galleryFiles" name="gallery[]" multiple>
                <label class="custom-file-label" for="galleryFiles">Choose files Gallery</label>
                @error('gallery')
                    <div class="invalid-feedback">
                        {{ $message }}

                @enderror
                    @if ($product->gallery)
                        <div class="galler-wrapper">
                            @foreach ($product->gallery as $ga)
                                <div>
                                    <img id="preview" class="prev-img" width="80px" src="{{asset('images/' . $ga->path)}} "
                                        alt="">
                                    <span onclick="deleteImg(event,{{ $ga->id }})">X</span>
                                </div>
                            @endforeach
                        </div>


                    @endif
                </div>


            </div>
        </div>