<script src="{{ url('./Panel/adminAssets/jquery-3.2.1.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.manue-active ul').removeClass('mm-show').find('a').removeClass('mm-active');
        $('#Regions ul').addClass('mm-show').find('#AreaIndex').addClass('mm-active');
    });

</script>
<style>
    .alert-danger {
        color: #D80200 !important;
        background-color: #D802004d !important;
        border-color: #D80200 !important;
    }

</style>
@extends('admin.layout')
@section('content')
    <div class="app-main__inner">
        <div class="container">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        {{ __('region.region') }} {{ $region->name }}
                    </h5>

                    <h6>
                        {{ __('area.areas') }}
                    </h6>
                    <hr>
                    <div class="row">
                        @forelse ($region->area as $key => $area)
                            <div class="col-md-3">
                                <div class="alert alert-danger text-center">
                                    {{ $area->name }}
                                </div>
                            </div>
                        @empty
                            <h6 class="text-center" style="width: 100%">{{ __('region.no_areas_found_here') }}</h6>
                        @endforelse


                    </div>


                </div>
            </div>
        </div>

    </div>
@endsection
