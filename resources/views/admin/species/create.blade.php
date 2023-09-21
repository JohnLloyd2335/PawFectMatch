@extends('admin.layouts.header-sidebar')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-900">Add Species</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.species.index') }}">Species</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.species.create') }}">Add Species</a></li>
                </ol>
            </nav>
        </div>

        <div class="card shadow-lg p-4">

            <form action="{{ route('admin.species.store') }}" method="post">
                @csrf
                
                    <label>Species Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                    @error('name')
                        <p class="text-danger"><strong>{{ $message }}</strong></p>
                    @enderror
                    <button type="submit" class="btn btn-primary mt-2">Add</button>
            </form>

        </div>



    </div>
    <!-- End Page Content -->
@endsection
