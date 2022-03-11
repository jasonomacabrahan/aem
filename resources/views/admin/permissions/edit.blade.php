@extends('layouts.app', [
    'namePage' => 'Permission',
    'class' => 'sidebar-mini',
    'activePage' => 'permission',

])
@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ __('Edit Permission') }}</div>
      
            <div class="card-body">
                <form method="POST" action="{{ route('admin.permissions.update', $permission->id) }}">
                    @csrf
                    @method('PUT')
      
                    <div class="form-group row">
                        <label for="name" class="required col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
      
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control border border-info rounded-0 @error('name') is-invalid @enderror" name="name" value="{{ old('name', $permission->name) }}" required autocomplete="name" >
      
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
      
      
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <a href="{{ route('admin.permissions.index') }}"><i class="fa fa-fw fa-angle-left"></i>Back</a>
                            <button type="submit" class="btn btn-info">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>

@endsection
