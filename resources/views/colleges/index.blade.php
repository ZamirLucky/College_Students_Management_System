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
                  <h2 class="mb-0">All Colleges</h2>
                  <div class="ml-auto">
                    <a href="{{ route('colleges.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add New</a>
                  </div>
                </div>
              </div>
            <div class="card-body">
              <div class="row">
              </div>
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Created_at</th>
                    <th scope="col">Updated_at</th>
                  </tr>
                </thead>
                <tbody>
                  @if ($message = session('message'))
                      <div class="alert alert-success">{{ $message }}</div>
                      <script>
                          setTimeout(function(){
                              $('.alert').fadeOut('slow');
                          }, 3000);
                      </script>
                  @endif
                  @if ($colleges->count())
                      @foreach ($colleges as $college )
                          <tr>
                              <th scope="row">{{ $college->id }}</th>
                              <td>{{ $college->name }}</td>
                              <td>{{ $college->address }}</td>
                              <td>{{ $college->created_at->format('d/m/Y') }}</td>
                              <td>{{ $college->updated_at->format('d/m/Y') }}</td>
                              <td width="150">
                                <a href="{{ route('colleges.show', $college->id) }}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
                              <a href="{{ route('colleges.edit', $college->id) }}" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                              <a href="{{ route('colleges.destroy', $college->id) }}" class="btn btn-sm btn-circle btn-outline-danger btn-delete" title="Delete" data-type="college" data-id="{{ $college->id }}"><i class="fa fa-times"></i></a>
                              </td>
                          </tr>
                      @endforeach
                      @include('partial._delete-form')
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