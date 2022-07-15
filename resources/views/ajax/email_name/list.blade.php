@if(count($getEmail)>0)
@foreach ($getEmail as $email)
<tr>
    <td>{{Str::ucfirst($email->name ??'')}}</td>
    <td>

        <div class="d-inline-flex">
            <a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown">
                <i data-feather='more-vertical'></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <a href="javascript:;" data-target="table-body" data-url="{{ route('name.ajax.edit', $email->id) }}" data-heading="Edit Email Name" data-update_url="{{ route('name.ajax.list','email') }}" class="dropdown-item open-modal">
                    <i data-feather='edit'></i> Edit
                </a>
                <a href="javascript:;" class="dropdown-item del-btn" data-target="table-body" data-href="{{ route('name.ajax.delete', $email->id) }}" data-update_url="{{ route('name.ajax.list','email') }}">
                    <i data-feather='trash-2'></i> Delete
                </a>
            </div>
        </div>

    </td>
</tr>
@endforeach
@endif