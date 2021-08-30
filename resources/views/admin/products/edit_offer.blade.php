<style>
    .menu-container {
        padding: 1em;
    }

    .menu-container {
        margin: 2em;
        padding: 1em;
        -webkit-box-shadow: -5px 0px 0px 0px rgba(74, 74, 72, 1);
        -moz-box-shadow: -5px 0px 0px 0px rgba(74, 74, 72, 1);
        box-shadow: -5px 0px 0px 0px rgba(74, 74, 72, 1);
    }

    .menu-container ul li {
        height: 5em;
        font-size: 18px;
        border-bottom: 1px solid #ccc;
        cursor: pointer;
    }

    .badge-primary {
        background-color: #4A4A48 !important;
    }

</style>
@extends('admin.layout')
@section('content')
    <div class="parts form container">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">{{ __('تعديل عرض') }}</h5>
                <div class="row text-right">
                    <div class="col-md-4">
                        <div class="menu-container">
                            <h4 class="text-right">قائمة الطعام</h4>
                            <ul class="">
                                @forelse ($meals as $key => $meal)
                                    <li id="{{ $meal->id }}"
                                        class="getProductsToAddOfffer d-flex justify-content-between align-items-center">
                                        {{ $meal->name }}
                                        <span class="badge badge-primary badge-pill">{{ $meal->product_count }}</span>
                                    </li>
                                @empty

                                @endforelse


                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="container" style="width: 80%;">
                            {!! Form::open(['method' => 'post', 'action' => 'Admin\ProductsController@updateOffer', 'files'
                            => true]) !!}
                            {!! Form::hidden('branch_id', $branch_id) !!}
                            {!! Form::hidden('last_product_id', $product_id) !!}
                            <div class="form-group">
                                <label for="name">{{ __('المنتج') }}
                                </label>
                                <div>
                                    {!! Form::select('product_id', [], $product_id, ['class' => 'form-control', 'id' =>
                                    'products_offers_select']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name">{{ __('نسبة الخصم') }}
                                </label>
                                <div>
                                    {!! Form::text('percent', $percent, ['id' => 'offer_percent', 'class' => 'form-control',
                                    'placeholder' => __('نسبة الخصم')]) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name">{{ __('قيمة الخصم') }}
                                </label>
                                <div>
                                    {!! Form::text('amount', $amount, ['id' => 'offer_amount', 'class' => 'form-control',
                                    'placeholder' => __('قيمة الخصم')]) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name">{{ __('تاريخ نهاية العرض') }}
                                </label>
                                <div>
                                    {!! Form::text('offer_end_date', $offer_end_date, ['id' => 'offer_end_date', 'class' =>
                                    'form-control', 'placeholder' => __('تاريخ نهاية العرض')]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="width:150px" for="name">{{ __('تفعيل / تعطيل') }}</label>
                                <div class="row">
                                    <div class="col-md">
                                        {!! Form::checkbox('active', null, $active, ['class' => 'form-control',
                                        'data-toggle' => 'toggle', 'data-onstyle' => 'primary']) !!}
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-12 offset-sm-2">
                                {!! Form::submit(__('General.Save'), [
                                'class' => 'btn btn-primary
                                form-control',
                                ]) !!}
                            </div>
                            {!! Form::Close() !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/ripples.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/material.min.js">
    </script>
    <script type="text/javascript"
        src="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/js/material.min.js"></script>
    <script type="text/javascript" src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="{{ url('./Panel/adminAssets/bootstrap-material-datetimepicker.js') }}">
    </script>
    <script>
        var lastMealProducts;
        var oldMealProductsselected;
        $(document).ready(function() {
            $("#products_offers_select").append(
                `<option price='{{ $product->price }}' value='{{ $product->id }}'>{{ $product->name }}</option>`
            )
            $('#offer_end_date')
                .bootstrapMaterialDatePicker({
                    time: true,
                    clearButton: true,
                    format: 'Y-M-D HH:mm'
                });
            $('.menu-container-product2').show();
            $('.menu-container-product').hide();
            $('#offer_percent').change(function() {
                var proPrice = $('#products_offers_select').children(":selected").attr("price");
                var percent = $(this).val();
                var amount = proPrice * (percent / 100);
                $('#offer_amount').val(amount);
            })

            $('#offer_amount').change(function() {
                var proPrice = $('#products_offers_select').children(":selected").attr("price");
                var amount = $(this).val();
                var percent = (amount * 100) / proPrice;
                $('#offer_percent').val(percent);
            })
            $('.getProductsToAddOfffer').click(function() {
                $('#offer_percent').val(0.0);
                $('#offer_amount').val(0.0);
                var mealId = $(this).attr('id');
                $.ajax({
                    type: 'POST',
                    url: `{{ url('./getProductsByMealIdForAddOffer') }}`,
                    data: {
                        _token: '{{ csrf_token() }}',
                        'mealId': mealId,
                        'restorant_id': `{{ $restorant_id }}`,
                    },
                    success: function(data) {
                        console.log(data);
                        $("#products_offers_select").html('');
                        $.each(data, function(index, value) {
                            $("#products_offers_select").append("<option price='" +
                                value.price +
                                "' value='" +
                                value.id +
                                "'>" + value.name + "</option>")
                        })
                    }

                });
            })

            $("#products_offers_select").change(function() {
                $('#offer_percent').val(0.0);
                $('#offer_amount').val(0.0);
            });

        });

    </script>


    {{-- Scripts --}}
@endsection
