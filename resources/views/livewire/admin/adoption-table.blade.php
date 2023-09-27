<div>
    @livewireStyles
    <div class="row d-flex justify-content-between align-items-center">


        <div class="col d-flex align-items-center justify-content-end gap-2">

            <select class="form-control" style="width: 25%" wire:model.live="species_id">
                <option value="">All Species</option>
                @foreach ($species as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
            <select class="form-control" style="width: 25%" wire:model.live="breed_id">
                <option value="">All Breed</option>
                @foreach ($breeds as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
            <input type="text" wire:model.live="search" class="form-control" style="width: 25%"
                placeholder="Search by Pet Name">
        </div>
    </div>

    <div class="row mt-2">
        <div class="col">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Adopter</th>
                        <th>Pet Name</th>
                        <th>Species</th>
                        <th>Breed</th>
                        <th>Reason</th>
                        <th>Status</th>
                        <th>Application Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pets as $pet)
                        <tr wire:key="{{ $pet->id }}">
                            <td>{{ $pet->id }}</td>
                            <td>{{ $pet->adoptions[0]->adopter->user->name }}</td>
                            <td>{{ $pet->name }}</td>
                            <td>{{ $pet->specie->name }}</td>
                            <td>{{ $pet->breed->name }}</td>
                            <td>{{ $pet->adoptions[0]->reason }}</td>
                            <td>{{ $pet->adoptions[0]->status }}</td>
                            <td>{{ date('M d, Y', strtotime($pet->adoptions[0]->application_date)) }}</td>
                            <td class="text-center">
                                @if (in_array($pet->adoptions[0]->status,['Approved','Rejected','Withdrawn']))
                                    <button class="btn btn-primary btn-sm" disabled><i class="fas fa-edit"></i></button>
                                @else
                                    <a class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#adoptionModal{{ $pet->id }}"
                                    href="{{ route('admin.pet.edit', $pet) }}"><i class="fas fa-edit"></i></a>
                                @endif
                            </td>
                        </tr>


                        <!-- Edit Adoption Status -->
                        <div class="modal fade" id="adoptionModal{{ $pet->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Adoption Status</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.adoptions.update',$pet->adoptions[0]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <label>Adoption Status</label>
                                            <select name="status" id="" class="form-control @error('error') is-invalid @enderror">
                                                <option value="Approved">Approve</option>
                                                <option value="Rejected">Reject</option>
                                            </select>
                                            @error('status')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Edit Adoption Status -->

                    @empty
                        <tr>
                            <td colspan="9" class="text-center">No Records Found</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>

    <div class="row d-flex aalign-items-center justify-content-end">
        {{ $pets->links() }}
    </div>




    @livewireScripts
</div>
