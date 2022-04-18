@extends('layouts.apppartial', [
    'class' => '',
    'namePage' => '',
    'activePage' => '',
    'activeNav' => '',
    'backgroundImage' => "",
])
@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="bg-light p-5 rounded">
                <h1>Welcome {{ auth()->user()->name }}</h1>
                
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        A fresh verification link has been sent to your email address.
                    </div>
                @endif
            
                Before proceeding, please check your email for a verification link. If you did not receive the email,
                <br>
                <form action="{{ route('verification.resend') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-info">
                        <i class="fa fa-fw fa-paper-plane"></i>Click here to request another
                    </button>.
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
