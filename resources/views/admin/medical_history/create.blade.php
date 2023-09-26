@extends('admin.layouts.header-sidebar')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-900">Add Medical Record</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.pet.medical_history.index') }}">Medical History</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.pet.medical_history.create') }}">Add Medical
                            Record</a></li>
                </ol>
            </nav>
        </div>

        <div class="card shadow-lg px-4 py-1">
            <div class="my-2">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{{ session('success') }}</strong>
                    </div>
                @endif
            </div>

            <form action="{{ route('admin.pet.medical_history.store')}}" method="post">
              @csrf
                <div class="row mt-2">
                  <div class="col-lg-3 col-md-6 col-sm-12">
                      <label>Species</label>
                      <select name="species" class="form-control @error('species') is-invalid @enderror" id="species">
                        <option selected disabled>Select Species</option>
                          @foreach ($species as $key => $value)
                              <option value="{{ $key }}">{{ $value }}</option>
                          @endforeach
                      </select>
                      @error('species')
                          <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>

                  <div class="col-lg-3 col-md-6 col-sm-12">
                    <label>Breed</label>
                    <select name="breed" class="form-control @error('breed') is-invalid @enderror" id="breed">
                        
                    </select>
                    @error('breed')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>

                  <div class="col-lg-3 col-md-6 col-sm-12">
                    <label>Pet</label>
                    <select name="pet" class="form-control @error('pet') is-invalid @enderror" id="pet">

                    </select>
                    @error('pet')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>

                  <div class="col-lg-3 col-md-6 col-sm-12">
                    <label>Checkup Date</label>
                    <input type="date" name="checkup_date" class="form-control @error('checkup_date') is-invalid @enderror" value="{{ old('checkup_date') }}">
                    @error('checkup_date')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
              </div>

              <div class="row my-2">
                <div class="col-lg-6 col-md-12 col-sm">
                  <label>Diagnosis</label>
                  <textarea name="diagnosis" class="form-control @error('diagnosis') is-invalid @enderror" cols="5" rows="5" style="resize: none">{{ old('diagnosis') }}</textarea>
                  @error('diagnosis')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="col-lg-6 col-md-12 col-sm">
                  <label>Treatment</label>
                  <textarea name="treatment" class="form-control @error('treatment') is-invalid @enderror" cols="5" rows="5" style="resize: none">{{ old('treatment') }}</textarea>
                  @error('treatment')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              
                  <div class="row my-2">
                    <div class="col-lg-12- col-md-12 col-sm-12">
                      <button type="submit" class="btn btn-primary ">Add</button>
                    </div>
                  </div>
  
              </div>
            </form>
            

        </div>

    </div>
    <!-- End Page Content -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $('#species').on('change', function() {
                $('#breed').empty();
                $('#pet').empty();
                const species_id = $(this).val();

                $.ajax({
                    url: "{{ route('admin.pet.medical_history.create') }}",
                    method: "GET",
                    data: {
                        species_id: species_id
                    },
                    success: function(response) {
                       $('#breed').append("<option selected disabled>Select Breed</option>")
                       $.each(response, function(key,value){
                        $('#breed').append(`<option value='${key}'>${value}</option>`)
                       })
                        
                    },
                    error: function(error) {
                        console.log(error)
                    }
                });
            });
        });
    </script>

<script>
  $(document).ready(function() {
      $('#breed').on('change', function() {
          $('#pet').empty();
          const species_id = $('#species').val();
          const breed_id = $('#breed').val();
          $.ajax({
              url: "{{ route('admin.pet.medical_history.create') }}",
              method: "GET",
              data: {
                  species_id: species_id,
                  breed_id: breed_id
              },
              success: function(response) {
                 $('#pet').append("<option selected disabled>Select Pet</option>")
                 $.each(response, function(key,value){
                  $('#pet').append(`<option value='${key}'>${value}</option>`)
                 })
                  
              },
              error: function(error) {
                  console.log(error)
              }
          });
      });
  });
</script>
@endsection
