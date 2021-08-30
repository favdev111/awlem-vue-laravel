<script src="{{ url('./Panel/adminAssets/jquery-3.2.1.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.manue-active ul').removeClass('mm-show').find('a').removeClass('mm-active');
        $('#Regions ul').addClass('mm-show').find('#AreaIndex').addClass('mm-active');
    });

</script>
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<style>
    .card-body2 {
        height: 11em !important;
        overflow-y: hidden !important;
    }

    .card-img-top2 {
        height: 15em;
        object-fit: cover;
    }

</style>
@extends('admin.layout')
@section('content')
    <div class="app-main__inner">
        <div class="main-card mb-3 card container">
            <div class="card-body">

                <a class="fas-size-margin add-tooltip fas fa-edit" data-toggle="tooltip" title="{{ __('General.Edit') }}"
                    href="{{ url('/admin/areas/' . $area->id . '/edit') }}"> </a>
                <table class="table">

                    <tbody>
                        <tr>
                            <th scope="row">{{ __('أسم الحي') }}</th>
                            <td>{{ $area->name }}</td>

                        </tr>

                        <tr>
                            <th scope="row">{{ __('أسم المنطقة') }}</th>
                            <td>
                                @if ($area->region)
                                <a href="{{ url('/admin/regions/' . $area->region->id) }}"
                                    class="card-title">{{ $area->region->name }}</a>
                                @else
                                    ---
                                @endif
                                
                              </td>

                        </tr>
                    </tbody>
                </table>
                <hr>
                <h5 class="card-title">
                    المطاعم
                </h5>

                <div class="row">
                    @forelse ($area->restorants as $restorant)
                        <div class="col-md-3 text-center">
                            <div class="card" style="width: 16rem;margin: auto;margin-bottom: 1em;">
                                <img class="card-img-top card-img-top2"
                                    src="{{ url($restorant->photo) }}"
                                    alt="Card image cap">
                                <div class="card-body card-body2">
                                    <a href="{{ url('/admin/restorants/' . $restorant->id) }}"
                                        class="card-title">{{ $restorant->name }}</a>
                                        <br>
                                        <br>
                                    @if ($restorant->featured == 1)
                                        <span class="alert alert-success">{{ __('restorant.featured') }}</span>
                                    @else
                                        <span class="alert alert-danger">{{ __('restorant.not_featured') }}</span>
                                    @endif
                                </div>

                            </div>
                        </div>
                    @empty

                    @endforelse
                </div>
            </div>
        </div>
    </div>

@endsection
