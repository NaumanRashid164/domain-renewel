<section id="row-grouping-datatable" class="mt-2">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-title">Duration List</h4>

                    <button type="button" class="btn btn-primary me-1 open-modal" data-heading="Add Duration" data-target="table-body" data-update_url="{{ route('duration.ajax.list') }}" data-url="{{route('duration.ajax.addfrom')}}">Add Duration</button>

                </div>
                <div class="card-datatable">
                    <table class="dt-row-grouping table">
                        <thead>
                            <tr>
                                <th>Duration</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-body">
                            
                            @include('ajax.duration.list')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>