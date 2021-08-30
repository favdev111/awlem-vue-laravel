<script src="{{ url('./Panel/adminAssets/jquery-3.2.1.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.manue-active ul').removeClass('mm-show').find('a').removeClass('mm-active');
        $('#Settingss ul').addClass('mm-show').find('#olumFeatures').addClass('mm-active');
    });

</script>
@extends('admin.layout')
@section('content')
    <div class="app-main__inner">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">
                    {{ __('مميزات أولم') }}
                </h5>

                @if (count($features))
                    <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>

                                <th data-field="id" data-align="center" data-sortable="true"
                                    data-formatter="invoiceFormatter">ID</th>
                                <th data-field="" data-align="center" data-sortable="true"
                                    data-formatter="invoiceFormatter">
                                    {{ __('عنوان الميزة') }}
                                </th>
                                <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                    {{ __('صورة الميزة') }}
                                </th>

                                <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                    {{ __('وصف الميزة') }}
                                </th>
                                <th data-field="date" data-align="center" data-sortable="true"
                                    data-formatter="dateFormatter">{{ __('General.updated') }}</th>
                                <th data-field="op" data-align="center" data-sortable="false" data-formatter="">
                                    {{ __('General.Options') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($features as $key => $feature)
                                <tr tabindex="{{ $key }}">
                                    <td>{{ $feature->id }}</td>
                                    <td>{{ $feature->title }}</td>
                                    <td>
                                        @php
                                        if($feature->imge){
                                        $link = $feature->imge;
                                        }else {
                                        $link = '/images/noimg.jpg';
                                        }
                                        @endphp
                                        <img id="photo" src="{{ url($link) }}" alt="your image" width="50px" />
                                    </td>
                                    <td>{{ $feature->description }}</td>
                                    <td>{{ $feature->updated_at }}</td>
                                    <td>
                                        <div class="row">


                                            <a class="fas-size-margin add-tooltip fas fa-edit" data-toggle="tooltip"
                                                title="{{ __('General.Edit') }}"
                                                href="{{ url('/admin/features/' . $feature->id . '/edit') }}"> </a>



                                        </div>

                                    </td>


                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                @else
                    {{ __('General.No Data Avalible') }}
                @endif
                {{ $features->links() }}
            </div>
        </div>
    </div>
@endsection
