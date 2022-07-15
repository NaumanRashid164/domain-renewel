@if(count($contact)>0)
@foreach ($contact as $item)
<tr>
    <td>{{Str::ucfirst($item->company_name ??'')}}</td>
    <td>{{Str::ucfirst($item->name ??'')}}</td>
    <td>{{$item->nameCompany ??''}}</td>
    <td>{{Str::ucfirst($item->company_address ??'')}}</td>
    <td>{{$item->email ??''}}</td>
    <td>{{$item->phone ??''}}</td>
    <td>
        @php $status = ($item->status == true) ? "true" : "false" @endphp
        <select name="status" class="update-status form-select" data-id="{{$item->id}}" data-url="{{Route('contact.ajax.status')}}" data-update_url="{{Route('contact.ajax.list')}}">
            <option {{($status =='true')? 'selected' : ''}} value="true">Active</option>
            <option value="false" {{($status =='false')? 'selected' : ''}}>Inactive</option>
        </select>
    </td>
    <td>

        <div class="d-inline-flex">
            <a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown">
                <i data-feather='more-vertical'></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <a href="javascript:;" data-target="table-body" data-url="{{ route('contact.ajax.edit', $item->id) }}" data-heading="Edit Customer Detail" data-update_url="{{ route('contact.ajax.list') }}" class="dropdown-item open-modal">
                    <i data-feather='edit'></i> Edit
                </a>
                <a href="javascript:;" class="dropdown-item del-btn" data-target="table-body" data-href="{{ route('contact.ajax.delete', $item->id) }}" data-update_url="{{ route('contact.ajax.list') }}">
                    <i data-feather='trash-2'></i> Delete
                </a>
            </div>
        </div>

    </td>
</tr>
@endforeach
@endif