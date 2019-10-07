@extends('adminlte::page')

@section('title', 'Companies')

@section('content_header')
    <div class="container">
        <div class="card-header">
            <h1>
                {{ __('form.edit_company') }} 
            </h1>
        </div>
    </div>

@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('companies.update') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="id" name="id" value="{{ $company->id }}">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('form.label_name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$company->name}}" required autocomplete="name" autofocus >

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            @if($company->logo != null)
                                <div class="form-group row">
                                    <label for="logoActual" class="col-md-4 col-form-label text-md-right">{{ __('form.label_current_logo') }}</label>

                                    <div class="col-md-6">
                                        <img  src="{{ url($company->logo) }}" alt="Logo de la empresa">
                                    </div>
                                </div>
                            @endif
                            <div class="form-group row">
                                <label for="logo" class="col-md-4 col-form-label text-md-right">{{ __('form.label_logo') }}</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control-file" name="logo" id="logo" aria-describedby="fileHelp">
                                    <small id="fileHelp" class="form-text text-muted">{{ __('form.help_file') }}</small>

                                    @error('logo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                            </div>

                            <div class="form-group row">
                                <label for="website" class="col-md-4 col-form-label text-md-right">{{ __('form.label_website') }}</label>

                                <div class="col-md-6">
                                    <input id="website" type="url" class="form-control @error('website') is-invalid @enderror" name="website" value="{{$company->website}}" required autocomplete="website" autofocus>

                                    @error('website')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('form.label_email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$company->email}}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('form.save') }}
                                    </button>
                                    <a href="{{ route('companies.index') }}"><button type="button" class="btn btn-outline-secondary">{{ __('form.back_list') }}</button></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
