@extends('admin.layouts.header-sidebar')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-900">Add Pet</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.pet.index') }}">Pet</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.pet.create') }}">Add Pet</a></li>
                </ol>
            </nav>
        </div>

        <div class="card shadow-lg p-4">

            <form action="{{ route('admin.pet.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <label>Species</label>
                        <select name="species" class="form-control @error('species') is-invalid @enderror" id="species"> 
                            <option selected disabled>SELECT SPECIES</option>
                            @foreach ($species as $key => $value)
                                <option  value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        @error('species')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <label>Breed</label>
                        <select name="breed" class="form-control @error('breed') is-invalid @enderror" id="breed">
                            <option selected disabled>SELECT BREED</option>
                            @foreach ($breeds as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        @error('breed')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row my-1">
                    <div class="col-md-4 col-lg-4 col-sm-12">
                        <label>Pet Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-12">
                        <label>Date of Birth</label>
                        <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror" value="{{ old('dob') }}">
                        @error('dob')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-12">
                        <label>Gender</label>
                        <select name="gender" class="form-control @error('gender') is-invalid @enderror" id="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        @error('gender')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row my-1">
                    <div class="col-md-4 col-lg-4 col-sm-12">
                        <label>Height</label>
                        <input type="number" name="height" class="form-control @error('height') is-invalid @enderror" value="{{ old('height') }}">
                        @error('height')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-12">
                        <label>Weight</label>
                        <input type="number" name="weight" class="form-control @error('weight') is-invalid @enderror" value="{{ old('weight') }}">
                        @error('weight')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-12">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="jpg,png,jpeg">
                        @error('image')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <button class="btn btn-primary my-2 float-end">Add</button>
                   
            </form>

        </div>



    </div>
    <!-- End Page Content -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
            $(document).ready(function(){
                $('#species').on('change',function(){
                    const species_id = $(this).val();
                    $('#breed').empty();
                    $.ajax({
                        url : "{{ route('admin.pet.create')  }}",
                        method : "GET",
                        data : {
                            species_id : species_id
                        },
                        success: function(response) {
                            if (typeof response === 'object' && response !== null) {
                                Object.entries(response).forEach(([key, value]) => {
                                $('#breed').append(`<option value='${key}'>${value}</option>`);
                                });
                            }
                        },
                        error : function(error){
                            console.log(error);
                        }

                    });
                });
            });
    </script>

@endsection
