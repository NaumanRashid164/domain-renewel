@if(count($Duration)>0)
@foreach ($Duration as $item)
<tr>
    <td>{{$item->duration ??''}}</td>
    <td>

        <div class="d-inline-flex">
            <a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown">
                <i data-feather='more-vertical'></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <a href="javascript:;" data-target="table-body" data-url="{{ route('duration.ajax.edit', $item->id) }}" data-heading="Edit Duration" data-update_url="{{ route('duration.ajax.list') }}" class="dropdown-item open-modal">
                    <i data-feather='edit'></i> Edit
                </a>
                <a href="javascript:;" class="dropdown-item del-btn" data-target="table-body" data-href="{{ route('duration.ajax.delete', $item->id) }}" data-update_url="{{ route('duration.ajax.list') }}">
                    <i data-feather='trash-2'></i> Delete
                </a>
            </div>
        </div>

    </td>
</tr>
@endforeach
@endif