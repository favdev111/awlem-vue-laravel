<script src="{{ url('./Panel/adminAssets/jquery-3.2.1.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.manue-active ul').removeClass('mm-show').find('a').removeClass('mm-active');
        $('#Users ul').addClass('mm-show').find('#UsersIndex').addClass('mm-active');
    });

</script>
@extends('admin.layout')
@section('content')
    <style>
        .badge{
            font-size: 1em !important;
            border-radius: 0% !important;
        }
    </style>
    <div class="parts form">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title text-center"> {{ $user->name }}</h5>
                        <h5 class="text-center">{{ $user->email }}</h5>
                        <h6 class="text-center">{{ $user->phone }}</h6>
                        <div class="form-group">
                            <strong>{{ __('الصلاحيات') }} : </strong>
                            @if (!empty($user->getRoleNames()))
                                @foreach ($user->getRoleNames() as $v)
                                    <label class="badge badge-success">{{ __('General.' . $v) }}</label>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>

    </div>
@endsection
