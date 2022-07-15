<form class="row gy-1 pt-75" action="{{route('duration.ajax.addDuration')}}" method="post">
    @csrf
    <div class="col-12 col-md-12">
        <label class="form-label">Duration</label>
        <input type="number" class="form-control name required" name="duration" value="{{old('duration')}}">
        @error('duration')
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