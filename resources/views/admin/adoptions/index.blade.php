@extends('admin.layouts.header-sidebar')
@section('content')
  
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-900">Adoptions</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('admin.adoptions.index') }}">Adoptions</a></li>
            </ol>
        </nav>
    </div>

    <div class="card shadow-lg px-4 py-1">
      <div class="my-2">
        @if(session('success'))
          <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{ session('success') }}</strong>
          </div>
        @endif
      </div>

      <div class="my-2">
        @if($errors->any())
          <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
      </div>

    @livewire('admin.adoption-table')

    </div>

</div>
<!-- End Page Content -->

@endsection