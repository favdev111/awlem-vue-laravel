@extends('admin.layout')
@section('content')
    <script src="{{ url('./Panel/adminAssets/jquery-3.2.1.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.manue-active ul').removeClass('mm-show').find('a').removeClass('mm-active');
            $('#Regions ul').addClass('mm-show').find('#RegionsCreat').addClass('mm-active');
        });

    </script>

    <div class="parts form container">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">{{ __('region.add_region') }}</h5>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::open(['method' => 'post', 'action' => 'Admin\RegionsController@store', 'files' => true]) !!}
                <div class="container">


                    <div class="form-group">
                        <label for="name">{{ __('region.name') }}
                        </label>
                        <div>
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('region.name')])
                            !!}
                        </div>
                    </div>

                </div>

                <div class="col-sm-12 offset-sm-2">
                    {!! Form::submit(__('General.Save'), ['class' => 'btn btn-primary form-control']) !!}
                </div>

                {!! Form::Close() !!}


            </div>
        @endsection
