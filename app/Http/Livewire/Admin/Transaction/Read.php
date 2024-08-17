<?php

namespace App\Http\Livewire\Admin\Transaction;

use App\Models\transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class Read extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $queryString = ['search'];

    protected $listeners = ['transactionDeleted'];

    public $sortType;
    public $sortColumn;

    public function transactionDeleted(){
        // Nothing ..
    }

    public function sort($column)
    {
        $sort = $this->sortType == 'desc' ? 'asc' : 'desc';

        $this->sortColumn = $column;
        $this->sortType = $sort;
    }

    public function render()
    {
        $data = Transaction::query();

    // Dapatkan pengguna yang sedang login
    $user = auth()->user();

    // Jika pengguna bukan admin, filter berdasarkan user_id
    if (!$user->roles()->where('name', 'super_admin')->exists()) {
        $data->where('user_id', $user->id);
    }

        $instance = getCrudConfig('transaction');
        if($instance->searchable()){
            $array = (array) $instance->searchable();
            $data->where(function (Builder $query) use ($array){
                foreach ($array as $item) {
                    if(!\Str::contains($item, '.')) {
                        $query->orWhere($item, 'like', '%' . $this->search . '%');
                    } else {
                        $array = explode('.', $item);
                        $query->orWhereHas($array[0], function (Builder $query) use ($array) {
                            $query->where($array[1], 'like', '%' . $this->search . '%');
                        });
                    }
                }
            });
        }

        if($this->sortColumn) {
            $data->orderBy($this->sortColumn, $this->sortType);
        } else {
            $data->latest('id');
        }

        $data = $data->paginate(config('easy_panel.pagination_count', 15));

        return view('livewire.admin.transaction.read', [
            'transactions' => $data
        ])->layout('admin::layouts.app', ['title' => __(\Str::plural('Transaction')) ]);
    }
}