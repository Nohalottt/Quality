@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<!-- Content Row -->
        <div class="card shadow">
            <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800"><i class="fa-solid fa-plus" style="color: RED;"></i> <span style="color: #209CEE">{{ __('Nouvel utilisateur') }}</span></h1>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-primary btn-sm shadow-sm">{{ __('Retourner') }}</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">{{ __('Nom') }}</label>
                        <input type="text" class="form-control" id="name" placeholder="{{ __('Nom') }}" name="name" value="{{ old('name') }}" />
                    </div>
                    <div class="form-group">
                        <label for="email">{{ __('Votre E-mail') }}</label>
                        <input type="email" class="form-control" id="email" placeholder="{{ __('E-mail') }}" name="email" value="{{ old('email') }}" />
                    </div>
                    <div class="form-group">
                        <label for="password">{{ __('Mot de passe') }}</label>
                        <input type="text" class="form-control" id="password" placeholder="{{ __('Mot de passe') }}" name="password" value="{{ old('password') }}" required />
                    </div>
                    <div class="form-group">
                        <label for="roles">{{ __('Rôle') }}</label>
                        <select name="roles[]" id="roles" class="form-control select2" multiple="multiple" required>
                            @foreach($roles as $id => $roles)
                                <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($role) && $role->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Enregistrer') }}</button>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection