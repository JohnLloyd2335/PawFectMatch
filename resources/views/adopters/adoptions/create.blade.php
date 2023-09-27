@extends('layouts.app')

@section('content')

    <div class="row m-2 p-2">
        <div class="card shadow-lg px-4 py-3">
            <div class="row">
                <div class="col-md-12 d-flex align-items-center justify-content-end">
                    <a href="{{ route('adopters.pet.show', $pet) }}" class="btn btn-base"><i
                            class="fas fa-arrow-left fa-2x"></i></a>
                </div>
            </div>

            <div class="row my-2 d-flex">
                <div class="col-3 d-flex flex-column align-items-center justify-content-center">
                    <img src="{{ asset('storage/' . $pet->image) }}" alt="Pet Image" height="500" class="border-base"
                        style="border: 8px solid rgb(255, 127, 80);">
                </div>
                <div class="col-9 d-flex align-items-start justify-content-start">
                    <div class="row d-flex align-items-start justify-content-start">
                        <div class="col-md-3 d-flex flex-column align-items-start justify-content-start">
                            <h3 class="text-gray-900"><strong>{{ $pet->name }}</strong></h3>
                            <h5 class="text-gray-900"><strong>Species: </strong>{{ $pet->specie->name }}</h5>
                            <h5 class="text-gray-900"><strong>Breed: </strong>{{ $pet->breed->name }}</h5>
                            <h5 class="text-gray-900"><strong>Date of Birth:
                                </strong>{{ date('M-d-Y', strtotime($pet->dob)) }}
                            </h5>
                            <h5 class="text-gray-900"><strong>Gender: </strong>{{ $pet->gender }}</h5>
                            <h5 class="text-gray-900"><strong>Age: </strong>{{ $pet->age() }} year/s old</h5>
                            <h5 class="text-gray-900"><strong>Height: </strong>{{ $pet->height }}cm</h5>
                            <h5 class="text-gray-900"><strong>Weight: </strong>{{ $pet->weight }}kg</h5>
                        </div>
                        <div class="col-md-9 d-flex flex-column align-items-start">
                            <h3 class="mt-1">Medical History</h3>
                            @livewire('admin.pet-medicalhistory-table', ['pet' => $pet], key($pet->id))
                        </div>

                        <div class="row my-2 p-2">
                            <div class="col-md-12">
                               <form action="{{ route('adopters.adoptions.store',$pet) }}" method="post">
                                @csrf
                                <label><strong>Reason for Adoption</strong></label>
                                <textarea name="reason_for_adoption" class="form-control @error('reason_for_adoption') is-invalid @enderror" cols="5" rows="5" style="resize: none">{{ old('reason_for_adoption') }}</textarea>
                                @error('reason_for_adoption')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <button type="submit" class="float-end my-2 btn btn-outline-base">Submit</button>
                               </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>

    {{-- Modal  --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal  --}}
@endsection
