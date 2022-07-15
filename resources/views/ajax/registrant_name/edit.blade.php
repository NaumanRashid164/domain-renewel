<form class="row gy-1 pt-75" action="{{route('name.ajax.addName')}}" method="post">
    @csrf
        <input type="hidden" name="id" value="{{$Name->id}}">
    <div class="col-12 col-md-12">
        <label class="form-label">Name</label>
        <input type="hidden" name="type" value="registrant">
        <input type="text" class="form-control name required" name="name" value="{{$Name->name}}">
        @error('name')
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