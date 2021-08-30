<link rel="stylesheet" type="text/css" href="{{ url('./Panel/adminAssets/lou-multi/css/multi-select.css') }}">
<script src="{{ url('./Panel/adminAssets/jquery-3.2.1.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.manue-active ul').removeClass('mm-show').find('a').removeClass('mm-active');
        $('#Products ul').addClass('mm-show').find('#ProductsIndexCreat').addClass('mm-active');
    });

</script>
<style>
    .fa-cloud-upload-alt {
        font-size: 2em;
        color: #D80200
    }

    .upload-btn-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
    }

    .upload-btn-wrapper input[type=file] {
        font-size: 100px;
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
    }


    .bootstrap-filestyle {
        /* border: 2px dashed #6497B4; */
        border-radius: 30%;
        /* padding: 3em 10em 3em 10em; */

    }

    .bootstrap-filestyle span {
        width: 100%;
    }

    .product_groups {
        border: 2px solid #3333;
        border-radius: 1em;
        padding: 1em;
        margin: 1em;
        position: relative;
    }

    .product_groups i {
        position: absolute;
        top: -7px;
        font-size: 2em;
        right: -3px;
        cursor: pointer;
    }

    .options-cont-radious {
        border: 2px solid #3333;
        border-radius: 1em;
        padding: 1em;
        margin: 1em;
        position: relative;
    }

    .options-cont-radious i {
        position: absolute;
        top: -7px;
        font-size: 2em;
        right: -3px;
        cursor: pointer;
    }

    .options-options-container {
        padding: 1em;
        margin: 1em;
    }

    .form-check-label {
        margin-right: 2em !important;
        margin-top: 2px !important;
    }

