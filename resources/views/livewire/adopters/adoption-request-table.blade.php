<div>
    @livewireStyles
    <div class="row d-flex justify-content-between align-items-center">
 
       
        <div class="col d-flex align-items-center justify-content-between gap-2">
           
            <select class="form-control" style="width: 33%" wire:model.live="species_id">
                <option value="">All Species</option>
                @foreach ($species as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
            <select class="form-control" style="width: 33%" wire:model.live="breed_id">
                <option value="">All Breed</option>
                @foreach ($breeds as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
          <input type="text" wire:model.live="search" class="form-control" style="width: 33%" placeholder="Search by Pet Name" >
        </div>
      </div>

      <div class="row mt-2">
        <div class="col">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Species</th>
                    <th>Breed</th>
                    <th>Reason for Adoption</th>
                    <th>Status</th>
                    <th>Application Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($adoptions as $adoption)
                      <tr wire:key="{{ $adoption->id }}">
                          <td>{{ $adoption->id }}</td>
                          <td>{{ $adoption->pet->name }}</td>
                          <td>{{ $adoption->pet->specie->name }}</td>
                          <td>{{ $adoption->pet->breed->name }}</td>
                          <td>{{ $adoption->reason }}</td>
                          <td>{{ $adoption->status }}</td>
                          <td>{{ date('M d, Y',strtotime($adoption->application_date)) }}</td>
                          <td class="text-center">
                            <form action="{{ route('adopters.adoptions.update',$adoption) }}" method="post">
                              @csrf
                              @method('PUT')
                              <a class="btn btn-success" href="{{ route('adopters.pet.show',$adoption->pet) }}"><i class="fas fa-eye"></i></a>
                              <button @disabled(in_array($adoption->status,['Approved','Rejected','Withdrawn'])) type="submit" class="btn btn-danger" href="{{ route('adopters.pet.show',$adoption->pet) }}"><i class="fas fa-times"></i></button>
                            </form>
                           
                          </td>
                      </tr>
                  @empty
                      <tr>
                          <td colspan="8" class="text-center">No Records Found</td>
                      </tr>
                  @endforelse
                  
                </tbody>
              </table>
        </div>
      </div>

      <div class="row d-flex aalign-items-center justify-content-end">
       {{-- {{ $pets->links(); }} --}}
      </div>
      @livewireScripts
</div>
