<form class="row gy-1 pt-75" action="{{route('contact.ajax.addCustomer')}}" method="post">
    @csrf
    <div class="col-6 col-md-6">
        <label class="form-label">Name</label>
        <input type="text" class="form-control name common required" name="name" value="{{old('name')}}">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-6 col-md-6">
        <label class="form-label">Email</label>
        <input type="email" class="form-control email required" name="email" value="{{old('email')}}">
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-6 col-md-6">
        <label class="form-label">Company Name</label>
        <input type="text" class="form-control company_name common required" name="company_name" value="{{old('company_name')}}">
        @error('company_name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-6 col-md-6">
        <label class="form-label">Company Address</label>
        <input type="text" class="form-control company_address required" name="company_address" value="{{old('company_address')}}">
        @error('company_address')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-6 col-md-6">
        <label class="form-label">Phone Number</label>
        <input type="text" class="form-control phone required" name="phone" value="{{old('phone')}}">
        @error('phone')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-6 col-md-6">
        <label class="form-label">name-company</label>
        <input type="text" readonly class="form-control nameCompany required" name="nameCompany" value="{{old('nameCompany')}}">
        @error('nameCompany')
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