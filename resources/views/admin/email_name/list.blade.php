<section id="row-grouping-datatable" class="mt-2">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-title">Email MX Host List</h4>

                    <button type="button" class="btn btn-primary me-1 open-modal" data-heading="Add Email MX Host Name" data-target="table-body" data-update_url="{{ route('name.ajax.list','email') }}" data-url="{{route('name.ajax.addfrom','email')}}">Add Email MX Host Name</button>

                </div>
                <div class="card-datatable">
                    <table class="dt-row-grouping table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-body">
                            @include('ajax.email_name.list')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>