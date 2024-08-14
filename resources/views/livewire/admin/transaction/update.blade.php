<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('UpdateTitle', ['name' => __('Transaction') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.transaction.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Transaction')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Update') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="update" enctype="multipart/form-data">

        <div class="card-body">

                        <!-- Product_id Input -->
            <div class='form-group'>
                <label for='input-product_id' class='col-sm-2 control-label '> {{ __('Product_id') }}</label>
                <select id='input-product_id' wire:model.lazy='product_id' class="form-control  @error('product_id') is-invalid @enderror">
                    @foreach(getCrudConfig('transaction')->inputs()['product_id']['select'] as $key => $value)
                        <option value='{{ $key }}'>{{ $value }}</option>
                    @endforeach
                </select>
                @error('product_id') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- User_id Input -->
            <div class='form-group'>
                <label for='input-user_id' class='col-sm-2 control-label '> {{ __('User_id') }}</label>
                <select id='input-user_id' wire:model.lazy='user_id' class="form-control  @error('user_id') is-invalid @enderror">
                    @foreach(getCrudConfig('transaction')->inputs()['user_id']['select'] as $key => $value)
                        <option value='{{ $key }}'>{{ $value }}</option>
                    @endforeach
                </select>
                @error('user_id') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Quantity Input -->
            <div class='form-group'>
                <label for='input-quantity' class='col-sm-2 control-label '> {{ __('Quantity') }}</label>
                <input type='number' id='input-quantity' wire:model.lazy='quantity' class="form-control  @error('quantity') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('quantity') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Total_price Input -->
            <div class='form-group'>
                <label for='input-total_price' class='col-sm-2 control-label '> {{ __('Total_price') }}</label>
                <input type='number' id='input-total_price' wire:model.lazy='total_price' class="form-control  @error('total_price') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('total_price') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Status Input -->
            <div class='form-group'>
                <label for='input-status' class='col-sm-2 control-label '> {{ __('status') }}</label>
                <select id='input-status' wire:model.lazy='status' class="form-control  @error('status') is-invalid @enderror">
                    <option value="">select</option>
                    <option value="pending">pending</option>
                    <option value="completed">completed</option>
                    <option value="canceled">canceled</option>
                </select>
                @error('status') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>


        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Update') }}</button>
            <a href="@route(getRouteName().'.transaction.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
