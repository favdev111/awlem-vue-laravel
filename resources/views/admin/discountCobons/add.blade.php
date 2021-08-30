@extends('admin.layout')
@section('content')
    <script src="{{ url('./Panel/adminAssets/jquery-3.2.1.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.manue-active ul').removeClass('mm-show').find('a').removeClass('mm-active');
            $('#Cobons ul').addClass('mm-show').find('#CobonsCreat').addClass('mm-active');
        });

    </script>

    <div class="parts form container">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">{{ __('cobon.add_cobon') }}</h5>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::open(['method' => 'post', 'action' => 'Admin\DiscountCobonsController@store', 'files' => true])
                !!}
                <div class="container">


                    <div class="form-group">
                        <label for="name">{{ __('cobon.code') }}
                        </label>
                        <div>
                            {!! Form::text('code', null, ['class' => 'form-control', 'placeholder' => __('cobon.code')]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name">{{ __('cobon.price') }}
                        </label>
                        <div>
                            {!! Form::number('price', 0, ['class' => 'form-control', 'placeholder' => __('cobon.price')])
                            !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name">{{ __('cobon.dicount_percentage') }}
                        </label>
                        <div>
                            {!! Form::number('dicount_percentage', 0, ['class' => 'form-control', 'placeholder' =>
                            __('cobon.dicount_percentage')]) !!}
                        </div>
                    </div>

                    {{-- <div class="form-group">
                        <label for="name">{{ __('cobon.usage_limit') }}
                        </label>
                        <div>
                            {!! Form::number('usage_limit', 1, ['class' => 'form-control', 'placeholder' =>
                            __('cobon.usage_limit')]) !!}
                        </div>
                    </div> --}}

                    <div class="form-group">
                        <label for="name">{{ __('cobon.end_date') }}
                        </label>
                        <div>
                            {!! Form::text('end_date', date('Y-m-d H:i'), ['id' => 'end_date', 'class' => 'form-control',
                            'placeholder' => __('cobon.end_date')]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label style="width:150px" for="name">{{ __('cobon.active') }}</label>
                        {!! Form::checkbox('active', null, 1, ['class' => 'form-control', 'data-toggle' => 'toggle',
                        'data-onstyle' => 'primary']) !!}
                    </div>

                </div>

                <div class="col-sm-12 offset-sm-2">
                    {!! Form::submit(__('General.Save'), ['class' => 'btn btn-primary form-control']) !!}
                </div>

                {!! Form::Close() !!}


            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/ripples.min.js">
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/material.min.js">
            </script>
            <script type="text/javascript"
                src="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/js/material.min.js"></script>
            <script type="text/javascript" src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>
            <script type="text/javascript" src="{{ url('./Panel/adminAssets/bootstrap-material-datetimepicker.js') }}">
            </script>
            <script>
                $(document).ready(function() {

                    // $('#end_date')
                    //     .bootstrapMaterialDatePicker({
                    //         date: false,
                    //         shortTime: false,
                    //         format: 'HH:mm'
                    //     });

                    $('#end_date')
                        .bootstrapMaterialDatePicker({
                            time: true,
                            clearButton: true,
                            format : 'Y-M-D HH:mm'
                        });


                });

            </script>
        @endsection
