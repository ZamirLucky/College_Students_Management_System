@extends('layouts.main')

@section('content')

<!-- content -->
<main class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
              <div class="card-header card-title">
                <div class="d-flex align-items-center">
                  <h2 class="mb-0">All Students</h2>
                  <div class="ml-auto">
                    <a href="{{ route('students.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add New</a>
                  </div>
                </div>
              </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <!-- Sorting Dropdown -->
                  <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                        Sort By
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'name_asc']) }}">Name (A-Z)</a>
                        <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'name_desc']) }}">Name (Z-A)</a>
                    </div>
                  </div>                
                </div>
                @include('students._filter')
              </div>
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">DOB</th>
                    <th scope="col">Created_at</th>
                    <th scope="col">Updated_at</th>
                    <th scope="col">College</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @if ($students->count())
                        @foreach ($students as $index => $student )
                            <tr>
                                <th scope="row">{{ $student->id }}</th>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->phone }}</td>
                                <td>{{ $student->dob->format('d/m/Y') }}</td>
                                <td>{{ $student->created_at->format('d/m/Y') }}</td>
                                <td>{{ $student->updated_at->format('d/m/Y') }}</td>
                                <td>{{ $student->college->name }}</td>
                                <td width="150">
                                <a href="{{ route('students.show', $student->id) }}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('students.destroy', $student->id) }}" class="btn btn-sm btn-circle btn-outline-danger btn-delete" title="Delete" data-id="{{ $student->id }}"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        <!-- Hidden form for deletion -->
                        <form id="form-delete-student" method="POST" style="display: none;">
                          @csrf
                          @method('DELETE')
                        </form>
                    @endif
                </tbody>
              </table> 


            </div>
          </div>
        </div>
      </div>
    </div>
</main>

@endsection