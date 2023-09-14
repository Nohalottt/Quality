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
                    <h1 class="h3 mb-0 text-gray-800"><i class="fa-solid fa-plus" style="color: RED;"></i> <span style="color: #209CEE">{{ __('Créer un résultat') }}</span></h1>
                    <a href="{{ route('admin.results.index') }}" class="btn btn-primary btn-sm shadow-sm">{{ __('Retourner') }}</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.results.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="question">{{ __('Question') }}</label>
                        <select class="form-control" name="questions[]" multiple id="question">
                            @foreach($questions as $id => $question)
                                <option value="{{ $id }}">{{ $question }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="total_points">{{ __('Totale') }}</label>
                        <input type="number" class="form-control" id="total_points" placeholder="{{ __('Totale') }}" name="total_points" value="{{ old('total_points') }}" />
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Enregistrer') }}</button>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection