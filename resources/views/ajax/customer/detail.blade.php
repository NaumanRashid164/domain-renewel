<form class="row gy-1 pt-75" action="#" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$customer->id}}">
    <div class="col-12 col-md-12">
        <label class="form-label">Domain Name</label>
        <input type="text" readonly class="form-control domain_name required" name="domain_name" value="{{$customer->domain_name}}">
        @error('domain_name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-6 col-md-6">
        <label class="form-label">Contact</label>
        <select name="contact_details_id" disabled class="form-select required select2" id="">
            <option value="" disabled>--select--</option>
            @foreach(Contact_detail() as $item)
            <option value="{{$item->id}}" {{($customer->contact_id == $item->id)? "selected" : ""}}>{{$item->nameCompany}}</option>
            @endforeach
        </select>
        @error('contact')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-6 col-md-6">
        <label class="form-label">Registration date</label>
        <input type="text" disabled  class="form-control required flatpickr-basic start_date" name="start_date" value="{{$customer->start_date}}">
        @error('start_date')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-6 col-md-6">
        <label class="form-label">Duration</label>
        <select name="duration_id" disabled class="form-select duration required" id="">
            <option value="" selected disabled>--select--</option>
            @foreach(duration() as $item)
            <option value="{{$item->id}}" {{($customer->duration_id == $item->id)? "selected" : ""}}>{{$item->duration}}</option>
            @endforeach
        </select>
        @error('duration')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-6 col-md-6">
        <label class="form-label">Expiry date</label>
        <input type="text" readonly class="form-control required expiry_date" name="expiry_date" value="{{$customer->expiry_date}}">
        @error('expiry_date')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-6 col-md-6">
        <label class="form-label">Add Services cost</label>
        <input type="number" readonly class="form-control cost required" name="cost" value="{{$customer->cost}}">
        @error('cost')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-6 col-md-6">
        <label class="form-label">VAT Rate</label>
        <select name="vat_rate" disabled class="form-select vat_rate required" id="">
            <option value="" selected disabled>--select--</option>
            @foreach(vat_rate() as $item)
            <option value="{{$item->id}}" data-rate="{{$item->rate}}" {{($customer->vat_id == $item->id)? "selected" : ""}}>{{$item->rate}}{{"%"}}</option>
            @endforeach
        </select>
        @error('vat_rate')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-6 col-md-6">
        <label class="form-label">VAT</label>
        <input type="text" readonly name="vat" class="form-control vat" id="" value="{{$customer->vat}}">
        @error('vat_rate')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-6 col-md-6">
        <label class="form-label">Cost incd VAT</label>
        <input type="text" readonly name="cost_inc_vat" class="form-control cost_inc_vat" value="{{$customer->cost_inc_vat}}">
        @error('cost_inc_vat')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-6 col-md-6">
        <label class="form-label">Comment</label>
        <input type="text" readonly name="comment" class="form-control comment" id="" value="{{$customer->comment}}">
        @error('comment')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-6 col-md-6">
        <label class="form-label">Registration with</label>
        <select name="registration" disabled class="form-select required select2 registration" id="">
            <option value="" selected disabled>--select--</option>
            @foreach(registrant_name() as $item)
            <option value="{{$item->id}}" {{($customer->registrant_id == $item->id)? "selected" : ""}}>{{$item->name}}</option>
            @endforeach
        </select>
        @error('registration')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class=" col-6 col-md-6">
        <label class="form-label">Hosted with</label>
        <div class="d-flex col-md-6" style="margin-left: 1rem;">
            <div class="col-md-12">
                <input type="radio" name="hosted" id="internal" disabled class="form-check-input hosted" value="internal" {{($customer->hosted == "internal") ? "checked": ""}}>
                <label for="internal" style="margin-left: 30px;">Internal</label>
            </div>
            <div class="col-md-12">
                <input type="radio" name="hosted" id="external"  disabled class="form-check-input hosted" value="external" {{($customer->hosted == "external") ? "checked": ""}}>
                <label for="external" style="margin-left: 30px;">External</label>
            </div>
        </div>
        @error('hosted')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-6 col-md-6  hosting_with {{($customer->hosted == 'external') ? '': 'hidden'}}">
        <label class="form-label">Hosting with</label>
        <select name="hosting" disabled class="form-select required select2 hosting" id="">
            <option value="" selected disabled>--select--</option>
            @foreach(hosting_name() as $item)
            <option value="{{$item->id}}" {{($customer->hosting_id == $item->id)? "selected" : ""}}>{{$item->name}}</option>
            @endforeach
        </select>
        @error('hosting')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-6 col-md-6  email">
        <label class="form-label">Email with</label>
        <select name="email" disabled class="form-select required select2 email" id="">
            <option value="" selected disabled>--select--</option>
            @foreach(email_name() as $item)
            <option value="{{$item->id}}" {{($customer->email_id == $item->id)? "selected" : ""}}>{{$item->name}}</option>
            @endforeach
        </select>
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>


    <!-- Stopped by -->
    <div class="col-12 col-md-12">
        <div class="form-check form-check-inline service_check">
            <input type="hidden" class="service_checkbox" name="service_checkbox" value=0>
            <input class="form-check-input" type="checkbox" disabled id="inlineCheckbox1" {{($customer->service_stopped == true) ? "checked" : ""}} />
            <label class="form-check-label" for="inlineCheckbox1">Service Stopped</label>
        </div>
    </div>

    <div class="col-6 col-md-6 service {{($customer->service_stopped == true) ?  : 'hidden' }}">
        <label class="form-label">Stopped by</label>
        <input type="text" class="form-control stopped_by required" readonly name="stopped_by" value="{{$customer->stopped_by??''}}">
        @error('stopped_by')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-6 col-md-6 service {{($customer->service_stopped == true) ?  : 'hidden' }}">
        <label class="form-label">Stopped comment</label>
        <input type="text" class="form-control stopped_comment required"  readonly name="stopped_comment" value="{{$customer->stopped_comment??''}}">
        @error('stopped_comment')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- End stopper by -->
</form>