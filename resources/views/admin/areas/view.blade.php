<script src="{{ url('./Panel/adminAssets/jquery-3.2.1.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.manue-active ul').removeClass('mm-show').find('a').removeClass('mm-active');
        $('#Regions ul').addClass('mm-show').find('#AreaIndex').addClass('mm-active');
    });

</script>
@extends('admin.layout')
@section('content')
    <div class="app-main__inner">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">
                    {{ __('area.areas') }}
                </h5>

                @if (count($areas))
                    <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>

                                <th data-field="id" data-align="center" data-sortable="true"
                                    data-formatter="invoiceFormatter">ID</th>
                                <th data-field="id" data-align="center" data-sortable="true"
                                    data-formatter="invoiceFormatter">{{ __('area.region') }}</th>
                                <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                    {{ __('area.name') }}</th>
                                <th data-field="date" data-align="center" data-sortable="true"
                                    data-formatter="dateFormatter">{{ __('General.updated') }}</th>
                                <th data-field="op" data-align="center" data-sortable="false" data-formatter="">
                                    {{ __('General.Options') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($areas as $key => $area)
                                <tr>
                                    <td>{{ $area->id }}</td>
                                    <td>{{ ($area->region) ? $area->region->name : '---' }}</td>
                                    <td>{{ $area->name }}</td>
                                    <td>{{ $area->updated_at }}</td>
                                    <td>
                                        <div class="row">
                                            <span>
                                                {{ Form::open(['method' => 'DELETE', 'style' => 'margin-top: -12%;', 'action' => ['Admin\AreasController@destroy', $area->id]]) }}
                                                {{ Form::hidden('id', $area->id) }}
                                                <button class="mt-1 btn btn-defult fas-size-margin add-tooltip"
                                                    type="submit" data-toggle="tooltip" title="{{ __('General.Delete') }}"
                                                    onclick="return confirm('Are you sure you want to delete this item?');"><i
                                                        class="fas fa-trash-alt"></i></button>

                                                {{ Form::close() }}
                                            </span>

                                            <a class="fas-size-margin add-tooltip fas fa-edit" data-toggle="tooltip"
                                                title="{{ __('General.Edit') }}"
                                                href="{{ url('/admin/areas/' . $area->id . '/edit') }}"> </a>
                                                <a class="fas-size-margin add-tooltip fas  fa-eye" data-toggle="tooltip"
                                                title="{{ __('General.View') }}"
                                                href="{{ url('/admin/areas/' . $area->id) }}"> </a>


                                        </div>

                                    </td>


                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                @else
                    {{ __('General.No Data Avalible') }}
                @endif
                {{ $areas->links() }}
            </div>
        </div>
    </div>
@endsection
