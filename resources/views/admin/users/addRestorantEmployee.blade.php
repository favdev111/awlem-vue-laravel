@extends('admin.layout')
@section('content')
    <style>
        .upload-btn-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .btn {
            border: 2px solid gray;
            color: gray;
            background-color: white;
            padding: 8px 20px;
            border-radius: 8px;
            font-size: 20px;
            font-weight: bold;
        }

        .upload-btn-wrapper input[type=file] {
            font-size: 100px;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
        }

        .btn-default {
            background: #ffffff !important;
            color: #4b5359 !important;
            border: 1px solid #a2a2a2 !important;
            font-size: 1.1em !important;
        }

        .btn-default:hover {
            background: #002a53 !important;
            color: #ffffff !important;

        }

    </style>
    <div class="parts form container">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">{{ __('أضافة موظف مطعم') }}</h5>

                {!! Form::open(['method' => 'post', 'action' => 'Admin\UsersController@storeRestorantEmployee', 'files' => true]) !!}
                <div class="form-group">
                    <label for="name" class="col-form-label">{{ __('اسم الموظف') }}</label>
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('اسم الموظف')]) !!}
                    {!! Form::hidden('parent_restorant', $restorantId) !!}
                    @error('name')
                    <div class="alert alert-danger2 remove_error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email" class="col-form-label">{{ __('Users.email') }} </label>
                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => __('Users.email')]) !!}
                    @error('email')
                    <div class="alert alert-danger2 remove_error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="col-form-label">{{ __('Users.password') }} </label>
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => __('Users.password')]) !!}
                    @error('password')
                    <div class="alert alert-danger2 remove_error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="col-form-label">{{ __('Users.phone') }} </label>
                    {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => __('Users.phone')]) !!}
                    @error('phone')
                    <div class="alert alert-danger2 remove_error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="col-form-label">{{ __('Users.address') }}</label>
                    {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => __('Users.address')]) !!}
                    @error('address')
                    <div class="alert alert-danger2 remove_error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-sm-12 offset-sm-2">
                    {!! Form::submit(__('General.Save'), ['class' => 'btn btn-primary form-control']) !!}
                </div>

                {!! Form::Close() !!}


            </div>
        </div>
    @endsection
