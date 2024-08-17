<?php

namespace App\Http\Livewire\Admin\Transaction;

use App\Models\transaction;
use App\Models\product;
use Livewire\Component;

class Single extends Component
{

    public $transaction;
    public $product;

    public function mount(Transaction $transaction){
        $this->transaction = $transaction;
        $this->product = $transaction->product;
    }

    public function delete()
    {
        $this->transaction->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Transaction') ]) ]);
        $this->emit('transactionDeleted');
    }

    public function render()
    {
        return view('livewire.admin.transaction.single')
            ->layout('admin::layouts.app');
    }
}
