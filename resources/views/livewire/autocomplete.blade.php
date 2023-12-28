@push('pageTitle', 'Basic CRUD')

<div class="content-wrapper">

    <livewire:comps.title-page title="Autocomplete" subTitle="example" />

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Select Country</h3>
                        </div>

                        <form class="form-horizontal">
                            <div class="card-body">


                                <div class="form-group">
                                    <div class="autocomplete">
                                        <div class="border-lable-flt">
                                            <div class="input-group">
                                                <input type="text" class="form-control" wire:model="country"
                                                    wire:keyup="searchCountry" placeholder="please type country">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        wire:click="clearCountry">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <label for="country" class="form-label">Select Country</label>
                                        </div>
                                        <!-- Search result list -->
                                        @if ($showresult)
                                            <ul class="search-list-group position-absolute">
                                                @if (!empty($countries))
                                                    @foreach ($countries as $item)
                                                        <li
                                                            wire:click="setCountry('{{ $item->code }}', '{{ $item->name }}')">
                                                            {{ $item->name }}</li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="border-lable-flt">
                                        <input type="text" class="form-control" wire:model="code" placeholder=":D">
                                        <label for="code" class="form-label">Country Code</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
