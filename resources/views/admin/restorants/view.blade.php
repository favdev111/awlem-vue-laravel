<script src="{{ url('./Panel/adminAssets/jquery-3.2.1.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.manue-active ul').removeClass('mm-show').find('a').removeClass('mm-active');
        $('#Restorants ul').addClass('mm-show').find('#RestorantsIndex').addClass('mm-active');
    });

</script>
@extends('admin.layout')
@section('content')
    <style>
        .alert-success,
        .alert-danger {
            padding: 5px !important;
        }

    </style>
    <div class="app-main__inner">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">
                    {{ __('restorant.Restorants') }}
                </h5>

                @if (count($restorants))
                    <table style="width: 100%;" id="" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>

                                <th data-field="id" data-align="center" data-sortable="true"
                                    data-formatter="invoiceFormatter">ID</th>
                                <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                    {{ __('restorant.name') }}
                                </th>
                                <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                    {{ __('restorant.user_id') }}
                                </th>
                                <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                    {{ __('restorant.category_id') }}
                                </th>
                                <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                    {{ __('restorant.featured') }}
                                </th>
                                @if (Auth::user()->hasRole('Super Admin'))
                                    <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                        {{ __('أولوية الأمتياز') }}
                                    </th>
                                @endif
                                <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                    {{ __('متاح') }}
                                </th>
                                <th data-field="date" data-align="center" data-sortable="true"
                                    data-formatter="dateFormatter">{{ __('General.updated') }}</th>
                                <th data-field="op" data-align="center" data-sortable="false" data-formatter="">
                                    {{ __('General.Options') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($restorants as $key => $restorant)
                                <tr>
                                    <td>{{ $restorant->id }}</td>
                                    <td>{{ $restorant->name }}</td>
                                    <td>
                                        @if ($restorant->user)
                                        <a
                                        href={{ url('admin/users/' . $restorant->user->id) }}>{{ $restorant->user->name }}</a>
                                        @else
                                            <span style="color: red;font-size: smaller;text-decoration: underline">يجب أن ينتمي هذا المطعم لمالك</span>
                                        @endif
                                      
                                       
                                    </td>
                                    <td>
                                        @if ($restorant->category)
                                        <a
                                        href={{ url('admin/categories/' . $restorant->category->id) }}>{{ $restorant->category->name }}</a>
                                        @else
                                        <span style="color: red;font-size: smaller;text-decoration: underline">يجب أن ينتمي هذا المطعم لنشاط</span>
                                        @endif
                                       
                                       
                                    </td>
                                    <td>
                                        @if ($restorant->featured == 1)
                                            <span class="alert alert-success">{{ __('restorant.featured') }}</span>
                                        @else
                                            <span class="alert alert-danger">{{ __('restorant.not_featured') }}</span>
                                        @endif
                                    </td>
                                    @if (Auth::user()->hasRole('Super Admin'))
                                        <td style="width: 13%">
                                            {!! Form::open(['method' => 'patch', 'action' =>
                                            ['Admin\RestorantsController@updatePriority', $restorant->id], 'files' => true])
                                            !!}
                                            <div class="row">
                                                <div class="col-md">
                                                    {!! Form::text('priority', $restorant->priority, ['class' =>
                                                    'form-control', 'placeholder' => __('أولوية الأمتياز')]) !!}
                                                </div>
                                                <div class="col-md">
                                                    {!! Form::submit(__('حفظ'), ['class' => 'btn btn-primary form-control'])
                                                    !!}
                                                </div>
                                            </div>
                                            {!! Form::Close() !!}
                                        </td>
                                    @endif


                                    <td>
                                        @if ($restorant->accepted == 1)
                                            <span class="alert alert-success">{{ __('متاح') }}</span>
                                        @else
                                            <span class="alert alert-danger">{{ __('غير متاح') }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $restorant->updated_at }}</td>
                                    <td>
                                        <div class="row">
                                            <span>
                                                {{ Form::open(['method' => 'DELETE', 'style' => 'margin-top: -12%;', 'action' => ['Admin\RestorantsController@destroy', $restorant->id]]) }}
                                                {{ Form::hidden('id', $restorant->id) }}
                                                <button class="mt-1 btn btn-defult fas-size-margin add-tooltip"
                                                    type="submit" data-toggle="tooltip" title="{{ __('General.Delete') }}"
                                                    onclick="return confirm('Are you sure you want to delete this item?');"><i
                                                        class="fas fa-trash-alt"></i></button>

                                                {{ Form::close() }}
                                            </span>

                                            <a class="fas-size-margin add-tooltip fas fa-edit" data-toggle="tooltip"
                                                title="{{ __('General.Edit') }}"
                                                href="{{ url('/admin/restorants/' . $restorant->id . '/edit') }}"> </a>
                                            <a class="fas-size-margin add-tooltip fas  fa-eye" data-toggle="tooltip"
                                                title="{{ __('General.View') }}"
                                                href="{{ url('/admin/restorants/' . $restorant->id) }}"> </a>


                                        </div>

                                    </td>


                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                @else
                    {{ __('General.No Data Avalible') }}
                @endif
                {{ $restorants->links() }}
            </div>
        </div>
    </div>
@endsection
