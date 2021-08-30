@extends('admin.layout')
@section('content')
    <div class="app-main__inner">
        <div class="container">
            {!! Form::open(['method' => 'post', 'action' => 'RolesController@store', 'files' => true]) !!}
            <div class="tab-content">
                <div class="tab-pane tabs-animation fade active show" id="tab-content-1" role="tabpanel">
                    <div class="main-card mb-3 card">
                        <br>
                        <h5 class="card-title">{{ __('أضافة مجموعة') }}</h5>
                        <div class="card-body">
                            <div class="form-group">
                                {!! Form::text('name', null, ['class' => 'form-control text-center', 'placeholder' => 'أسم المجموعة']) !!}
                            </div>
                            {!! Form::submit('أضافة', ['class' => 'btn btn-primary form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::Close() !!}
        </div>

    </div>
@endsection
