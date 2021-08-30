@extends('admin.layout')
@section('content')
    <script src="{{ url('./Panel/adminAssets/jquery-3.2.1.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.manue-active ul').removeClass('mm-show').find('a').removeClass('mm-active');
            $('#Compalints ul').addClass('mm-show').find('#CompalintsAdd').addClass('mm-active');
        });

    </script>
    <div class="parts form container">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">{{ __('أضافة شكوي') }}</h5>

                {!! Form::open(['method' => 'post', 'action' => 'Admin\ComplaintsController@store', 'files' => true]) !!}
                <div class="row">

                    <div class="col-md">

                        <div class="form-group">
                            <label for="name">{{ __('أسم الشكوي') }}
                            </label>

                            <div class="row">
                                <div class="col-md">
                                    {!! Form::text('name', null, [
                                    'class' => 'form-control',
                                    'placeholder' => __('أسم الشكوي'),
                                    ]) !!}
                                </div>

                                @error('name')
                                <div class="alert alert-danger2 col-md-4 remove_error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name">{{ __('مقدم الشكوي') }}
                            </label>

                            <div class="row">
                                <div class="col-md">
                                    {!! Form::select('user_id', $users, null, ['class' => 'form-control',
                                    'placeholder' => __('مقدم الشكوي')]) !!}
                                </div>
                                @error('user_id')
                                <div class="alert alert-danger2 col-md-4 remove_error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name">{{ __('محتوي الشكوي') }}</label>
                            @error('body')
                            <div class="alert alert-danger2 remove_error">{{ $message }}</div>
                            @enderror
                            {!! Form::textarea('body', null, ['class' => 'form-control', 'id' => 'e1', 'placeholder' =>
                            __('محتوي الشكوي')]) !!}

                            <div class="col-sm-12 offset-sm-2">
                                {!! Form::submit(__('General.Save'), ['class' => 'btn btn-primary form-control']) !!}
                            </div>
                            {!! Form::Close() !!}
                        </div>
                    </div>
                </div>


                <script type="text/javascript">
                  
                    CKEDITOR.replace('e1', {
                        language: 'ar',
                        extraPlugins: 'imageuploader'
                    });

                    CKEDITOR.replace('e2', {
                        language: 'en',
                        extraPlugins: 'imageuploader'
                    });

                </script>

            @endsection
