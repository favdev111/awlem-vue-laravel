@extends('admin.layout')
@section('content')
    <script src="{{ url('./Panel/adminAssets/jquery-3.2.1.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.manue-active ul').removeClass('mm-show').find('a').removeClass('mm-active');
            $('#Ratings ul').addClass('mm-show').find('#RatingsAdd').addClass('mm-active');
        });

    </script>

    <div class="parts form container">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">{{ __('تعديل تقييم') }}</h5>
                {!! Form::open(['method' => 'patch', 'action' => ['Admin\RatingsController@update', $data->id], 'files'
                => true]) !!}
                <div class="container">

                    <div class="form-group">
                        <label for="name">{{ __('صاحب التقييم') }}
                        </label>
                        <div class="row">
                            <div class="col-md">
                                {!! Form::select('user_id', $users, $data->user_id, [
                                'class' => 'form-control',
                                'placeholder' => __('صاحب
                                التقييم'),
                                ]) !!}
                            </div>

                            @error('user_id')
                            <div class="alert alert-danger2 col-md-4 remove_error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name">{{ __('التقييم من 5') }}
                        </label>
                        <div class="row">
                            <div class="col-md">
                                {!! Form::text('rate', $data->rate, [
                                'class' => 'form-control',
                                'placeholder' => __('التقييم من5'),
                                ]) !!}
                            </div>

                            @error('rate')
                            <div class="alert alert-danger2 col-md-4 remove_error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name">{{ __('التقييم') }}
                        </label>

                        <div class="row">
                            <div class="col-md">
                                {!! Form::textarea('review', $data->review, ['class' => 'form-control', 'placeholder' =>
                                __('التقييم')]) !!}
                            </div>

                            @error('review')
                            <div class="alert alert-danger2 col-md-4 remove_error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label style="width:150px" for="name">{{ __('مقبول') }}</label>
                        <div class="row">
                            <div class="col-md">
                                {!! Form::checkbox('active', null, $data->active, ['class' => 'form-control', 'data-toggle' => 'toggle',
                                'data-onstyle' => 'primary']) !!}
                            </div>

                        </div>
                    </div>

                </div>

                <div class="col-sm-12 offset-sm-2">
                    {!! Form::submit(__('General.Save'), ['class' => 'btn btn-primary form-control']) !!}
                </div>

                {!! Form::Close() !!}

            @endsection
