@extends('admin.layout')
@section('content')
    <style>
        @import url(https://fonts.googleapis.com/css?family=Open+Sans);

        /*Checkboxes styles*/
        input[type="checkbox"] {
            display: none;
        }

        input[type="checkbox"]+label {
            display: block;
            position: relative;
            padding-left: 35px;
            margin-bottom: 20px;
            font: 14px/20px 'Open Sans', Arial, sans-serif;
            color: #000;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
        }

        input[type="checkbox"]+label:last-child {
            margin-bottom: 0;
        }

        input[type="checkbox"]+label:before {
            content: '';
            display: block;
            width: 20px;
            height: 20px;
            border: 1px solid #6cc0e5;
            position: absolute;
            left: 0;
            top: 0;
            opacity: .6;
            -webkit-transition: all .12s, border-color .08s;
            transition: all .12s, border-color .08s;
        }

        input[type="checkbox"]:checked+label:before {
            width: 10px;
            top: -5px;
            left: 5px;
            border-radius: 0;
            opacity: 1;
            border-top-color: transparent;
            border-left-color: transparent;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
        }

    </style>
    <div class="app-main__inner">
        {!! Form::open(['method' => 'Patch', 'action' => ['RolesController@update', $role->id], 'files' => true]) !!}
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade active show" id="tab-content-1" role="tabpanel">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <form class="">
                            <div class="position-relative row form-group">
                                <div class="col-md"></div>
                                <div class="col-md">
                                    {!! Form::text('name', $role->name, [
                                    'class' => 'form-control text-center',
                                    'placeholder' => 'Role
                                    Name',
                                    ]) !!}
                                </div>
                                <div class="col-md"></div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <h3 class="text-center">{{ __('التصاريح') }}</h3>
                                    <br />
                                    @php
                                    $same_controller =[];
                                    @endphp
                                    @foreach ($permission as $value)
                                        @php
                                        $permi_cont = explode('_',$value->name);
                                        $same_controller[explode('_',$value->name)[0]][$value->id] = $permi_cont[1];
                                        @endphp
                                    @endforeach
                                    <div class="row">
                                        @foreach ($same_controller as $key => $value)
                                            <div class="col-md-6">
                                                <div id="accordion" class="accordion-wrapper mb-3">
                                                    <div class="card">
                                                        <div id="{{ $key }}" class="card-header">
                                                            <button type="button" data-toggle="collapse"
                                                                data-target="#collapseOne{{ $key }}" aria-expanded="true"
                                                                aria-controls="collapseOne"
                                                                class="text-left m-0 p-0 btn btn-link btn-block">
                                                                <h5 class="card-title m-0 p-0">
                                                                    {{ __('roles.' . $key) }}

                                                                </h5>
                                                            </button>
                                                        </div>

                                                        <div data-parent="#accordion" id="collapseOne{{ $key }}"
                                                            aria-labelledby="2" class="collapse not_show">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    @foreach ($value as $key2 => $permission)
                                                                        <div class="col-md-4 text-center">
                                                                            <div class="boxes"
                                                                                style="margin: 5px;padding: 10px;background: #4A4A48;border-radius: 1em;" >

                                                                                {{ Form::checkbox('permission[]', $key2, in_array($key2, $rolePermissions) ? true : false, ['class' => 'name', 'id' => 'box-' . $key2]) }}
                                                                                <label style="color: #FFF"
                                                                                    for="box-{{ $key2 }}">{{ __('roles.' . $permission) }}</label>
                                                                            </div>

                                                                        </div>
                                                                        <br>
                                                                        <br>
                                                                    @endforeach

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>

                            <div class="position-relative row form-check">
                                {!! Form::submit('Add', ['class' => 'btn btn-primary form-control']) !!}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::Close() !!}
    </div>
@endsection
