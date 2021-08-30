<link rel="stylesheet" type="text/css" href="{{ url('./Panel/adminAssets/lou-multi/css/multi-select.css') }}">
<script src="{{ url('./Panel/adminAssets/jquery-3.2.1.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.manue-active ul').removeClass('mm-show').find('a').removeClass('mm-active');
        $('#Restorants ul').addClass('mm-show').find('#BranchesIndex').addClass('mm-active');
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

                {!! Form::open(['method' => 'post', 'action' => 'Admin\ProductsController@storeFromBranch', 'files' =>
                true]) !!}
                <div class="container">

                    <div class="form-group">
                        <label for="name">{{ __('product.photo') }}</label>
                        <div class="row">
                            <div class="col-md text-center">
                                {!! Form::file('photo', null, ['class' => 'form-control', 'placeholder' =>
                                __('restorant.photo')]) !!}
                            </div>
                            <div class="col-md text-center">
                                <img id="photo" src="{{ url('/images/noimg.jpg') }}" style="width: 38%;object-fit: cover;"
                                    alt="your image" width="100" /><br />

                            </div>
                        </div>


                    </div>

                    {!! Form::hidden('restorant_id', $restorantId) !!}
                 
                    <div class="form-group">
                        <label for="description">{{ __('product.price') }}
                        </label>
                        <div>
                            {!! Form::number('price', null, ['step' => 'any','class' => 'form-control', 'placeholder' =>
                            __('product.price')]) !!}
                            {!! Form::hidden('branchId', $branchId) !!}
                        </div>
                    </div>

                 

                    <div class="form-group">
                        <label for="name">{{ __('product.name') }}
                        </label>
                        <div>
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('product.name')])
                            !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">{{ __('product.description') }}
                        </label>
                        <div>
                            {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' =>
                            __('product.description')]) !!}
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="description">{{ __('product.ready_in') }}
                        </label>
                        <div>
                            {!! Form::number('ready_in', null, ['class' => 'form-control', 'placeholder' =>
                            __('product.ready_in')]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">{{ __('product.ready_to') }}
                        </label>
                        <div>
                            {!! Form::number('ready_to', null, ['class' => 'form-control', 'placeholder' =>
                            __('product.ready_to')]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">{{ __('product.max_additional_options') }}
                        </label>
                        <div>
                            {!! Form::number('max_additional_options', null, ['class' => 'form-control', 'placeholder' =>
                            __('product.max_additional_options')]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <strong>{{ __('product.meals') }}</strong>
                        {!! Form::select('meals[]', $meals, [], ['id' => 'meal-id', 'class' => 'form-control', 'multiple'])
                        !!}
                    </div>

                    <hr>
                    <h4 class="text-center">
                        {{ __('product.group_options') }}

                        <span id="add-add_group_options" class="btn btn-primary"> {{ __('product.add_group_options') }}
                        </span>
                    </h4>

                    <hr>

                    <div id="group_options-container">




                    </div>

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

            var groupCounter = 0;
            $('#add-add_group_options').click(function() {

                $('#group_options-container').prepend(

                    `
                                <div class="product_groups" id ="product_groups_${groupCounter}">
                                    <i class="fas fa-window-close" onclick="closeGroup(${groupCounter})"></i>
                                        <div class="row">
                                            <div class="col-md">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" name="group[${groupCounter}][choices_numbers]"
                                                        placeholder="أقصي عدد من الأختيارات" required>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="group[${groupCounter}][name]" placeholder="أسم الأضافة" required>
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
           
        });
        var optionCounter = 0;

        function myFunction(groupCounter) {
            $(`#options-options-container_${groupCounter}`).prepend(
                `
                                <div class="options-cont-radious" id="options_container_rempove_${optionCounter}">
                                    <i class="fas fa-window-close" onclick="closeOption(${optionCounter})"></i>
                                    <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                   <input type="text" class="form-control" name="group[${groupCounter}][options][${optionCounter}][title]" placeholder="اسم الأختيار" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" name="group[${groupCounter}][options][${optionCounter}][price]" placeholder="سعر الأختيار" required>
                                                 </div>
                                            </div>
                                         </div>
                                        </div> 
                                </div>
                                    `
            );
            optionCounter++;
        }

        function closeGroup(groupCounter) {
            $('#product_groups_' + groupCounter).remove();
        }

        function closeOption(optionCounter) {
            $('#options_container_rempove_' + optionCounter).remove();
        }

    </script>


@endsection
