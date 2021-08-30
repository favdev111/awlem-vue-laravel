@extends('admin.layout')
@section('content')
    <script src="{{ url('./Panel/adminAssets/jquery-3.2.1.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.manue-active ul').removeClass('mm-show').find('a').removeClass('mm-active');
            $('#Types ul').addClass('mm-show').find('#TypesCreat').addClass('mm-active');
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
                <h5 class="card-title">{{ __('type.edit_type') }}</h5>
                
                {!! Form::open(['method' => 'patch', 'action' => ['Admin\TypesController@update', $type->id], 'files' =>
                true]) !!}
                <div class="container">

                    <div class="form-group">
                        <label for="name">{{ __('type.name') }}
                        </label>

                        <div class="row">
                            <div class="col-md">
                                {!! Form::text('name', $type->name, [
                                'class' => 'form-control',
                                'placeholder' => __('type.name'),
                                ]) !!}
                            </div>

                            @error('name')
                            <div class="alert alert-danger2 col-md-4 remove_error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="name">{{ __('restorant.photo') }}</label>
                   
                        <div class="row">
                            <div class="col-md text-center">
                                {!! Form::file('photo', null, ['class' => 'form-control', 'placeholder' =>
                                __('restorant.photo')]) !!}
                            </div>
                            <div class="col-md text-center">
                                <img id="photo" src="{{ url($type->photo) }}"
                                    style="width: 38%;object-fit: cover;" alt="your image" width="100" /><br />

                            </div>
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
