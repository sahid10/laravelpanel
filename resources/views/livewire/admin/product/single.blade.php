<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $product->product_name }}</td>
    <td class="">{{ $product->formatted_price }}</td>
    <td class="">{{ $product->quantity }}</td>
    <td class="">{{ $product->category_id }}</td>
    <td>
        @if($product->image)
            <img src="{{ Storage::url($product->image) }}" alt="Product Image" width="100">
        @else
            No Image
        @endif
    </td>
    
    @if(getCrudConfig('Product')->delete or getCrudConfig('Product')->update)
        <td>

            @if(getCrudConfig('Product')->update && hasPermission(getRouteName().'.product.update', 1, 1, $product))
                <a href="@route(getRouteName().'.product.update', $product->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('Product')->delete && hasPermission(getRouteName().'.product.delete', 1, 1, $product))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Product') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Product') ]) }}</p>
                        <div class="mt-5 d-flex justify-content-between">
                            <a wire:click.prevent="delete" class="text-white btn btn-success shadow">{{ __('Yes, Delete it.') }}</a>
                            <a @click.prevent="modalIsOpen = false" class="text-white btn btn-danger shadow">{{ __('No, Cancel it.') }}</a>
                        </div>
                    </div>
                </div>
            @endif
        </td>
    @endif
</tr>
