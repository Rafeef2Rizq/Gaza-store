<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">English Name</label>
            <input type="text" class="form-control @error('name_en') is-invalid @enderror" id="name_en" name="name_en"
                placeholder="English name" value="{{ old('name_en', $category->name_en) }}">
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
                placeholder="Arabic name" value="{{ old('name_ar', $category->name_ar) }}">
            @error('name_ar')
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
                rows="4">{{ old('description_en', $category->description_en) }}</textarea>
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
                rows="4">{{ old('description_ar', $category->description_ar) }}</textarea>
            @error('description_ar')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

    </div>
</div>
<div class=" mb-3">

    <div class="custom-file">
        <input type="file" onchange="previewImage(event)" class="custom-file-input " id="inputGroupFile01" name="image">
        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <img id="preview" width="80px" src="{{$category->image ? $category->img_path : '' }} " alt="">
</div>