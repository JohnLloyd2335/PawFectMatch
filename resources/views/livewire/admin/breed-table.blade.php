<div>
    @livewireStyles
    <div class="row d-flex justify-content-between align-items-center">
 
        <div class="col">
          <a href="{{ route('admin.breed.create') }}" class="btn btn-primary">Add Breed</a>
        </div>
        <div class="col d-flex align-items-center justify-content-between gap-2">
           
            <select class="form-control" style="width: 48%" wire:model.live="species_id">
                <option value="">All Species</option>
                @foreach ($species as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
          <input type="text" wire:model.live="search" class="form-control" style="width: 48%" placeholder="Search by Breed Name" >
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
                    <th>Date Added</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($breeds as $breed)
                      <tr wire:key="{{ $breed->id }}">
                          <td>{{ $breed->id }}</td>
                          <td>{{ $breed->name }}</td>
                          <td>{{ $breed->species->name }}</td>
                          <td>{{ $breed->created_at->format('M d Y') }}</td>
                          <td class="text-center">
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.breed.edit',$breed) }}"><i class="fas fa-edit"></i></a>
                          </td>
                      </tr>
                  @empty
                      <tr>
                          <td colspan="4" class="text-center">No Records Found</td>
                      </tr>
                  @endforelse
                  
                </tbody>
              </table>
        </div>
      </div>

      <div class="row d-flex aalign-items-center justify-content-end">
        {{ $breeds->links(); }}
      </div>
      @livewireScripts
</div>
