<div>
    <div class="container-fluid mt-2">
        <link rel="stylesheet" href="{{ asset('css/drawer-menu.css') }}">
        <div class="row">
            <div class="col-md-11 col-lg-11 col-sm-11">
                <input type="text" wire:model.live="search" class="form-control" placeholder="Search Pet...">
            </div>
            <div class="col-md-1 col-lg-1 col-sm-1">
                <button class="btn btn-outline-base gap-1" onclick="openDrawerMenu()"><i class="fas fa-filter mr-1"></i><span
                        class="d-sm-none d-md-none d-lg-inline">Filter</span></button>
            </div>
        </div>

        <div class="row justify-content-center my-2">
            <div class="col-md-12">
                <div class="card shadow-lg">

                    <div class="row d-flex align-items-center justify-content-arround flex-wrap">
                        @forelse ($pets as $pet)
                            <a class="col-lg-3 col-md-4 col-sm-6 mt-1 text-decoration-none" href="{{ route('adopters.pet.show',$pet) }}">
                                <div class="card border-top-rounded">
                                    <img src="{{ asset('storage/'.$pet->image) }}" alt="" class="card-img-top" height="600">
                                    <div class="card-body bg-base">
                                        <h3 class="card-title">{{ $pet->name }}</h3>
                                        <p class="card-text">{{ $pet->breed->name }}</p>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <h3 class="text-color-base text-center my-5">No Records Found.</h3>
                        @endforelse
                    </div>

                    <div class="mt-4 px-2">
                        <div class="float-end">
                            {{ $pets->links(); }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



    {{-- Drawer Menu --}}
    <div id="drawerMenu" class="drawerMenu">
        <div class="row py-4 px-2 flex-column">
            <div class="col">
                <button class="btn float-end text-gray-900" onclick="closeDrawerMenu()"><i
                        class="fas fa-times fa-2x text-color-base"></i></button>
            </div>
            <div class="col px-4">
                <label>Filter by Species</label>
                <select class="form-control" wire:model="species_id">
                    <option value="0">All Species</option>
                    @foreach ($species as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col px-4 mt-2">
                <label>Filter by Breed</label>
                <select class="form-control" wire:model="breed_id">
                    <option value="0">All Breed</option>
                    @foreach ($breeds as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col px-4 mt-4 d-flex flex-column gap-2">
                <button wire:click="filterPets" class="btn btn-outline-base w-100">Apply</button>
                <button wire:click="cancelFilter" class="btn btn-outline-base w-100">Cancel</button>
            </div>

        </div>

    </div>
    {{-- Drawer Menu --}}



    <script src="{{ asset('js/drawer-menu.js') }}"></script>
    
</div>
