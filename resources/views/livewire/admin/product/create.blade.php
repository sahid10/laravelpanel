<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('CreateTitle', ['name' => __('Product') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.product.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Product')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Create') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="create" enctype="multipart/form-data">

        <div class="card-body">
                        <!-- Product_name Input -->
            <div class='form-group'>
                <label for='input-product_name' class='col-sm-2 control-label '> {{ __('Product_name') }}</label>
                <input type='text' id='input-product_name' wire:model.lazy='product_name' class="form-control  @error('product_name') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('product_name') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Price Input -->
            <div class='form-group'>
                <label for='input-price' class='col-sm-2 control-label '> {{ __('Price') }}</label>
                <input type='number' id='input-price' wire:model.lazy='price' class="form-control  @error('price') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('price') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Amount Input -->
            <div class='form-group'>
                <label for='input-amount' class='col-sm-2 control-label '> {{ __('Amount') }}</label>
                <input type='number' id='input-amount' wire:model.lazy='amount' class="form-control  @error('amount') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('amount') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Category_id Input -->
            <div class='form-group'>
                <label for='input-category_id' class='col-sm-2 control-label '> {{ __('Category_id') }}</label>
                <select id='input-category_id' wire:model.lazy='category_id' class="form-control  @error('category_id') is-invalid @enderror">
                    @foreach($category as $category)
                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
            @endforeach
                </select>
                @error('category_id') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Image Input -->
            <div class='form-group'>
                <label for='input-image' class='col-sm-2 control-label '> {{ __('Image') }}</label>
                <input type='file' id='input-image' wire:model='image' class="form-control-file  @error('image') is-invalid @enderror">
                @if($image and !$errors->has('image') and $image instanceof Illuminate\Http\UploadedFile and $image->isPreviewable())
                    <a href="{{ $image->temporaryUrl() }}" target="_blank"><img width="200" height="200" class="mt-3 img-fluid shadow" src="{{ $image->temporaryUrl() }}" alt=""></a>
                @endif
                @error('image') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Create') }}</button>
            <a href="@route(getRouteName().'.product.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
