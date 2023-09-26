@extends('admin.layouts.header-sidebar')
@section('content')
    


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-900">View Pet</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('admin.pet.index') }}">Pet</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.pet.show', $pet) }}">View Pet</a></li>
            </ol>
        </nav>
    </div>

    <div class="card shadow-lg px-4 py-3">
     
      <div class="row my-2 d-flex">
        <div class="col-lg-3 col-md-5 d-flex align-items-center justify-content-center">
          <img src="{{ asset('storage/'.$pet->image) }}" alt="Pet Image" height="300" class="border-base" style="
            border: 8px solid rgb(255, 127, 80);">
        </div>
        <div class="col-lg-2 col-md-7 d-flex flex-column justify-content-center" style="line-height: 0.6">
         <h3 class="text-gray-900"><strong>{{ $pet->name }}</strong></h3>
         <p class="text-gray-900"><strong>Species: </strong>{{ $pet->specie->name }}</p>
         <p class="text-gray-900"><strong>Breed: </strong>{{ $pet->breed->name }}</p>
         <p class="text-gray-900"><strong>Date of Birth: </strong>{{ date('M-d-Y',strtotime($pet->dob)) }}</p>
         <p class="text-gray-900"><strong>Gender: </strong>{{ $pet->gender }}</p>
         <p class="text-gray-900"><strong>Age: </strong>{{ $pet->age(); }} years</p>
         <p class="text-gray-900"><strong>Height: </strong>{{ $pet->height }}cm</p>
         <p class="text-gray-900"><strong>Weight: </strong>{{ $pet->weight }}kg</p>
        </div>

        <div class="col-lg-7 col-md-12 d-flex flex-column justify-content-center align-items-center">
          <h3>Medical History</h3>
          @livewire('admin.pet-medicalhistory-table', ['pet' => $pet], key($pet->id))
        </div>
      </div>
     
   

    </div>

   

    

</div>
<!-- End Page Content -->



@endsection
