<script src="{{ url('./Panel/adminAssets/jquery-3.2.1.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.manue-active ul').removeClass('mm-show').find('a').removeClass('mm-active');
        $('#Cobons ul').addClass('mm-show').find('#CobonsIndex').addClass('mm-active');
    });

</script>
<style>
    .alert-success , .alert-danger{
        padding: 5px !important;
    }
</style>
@extends('admin.layout')
@section('content')
    <div class="app-main__inner">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">
                    {{ __('cobon.Cobons') }}
                </h5>

                @if (count($cobons))
                    <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>

                                <th data-field="id" data-align="center" data-sortable="true"
                                    data-formatter="invoiceFormatter">ID</th>
                                <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                    {{ __('cobon.code') }}</th>
                                <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                    {{ __('cobon.price') }}</th>
                                <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                    {{ __('cobon.dicount_percentage') }}</th>
                                {{-- <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                    {{ __('cobon.usage_limit') }}</th> --}}
                                <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                    {{ __('cobon.active') }}</th>
                                <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                    {{ __('cobon.end_date') }}</th>
                                <th data-field="date" data-align="center" data-sortable="true"
                                    data-formatter="dateFormatter">{{ __('General.updated') }}</th>
                                <th data-field="op" data-align="center" data-sortable="false" data-formatter="">
                                    {{ __('General.Options') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cobons as $key => $cobon)
                                <tr>
                                    <td>{{ $cobon->id }}</td>
                                    <td>{{ $cobon->code }}</td>
                                    <td>{{ $cobon->price }}</td>
                                    <td>{{ $cobon->dicount_percentage }}</td>
                                    {{-- <td>{{ $cobon->usage_limit }}</td> --}}
                                    <td>
                                        @if ($cobon->active == 1)
                                            <span class="alert alert-success">مفعل</span>
                                        @else
                                            <span class="alert alert-danger">معطل</span>
                                        @endif
                                    </td>
                                    <td>{{ $cobon->end_date }} </td>
                                    <td>{{ $cobon->updated_at }}</td>
                                    <td>
                                        <div class="row">
                                            <span>
                                                {{ Form::open(['method' => 'DELETE', 'style' => 'margin-top: -12%;', 'action' => ['Admin\DiscountCobonsController@destroy', $cobon->id]]) }}
                                                {{ Form::hidden('id', $cobon->id) }}
                                                <button class="mt-1 btn btn-defult fas-size-margin add-tooltip"
                                                    type="submit" data-toggle="tooltip" title="{{ __('General.Delete') }}"
                                                    onclick="return confirm('Are you sure you want to delete this item?');"><i
                                                        class="fas fa-trash-alt"></i></button>

                                                {{ Form::close() }}
                                            </span>

                                            <a class="fas-size-margin add-tooltip fas fa-edit" data-toggle="tooltip"
                                                title="{{ __('General.Edit') }}"
                                                href="{{ url('/admin/discountCobons/' . $cobon->id . '/edit') }}"> </a>

                                        </div>

                                    </td>


                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                @else
                    {{ __('General.No Data Avalible') }}
                @endif
                {{ $cobons->links() }}
            </div>
        </div>
    </div>
@endsection
