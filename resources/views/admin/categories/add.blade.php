@extends('admin.layout')
@section('content')
    <script src="{{ url('./Panel/adminAssets/jquery-3.2.1.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.manue-active ul').removeClass('mm-show').find('a').removeClass('mm-active');
            $('#Categories ul').addClass('mm-show').find('#CategoriesCreat').addClass('mm-active');
        });

    </script>
    <style>
        .fa-cloud-upload-alt {
            font-size: 2em;
            color: #D80200
        }

        .upload-btn-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .upload-btn-wrapper input[type=file] {
            font-size: 100px;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
        }


        .bootstrap-filestyle {
            /* border: 2px dashed #6497B4; */
            border-radius: 30%;
            /* padding: 3em 10em 3em 10em; */

        }

        .bootstrap-filestyle span {
            width: 100%;
        }

    </style>
    <div class="parts form container">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">{{ __('category.add_category') }}</h5>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::open(['method' => 'post', 'action' => 'Admin\CategoriesController@store', 'files' => true]) !!}
                <div class="container">

                    <div class="form-group">
                        <label for="name">{{ __('type.photo') }}</label>
                        @error('photo')
                        <div class="alert alert-danger2 col-md-4 remove_error">{{ $message }}</div>
                        @enderror
                        <div class="row">
                            <div class="col-md text-center">
                                {!! Form::file('photo', null, ['class' => 'form-control', 'placeholder' =>
                                __('type.photo')]) !!}
                            </div>
                            <div class="col-md text-center">
                                <img id="photo" src="{{ url('/images/noimg.jpg') }}" style="width: 38%;object-fit: cover;"
                                    alt="your image" width="100" /><br />

                            </div>
                        </div>


                    </div>

                    <div class="form-group">
                        <label for="name">{{ __('category.name') }}
                        </label>
                        <div>
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('category.name')])
                            !!}
                        </div>
                    </div>

                </div>

                <div class="col-sm-12 offset-sm-2">
                    {!! Form::submit(__('General.Save'), ['class' => 'btn btn-primary form-control']) !!}
                </div>

                {!! Form::Close() !!}


            </div>

            <script type="text/javascript" src="{{ url('./Panel/adminAssets/bootstrap-filestyle.min.js') }}"></script>
            <script>
                $(document).ready(function() {

                    $('input[type=file]').change(function() {
                        console.log(this.name)
                        readURL(this)
                    });

                    function readURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function(e) {
                                $('#' + input.name).attr('src', e.target.result);
                            }

                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                    $('input[type=file]').filestyle({
                        badge: true,
                        input: false,
                        text: '',
                        htmlIcon: '<i class="fas fa-cloud-upload-alt"></i>'
                    });
                    $('input[type=file] badge').text('');



                });

            </script>
        @endsection
