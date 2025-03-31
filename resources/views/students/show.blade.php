@extends('layouts.main')

@section('content')

    <!-- content -->
    <main class="py-5">
        <div class="container">
          <div class="row justify-content-md-center">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-title">
                  <strong>Student Details</strong>
                </div>           
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="id" class="col-md-3 col-form-label">#</label>
                            <div class="col-md-9">
                              <p class="form-control-plaintext text-muted">{{ $student->id }}</p>
                            </div>
                        </div>

                      <div class="form-group row">
                        <label for="name" class="col-md-3 col-form-label">Name</label>
                        <div class="col-md-9">
                          <p class="form-control-plaintext text-muted">{{ $student->name }}</p>
                        </div>
                      </div>
  
                      <div class="form-group row">
                        <label for="email" class="col-md-3 col-form-label">Email</label>
                        <div class="col-md-9">
                          <p class="form-control-plaintext text-muted">{{ $student->email }}</p>
                        </div>
                      </div>
  
                      <div class="form-group row">
                        <label for="phone" class="col-md-3 col-form-label">Phone</label>
                        <div class="col-md-9">
                          <p class="form-control-plaintext text-muted">{{ $student->phone }}</p>
                        </div>
                      </div>
  
                      <div class="form-group row">
                        <label for="dob" class="col-md-3 col-form-label">Birthday</label>
                        <div class="col-md-9">
                          <p class="form-control-plaintext text-muted">{{ $student->dob->format('d/m/Y') }}</p>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="create_at" class="col-md-3 col-form-label">Created Date</label>
                        <div class="col-md-9">
                          <p class="form-control-plaintext text-muted">{{ $student->created_at->format('d/m/Y') }}</p>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="updated_at" class="col-md-3 col-form-label">Updated Date</label>
                        <div class="col-md-9">
                          <p class="form-control-plaintext text-muted">{{ $student->updated_at->format('d/m/Y') }}</p>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="college_id" class="col-md-3 col-form-label">College</label>
                        <div class="col-md-9">
                          <p class="form-control-plaintext text-muted">{{ $student->college_id }}</p>
                        </div>
                      </div>
                      <hr>
                      <div class="form-group row mb-0">
                        <div class="col-md-9 offset-md-3">
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-info">Edit</a>
                            <a href="{{ route('students.destroy') }}" class="btn btn-outline-danger">Delete</a>
                            <a href="{{ route('students.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </main>

@endsection()