@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Add Activity',
    'activePage' => 'activitys',
    'activeNav' => '',
    'backgroundImage' => asset('now') . "/img/logo.png",
])

@section('content')

<div class="container">
    <div class="row">
      <div class="card text-center">
        <div class="card-header bg-info">
          <h6 class="text-white">You are here because you've given a link for attendance</h6>
        </div>
        <div class="card-body">
          <h3>Are you here as a?</h3>
          <a href="#" id="guest" class="btn btn-info rounded-0" data-toggle="tooltip" data-placement="top" title="Pag wala pa ka account tapos dili ka DICT-XI employee kani na link e click po..."><i class="fa fa-fw fa-user"></i>Guest!</a>
          <a href="#" id="registeredguest" class="btn btn-info rounded-0">Registered Guest!</a>
          <a href="#" id="employee" class="btn btn-info rounded-0">DICT-XI Employee!</a>
          
          <div id="guestform">
            
            <div class="col-md-12">
              <form method="POST" class="form-horizontal" action="{{ route('register.guest') }}" autocomplete="off">
                @csrf
                        <input type="hidden" name="activityID" value="{{ $id }}">
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
                                      <option value="" selected hidden>-- Select Gender --</option>
                                      <option value="0">Male</option>
                                      <option value="1">Female</option>
                                      <option value="2">Rather not say</option>
                                      <option value="3">Custom</option>
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
                              
                            </div>
        
                            <div class="card-footer ">
                          <button type="submit" class="btn btn-info rounded-0 btn-lg"><i class="fas fa-door-open"></i>{{__('Register Now')}}</button>
                        </div>
                      </form>
                    </div>
                </div>
                <div id="registeredguestform">
                  <div class="col-md-4 ml-auto mr-auto">

                    <form role="form" method="POST" action="{{ route('login.perform') }}">
                      @csrf
                      <div class="card card-login">
                        <div class="card-header ">
                          <div class="logo-container">
                            <a href="{{ route('home.index') }}"><img src="{{ asset('assets/img/favicon.png') }}" alt=""></a>
                          </div>
                        </div>
                        <div class="card-body ">
                          @include('layouts.partials.messages')
                          <div class="input-group no-border form-control-lg {{ $errors->has('email') ? ' has-danger' : '' }}">
                            <span class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="now-ui-icons users_circle-08"></i>
                              </div>
                            </span>
                            <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="username" required autofocus>
                        </div>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                          </span>
                          @endif
                          <div class="input-group form-control-lg {{ $errors->has('password') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="now-ui-icons objects_key-25"></i></i>
                              </div>
                            </div>
                            <input placeholder="Password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" type="password" required>
                          </div>
                          @if ($errors->has('password'))
                          <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                          </span>
                          @endif
                        </div>
                        <div class="card-footer ">
                            <button  type = "submit" class="btn btn-info btn-lg btn-block mb-3"><i class="ui-1_lock-circle-open"></i>{{ __('Login') }}</button>
                            <a href="{{ route('forget.password.get') }}">Reset Password</a>
                          </div>
                        </div>
                      </form>
                    </div>
                </div>
                
                <div id="dictemployeeform">
                  <div class="col-md-4 ml-auto mr-auto">

                    <form role="form" method="POST" action="{{ route('login.perform') }}">
                      @csrf
                    <div class="card card-login">
                      <div class="card-header ">
                        <div class="logo-container">
                          <a href="{{ route('home.index') }}"><img src="{{ asset('assets/img/favicon.png') }}" alt=""></a>
                        </div>
                      </div>
                        <div class="card-body ">
                          @include('layouts.partials.messages')
                          <div class="input-group no-border form-control-lg {{ $errors->has('email') ? ' has-danger' : '' }}">
                            <span class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="now-ui-icons users_circle-08"></i>
                              </div>
                            </span>
                            <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="username" required autofocus>
                          </div>
                          @if ($errors->has('email'))
                          <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                          </span>
                          @endif
                          <div class="input-group form-control-lg {{ $errors->has('password') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="now-ui-icons objects_key-25"></i></i>
                              </div>
                            </div>
                            <input placeholder="Password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" type="password" required>
                          </div>
                          @if ($errors->has('password'))
                          <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                          </span>
                          @endif
                        </div>
                        <div class="card-footer ">
                            <button  type = "submit" class="btn btn-info btn-lg btn-block mb-3"><i class="ui-1_lock-circle-open"></i>{{ __('Login') }}</button>
                            <a href="{{ route('forget.password.get') }}">Reset Password</a>
                        </div>
                    </div>
                    </form>
                  </div>
                </div>

                
            </div>
            <div class="card-footer">
            </div>
          </div>
          
          
        </div>
</div>

@endsection

