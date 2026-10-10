@extends('layouts.main')

@section('content')

    <!-- content -->
    <main class="py-5">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-title">
                            <strong>Add New student</strong>
                        </div>           
                        <div class="card-body">
                            @include('students._form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection