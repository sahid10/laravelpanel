<?php

namespace App\Http\Livewire\Admin\Transaction;

use App\Models\transaction;
use App\Models\product;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $transaction;

    public $product_id;
    public $product=[];
    public $user_id;
    public $user=[];
    public $quantity;
    public $total_price;
    public $status;
    
    protected $rules = [
        'quantity' => 'required|integer|min:1',
        'total_price' => 'required|numeric|min:0',
        'status' => 'required',
        'product_id' => 'required',       
        'user_id' => 'required',       
    ];

    public function mount(Transaction $transaction){
        $this->transaction = $transaction;
        $this->product_id = $this->transaction->product_id;
        $this->user_id = $this->transaction->user_id;
        $this->quantity = $this->transaction->quantity;
        $this->total_price = $this->transaction->total_price;
        $this->status = $this->transaction->status; 
        $this->product = product::all();       
        $this->user = user::all();       
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Transaction') ]) ]);
        
        $this->transaction->update([
            'product_id' => $this->product_id,            
            'user_id' => $this->user_id,            
            'quantity' => $this->quantity,
            'total_price' => $this->total_price,
            'status' => $this->status,            
        ]);
    }

    public function render()
    {
        return view('livewire.admin.transaction.update', [
            'transaction' => $this->transaction
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Transaction') ])]);
    }
}
