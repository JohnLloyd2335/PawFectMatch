@extends('admin.layouts.header-sidebar')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-900">Edit Pet</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.pet.index') }}">Pet</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.pet.edit',$pet) }}">Edit Pet</a></li>
                </ol>
            </nav>
        </div>

        <div class="card shadow-lg p-4">

            <form action="{{ route('admin.pet.update',$pet) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row my-1">
                    <div class="col-md-8 col-lg-8 col-sm-12">
                        <label>Pet Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $pet->name }}">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-12">
                        <label>Date of Birth</label>
                        <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror" value="{{ $pet->dob }}">
                        @error('dob')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    
                </div>

                <div class="row my-1">
                    <div class="col-md-4 col-lg-4 col-sm-12">
                        <label>Height</label>
                        <input type="number" name="height" class="form-control @error('height') is-invalid @enderror" value="{{ $pet->height }}">
                        @error('height')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-12">
                        <label>Weight</label>
                        <input type="number" name="weight" class="form-control @error('weight') is-invalid @enderror" value="{{ $pet->weight }}">
                        @error('weight')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-12">
                      <label>Gender</label>
                      <select name="gender" class="form-control @error('gender') is-invalid @enderror" id="gender">
                          <option @selected($pet->gender == "Male") value="Male">Male</option>
                          <option @selected($pet->gender == "Female") value="Female">Female</option>
                      </select>
                      @error('gender')
                          <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>
                    
                </div>

                <button class="btn btn-primary my-2 float-end">Update</button>
                   
            </form>

        </div>



    </div>
    <!-- End Page Content -->
@endsection
