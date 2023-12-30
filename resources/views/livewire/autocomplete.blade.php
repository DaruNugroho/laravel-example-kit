@push('pageTitle', 'Basic CRUD')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush


<div class="content-wrapper">

    <livewire:comps.title-page title="Autocomplete" subTitle="example" />

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Select Country + Query Search</h3>
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

                                <div class="form-group">
                                    <div class="border-lable-flt">
                                        <input type="text" class="form-control" wire:model="codeDefault"
                                            placeholder="with default">
                                        <label for="codeDefault" class="form-label">With Default</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>





                <div class="col-lg-6">

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title"> Multiple Select + select2 </h3>
                        </div>
                        <form class="form-horizontal">
                            <div class="card-body">
                                <div wire:ignore>
                                    <select multiple="multiple" class="form-control select2" id="countries"
                                        style="width: 100%;">
                                    </select>
                                </div>

                                <br />
                                @foreach ($ms_codes as $item)
                                    <b>{{ $item }},</b>
                                @endforeach
                                <br />
                                @foreach ($ms_selectedCountries as $item)
                                    <b> {{ $item }}, </b>
                                @endforeach
                            </div>
                        </form>
                    </div>


                </div>



            </div>

        </div>
    </div>
</div>


@push('scripts')
    <script type="module" src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <script type="module">
        $(document).ready(function() {
            var datas = {!! $ms_countries !!}
            var code_default = @json($ms_code_default);
            $('#countries').select2({
                placeholder: "Please select an agent",
                multiple: true,
                allowClear: true,
                closeOnSelect: false,
                data: datas.map((item, i) => {
                    return {
                        id: item.code,
                        text: item.name
                    }
                })
            });

            if (code_default.length > 0) {
                $('#countries').val(code_default).trigger('change');
            }

            $('#countries').on('change', function(e) {
                var selectedCodes = $('#countries').select2("val");
                var selectedCountries = datas.filter(item => selectedCodes.includes(item.code)).map(itm =>
                    itm.name);
                console.log(selectedCountries);
                console.log(selectedCodes);
                @this.set('ms_codes', selectedCodes);
                @this.set('ms_selectedCountries', selectedCountries);
            });
        });
    </script>
@endpush
