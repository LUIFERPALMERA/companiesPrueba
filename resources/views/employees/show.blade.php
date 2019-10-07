@extends('adminlte::page')

@section('title', 'Employees')

@section('content_header')
    <div class="container">
        <div class="card-header">
            <h1>
                {{ __('form.show_employee') }} 
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
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('form.label_first_name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{$employee->first_name}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="website" class="col-md-4 col-form-label text-md-right">{{ __('form.label_last_name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{$employee->last_name}}" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('form.label_company') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{$employee->company->name}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('form.label_email') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{$employee->email}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('form.label_phone') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{$employee->phone}}" readonly>
                                </div>
                            </div>

                            
                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <a href="{{ route('employees.index') }}"><button type="button" class="btn btn-outline-secondary">{{ __('form.back_list') }}</button></a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
