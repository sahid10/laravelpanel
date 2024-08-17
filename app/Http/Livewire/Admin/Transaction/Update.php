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
    public $product = [];
    public $user_id;
    public $user = [];
    public $quantity;
    public $total_price;
    public $status;
    
    protected $rules = [
        'product_id' => 'required',
        'user_id' => 'required|exists:users,id',
        'quantity' => 'required|integer|min:1',
        'total_price' => 'required|numeric|min:0',
        'status' => 'required|in:pending,canceled,completed',       
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
        // Validasi input sebelum update
        if($this->getRules()) {
            $this->validate();
        }
        
        // Ambil status lama sebelum update
        $oldStatus = $this->transaction->status;

        // Update transaction berdasarkan input user
        $this->transaction->update([
            'product_id' => $this->product_id,
            'user_id' => $this->user_id,
            'quantity' => $this->quantity,
            'total_price' => $this->total_price,
            'status' => $this->status,
        ]);

        // Jika status berubah menjadi completed
        if ($this->status === 'completed' && $oldStatus !== 'completed') {
            $this->handleCompletedTransaction();
        }

        // Jika status berubah menjadi canceled
        if ($this->status === 'canceled' && $oldStatus !== 'canceled') {
            $this->handleCanceledTransaction();
        }

        // Menampilkan pesan sukses
        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Transaction') ]) ]);
    }

    // Fungsi untuk menangani ketika status menjadi completed
    protected function handleCompletedTransaction()
    {
        // Kurangi stok produk berdasarkan quantity
        $product = Product::find($this->product_id);
        $product->decrement('quantity', $this->quantity);

        // Tambahkan logika tambahan untuk completed jika diperlukan
    }

    // Fungsi untuk menangani ketika status menjadi canceled
    protected function handleCanceledTransaction()
    {
        // Tambahkan logika tambahan untuk canceled jika diperlukan
        // Misalnya, kembalikan stok produk atau refund pembayaran
    }


    public function render()
    {
        return view('livewire.admin.transaction.update', [
            'transaction' => $this->transaction
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Transaction') ])]);
    }
}
