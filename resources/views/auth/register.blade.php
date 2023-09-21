@extends('layouts.app')

@section('content')
<div class="container">

  <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
              <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
              <div class="col-lg-7">
                  <div class="p-5">
                      <div class="text-center">
                        <img src="{{ asset('images/icon.png') }}" height="100">
                        <h1 class="h4 text-gray-900 mb-4">Register</h1>
                      </div>
                      <form class="user" action="{{ route('register') }}" method="POST">
                        @csrf
                          <div class="form-group row">
                             <div class="col-sm-6">
                              <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="exampleFirstName" placeholder="Name" name="name"
                              value="{{ old('name') }}">
                              @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                             </div>
                             <div class="col-sm-6">
                              <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Email Address" name="email" value="{{ old('email') }}">
                              @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                             </div>
                          </div>
                          <div class="form-group row">
                              <div class="col-sm-6">
                                <input type="number" class="form-control form-control-user @error('mobile_number') is-invalid @enderror" id="exampleInputMobileNumber" placeholder="Mobile Number" name="mobile_number" value="{{ old('mobile_number') }}">
                                @error('mobile_number')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                              </div>
                              <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user @error('address') is-invalid @enderror" id="exampleInputEmail" placeholder="Address" name="address" value="{{ old('address') }}">
                                @error('address')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                              </div>
                          </div>

                        <div class="form-group">
                          <textarea name="bio" class="form-control @error('bio') is-invalid @enderror" cols="6" rows="6" placeholder="Enter Bio">{{ old('bio') }}</textarea>
                          @error('bio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>
                         
                          <div class="form-group row">
                              <div class="col-sm-6 mb-3 mb-sm-0">
                                  <input type="password" name="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                      id="exampleInputPassword" placeholder="Password" autocomplete="off">
                                      @error('password')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                              <div class="col-sm-6">
                                  <input type="password" name="password_confirmation" class="form-control form-control-user @error('password_confirmation') is-invalid @enderror"
                                      id="exampleRepeatPassword" placeholder="Repeat Password">
                              </div>
                          </div>
                          <button type="submit" href="login.html" class="btn btn-base btn-user btn-block">
                              Register
                          </button>
                          {{-- <hr>
                          <a href="index.html" class="btn btn-google btn-user btn-block">
                              <i class="fab fa-google fa-fw"></i> Register with Google
                          </a>
                          <a href="index.html" class="btn btn-facebook btn-user btn-block">
                              <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                          </a> --}}
                      </form>
                      <hr>
                      <div class="text-center">
                          <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

</div>
@endsection