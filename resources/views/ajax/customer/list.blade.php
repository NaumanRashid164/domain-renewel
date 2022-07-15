@if(count($customers)>0)
@foreach ($customers as $item)
<tr>
    <td>{{$item->domain_name}}</td>
    <td>{{$item->contact->name}}</td>
    <td>{{$item->contact->email}}</td>
    <td>{{$item->start_date}}</td>
    <td>{{$item->expiry_date}}</td>
    @php
    $time = explode('/', $item->expiry_date);;
    $newformat = date($time[2] . "-" . $time[1] ."-" .$time[0]);
    $expiryDate=date_create($newformat);
    $today=date('Y-m-d');
    $today= date_create($today);
    $diff=date_diff($today,$expiryDate);
    @endphp
    <!-- Due date or Overdue date -->
    @if($diff->invert == 0)
    <td>{{$diff->format("%R%a days")}}</td>
    <td></td>
    @else
    <td></td>
    <td>{{$diff->format("%R%a days")}}</td>
    @endif
    <td>
        <!-- <a href="javascript:;" data-target="table-body" data-url="{{ route('customer.ajax.edit', $item->id) }}" data-heading="Customer Detail" data-update_url="{{ route('customer.ajax.list',['email']) }}" class="dropdown-item open-modal">
            <i data-feather='edit'></i> Edit
        </a> -->
        <button type="button" data-target="table-body" data-url="{{ route('customer.ajax.detail', $item->id) }}" data-heading="Customer Detail" data-update_url="{{ route('customer.ajax.list') }}" class="btn btn-outline-info round waves-effect open-modal">Detail</button>
    </td>
    <td>
        @if($item->service_stopped == true)
        <span class="badge badge-glow bg-danger">Service stopped</span>
        @else
        @if($diff->invert == 1)
        <span class="badge badge-glow bg-dark">Overdue</span>
        @elseif($diff->days > 28)
        <span class="badge badge-glow bg-success">OK</span>
        @else
        <span class="badge badge-glow bg-warning">Near due</span>
        @endif
        @endif
    </td>


    <td>

        <div class="d-inline-flex">
            <a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown">
                <i data-feather='more-vertical'></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <a href="javascript:;" data-target="table-body" data-url="{{ route('customer.ajax.edit', $item->id) }}" data-heading="Edit Customer Detail" data-update_url="{{ route('customer.ajax.list') }}" class="dropdown-item open-modal">
                    <i data-feather='edit'></i> Edit
                </a>
                <a href="javascript:;" class="dropdown-item del-btn" data-target="table-body" data-href="{{ route('customer.ajax.delete', $item->id) }}" data-update_url="{{ route('customer.ajax.list') }}">
                    <i data-feather='trash-2'></i> Delete
                </a>
            </div>
        </div>

    </td>
</tr>
@endforeach
@endif