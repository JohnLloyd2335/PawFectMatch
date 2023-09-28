@extends('admin.layouts.header-sidebar')
@section('content')
    


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-900">Dashboard</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
              {{-- <li class="breadcrumb-item"><a href="#">Library</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data</li> --}}
            </ol>
        </nav>
    </div>

    <div class="row d-flex align-items-center jsutify-content-arround">
        <div class="col-md-3 mt-1">
            <div class="card bg-primary text-light">
                <div class="card-body">
                    <div class="row d-flex align-items-center justify-content-between">
                        <div class="col-3">
                            <span class="fas fa-paw" style="font-size: 60px"></span>
                        </div>
                        <div class="col-9 d-flex flex-column align-items-end">
                            <h3 class="card-number">{{ $species_count }}</h3>
                            <h5 class="card-title">Species</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mt-1">
            <div class="card bg-success text-light">
                <div class="card-body">
                    <div class="row d-flex align-items-center justify-content-between">
                        <div class="col-3">
                            <span class="fas fa-paw" style="font-size: 60px"></span>
                        </div>
                        <div class="col-9 d-flex flex-column align-items-end">
                            <h3 class="card-number">{{ $breed_count }}</h3>
                            <h5 class="card-title">Breed</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mt-1">
            <div class="card bg-secondary text-light">
                <div class="card-body">
                    <div class="row d-flex align-items-center justify-content-between">
                        <div class="col-3">
                            <span class="fas fa-dog" style="font-size: 60px"></span>
                        </div>
                        <div class="col-9 d-flex flex-column align-items-end">
                            <h3 class="card-number">{{ $pet_count }}</h3>
                            <h5 class="card-title">Pet</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mt-1">
            <div class="card bg-warning text-light">
                <div class="card-body">
                    <div class="row d-flex align-items-center justify-content-between">
                        <div class="col-3">
                            <span class="fas fa-house-user" style="font-size: 60px"></span>
                        </div>
                        <div class="col-9 d-flex flex-column align-items-end">
                            <h3 class="card-number">{{ $adopted_pet_count }}</h3>
                            <h5 class="card-title">Total Adopted Pet</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mt-1">
            <div class="card bg-danger text-light">
                <div class="card-body">
                    <div class="row d-flex align-items-center justify-content-between">
                        <div class="col-3">
                            <span class="fas fa-clipboard-list" style="font-size: 60px"></span>
                        </div>
                        <div class="col-9 d-flex flex-column align-items-end">
                            <h3 class="card-number">{{ $available_pet_count }}</h3>
                            <h5 class="card-title">Available Pet</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <div class="row my-2 px-2 mt-5">
        <h3 class="text-color-base">New Pets</h3>
        <table class="table table-bordered">
           <thead>
                <tr>
                    <th>Name</th>
                    <th>Species</th>
                    <th>Breed</th>
                    <th>Date Added</th>
                </tr>
           </thead>
           <tbody>
                @forelse ($new_pets as $pet)
                <tr>
                    <td>{{ $pet->name }}</td>
                    <td>{{ $pet->specie->name }}</td>
                    <td>{{ $pet->breed->name }}</td>
                    <td>{{ date('M d, Y',strtotime($pet->created_at)) }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4"></td>
                </tr>
                @endforelse
            
           </tbody>
        </table>
    </div>

    <div class="row my-2 px-2 mt-2">
        <h3 class="text-color-base">Latest Requested Adoption</h3>
        <table class="table table-bordered">
           <thead>
                <tr>
                    <th>Name</th>
                    <th>Species</th>
                    <th>Breed</th>
                    <th>Status</th>
                    <th>Application Date</th>
                </tr>
           </thead>
           <tbody>
            <tr>
                @forelse ($latest_requested_adoptions as $adoption)
                    <tr>
                        <td>{{ $adoption->pet->name }}</td>
                        <td>{{ $adoption->pet->specie->name }}</td>
                        <td>{{ $adoption->pet->breed->name }}</td>
                        <td>{{ $adoption->status }}</td>
                        <td>{{ date('M d, Y',strtotime($adoption->application_date)) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No Records Found</td>
                    </tr>
                @endforelse
               
            </tr>
           </tbody>
        </table>
    </div>

    

</div>
<!-- End Page Content -->

@endsection
