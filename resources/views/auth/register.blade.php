@extends('layouts.app', [
    'namePage' => 'Register page',
    'activePage' => 'register',
    'backgroundImage' => asset('assets') . "/img/bg.png",
])

@section('content')
  <div class="content">
    <div class="container">
      <div class="row">
       <div class="col-md-5 ml-auto">
          <div class="info-area info-horizontal mt-5">
            <div class="icon icon-primary">
              <i class="now-ui-icons media-2_sound-wave"></i>
            </div>
            <div class="description">
              <h5 class="info-title">{{ __('Marketing') }}</h5>
              <p class="description">
                {{ __("We've created the marketing campaign of the website. It was a very interesting collaboration.") }}
              </p>
            </div>
          </div>
<!--
          <div class="info-area info-horizontal">
            <div class="icon icon-primary">
              <i class="now-ui-icons media-1_button-pause"></i>
            </div>
            <div class="description">
              <h5 class="info-title">{{ __('Fully Coded in HTML5') }}</h5>
              <p class="description">
                {{ __("We've developed the website with HTML5 and CSS3. The client has access to the code using GitHub.") }}
              </p>
            </div>
          </div>
          <div class="info-area info-horizontal">
            <div class="icon icon-info">
              <i class="now-ui-icons users_single-02"></i>
            </div>
            <div class="description">
              <h5 class="info-title">{{ __('Built Audience') }}</h5>
              <p class="description">
                {{ __('There is also a Fully Customizable CMS Admin Dashboard for this product.') }}
              </p>
            </div>
          </div>  -->
        </div>
        <div class="col-md-4 mr-auto">
          <div class="card card-signup text-center">
            <div class="card-header ">
              <h4 class="card-title">{{ __('Register') }}</h4>
 <!--             <div class="social">
                <button class="btn btn-icon btn-round btn-twitter">
                  <i class="fab fa-twitter"></i>
                </button>
                <button class="btn btn-icon btn-round btn-dribbble">
                  <i class="fab fa-dribbble"></i>
                </button>
                <button class="btn btn-icon btn-round btn-facebook">
                  <i class="fab fa-facebook-f"></i>
                </button>
                <h5 class="card-description">  {{ __('or be classical') }}</h5>
              </div> -->
            </div>
            <div class="card-body ">
              <form method="POST" action="{{ route('regnew') }}">
                @csrf
                <!--Begin input name -->
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

                <!--Begin input agency -->
                <div class="input-group {{ $errors->has('agency') ? ' has-danger' : '' }}">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                    <i class="now-ui-icons business_bank"></i>
                    </div>
                </div>
                <input class="form-control {{ $errors->has('agency') ? ' is-invalid' : '' }}" placeholder="{{ __('Agency') }}" type="text" name="agency" value="{{ old('agency') }}" required>
                @if ($errors->has('agency'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{ $errors->first('agency') }}</strong>
                    </span>
                @endif
                </div>

                <!--Begin input division -->
                <div class="input-group {{ $errors->has('division') ? ' has-danger' : '' }}">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                        <i class="now-ui-icons business_badge"></i>
                        </div>
                    </div>
                    <input class="form-control {{ $errors->has('division') ? ' is-invalid' : '' }}" placeholder="{{ __('Division') }}" type="text" name="division" value="{{ old('division') }}" required>
                    @if ($errors->has('division'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('division') }}</strong>
                        </span>
                    @endif
                    </div>

                <!--Begin input designation -->
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

                    <!--Begin input contactNumber -->
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

                <!--Begin input sex -->
               <div class="input-group {{ $errors->has('sex') ? ' has-danger' : '' }}">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                    <i class="now-ui-icons clothes_tie-bow"></i>
                    <label class="col-md-4 control-label" for="radios">Sex</label>
                    <div class="nput-group-text col-md-4">
                      <label class="radio-inline" for="sex">
                        <input type="radio" name="sex" id="sex" value="0" checked="checked">
                        {{ __('Male') }}
                      </label>
                      <label class="radio-inline" for="sex">
                        <input type="radio" name="sex" id="sex" value="1">
                         {{ __('Female') }}
                      </label>
                    </div>
                  </div>
                </div>
                @if ($errors->has('uplinePosition'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{ $errors->first('uplinePosition') }}</strong>
                    </span>
                @endif
                </div>

                <!--Begin input email -->
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
                <!--Begin input user type-->

                <!--Begin input password -->
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
                <!--Begin input confirm password -->
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="now-ui-icons objects_key-25"></i></i>
                    </div>
                  </div>
                  <input class="form-control" placeholder="{{ __('Confirm Password') }}" type="password" name="password_confirmation" required>
                </div>
                <div class="form-check text-left">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox">
                    <span class="form-check-sign"></span>
                    {{ __('I agree to the') }}
                    <a href="#something">{{ __('terms and conditions') }}</a>.
                  </label>
                </div>
                <div class="card-footer ">
                  <button type="submit" class="btn btn-primary btn-round btn-lg">{{__('Register Now')}}</button>
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
