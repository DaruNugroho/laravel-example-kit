<div class="content-wrapper">

    <livewire:comps.title-page title="Home" subTitle="example" :breadcrumb="$breadcrumb" />

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">

                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="card-title m-0">Sitemap</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title"> Just Info for you!</h6>
                            <p class="card-text">This is example Livewire code and implementation with database, eazy to
                                use with
                                comment code.
                            </p>
                            <table class="table table-sm table-striped">
                                <tr>
                                    <th> Pages</th>
                                    <th> Desc</th>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="crud" wire:navigate>Basic CRUD</a>
                                    </td>
                                    <td>Simple CRUD with Validation </td>
                                </tr>
                                <tr>
                                    <td> <a href="crud-dialog" wire:navigate>Crud With Dialog</a></td>
                                    <td> Dialog Form with Notify </td>
                                </tr>
                                <tr>
                                    <td> <a href="upload-file" wire:navigate>Upload File</a></td>
                                    <td> Upload & mount form with default value </td>
                                </tr>
                                <tr>
                                    <td> <a href="upload-file" wire:navigate>Export Excel</a></td>
                                    <td> </td>
                                </tr>
                            </table>
                        </div>
                    </div>


                </div>



            </div>

        </div>
    </div>

</div>
