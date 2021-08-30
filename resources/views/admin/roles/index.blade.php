<script src="{{ url('./Panel/adminAssets/jquery-3.2.1.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.manue-active ul').removeClass('mm-show').find('a').removeClass('mm-active');
        $('#Settingss ul').addClass('mm-show').find('#changePassword').addClass('mm-active');
    });

</script>
@extends('admin.layout')
@section('content')
    <div class="app-main__inner">
        <div class="main-card mb-3 card">
            <div class="card-body">
                @if ($roles)
                    <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Role</th>
                                <th>Actions</th>
                                {{-- <th>Delete</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>
                                        {{ $role->id }}
                                    </td>
                                    <td>{{ $role->name }}</td>

                                    <td>
                                        {{-- <a class="btn btn-info" href="{{ route('roles.show', $role->id) }}">Show</a> --}}
                                        {{-- @can('role-edit') --}}
                                            <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                                        {{-- @endcan --}}
                                        {{-- @can('role-delete') --}}
                                            {!! Form::open(['method' => 'DELETE', 'action' => ['RolesController@destroy', $role->id],
                                            'style' => 'display:inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        {{-- @endcan --}}
                                        {{-- <a
                                            class="fas-size-margin add-tooltip fas fa-edit"
                                            href="{{ url('/admin/roles/' . $role->id . '/edit') }}"> </a>
                                        --}}

                                    </td>
                                    {{-- <td>
                                        {{ Form::open(['method' => 'DELETE', 'action' => ['RolesController@destroy', $role->id]]) }}
                                        {{ Form::hidden('id', $role->id) }}
                                        {{ Form::submit('delete', ['class' => 'mt-1 btn btn-primary']) }}
                                        {{ Form::close() }}
                                    </td> --}}

                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
