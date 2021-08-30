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
                <h5 class="card-title">{{ __('Faq.Add_Faq') }}</h5>

                {!! Form::open(['method' => 'post', 'action' => 'Admin\FaqController@store', 'files' => true]) !!}
                <div class="row">
                    <div class="col-md">

                        <div class="form-group">
                            <label for="name" class="col-form-label">{{ __('السؤال') }}</label>
                            <div class="row">
                                <div class="col-md">
                                    {!! Form::text('question', null, ['class' => 'form-control', 'placeholder' =>
                                    __('السؤال')]) !!}
                                </div>

                                @error('question')
                                <div class="alert alert-danger2 col-md-4 remove_error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-form-label">{{ __('الأجابة') }}</label>
                            <div class="row">
                                <div class="col-md">
                                    {!! Form::textarea('answer', null, ['class' => 'form-control', 'placeholder' =>
                                    __('الأجابة')]) !!}
                                </div>

                                @error('answer')
                                <div class="alert alert-danger2 col-md-4 remove_error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label style="width:150px" for="name">{{ __('تفعيل / تعطيل') }}</label>
                            <div class="row">
                                <div class="col-md">
                                    {!! Form::checkbox('active', null, 1, ['class' => 'form-control', 'data-toggle' =>
                                    'toggle', 'data-onstyle' => 'primary']) !!}
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-12 offset-sm-2">
                            {!! Form::submit(__('General.Save'), ['class' => 'btn btn-primary form-control']) !!}
                        </div>

                        {!! Form::Close() !!}


                    </div>
                </div>
            </div>
        @endsection
