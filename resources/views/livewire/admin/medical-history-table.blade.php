<div>
    @livewireStyles
    <div class="row d-flex justify-content-between align-items-center">
 
        <div class="col">
          <a href="{{ route('admin.pet.medical_history.create') }}" class="btn btn-primary">Add Medical Record</a>
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
                    <th>Diagnosis</th>
                    <th>Treatment</th>
                    <th>Checkup Date</th>
                   
                  </tr>
                </thead>
                <tbody>
                  @forelse ($medical_histories as $history)
                      <tr wire:key="{{ $history->id }}">
                          <td>{{ $history->id }}</td>
                          <td>{{ $history->pet->name }}</td>
                          <td>{{ $history->pet->specie->name }}</td>
                          <td>{{ $history->pet->breed->name }}</td> 
                          <td>{{ $history->diagnosis }}</td>
                          <td>{{ $history->treatment }}</td>
                          <td>{{ date('M d, Y', strtotime($history->checkup_date)) }}</td>
                      </tr>
                  @empty
                      <tr>
                          <td colspan="7" class="text-center">No Records Found</td>
                      </tr>
                  @endforelse
                  
                </tbody>
              </table>
        </div>
      </div>

      <div class="row d-flex align-items-center justify-content-end">
       {{ $medical_histories->links(); }}
      </div>
      @livewireScripts
</div>
