<script src="{{ url('./Panel/adminAssets/jquery-3.2.1.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.manue-active ul').removeClass('mm-show').find('a').removeClass('mm-active');
        $('#Compalints ul').addClass('mm-show').find('#CompalintsIndex').addClass('mm-active');
    });

</script>
@extends('admin.layout')
@section('content')
    <div class="app-main__inner">
        <div class="main-card mb-3 card">
            <div class="card-body">
                @if (count($data))
                    <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>{{ __('رقم الشكوي') }}</th>
                                <th>{{ __('مقدم الشكوي') }}</th>
                                <th>{{ __('أسم الشكوي') }}</th>
                                <th>{{ __('General.Options') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $d->id }}</td>
                                    <td>{{ $d->user->name }}</td>
                                    <td>{{ $d->name }}</td>
                                 
                                    <td>
                                        <div class="row">
                                            <span>
                                                {{ Form::open(['method' => 'DELETE', 'style' => 'margin-top: -12%;', 'action' => ['Admin\ComplaintsController@destroy', $d->id]]) }}
                                                {{ Form::hidden('id', $d->id) }}
                                                <button class="mt-1 btn btn-defult fas-size-margin add-tooltip"
                                                    type="submit" data-toggle="tooltip" title="{{ __('General.Delete') }}"
                                                    onclick="return confirm('Are you sure you want to delete this item?');"><i
                                                        class="fas fa-trash-alt"></i></button>

                                                {{ Form::close() }}
                                            </span>

                                            <a class="fas-size-margin add-tooltip fas fa-edit" data-toggle="tooltip"
                                                title="{{ __('General.Edit') }}"
                                                href="{{ url('/admin/complaints/' . $d->id . '/edit') }}"> </a>
                                            <a class="fas-size-margin add-tooltip fas  fa-eye" data-toggle="tooltip"
                                                title="{{ __('General.View') }}"
                                                href="{{ url('/admin/complaints/' . $d->id) }}"> </a>


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
