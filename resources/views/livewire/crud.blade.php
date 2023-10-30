@push('pageTitle', 'Basic CRUD')

<div class="content-wrapper">

    <livewire:comps.title-page title="Basic CURD" subTitle="example" :breadcrumb="$breadcrumb" />

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">


                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Form Livewire
                            </h3>
                        </div>

                        <form class="form-horizontal">
                            <div class="card-body">

                                <p class="card-text">You can use this form for create, update, and delete data. to clear
                                    form click Reset Button. </p>

                                <div class="form-group row">
                                    <label for="name" class="col-sm-4 col-form-label text-right">Product
                                        Name</label>
                                    <div class="col-sm-8">
                                        <input wire:model="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" id="name"
                                            placeholder="Product Name">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="qty" class="col-sm-4 col-form-label text-right">Quantity</label>
                                    <div class="col-sm-8">
                                        <input wire:model="qty" type="number"
                                            class="form-control @error('qty') is-invalid @enderror" id="qty"
                                            placeholder="Qty">
                                        @error('qty')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="expiry_date" class="col-sm-4 col-form-label text-right">Expiry
                                        Date</label>
                                    <div class="col-sm-8">
                                        <input wire:model="expiry_date" type="date"
                                            class="form-control @error('expiry_date') is-invalid @enderror"
                                            id="expiry_date">
                                        @error('expiry_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="button" wire:click.prevent="{{ $id ? "update('$id')" : 'store' }}"
                                    class="btn btn-info float-right">
                                    @if ($id)
                                        Update Data
                                    @else
                                        Save Data
                                    @endif
                                </button>
                                @if ($id)
                                    <a wire:click.prevent="delete('{{ $id }}')" wire:confirm="are u sure ?"
                                        class="btn btn-danger ml-2">Delete</a>
                                @endif
                                <a wire:click.prevent="resetForm" class="btn btn-default">Reset</a>

                            </div>

                        </form>
                    </div>

                </div>
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title m-0"> Data </h5>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Product</th>
                                        <th>Qty</th>
                                        <th>Expiry Date</th>
                                        <th style="width: 40px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $i => $item)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->qty }} </td>
                                            <td>{{ $item->expiry_date }} </td>
                                            <td>
                                                <button class="btn btn-xs btn-outline-primary"
                                                    wire:click.prevent="edit('{{ $item->id }}')"
                                                    class="btn btn-sm btn-primary">Edit
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
