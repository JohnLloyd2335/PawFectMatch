<div>
    @livewireStyles
    <div class="row d-flex justify-content-between align-items-center">
 
        <div class="col">
          <a href="{{ route('admin.species.create') }}" class="btn btn-primary">Add Species</a>
        </div>
        <div class="col d-flex align-items-center justify-content-end">
          <input type="text" wire:model.live="search" class="form-control" style="width: 50%" placeholder="Search..." >
        </div>
      </div>

      <div class="row mt-2">
        <div class="col">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Date Added</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($species as $specie)
                      <tr wire:key="{{ $specie->id }}">
                          <td>{{ $specie->id }}</td>
                          <td>{{ $specie->name }}</td>
                          <td>{{ $specie->created_at->format('M d Y') }}</td>
                          <td class="text-center">
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.species.edit',$specie) }}"><i class="fas fa-edit"></i></a>
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
        {{ $species->links(); }}
      </div>
      @livewireScripts
</div>
