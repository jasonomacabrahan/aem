@extends('layouts.app', [
    'namePage' => 'ROLES',
    'class' => 'sidebar-mini',
    'activePage' => 'roles',

])

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ __('Edit Role') }}</div>
      
            <div class="card-body">
                <form method="POST" action="{{ route('admin.roles.update', $role->id) }}">
                    @csrf
                    @method('PUT')
      
      
                    <div class="form-group row">
                        <label for="title" class="required col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
      
                        <div class="col-md-6">
                            <input id="text" type="title" class="form-control  rounded-0 @error('title') is-invalid @enderror" name="title" value="{{ old('title', $role->title) }}" required autocomplete="title">
      
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
      
      
                    <div class="form-group row">
                        <label for="short_code" class="col-md-4 col-form-label text-md-right">{{ __('Short Code') }}</label>
      
                        <div class="col-md-6">
                            <input id="text" type="short_code" class="form-control rounded-0 @error('short_code') is-invalid @enderror" name="short_code" value="{{ old('short_code', $role->short_code) }}" autocomplete="short_code">
      
                            @error('short_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
      
                    <div class="form-group row">
                        <label for="permissions" class="col-md-4 col-form-label text-md-right">{{ __('Permissions') }}</label>
                        <div class="col-md-6" id="permissions-select">
                            <select name="permissions[]" id="permissions" class="@error('permissions') is-invalid @enderror"  multiple>
                                @foreach ($permissions as $id => $permission)
                                    <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || $role->permissions->contains($id)) ? 'selected' : '' }}>{{ $permission }}</option>
                                @endforeach
                            </select>
                            <a href="#" id="permission-select-all" class="btn btn-link">select all</a>
                            <a href="#" id="permission-deselect-all" class="btn btn-link">deselect all</a>
                            @error('permissions')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
      
      
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-info">
                                <i class="fa fa-fw fa-save"></i>{{ __('Update') }}
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
