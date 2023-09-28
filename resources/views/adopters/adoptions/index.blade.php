@extends('layouts.app')

@section('content')
    <div class="row m-2 p-2">
        <div class="card shadow-lg px-4 py-3">
            <div class="my-2">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible">
                    
                    <strong>{{ session('success') }}</strong>
                    </div>
                @endif
            </div>
            @livewire('adopters.adoption-request-table')
        </div>
    </div>
@endsection
