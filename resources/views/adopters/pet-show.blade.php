@extends('layouts.app')

@section('content')
    <div class="row m-2 p-2">
        <div class="card shadow-lg px-4 py-3">
            <div class="row d-flex flex-column">
                <div class="col-md-12 d-flex align-items-center justify-content-end">
                    <a href="{{ url()->previous() }}" class="btn btn-base"><i class="fas fa-arrow-left fa-2x"></i></a>
                </div>
            </div>



            <div class="row my-2 d-flex">
              <div class="col-12 my-2 px-5">          
                @if (session('success'))
                  <div class="alert alert-success">
                      <strong>{{ session('success') }}</strong>
                  </div>
                @endif
              </div>
                <div class="col-4 d-flex flex-column align-items-center justify-content-center">
                    <img src="{{ asset('storage/' . $pet->image) }}" alt="Pet Image" height="500" class="border-base"
                        style="border: 8px solid rgb(255, 127, 80);">
                    @if (in_array($pet->id,$unavailable_pet_ids))
                        <h3 class="text-color-base my-2">Your adoption is Pending or Approved</h3>
                    @else
                      <a href="{{ route('adopters.adoptions.create', $pet) }}" class="btn btn-outline-base mt-2">
                        <h3>Request Adoption</h3>
                      </a>
                    @endif
                    
                </div>
                <div class="col-8 d-flex flex-column align-items-start justify-content-start">
                    <h3 class="text-gray-900"><strong>{{ $pet->name }}</strong></h3>
                    <h5 class="text-gray-900"><strong>Species: </strong>{{ $pet->specie->name }}</h5>
                    <h5 class="text-gray-900"><strong>Breed: </strong>{{ $pet->breed->name }}</h5>
                    <h5 class="text-gray-900"><strong>Date of Birth: </strong>{{ date('M-d-Y', strtotime($pet->dob)) }}</h5>
                    <h5 class="text-gray-900"><strong>Gender: </strong>{{ $pet->gender }}</h5>
                    <h5 class="text-gray-900"><strong>Age: </strong>{{ $pet->age() }} years</h5>
                    <h5 class="text-gray-900"><strong>Height: </strong>{{ $pet->height }}cm</h5>
                    <h5 class="text-gray-900"><strong>Weight: </strong>{{ $pet->weight }}kg</h5>
                    <h3 class="mt-1">Medical History</h3>
                    @livewire('admin.pet-medicalhistory-table', ['pet' => $pet], key($pet->id))
                    <div class="my-2">
                        <p class="float-end">{{ $pet->adoptions->count() }} people requested application</p>
                    </div>
                </div>



            </div>

            <div class="row my-4">
                <div class="col-lg-12 col-md-12 d-flex justify-content-start flex-column align-items-center">

                </div>
            </div>

            <div class="col-4 d-flex flex-column justify-content-start align-items-start" style="line-height: 0.6">

            </div>



        </div>
    </div>
@endsection
