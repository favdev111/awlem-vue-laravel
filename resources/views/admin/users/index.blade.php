<script src="{{url('./Panel/adminAssets/jquery-3.2.1.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('.manue-active ul').removeClass('mm-show').find('a').removeClass('mm-active');
        $('#Users ul').addClass('mm-show').find('#UsersIndex').addClass('mm-active');
    });
</script>
@extends('admin.layout')
@section('content')
<div class="app-main__inner">
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">{{ __('الأعضاء') }}</h5>
            @if($data)
            <table style="width: 100%;"  class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>الأسم</th>
                        <th>البريد الألكتروني</th>
                        <th>خيارات</th>
                        <th>مسح</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $d)
                    <tr>
                        <td>{{$d->id}}</td>
                        <td>{{$d->name}}</td>
                        <td>{{$d->email}}</td>

                        <td>
                            <a class="btn btn-info" href="{{ route('users.show',$d->id) }}">Show</a>
                            <a class="fas-size-margin add-tooltip fas fa-edit" href="{{url('/admin/users/'.$d->id.'/edit')}}"> </a>

                        </td>
                        <td>
                            {{ Form::open(['method' => 'DELETE', 'action'=>['Admin\UsersController@destroy', $d->id]]) }}
                            {{ Form::hidden('id', $d->id) }}
                            {{ Form::submit('delete', ['class' => 'mt-1 btn btn-primary']) }}
                            {{ Form::close() }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
            @else
            No Data Avalible
            @endif
            {{$data->links()}}
        </div>
    </div>
</div>
@endsection