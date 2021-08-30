<script src="{{ url('./Panel/adminAssets/jquery-3.2.1.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.manue-active ul').removeClass('mm-show').find('a').removeClass('mm-active');
        $('#Clients ul').addClass('mm-show').find('#ClientsCreate').addClass('mm-active');
    });

</script>
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
                <h5 class="card-title">{{ __('أضافة عميل') }}</h5>
              
                {!! Form::open(['method' => 'post', 'action' => 'Admin\ClientsController@store', 'files' => true]) !!}
                <div class="row">
                    <div class="col-md" style="padding: 5%">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 col-form-label">{{ __('أسم العميل') }}</label>
                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Users.name')])
                                !!}
                                 @error('name')
                                 <div class="alert alert-danger2 col-md-4 remove_error">{{ $message }}</div>
                                 @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-form-label">{{ __('Users.email') }} </label>
                                {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' =>
                                __('Users.email')]) !!}
                                 @error('email')
                                 <div class="alert alert-danger2 col-md-4 remove_error">{{ $message }}</div>
                                 @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-form-label">{{ __('Users.password') }}</label>
                                {!! Form::password('password', ['class' => 'form-control', 'placeholder' =>
                                __('Users.password')]) !!}
                                 @error('password')
                                 <div class="alert alert-danger2 col-md-4 remove_error">{{ $message }}</div>
                                 @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-form-label">{{ __('Users.phone') }} </label>
                                {!! Form::number('phone', null, ['class' => 'form-control', 'placeholder' =>
                                __('Users.phone')]) !!}
                                 @error('phone')
                                 <div class="alert alert-danger2 col-md-4 remove_error">{{ $message }}</div>
                                 @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-form-label">{{ __('Users.address') }} </label>
                                {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' =>
                                __('Users.address')]) !!}
                                 @error('address')
                                 <div class="alert alert-danger2 col-md-4 remove_error">{{ $message }}</div>
                                 @enderror
                        </div>



                        <div class="position-relative row form-group">
                            <label for="name" class="col-sm-2 col-form-label">{{ __('Users.active') }} </label>
                            <div class="col-sm-10">
                                <label for="name" class="col-sm-2 col-form-label">{{ __('Users.active_true') }} </label>{!!
                                Form::radio('active', true, false) !!}
                                <label for="name" class="col-sm-2 col-form-label">{{ __('Users.active_false') }} </label>{!!
                                Form::radio('active', false, false) !!}
                            </div>
                            @error('active')
                            <div class="alert alert-danger2 col-md-4 remove_error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-12">
                            {!! Form::submit(__('General.Save'), ['class' => 'btn btn-primary form-control']) !!}
                        </div>
                        {!! Form::Close() !!}
                    </div>
                </div>
            </div>
        </div>
    @endsection
