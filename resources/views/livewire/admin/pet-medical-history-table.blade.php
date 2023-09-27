<div>
    @livewireStyles
    <div class="row mt-2">
        <div class="col">
            <table class="table table-bordered" style="width: 1000px;">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Diagnosis</th>
                    <th>Treatment</th>
                    <th>Checkup Date</th>
                   
                  </tr>
                </thead>
                <tbody>
                  @forelse ($medical_histories as $history)
                      <tr wire:key="{{ $history->id }}">
                          <td>{{ $history->id }}</td>
                          <td>{{ $history->diagnosis }}</td>
                          <td>{{ $history->treatment}}</td>
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

      <div class="row d-flex aalign-items-center justify-content-end">
       {{ $medical_histories->links(); }}
      </div>
      @livewireScripts
</div>
