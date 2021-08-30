<script src="{{ url('./Panel/adminAssets/jquery-3.2.1.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.manue-active ul').removeClass('mm-show').find('a').removeClass('mm-active');
        $('#Pages ul').addClass('mm-show').find('#PagesIndex').addClass('mm-active');
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
                                <th>{{ __('العنوان') }}</th>
                                <th>{{ __('تظهر فى الجوال') }}</th>
                                <th>{{ __('أخر تعديل') }}</th>
                                <th>{{ __('General.Options') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $d->title }}</td>
                                    <td>{{ $d->show_mobile == 1 ? 'نعم' : 'لا' }}</td>
                                    <td>{{ $d->updated_at }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-2 text-left">
                                                <span>
                                                    {{ Form::open(['method' => 'DELETE', 'style' => 'margin-top: -12%;', 'action' => ['Admin\PagesController@destroy', $d->id]]) }}
                                                    {{ Form::hidden('id', $d->id) }}
                                                    <button class="mt-1 btn btn-defult fas-size-margin add-tooltip"
                                                        type="submit" data-toggle="tooltip"
                                                        title="{{ __('General.Delete') }}"
                                                        onclick="return confirm('Are you sure you want to delete this item?');"><i
                                                            class="fas fa-trash-alt"></i></button>

                                                    {{ Form::close() }}
                                                </span>
                                            </div>
                                            <div class="col-md">
                                                <a class="fas-size-margin add-tooltip fas fa-edit"
                                                    href="{{ url('/admin/pages/' . $d->id . '/edit') }}"> </a>
                                                <a class="fas-size-margin add-tooltip fas  fa-eye" data-toggle="tooltip"
                                                    title="{{ __('General.View') }}"
                                                    href="{{ url('/admin/pages/' . $d->id) }}"> </a>
                                            </div>
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
