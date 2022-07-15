@if(count($getHosting)>0)
@foreach ($getHosting as $hosting)
<tr>
    <td>{{Str::ucfirst($hosting->name ??'')}}</td>
    <td>

        <div class="d-inline-flex">
            <a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown">
                <i data-feather='more-vertical'></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <a href="javascript:;" data-target="table-body" data-url="{{ route('name.ajax.edit', $hosting->id) }}" data-heading="Edit Hosting" data-update_url="{{ route('name.ajax.list','hosting') }}" class="dropdown-item open-modal">
                    <i data-feather='edit'></i> Edit
                </a>
                <a href="javascript:;" class="dropdown-item del-btn" data-target="table-body" data-href="{{ route('name.ajax.delete', $hosting->id) }}" data-update_url="{{ route('name.ajax.list','hosting') }}">
                    <i data-feather='trash-2'></i> Delete
                </a>
            </div>
        </div>

    </td>
</tr>
@endforeach
@endif