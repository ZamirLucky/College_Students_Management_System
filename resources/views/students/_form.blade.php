
<form action="{{ route('students.store') }}" method="POST">
    @csrf  <!-- Laravel CSRF token (required for security) -->
    
    <div class="row">
        <div class="col-md-12">
            <div class="form-group row">
                <label for="name" class="col-md-3 col-form-label">Name</label>
                <div class="col-md-9">
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $student->name) }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror     
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-3 col-form-label">Email</label>
                <div class="col-md-9">
                    <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $student->email) }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror  
                </div>
            </div>

            <div class="form-group row">
                <label for="phone" class="col-md-3 col-form-label">Phone</label>
                <div class="col-md-9">
                    <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $student->phone) }}">
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror  
                </div>
            </div>

            <div class="form-group row">
                <label for="dob" class="col-md-3 col-form-label">Birthday</label>
                <div class="col-md-9">
                    <input type="date" name="dob" id="dob" class="form-control @error('dob') is-invalid @enderror" value="{{ old('dob', $student->dob ? $student->dob->format('Y-m-d') : '') }}">
                    @error('dob')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror  
                </div>
            </div>

            <div class="form-group row">
                <label for="college_id" class="col-md-3 col-form-label">College</label>
                <div class="col-md-9">
                    <select name="college_id" id="college_id" class="form-control @error('college_id') is-invalid @enderror">
                    <option value="">Select College</option>
                        @foreach ($colleges as $id => $name)
                            <option value="{{ $id }}" {{ old('college_id', $student->college_id) == $id ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                    @error('college_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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
</form>

           