@push('pageTitle', 'Basic CRUD')

<div class="content-wrapper">

    <livewire:comps.title-page title="Basic CURD" subTitle="example" :breadcrumb="$breadcrumb" />

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">


                    <a wire:click.prevent="downloadPDF" class="btn btn-default">Download PDF</a>


                </div>
            </div>

        </div>
    </div>
</div>
