
<div class="row">
    <div class="col-md-12">
        <div class="form-group row">
        <label for="first_name" class="col-md-3 col-form-label">Name</label>
        <div class="col-md-9">
            <input type="text" name="first_name" id="first_name" class="form-control is-invalid">
            <div class="invalid-feedback">
            Please choose a username.
            </div>
        </div>
        </div>

        <div class="form-group row">
        <label for="email" class="col-md-3 col-form-label">Email</label>
        <div class="col-md-9">
            <input type="text" name="email" id="email" class="form-control">
        </div>
        </div>

        <div class="form-group row">
        <label for="phone" class="col-md-3 col-form-label">Phone</label>
        <div class="col-md-9">
            <input type="text" name="phone" id="phone" class="form-control">
        </div>
        </div>

        <div class="form-group row">
            <label for="dob" class="col-md-3 col-form-label">Birthday</label>
            <div class="col-md-9">
                <input type="date" name="dob" id="dob" class="form-control">
            </div>
        </div>

        <div class="form-group row">
            <label for="company_id" class="col-md-3 col-form-label">College</label>
            <div class="col-md-9">
                <select name="college_id" id="college_id" class="form-control">
                <option value="">Select College</option>
                    @foreach ($colleges as $id => $name)
                        <option value="{{ $id }}">
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <hr>
        <div class="form-group row mb-0">
            <div class="col-md-9 offset-md-3">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('students.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </div>
    </div>
</div>

           