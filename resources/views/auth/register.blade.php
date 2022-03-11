@extends('layouts.app', [
    'namePage' => 'Register page',
    'activePage' => 'register',
    'backgroundImage' => asset('assets') . "/img/bg2.png",
])

@section('content')
  <div class="content">
    <div class="container">
      <div class="row d-flex justify-content-center">      
        <div class="col-md-8">
          <div class="card card-signup text-center">
            <div class="card-header ">
              <h4 class="card-title">{{ __('Register') }}</h4>
            </div>
            <div class="card-body ">
              <form method="POST" class="form-horizontal" action="{{ route('register.perform') }}" autocomplete="off">
                @csrf
                <!--Begin input name -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="now-ui-icons users_circle-08"></i>
                            </div>
                          </div>
                          <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" type="text" name="name" value="{{ old('name') }}" required autofocus>
                          @if ($errors->has('name'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                              <strong>{{ $errors->first('name') }}</strong>
                            </span>
                          @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group {{ $errors->has('agency') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                            <i class="now-ui-icons business_bank"></i>
                            </div>
                        </div>
                        <input list="agency" class="form-control {{ $errors->has('agency') ? ' is-invalid' : '' }}" placeholder="{{ __('Agency') }}" type="text" name="agency" value="{{ old('agency') }}" required>
                          <datalist id="agency">
                            <option>DICT</option>
                            <option>DILG</option>
                            <option>DTI</option>
                            <option>ARTA</option>
                          </datalist>
                        @if ($errors->has('agency'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('agency') }}</strong>
                            </span>
                        @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                      <div class="input-group {{ $errors->has('division') ? ' has-danger' : '' }}">
                          <div class="input-group-prepend">
                              <div class="input-group-text">
                              <i class="now-ui-icons business_badge"></i>
                              </div>
                          </div>
                          <input list="division" class="form-control {{ $errors->has('division') ? ' is-invalid' : '' }}" placeholder="{{ __('Division') }}" type="text" name="division" value="{{ old('division') }}" required>
                          <datalist id="division">
                            <option>TOD</option>
                            <option>FINANCE</option>
                            <option>ADMIN</option>
                          </datalist>
                          @if ($errors->has('division'))
                              <span class="invalid-feedback" style="display: block;" role="alert">
                              <strong>{{ $errors->first('division') }}</strong>
                              </span>
                          @endif
                          </div>
                    </div>
                    
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="input-group {{ $errors->has('designation') ? ' has-danger' : '' }}">
                      <div class="input-group-prepend">
                          <div class="input-group-text">
                          <i class="now-ui-icons emoticons_satisfied"></i>
                          </div>
                      </div>
                      <input class="form-control {{ $errors->has('designation') ? ' is-invalid' : '' }}" placeholder="{{ __('Designation') }}" type="text" name="designation" value="{{ old('designation') }}" required>
                      @if ($errors->has('designation'))
                          <span class="invalid-feedback" style="display: block;" role="alert">
                          <strong>{{ $errors->first('designation') }}</strong>
                          </span>
                      @endif
                      </div>
                  </div>
                  <div class="col-md-4">
                    <div class="input-group {{ $errors->has('contactNumber') ? ' has-danger' : '' }}">
                      <div class="input-group-prepend">
                          <div class="input-group-text">
                          <i class="now-ui-icons tech_headphones"></i>
                          </div>
                      </div>
                      <input class="form-control {{ $errors->has('contactNumber') ? ' is-invalid' : '' }}" placeholder="{{ __('Contact Number') }}" type="text" name="contactNumber" value="{{ old('contactNumber') }}" required>
                      @if ($errors->has('contactNumber'))
                          <span class="invalid-feedback" style="display: block;" role="alert">
                          <strong>{{ $errors->first('contactNumber') }}</strong>
                          </span>
                      @endif
                      </div>
                  </div>
                  <div class="col-md-4">
                    <div class="input-group {{ $errors->has('sex') ? ' has-danger' : '' }}">
                      <div class="input-group-prepend form-horizontal">
                          <select name="sex" class="form-control" required>
                            <optgroup label = "-- Select Gender --">
                              <option value="0">Male</option>
                              <option value="1">Female</option>
                            </optgroup>
                          </select>
                      </div>
                      @if ($errors->has('uplinePosition'))
                          <span class="invalid-feedback" style="display: block;" role="alert">
                          <strong>{{ $errors->first('uplinePosition') }}</strong>
                          </span>
                      @endif
                      </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                      <div class="input-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="now-ui-icons ui-1_email-85"></i>
                          </div>
                        </div>
                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" required>
                      </div>
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                          <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif

                    </div>
                    <div class="col-md-4">
                      <div class="input-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="now-ui-icons objects_key-25"></i>
                          </div>
                        </div>
                        <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" type="password" name="password" required>
                        @if ($errors->has('password'))
                          <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                          </span>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="now-ui-icons objects_key-25"></i></i>
                          </div>
                        </div>
                        <input class="form-control" placeholder="{{ __('Confirm Password') }}" type="password" name="password_confirmation" required>
                      </div>
                    </div>
                </div>

                <div class="card-footer ">
                  <button type="submit" class="btn btn-info rounded-0 btn-lg"><i class="fas fa-door-open"></i>{{__('Register Now')}}</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      demo.checkFullPageBackgroundImage();
    });
  </script>
@endpush
