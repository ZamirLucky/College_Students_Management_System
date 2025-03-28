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
                    <a href="" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add New College</a>
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
                  </tr>
                </thead>
                <tbody>
                    @if ($colleges->count())
                        @foreach ($colleges as $index => $colleges )
                            <tr>
                                <th scope="row">{{ $college->id }}</th>
                                <td>{{ $college->name }}</td>
                                <td>{{ $college->address }}</td>
                                <td>{{ $college->created_at->format('d/m/Y') }}</td>
                                <td width="150">
                                <a href="" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                        @endfor
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