</style>
@extends('admin.layout')
@section('content')
    <div class="container">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title text-center">
                    {{ __('product.Add_Product') }}
                </h5>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::open(['method' => 'patch', 'action' => ['Admin\ProductsController@update', $product->id], 'files'
                => true]) !!}
                <div class="container">

                    <div class="form-group">
                        <label for="name">{{ __('product.photo') }}</label>
                        <div class="row">
                            <div class="col-md text-center">
                                {!! Form::file('photo', null, ['class' => 'form-control', 'placeholder' =>
                                __('restorant.photo')]) !!}
                            </div>
                            <div class="col-md text-center">
                                <img id="photo"
                                    src="{{ url($product->photo) }}"
                                    style="width: 38%;object-fit: cover;" alt="your image" width="100" /><br />

                            </div>
                        </div>


                    </div>

                    <div class="form-group">
                        <label for="name">{{ __('product.restorant_id') }}
                        </label>
                        <div>
                            {!! Form::select('restorant_id', $restorants, $product->restorant_id, ['id' => 'restorant_id',
                            'class' => 'form-control', 'placeholder' => __('product.restorant_id')]) !!}
                        </div>
                    </div>

                  

                    <div class="form-group">
                        <label for="description">{{ __('product.price') }}
                        </label>
                        <div>
                            {!! Form::number('price', $product->price, ['step' => 'any','class' => 'form-control', 'placeholder' =>
                            __('product.price')]) !!}
                        </div>
                    </div>

                    <div class="form-group offer_records">
                        <label for="description">{{ __('السعر المشطوب') }}
                        </label>
                        <div>
                            {!! Form::number('before_offer_price', $product->before_offer_price, ['class' => 'form-control',
                            'placeholder' => __('السعر المشطوب')]) !!}
                        </div>
                    </div>

                    <div class="form-group offer_records">
                        <label for="description">{{ __('موعد انتهاء العرض') }}
                        </label>
                        <div>
                            {!! Form::text('offer_expire', $product->offer_expire, ['id' => 'offer_expire', 'class' =>
                            'form-control', 'placeholder' => __('موعد انتهاء العرض')]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name">{{ __('product.name') }}
                        </label>
                        <div>
                            {!! Form::text('name', $product->name, ['class' => 'form-control', 'placeholder' =>
                            __('product.name')]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">{{ __('product.description') }}
                        </label>
                        <div>
                            {!! Form::textarea('description', $product->description, ['class' => 'form-control',
                            'placeholder' => __('product.description')]) !!}
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="description">{{ __('product.ready_in') }}
                        </label>
                        <div>
                            {!! Form::number('ready_in', $product->ready_in, ['class' => 'form-control', 'placeholder' =>
                            __('product.ready_in')]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">{{ __('product.ready_to') }}
                        </label>
                        <div>
                            {!! Form::number('ready_to', $product->ready_to, ['class' => 'form-control', 'placeholder' =>
                            __('product.ready_to')]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">{{ __('product.max_additional_options') }}
                        </label>
                        <div>
                            {!! Form::number('max_additional_options', $product->max_additional_options, ['class' =>
                            'form-control', 'placeholder' => __('product.max_additional_options')]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <strong>{{ __('product.meals') }}</strong>
                        {!! Form::select('meals[]', $meals, $productMeals, ['id' => 'meal-id', 'class' => 'form-control',
                        'multiple']) !!}
                    </div>

                    <div class="form-group">
                        <strong>{{ __('الفروع') }}</strong>
                        {!! Form::select('branches[]', $branches, $productBranches, ['id' => 'branch-id', 'class' =>
                        'form-control', 'multiple']) !!}
                    </div>

                    <hr>
                    <h4 class="text-center">
                        {{ __('product.group_options') }}

                        <span id="add-add_group_options" class="btn btn-primary"> {{ __('product.add_group_options') }}
                        </span>
                    </h4>

                    <hr>

                    <div id="group_options-container">
                        <div id="old-group-deleted">
                        </div>
                        @forelse ($product->groupOptions as $group)

                            <div class="product_groups" id="product_groups_{{ $group->id }}">
                                <i class="fas fa-window-close" onclick="closeGroup({{ $group->id }},'old')"></i>
                                <input type="hidden" name="group[{{ $group->id }}][version]" value="old">
                                <div class="row">
                                    <div class="col-md">
                                        <div class="form-group">
                                            <input type="number" class="form-control" value="{{ $group->choices_numbers }}"
                                                name="group[{{ $group->id }}][choices_numbers]"
                                                placeholder="أقصي عدد من الأختيارات">
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="group[{{ $group->id }}][name]"
                                                value="{{ $group->name }}" placeholder="أسم الأضافة">
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input"
                                                {{ $group->required_options == 1 ? 'checked' : '' }}
                                                name="group[{{ $group->id }}][required_options]">
                                            <label for="" class="form-check-label">أجباري</label>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input"
                                                {{ $group->allow_incriments == 1 ? 'checked' : '' }}
                                                name="group[{{ $group->id }}][allow_incriments]">
                                            <label for="" class="form-check-label">عداد</label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h4 class="text-center btn btn-primary"
                                    onclick="myFunction({{ $group->id }},{{ sizeof($group->productGroupOption) }})">
                                    أضافة أختيار
                                </h4>
                                <div class="options-options-container" id="options-options-container_{{ $group->id }}">
                                    <div id="old-options-deleted">
                                    </div>
                                    @forelse ($group->productGroupOption as $option)

                                        <div class="options-cont-radious" id="options_container_rempove_{{ $option->id }}">
                                            <i class="fas fa-window-close" onclick="closeOption({{ $option->id }} , 'old')"></i>
                                            <input type="hidden" name="group[{{ $group->id }}][options][{{ $option->id }}][version]"
                                                value="old">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"
                                                            name="group[{{ $group->id }}][options][{{ $option->id }}][title]"
                                                            value="{{ $option->title }}" placeholder="اسم الأختيار">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input type="number" class="form-control"
                                                            name="group[{{ $group->id }}][options][{{ $option->id }}][price]"
                                                            value="{{ $option->price }}" placeholder="سعر الأختيار">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty

                                    @endforelse
                                </div>
                            </div>
                        @empty

                        @endforelse




                    </div>

                    <div class="col-sm-12 offset-sm-2">
                        {!! Form::submit(__('General.Save'), ['class' => 'btn btn-primary form-control']) !!}
                    </div>

                    {!! Form::Close() !!}
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
        <script type="text/javascript" src="{{ url('./Panel/adminAssets/bootstrap-filestyle.min.js') }}"></script>
        <script src="{{ url('./Panel/adminAssets/lou-multi/js/jquery.multi-select.js') }}"></script>
        <script type="text/javascript">
            // run pre selected options
            $('#meal-id').multiSelect();
            $('#branch-id').multiSelect();

            $(document).ready(function() {

                $('input[type=file]').change(function() {
                    console.log(this.name)
                    readURL(this)
                });

                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            $('#' + input.name).attr('src', e.target.result);
                        }

                        reader.readAsDataURL(input.files[0]);
                    }
                }
                $('input[type=file]').filestyle({
                    badge: true,
                    input: false,
                    text: '',
                    htmlIcon: '<i class="fas fa-cloud-upload-alt"></i>'
                });
                $('input[type=file] badge').text('');

                var groupCounter = `{{ sizeof($product->groupOptions) }}`;
                groupCounter++;
                $('#add-add_group_options').click(function() {

                    $('#group_options-container').prepend(

                        `
                                                <div class="product_groups" id ="product_groups_${groupCounter}">
                                                    <i class="fas fa-window-close" onclick="closeGroup(${groupCounter},'new')"></i>
                                                    <input type="hidden" name="group[${groupCounter}][version]" value="new">
                                                        <div class="row">
                                                            <div class="col-md">
                                                                <div class="form-group">
                                                                    <input type="number" class="form-control" name="group[${groupCounter}][choices_numbers]"
                                                                        placeholder="أقصي عدد من الأختيارات">
                                                                </div>
                                                            </div>
                                                            <div class="col-md">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" name="group[${groupCounter}][name]" placeholder="أسم الأضافة">
                                                                </div>
                                                            </div>
                                                            <div class="col-md">
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input" name="group[${groupCounter}][required_options]">
                                                                    <label for="" class="form-check-label">أجباري</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md">
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input" name="group[${groupCounter}][allow_incriments]">
                                                                    <label for="" class="form-check-label">عداد</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <h4 class="text-center btn btn-primary" onclick="myFunction(${groupCounter})">
                                                        أضافة أختيار
                                                        </h4>
                                                        <div class="options-options-container" id="options-options-container_${groupCounter}">
                                                            
                                                        </div>
                                                `
                    )

                    groupCounter++;
                });

                if ('{{ $product->product_offer }}' == 0) {
                    $('.offer_records').hide();
                } else {
                    $('.offer_records').show();
                }
                $('#product_offer').change(function() {
                    var pro_offer = $(this).children(":selected").attr("value");
                    if (pro_offer == 1) {
                        $('.offer_records').show();
                    } else {
                        $('.offer_records').hide();
                    }
                });

                $('#offer_expire')
                    .bootstrapMaterialDatePicker({
                        time: true,
                        clearButton: true,
                        format: 'Y-M-D HH:mm'
                    });
            });
            var optionCounter = 1;

            function myFunction(groupCounter, sizeofoptions = 0) {
                var newOptionCounter = optionCounter + sizeofoptions;
                $(`#options-options-container_${groupCounter}`).prepend(
                    `
                                        <div class="options-cont-radious" id="options_container_rempove_${newOptionCounter}">
                                            <i class="fas fa-window-close" onclick="closeOption(${newOptionCounter},'new')"></i>
                                            <input type="hidden" name="group[${groupCounter}][options][${newOptionCounter}][version]" value="new">
                                            <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="group[${groupCounter}][options][${newOptionCounter}][title]" placeholder="اسم الأختيار">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <input type="number" class="form-control" name="group[${groupCounter}][options][${newOptionCounter}][price]" placeholder="سعر الأختيار">
                                                            </div>
                                                    </div>
                                                    </div>
                                                </div> 
                                        </div>
                                            `
                );
                optionCounter++;
            }

            function closeGroup(groupCounter, old_new) {
                if (old_new == 'old') {
                    $(`#old-group-deleted`).append(
                        `
                                    <input type="hidden" name="oldDeletedGroups[${groupCounter}][id]" value="${groupCounter}">
                                    `
                    );
                }

                $('#product_groups_' + groupCounter).remove();
            }

            function closeOption(optionCounter, old_new) {

                if (old_new == 'old') {
                    $(`#old-options-deleted`).append(
                        `
                                    <input type="hidden" name="oldDeletedOptions[${optionCounter}][id]" value="${optionCounter}">
                                    `
                    );
                }
                $('#options_container_rempove_' + optionCounter).remove();
            }

        </script>


    @endsection
