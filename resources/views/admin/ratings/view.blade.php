<script src="{{ url('./Panel/adminAssets/jquery-3.2.1.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.manue-active ul').removeClass('mm-show').find('a').removeClass('mm-active');
        $('#Ratings ul').addClass('mm-show').find('#RatingsIndex').addClass('mm-active');
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
                                <th>{{ __('رقم التقييم') }}</th>
                                <th>{{ __('صاحب التقييم') }}</th>
                                <th>{{ __('قيمة التقييم') }}</th>
                                <th>{{ __('التقييم') }}</th>
                                <th>{{ __('مفعل') }}</th>
                                <th>{{ __('General.Options') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $d->id }}</td>
                                    @if ($d->user != null)
                                        <td>{{ $d->user->name }}</td>
                                    @else
                                        <td>{{ __('زائر') }}</td>
                                    @endif

                                    <td>{{ $d->rate }}</td>
                                    <td>{{ $d->review }}</td>
                                    <td>
                                        @if ($d->active == 1)
                                            <span class="alert alert-success">{{ __('مفعل') }}</span>
                                        @else
                                            <span class="alert alert-danger">{{ __('غير مفعل') }}</span>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="row">
                                            <span>
                                                {{ Form::open(['method' => 'DELETE', 'style' => 'margin-top: -12%;', 'action' => ['Admin\RatingsController@destroy', $d->id]]) }}
                                                {{ Form::hidden('id', $d->id) }}
                                                <button class="mt-1 btn btn-defult fas-size-margin add-tooltip"
                                                    type="submit" data-toggle="tooltip" title="{{ __('General.Delete') }}"
                                                    onclick="return confirm('Are you sure you want to delete this item?');"><i
                                                        class="fas fa-trash-alt"></i></button>

                                                {{ Form::close() }}
                                            </span>

                                            <a class="fas-size-margin add-tooltip fas fa-edit" data-toggle="tooltip"
                                                title="{{ __('General.Edit') }}"
                                                href="{{ url('/admin/ratings/' . $d->id . '/edit') }}"> </a>

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
