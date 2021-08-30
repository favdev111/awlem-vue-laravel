<script src="{{ url('./Panel/adminAssets/jquery-3.2.1.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.manue-active ul').removeClass('mm-show').find('a').removeClass('mm-active');
        $('#Clients ul').addClass('mm-show').find('#ClientsIndex').addClass('mm-active');
    });

</script>
@extends('admin.layout')
@section('content')
    <div class="app-main__inner">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">{{ __('الأعضاء') }}</h5>
                @if ($data)
                    <table style="width: 100%;" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>الأسم</th>
                                <th>البريد الألكتروني</th>
                                <th>خيارات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $d->id }}</td>
                                    <td>{{ $d->name }}</td>
                                    <td>{{ $d->email }}</td>
                                    <td>
                                        <div class="row">
                                            <span>
                                                {{ Form::open(['method' => 'DELETE', 'action' => ['Admin\ClientsController@destroy', $d->id]]) }}
                                                {{ Form::hidden('id', $d->id) }}
                                                <button class="mt-1 btn btn-defult fas-size-margin add-tooltip"
                                                    type="submit" data-toggle="tooltip" title="{{ __('General.Delete') }}"
                                                    onclick="return confirm('Are you sure you want to delete this item?');"><i
                                                        class="fas fa-trash-alt"></i></button>

                                                {{ Form::close() }}
                                            </span>

                                            <a class="fas-size-margin add-tooltip fas fa-edit" data-toggle="tooltip"
                                                title="{{ __('General.Edit') }}"
                                                href="{{ url('/admin/clients/' . $d->id . '/edit') }}"> </a>
                                            <a class="fas-size-margin add-tooltip fas  fa-eye" data-toggle="tooltip"
                                                title="{{ __('General.View') }}" href="{{ route('clients.show', $d->id) }}">
                                            </a>


                                        </div>


                                    </td>
                                   
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                @else
                    No Data Avalible
                @endif
                {{ $data->links() }}
            </div>
        </div>
    </div>
@endsection
