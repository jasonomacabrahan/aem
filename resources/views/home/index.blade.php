@extends('layouts.apppartial', [
    'namePage' => 'Welcome',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'welcome',
    'backgroundImage' => asset('assets') . "/img/bg2.png"
])

@section('content')

<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="container">
                @auth
                <div class="row">
                   <div class="col-md-12">
                       <div class="card">
                            <div class="card-body p-5">
                                <h1>Welcome</h1>
                                <a href="{{ route('dashboard.index') }}" class="btn btn-lg btn-info me-2"><i class="fa fa-fw fa-cog"></i>Go to Dashboard</a>

                            </div>
                        </div>
                   </div>
                </div>
                @endauth
                
                @guest
                <div class="row">
                    
                    <div class="col-md-6">
                        <h3 class="text-white">{{ __('Welcome to DICT - XI ( Davao Region ) Activity Event Monitoring System.') }}</h3>
                        <a href="{{ route('register.show') }}" class="btn btn-lg btn-info"><i class="fa-solid fa-fw fa-user-astronaut"></i>Register Now</a>
                        <?php
                            $useragent=$_SERVER['HTTP_USER_AGENT'];
                            if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
                            {
                              
                            }else{
                              ?>
                              <hr>
                              <h6 class="text-white">{{ __('For easy access...') }}</h6>
                             
                              <a href="https://mega.nz/file/degE0aRL#iQU4lONChKjxy9Gx6ZRcfaCST_C4WHvRovk9ktNMjl0" target="_blank" class="btn btn-lg btn-danger"><i class="fa-brands fa-fw fa-android"></i>Download Android App</a>
                              <br>
                              <sub class="fw-bolder text-white">(3.17 MB)</sub>
                              
                              <?php
                            }
                            
                        ?>
                        <p class="text-lead text-light mt-3 mb-0">
                            @include('alerts.migrations_check')
                        </p>
                    </div>
                    <div class="col-md-2">

                    </div>
                    <div class="col-md-4">
                        <form role="form" method="POST" action="{{ route('login.perform') }}">
                            @csrf
                            <div class="card card-login">
                                <div class="card-header ">
                                <div class="logo-container">
                                    <img src="{{ asset('assets/img/favicon.png') }}" alt="">
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
                                <button  type = "submit" class="btn btn-info btn-lg btn-block mb-3"><i class="fa fa-fw fa-sign-in"></i>{{ __('Login') }}</button>
                                </div>
                                <div class="card-footer text-center">
                                    <a href="{{ route('forget.password.get') }}" class="btn btn-xs btn-success card-link">Reset Password</a>
                                </div>
                            </div>
                            </form>
                    </div>
                    
                </div>
                @endguest
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