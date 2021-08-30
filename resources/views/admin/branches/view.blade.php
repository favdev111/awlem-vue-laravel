<script src="{{ url('./Panel/adminAssets/jquery-3.2.1.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.manue-active ul').removeClass('mm-show').find('a').removeClass('mm-active');
        $('#Restorants ul').addClass('mm-show').find('#BranchesIndex').addClass('mm-active');
    });

</script>
@extends('admin.layout')
@section('content')
    <div class="app-main__inner">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">
                    {{ __('branch.branches') }}
                    
                </h5>

                @if (count($branches))
                    <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>

                                <th data-field="id" data-align="center" data-sortable="true"
                                    data-formatter="invoiceFormatter">ID</th>
                                <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                    {{ __('branch.name') }}
                                </th>
                                <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                    {{ __('branch.user_id') }}
                                </th>
                                <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                    {{ __('branch.restorant_id') }}
                                </th>
                                <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                    {{ __('branch.restorant_owner') }}
                                </th>
                                <th data-field="date" data-align="center" data-sortable="true"
                                    data-formatter="dateFormatter">{{ __('General.updated') }}</th>
                                <th data-field="op" data-align="center" data-sortable="false" data-formatter="">
                                    {{ __('General.Options') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($branches as $key => $branch)
                                <tr>
                                    <td>{{ $branch->id }}</td>
                                    <td>{{ $branch->name }}</td>
                                    <td>{{ $branch->user->name }}</td>
                                    <td>{{ $branch->restorant->name }}</td>
                                    <td>{{ $branch->restorant->user->name }}</td>
                                    <td>{{ $branch->updated_at }}</td>
                                    <td>
                                        <div class="row">
                                            <span>
                                                {{ Form::open(['method' => 'DELETE', 'style' => 'margin-top: -12%;', 'action' => ['Admin\BranchesController@destroy', $branch->id]]) }}
                                                {{ Form::hidden('id', $branch->id) }}
                                                <button class="mt-1 btn btn-defult fas-size-margin add-tooltip"
                                                    type="submit" data-toggle="tooltip" title="{{ __('General.Delete') }}"
                                                    onclick="return confirm('Are you sure you want to delete this item?');"><i
                                                        class="fas fa-trash-alt"></i></button>

                                                {{ Form::close() }}
                                            </span>

                                            <a class="fas-size-margin add-tooltip fas fa-edit" data-toggle="tooltip"
                                                title="{{ __('General.Edit') }}"
                                                href="{{ url('/admin/branches/' . $branch->id . '/edit') }}"> </a>
                                            <a class="fas-size-margin add-tooltip fas  fa-eye" data-toggle="tooltip"
                                                title="{{ __('General.View') }}"
                                                href="{{ url('/admin/branches/' . $branch->id) }}"> </a>


                                        </div>

                                    </td>


                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                @else
                    {{ __('General.No Data Avalible') }}
                @endif
                {{ $branches->links() }}
            </div>
        </div>
    </div>
@endsection
