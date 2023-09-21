@extends('admin.layouts.header-sidebar')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-900">Edit Breed</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.breed.index') }}">Breed</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.breed.edit', $breed) }}">Edit Breed</a></li>
                </ol>
            </nav>
        </div>

        <div class="card shadow-lg p-4">

            <form action="{{ route('admin.breed.update', $breed) }}" method="post">
                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col">
                        <label>Species</label>
                        <select name="species" class="form-control @error('species') is-invalid @enderror">
                            @foreach ($species as $key => $value)
                                <option @selected($breed->species->id == $key) value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        @error('species')
                            <p class="text-danger"><strong>{{ $message }}</strong></p>
                        @enderror
                    </div>
                </div>

                <div class="row">

                    <div class="col">
                        <label>Breed Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ $breed->name }}">
                        @error('name')
                            <p class="text-danger"><strong>{{ $message }}</strong></p>
                        @enderror
                    </div>

                </div>

                <div class="row">

                    <div class="col">
                        <button type="submit" class="btn btn-primary mt-2">Update</button>
                    </div>

                </div>

            </form>

        </div>



    </div>
    <!-- End Page Content -->
@endsection
