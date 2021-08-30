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
                <h5 class="card-title">{{ __('صاحب مطعم') }}</h5>

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::open(['method' => 'Patch', 'action' => ['Admin\UsersController@updateRestorantUser', $user->id],
                'files' => true]) !!}
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="name" class="col-form-label">{{ __('Users.name') }}</label>
                            {!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' =>
                            __('Users.name')]) !!}

                            {!! Form::hidden('restorantId', $restorantId) !!}
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-form-label">{{ __('Users.email') }} </label>
                            {!! Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' =>
                            __('Users.email')]) !!}
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-form-label">{{ __('Users.password') }} </label>
                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' =>
                            __('Users.password')]) !!}
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-form-label">{{ __('Users.phone') }} </label>
                            {!! Form::text('phone', $user->phone, ['class' => 'form-control', 'placeholder' =>
                            __('Users.phone')]) !!}
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-form-label">{{ __('Users.address') }} </label>
                            {!! Form::text('address', $user->address, ['class' => 'form-control', 'placeholder' =>
                            __('Users.address')]) !!}
                        </div>

                        <div class="col-sm-12 offset-sm-2">
                            {!! Form::submit(__('General.Save'), ['class' => 'btn btn-primary form-control']) !!}
                        </div>
                        {!! Form::Close() !!}
                    </div>
                </div>
            </div>


        </div>
    @endsection
