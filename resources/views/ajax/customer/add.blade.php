<form class="row gy-1 pt-75" action="{{Route('customer.ajax.addCustomer')}}" method="post">
    @csrf
    <div class="col-12 col-md-12">
        <label class="form-label">Domain Name</label>
        <input type="text" class="form-control domain_name required" name="domain_name" value="{{old('domain_name')}}">
        @error('domain_name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-6 col-md-6">
        <label class="form-label">Contact</label>
        <select name="contact_details_id" class="form-select required select2" id="">
            <option value="" selected disabled>--select--</option>
            @foreach(Contact_detail() as $item)
            <option value="{{$item->id}}">{{$item->nameCompany}}</option>
            @endforeach
        </select>
        @error('contact')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-6 col-md-6">
        <label class="form-label">Registration date</label>
        <input type="text" class="form-control required flatpickr-basic start_date" name="start_date" value="{{old('start_date')}}">
        @error('start_date')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-6 col-md-6">
        <label class="form-label">Duration</label>
        <select name="duration_id" class="form-select duration required" id="">
            <option value="" selected disabled>--select--</option>
            @foreach(duration() as $item)
            <option value="{{$item->id}}">{{$item->duration}}</option>
            @endforeach
        </select>
        @error('duration')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-6 col-md-6">
        <label class="form-label">Expiry date</label>
        <input type="text" readonly class="form-control required expiry_date" name="expiry_date" value="{{old('expiry_date')}}">
        @error('expiry_date')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-6 col-md-6">
        <label class="form-label">Add Services cost</label>
        <input type="number" class="form-control cost required" name="cost" value="{{old('cost')}}">
        @error('cost')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-6 col-md-6">
        <label class="form-label">VAT Rate</label>
        <select name="vat_rate" class="form-select vat_rate required" id="">
            <option value="" selected disabled>--select--</option>
            @foreach(vat_rate() as $item)
            <option value="{{$item->id}}" data-rate="{{$item->rate}}">{{$item->rate}}{{"%"}}</option>
            @endforeach
        </select>
        @error('vat_rate')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-6 col-md-6">
        <label class="form-label">VAT</label>
        <input type="text" readonly name="vat" class="form-control vat" id="">
        @error('vat_rate')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-6 col-md-6">
        <label class="form-label">Cost incd VAT</label>
        <input type="text" readonly name="cost_inc_vat" class="form-control cost_inc_vat" id="">
        @error('cost_inc_vat')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-6 col-md-6">
        <label class="form-label">Comment</label>
        <input type="text" name="comment" class="form-control comment" id="">
        @error('comment')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-6 col-md-6">
        <label class="form-label">Registration with</label>
        <select name="registration" class="form-select required select2 registration" id="">
            <option value="" selected disabled>--select--</option>
            @foreach(registrant_name() as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
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
                <input type="radio" name="hosted" id="internal" class="form-check-input hosted" value="internal" checked>
                <label for="internal" style="margin-left: 30px;">Internal</label>
            </div>
            <div class="col-md-12">
                <input type="radio" name="hosted" id="external" class="form-check-input hosted" value="external">
                <label for="external" style="margin-left: 30px;">External</label>
            </div>
        </div>
        @error('hosted')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-6 col-md-6  hosting_with hidden">
        <label class="form-label">Hosting with</label>
        <select name="hosting" class="form-select required select2 hosting" id="">
            <option value="" selected disabled>--select--</option>
            @foreach(hosting_name() as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>
        @error('hosting')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-6 col-md-6  email">
        <label class="form-label">Email with</label>
        <select name="email" class="form-select required select2 email" id="">
            <option value="" selected disabled>--select--</option>
            @foreach(email_name() as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>


    <div class="col-12 text-center mt-2 pt-50">
        <button type="submit" class="btn btn-primary me-1">Submit</button>
        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
            Discard
        </button>
    </div>
</form>