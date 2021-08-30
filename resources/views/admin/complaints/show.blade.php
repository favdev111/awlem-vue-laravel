<script src="{{ url('./Panel/adminAssets/jquery-3.2.1.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.manue-active ul').removeClass('mm-show').find('a').removeClass('mm-active');
        $('#Compalints ul').addClass('mm-show').find('#CompalintsIndex').addClass('mm-active');
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
                    href="{{ url('/admin/types/' . $complaint->id . '/edit') }}"> </a>
                <table class="table">

                    <tbody>
                        <tr class="text-center">
                            <th scope="row">{{ __('أسم الشكوي') }}</th>
                            <td>{{ $complaint->name }}</td>
                        </tr>

                        <tr class="text-center">
                            <th scope="row">{{ __('مقدم الشكوي') }}</th>
                            <td>{{ $complaint->user->name }}</td>
                        </tr>

                        <tr class="text-center">
                            <th scope="row">{{ __('محتوي الشكوي') }}</th>
                            <td>{!! $complaint->body !!}</td>
                        </tr>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>

@endsection
