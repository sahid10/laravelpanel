@component('admin::layouts.app')
<div class="container-fluid">

    {{-- <div wire:id="h5Rvxp2OA3YH4EjBSux3" x-data="{ rebuildModal: false }"> --}}
<div class="card">
    <div class="card-header p-0">
        <div class="d-flex justify-content-between">
            <h3 class="card-title">Dashboard</h3>
            {{-- <a href="http://127.0.0.1:8000/admin/crud/create" class="btn btn-info">Create CRUD</a> --}}
        </div>
        <ul class="breadcrumb mt-3 py-3 px-4 rounded">
            <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/admin" class="text-decoration-none">Dashboard</a></li>
        </ul>
        <div class="row">
            <div class="col-sm-6 col-md-4">
                @include('vendor.admin.widget', [
                    'title' => 'Total Users',
                    'icon' => 'fas fa-users',
                    'data' => $TotalUser,
                ])
            </div>   
            <div class="col-sm-6 col-md-4">
                @include('vendor.admin.widget', [
                    'title' => 'Total Product',
                    'icon' => 'fas fa-lightbulb',
                    'data' => $TotalProduct,
                ])
            </div>   
            <div class="col-sm-6 col-md-4">
                @include('vendor.admin.widget', [
                    'title' => 'Total Transaction',
                    'icon' => 'fas fa-comment',
                    'data' => $TotalTransaction,
                ])
            </div>   
        </div>
    </div>

    <div class="mt-4 px-2 rounded">
        <div class="mt-4 card-body table-responsive p-0">
            
        </div>

    </div>
</div>

<!-- Livewire Component wire-end:h5Rvxp2OA3YH4EjBSux3 -->

</div>
@endcomponent
