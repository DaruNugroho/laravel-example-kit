<div class="content-wrapper">

    <livewire:comps.title-page title="CRUD Dialog" />

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title m-0">Form for Create & Edit </h5>
                        </div>
                        <div class="card-body">

                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#dialogForm"
                                wire:click.prevent="create">
                                Create Data
                            </button>

                            <p class="card-text mt-3">You can open dialog with Create Data or edit.
                            </p>

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
                                                data-toggle="modal" data-target="#dialogForm"
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



    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="dialogForm" tabindex="-1" role="dialog"
        aria-labelledby="dialogFormLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dialogFormLabel">
                        @if ($id)
                            Edit Data
                        @else
                            Create New Data
                        @endif
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
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
                                    class="form-control @error('expiry_date') is-invalid @enderror" id="expiry_date">
                                @error('expiry_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <button type="button" wire:click.prevent="{{ $id ? "update('$id')" : 'store' }}"
                        class="btn btn-primary float-right">
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
            </div>
        </div>
    </div>

</div>
