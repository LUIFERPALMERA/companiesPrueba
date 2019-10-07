@extends('adminlte::page')

@section('title', 'Companies')

@section('content_header')
    <div class="container">
        <div class="card-header">
            <h1>
                {{ __('form.show_company') }} 
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
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('form.label_name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{$company->name}}" readonly>
                                </div>
                            </div>
                            @if($company->logo != null)
                                <div class="form-group row">
                                    <label for="logoActual" class="col-md-4 col-form-label text-md-right">{{ __('form.label_logo') }}</label>

                                    <div class="col-md-6">
                                        <img  src="{{ url($company->logo) }}" alt="Logo de la empresa">
                                    </div>
                                </div>
                            @endif
                            <div class="form-group row">
                                <label for="website" class="col-md-4 col-form-label text-md-right">{{ __('form.label_website') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{$company->website}}" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('form.label_email') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{$company->email}}" readonly>
                                </div>
                            </div>

                            
                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <a href="{{ route('companies.index') }}"><button type="button" class="btn btn-outline-secondary">{{ __('form.back_list') }}</button></a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
