@extends('adminlte::page')

@section('title', 'Employees list')

@section('content_header')
    <div class="container">
        <div class="card-header">
            <h1>
                {{ __('form.employees_list') }} <a href="{{ route('employees.create') }}"><button type="button" class="btn btn-success">{{ __('form.create_employee') }}</button></a>
            </h1>
        </div>
    </div>

@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
  
                    @if (session()->has('success_message'))
                        <div class="alert alert-success">
                            {{ session()->get('success_message') }}
                        </div>
                    @endif
                  
                    @if (session()->has('error_message'))
                        <div class="alert alert-danger">
                            {{ session()->get('error_message') }}
                        </div>
                    @endif
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{ __('form.th_name') }}</th>
                                <th>{{ __('form.th_company') }}</th>
                                <th>{{ __('form.th_email') }}</th>
                                <th>{{ __('form.th_phone')}}</th>
                                <th width="15%;">{{ __('form.th_actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td>{{$employee->first_name}} {{$employee->last_name}}</td>
                                    <td>{{$employee->company->name}}</td>
                                    <td>{{$employee->email}}</td>
                                    <td>{{$employee->phone}}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-4">
                                                <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-primary" tabindex="-1" role="button" aria-disabled="true"><i class="fas fa-eye" aria-hidden="true"></i></a>
                                            </div>
                                            <div class="col-xs-12 col-md-4">
                                                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary" tabindex="-1" role="button" aria-disabled="true"><i class="fas fa-edit" aria-hidden="true"></i></a>
                                            </div>
                                            <div class="col-xs-12 col-md-4">
                                                <form action="{{route('employees.destroy') }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" id="id" name="id" value="{{ $employee->id }}">
                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash-alt" aria-hidden="true"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                        {{ $employees->links() }}
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>    
@stop