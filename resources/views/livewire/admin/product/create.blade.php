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
            <!-- Description Input -->
            <div class='form-group'>
                <label for='input-description' class='col-sm-2 control-label '> {{ __('Description') }}</label>
                <textarea id="input-description" wire:model.lazy='description' class="form-control  @error('description') is-invalid @enderror" placeholder='' autocomplete='on'></textarea>
                @error('description') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Category Input -->
            <div class='form-group'>
                <label for='input-category' class='col-sm-2 control-label '> {{ __('Category') }}</label>
                <textarea id="input-category" wire:model.lazy='category' class="form-control  @error('category') is-invalid @enderror" placeholder='' autocomplete='on'></textarea>
                @error('category') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Create') }}</button>
            <a href="@route(getRouteName().'.product.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
