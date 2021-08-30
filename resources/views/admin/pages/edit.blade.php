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


    <div class="parts form">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">{{ __('Pages.Edit_Page') }}</h5>

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::open(['method' => 'patch', 'action' => ['Admin\PagesController@update', $data->id], 'files' =>
                true]) !!}
                <div class="row">

                    <div class="col-md">

                        <div class="position-relative row form-group">
                            <label for="name" class="col-sm-2 col-form-label">{{ __('Pages.title') }} *</label>
                            <div class="col-sm-10">
                                {!! Form::text('title', $data->title, ['class' => 'form-control', 'placeholder' =>
                                __('Pages.title')]) !!}
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="name" class="col-sm-2 col-form-label">{{ __('Pages.body') }} *</label>
                            <div class="col-sm-10">
                                {!! Form::textarea('body', $data->body, ['class' => 'form-control e1', 'placeholder' =>
                                __('Pages.body')]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="width:150px" for="name">{{ __('تظهر فى التطبيق') }}</label>
                            {!! Form::checkbox('show_mobile', null, $data->show_mobile, ['class' => 'form-control', 'data-toggle' => 'toggle',
                            'data-onstyle' => 'primary']) !!}
                        </div>
                        <div class="col-sm-12 offset-sm-2">
                            {!! Form::submit(__('General.Save'), ['class' => 'btn btn-primary form-control']) !!}
                        </div>
                        {!! Form::Close() !!}
                    </div>
                </div>
            </div>
            <script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/classic/ckeditor.js"></script>
            <script>
                ClassicEditor
                    .create(document.querySelector('.e1'))
                    .catch(error => {
                        console.error(error);
                    });
                ClassicEditor
                    .create(document.querySelector('.e2'))
                    .catch(error => {
                        console.error(error);
                    });

            </script>
        @endsection
