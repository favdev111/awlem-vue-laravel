@extends('admin.layout_mobile')
@section('content')


    <style>
        .contrrr {
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 90vh
        }

        .img-class {
            width: 10%;
            margin: auto;
            margin-bottom: .5em;
        }

        .fixed-sidebar .app-main .app-main__outer {
            padding-top: 0px !important;
        }

    </style>
    <div class="contrrr">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <a href="{{ route('branches.branchOrdersMobile', [$branch_id, 'pending']) }}" class="card text-center"
                    style="width: 70%; margin: auto;margin-bottom: 1em;">
                    <div class="card-body" style="border: 1px solid;">
                        <div class="img-class">
                            <img src="{{ url('images/suspended.png') }}" alt="">

                        </div>
                        <h5 class="text-center">طلبات معلقة</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-sm-12">
                <a href="{{ route('branches.branchOrdersMobile', [$branch_id, 'working']) }}" class="card text-center"
                    style="width: 70%; margin: auto;margin-bottom: 1em;">
                    <div class="card-body" style="border: 1px solid;">
                        <div class="img-class">
                            <img src="{{ url('images/current.png') }}" alt="">

                        </div>
                        <h5 class="text-center">طلبات جارية</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-sm-12">
                <a href="{{ route('branches.branchOrdersMobile', [$branch_id, 'previous']) }}" class="card text-center"
                    style="width: 70%; margin: auto;margin-bottom: 1em;">
                    <div class="card-body" style="border: 1px solid;">
                        <div class="img-class">
                            <img src="{{ url('images/previous.png') }}" alt="">

                        </div>
                        <h5 class="text-center">طلبات سابقة</h5>
                    </div>
                </a>
            </div>
        </div>
    </div>


@endsection
