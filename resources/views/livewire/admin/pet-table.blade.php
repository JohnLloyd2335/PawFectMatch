<div>
    @livewireStyles
    <div class="row d-flex justify-content-between align-items-center">
 
        <div class="col">
          <a href="{{ route('admin.pet.create') }}" class="btn btn-primary">Add Pet</a>
        </div>
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
                    <th>Date Added</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($pets as $pet)
                      <tr wire:key="{{ $pet->id }}">
                          <td>{{ $pet->id }}</td>
                          <td>{{ $pet->name }}</td>
                          <td>{{ $pet->specie->name }}</td>
                          <td>{{ $pet->breed->name }}</td>
                          <td>{{ $pet->created_at->format('M d Y') }}</td>
                          <td class="text-center">
                            <form action="{{ route('admin.pet.destroy',$pet) }}" method="post">
                              @csrf
                              @method('DELETE')
                              <a class="btn btn-success btn-sm" href="{{ route('admin.pet.show',$pet) }}"><i class="fas fa-eye"></i></a>
                              <a class="btn btn-primary btn-sm" href="{{ route('admin.pet.edit',$pet) }}"><i class="fas fa-edit"></i></a>
                              <button type="submit" class="btn btn-danger btn-sm"><i class=" fas fa-trash-alt"></i></button>
                            </form>
                           
                          </td>
                      </tr>
                  @empty
                      <tr>
                          <td colspan="5" class="text-center">No Records Found</td>
                      </tr>
                  @endforelse
                  
                </tbody>
              </table>
        </div>
      </div>

      <div class="row d-flex aalign-items-center justify-content-end">
       {{ $pets->links(); }}
      </div>
      @livewireScripts
</div>
