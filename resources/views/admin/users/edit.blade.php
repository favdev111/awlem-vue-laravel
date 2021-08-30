@extends('admin.layout')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ url('./Panel/adminAssets/lou-multi/css/multi-select.css') }}">
    <script src="{{ url('./Panel/adminAssets/jquery-3.2.1.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.manue-active ul').removeClass('mm-show').find('a').removeClass('mm-active');
            $('#Restorants ul').addClass('mm-show').find('#RestorantsCreat').addClass('mm-active');
        });

    </script>
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
    <div class="parts form">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">{{ __('Users.add_user') }}</h5>

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::open(['method' => 'Patch', 'action' => ['Admin\UsersController@update', $user->id], 'files' =>
                true]) !!}
                <div class="row">
                    <div class="col-md">
                        <div class="position-relative row form-group">
                            <label for="name" class="col-sm-2 col-form-label">{{ __('Users.name') }} *</label>
                            <div class="col-sm-10">
                                {!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' =>
                                __('Users.name')]) !!}
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="email" class="col-sm-2 col-form-label">{{ __('Users.email') }} * </label>
                            <div class="col-sm-10">
                                {!! Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' =>
                                __('Users.email')]) !!}
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="password" class="col-sm-2 col-form-label">{{ __('Users.password') }} * </label>
                            <div class="col-sm-10">
                                {!! Form::password('password', ['class' => 'form-control', 'placeholder' =>
                                __('Users.password')]) !!}
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="password" class="col-sm-2 col-form-label">{{ __('Users.role_id') }} * </label>
                            <div class="col-sm-10">
                                {!! Form::select('roles[]', $roles,$userRole, array('id' => 'area-id','class' => 'form-control','multiple')) !!}
                                
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="name" class="col-sm-2 col-form-label">{{ __('Users.hasAdminAccess') }} *</label>
                            <div class="col-sm-10">
                                <label for="name" class="col-sm-2 col-form-label">{{ __('Users.hasAdminAccess_true') }}
                                </label>
                                @if ($user->hasAdminAccess == 'true'){!!
                                Form::radio('hasAdminAccess', 'true', true) !!}@else{!! Form::radio('hasAdminAccess',
                                    'true', false) !!}@endif
                                <label for="name" class="col-sm-2 col-form-label">{{ __('Users.hasAdminAccess_false') }}
                                </label>
                                @if ($user->hasAdminAccess == 'false'){!!
                                Form::radio('hasAdminAccess', 'false', true) !!}@else{!! Form::radio('hasAdminAccess',
                                    'false', false) !!}@endif
                            </div>
                        </div>


    

                        <div class="position-relative row form-group">
                            <label for="password" class="col-sm-2 col-form-label">{{ __('Users.phone') }} * </label>
                            <div class="col-sm-10">
                                {!! Form::text('phone', $user->phone, ['class' => 'form-control', 'placeholder' =>
                                __('Users.phone')]) !!}
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="password" class="col-sm-2 col-form-label">{{ __('Users.address') }} * </label>
                            <div class="col-sm-10">
                                {!! Form::text('address', $user->address, ['class' => 'form-control', 'placeholder' =>
                                __('Users.address')]) !!}
                            </div>
                        </div>
          
                        <div class="col-sm-12 offset-sm-2">
                            {!! Form::submit(__('General.Save'), ['class' => 'btn btn-primary form-control']) !!}
                        </div>
                        {!! Form::Close() !!}
                    </div>
                </div>
            </div>


        </div>    
        <script src="{{ url('./Panel/adminAssets/lou-multi/js/jquery.multi-select.js') }}"></script>
    <script type="text/javascript">
        $('#area-id').multiSelect();
    </script>    
    @endsection
    