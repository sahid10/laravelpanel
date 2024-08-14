<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $transaction->user_id }}</td>
    <td class="">{{ $transaction->product_id }}</td>
    <td class="">{{ $transaction->quantity }}</td>
    <td class="">{{ $transaction->formatted_price }}</td>
    <td class="">{{ $transaction->status }}</td>
    
    @if(getCrudConfig('Transaction')->delete or getCrudConfig('Transaction')->update)
        <td>

            @if(getCrudConfig('Transaction')->update && hasPermission(getRouteName().'.transaction.update', 0, 0, $transaction))
                <a href="@route(getRouteName().'.transaction.update', $transaction->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('Transaction')->delete && hasPermission(getRouteName().'.transaction.delete', 0, 0, $transaction))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Transaction') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Transaction') ]) }}</p>
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
