@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'User Profile',
    'activePage' => 'profile',
    'activeNav' => '',
])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__(" Edit Profile")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('profile.update') }}" autocomplete="off"
            enctype="multipart/form-data">
              @csrf
              @method('put')
              @include('alerts.success')
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Name")}}</label>
                                <input type="text" name="name" class="form-control border-info rounded-0" value="{{ old('name', auth()->user()->name) }}">
                                @include('alerts.feedback', ['field' => 'name'])
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-7 pr-1">
                    <div class="form-group">
                      <label for="exampleInputEmail1">{{__(" Email address")}}</label>
                      <input type="email" name="email" class="form-control border-info rounded-0" placeholder="Email" value="{{ old('email', auth()->user()->email) }}">
                      @include('alerts.feedback', ['field' => 'email'])
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-7 pr-1">
                    <div class="form-group">
                      <label for="exampleInputEmail1">{{__("Agency")}}</label>
                      <input type="text" name="agency" class="form-control border-info rounded-0" value="{{ old('agency', auth()->user()->agency) }}">
                      @include('alerts.feedback', ['field' => 'agency'])
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-7 pr-1">
                    <div class="form-group">
                      <label for="exampleInputEmail1">{{__("Division")}}</label>
                      <input type="text" name="division" class="form-control border-info rounded-0" value="{{ old('division', auth()->user()->division) }}">
                      @include('alerts.feedback', ['field' => 'division'])
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-7 pr-1">
                    <div class="form-group">
                      <label for="exampleInputEmail1">{{__("Designation")}}</label>
                      <input type="text" name="designation" class="form-control border-info rounded-0" value="{{ old('designation', auth()->user()->designation) }}">
                      @include('alerts.feedback', ['field' => 'designation'])
                    </div>
                  </div>
                </div>


              <div class="card-footer ">
                <button type="submit" class="btn btn-info rounded-0"><i class="fa fa-fw fa-save"></i>{{__('Save')}}</button>
              </div>
              <hr class="half-rule"/>
            </form>
          </div>
          <div class="card-header">
            <h5 class="title">{{__("Password")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
              @csrf
              @method('put')
              @include('alerts.success', ['key' => 'password_status'])
              <div class="row">
                <div class="col-md-7 pr-1">
                  <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                    <label>{{__(" Current Password")}}</label>
                    <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }} border-info rounded-0 " name="old_password" placeholder="{{ __('Current Password') }}" type="password"  required>
                    @include('alerts.feedback', ['field' => 'old_password'])
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-7 pr-1">
                  <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                    <label>{{__(" New password")}}</label>
                    <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }} border-info rounded-0" placeholder="{{ __('New Password') }}" type="password" name="password" required>
                    @include('alerts.feedback', ['field' => 'password'])
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="col-md-7 pr-1">
                <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                  <label>{{__(" Confirm New Password")}}</label>
                  <input class="form-control border-info rounded-0" placeholder="{{ __('Confirm New Password') }}" type="password" name="password_confirmation" required>
                </div>
              </div>
            </div>
            <div class="card-footer ">
              <button type="submit" class="btn btn-info border-info rounded-0">{{__('Change Password')}}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
      <div class="col-md-4">
        <div class="card card-user">
          <div class="image">
            <img src="{{asset('assets')}}/img/bg5.jpg" alt="...">
          </div>
          <div class="card-body">
            
            <div class="author">
              <a href="#">
                @foreach ($users as $user)
                @endforeach
                <?php
                    if(empty($user->location))
                    {
                      ?>
                        <img class="avatar border-gray" src="{{asset('assets')}}/img/default-avatar.png" alt="...">
                      <?php
                    }else{
                      ?>
                        <img class="avatar border-gray" src="{{url('/'.$user->location)}}" >
                      <?php
                    }
                ?>
                <h5 class="title">{{ auth()->user()->name }}</h5>
              </a>
              <p class="description text-left">
                  <sub class="text-dark"><label for="">Email: </label>{{ auth()->user()->email }}</sub><br>
                  <sub><label for="">Designation: </label>{{ auth()->user()->designation }}</sub><br>
                  <sub><label for="">Division: </label>{{ auth()->user()->division }}</sub><br>
                  <sub><label for="">Agency: </label>{{ auth()->user()->agency }}</sub>
              </p>
            </div>
          </div>
          <hr>
          <div class="button-container">
            <a href="{{ route('upload-image') }}" class="btn btn-neutral btn-icon btn-round btn-lg">
              <i class="fa fa-fw fa-camera"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection