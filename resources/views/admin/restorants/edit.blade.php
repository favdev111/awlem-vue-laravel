@extends('admin.layout')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ url('./Panel/adminAssets/lou-multi/css/multi-select.css') }}">
    <script src="{{ url('./Panel/adminAssets/jquery-3.2.1.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.manue-active ul').removeClass('mm-show').find('a').removeClass('mm-active');
            $('#Restorants ul').addClass('mm-show').find('#RestorantsCreat').addClass('mm-active');
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

        .add_feature_meal {
            font-size: 1.5em;
            cursor: pointer;
            color: #D80200;
        }


        .ms-list {
            padding: 1em !important;
        }

        .ms-optgroup-label {
            color: #D80200 !important;
        }

    </style>

    <div class="parts form container">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">{{ __('restorant.add_restorant') }}</h5>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::open(['method' => 'Patch', 'action' => ['Admin\RestorantsController@update', $restorant->id],
                'files' => true]) !!}
                <div class="container">
                    <div class="form-group">
                        <label for="name">{{ __('restorant.photo') }}</label>
                        <div class="row">
                            <div class="col-md text-center">
                                {!! Form::file('photo', null, ['class' => 'form-control', 'placeholder' =>
                                __('restorant.photo')]) !!}
                            </div>
                            <div class="col-md text-center">
                                <img id="photo"
                                    src="{{ $restorant->photo ? url($restorant->photo) : url('/images/noimg.jpg') }}"
                                    style="width: 38%;object-fit: cover;" alt="your image" width="100" /><br />

                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="name">{{ __('restorant.name') }}
                        </label>
                        <div>
                            {!! Form::text('name', $restorant->name, ['required' => 'required','class' => 'form-control', 'placeholder' =>
                            __('restorant.name')]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name">{{ __('أشهر الوجبات') }}
                        </label> &nbsp&nbsp
                        {{-- <br> --}}
                        <i title="أضافة أسم وجبة شهيره بالمطعم" class="fas fa-plus-square add_feature_meal"></i>
                        <div class="row featured_meals_container">
                            @php
                                $featuredMeals = explode(' , ', $restorant->featured_meals);
                                $sizeOfFeaturedMeals = sizeof($featuredMeals);
                            @endphp
                            @forelse ($featuredMeals as $key => $featuredMeal)
                                @if ($key == 0)
                                    <div class="col-md-3">
                                        <input type="text" required class="form-control" value="{{ $featuredMeal }}"
                                            name="featured_meals[{{ $key }}]" placeholder="الوجبات المشهوره">

                                    </div>
                                @else
                                    <div class="col-md-3" id="featerd_meal_{{ $key }}">
                                        <input type="text" required class="form-control" value="{{ $featuredMeal }}"
                                            name="featured_meals[{{ $key }}]" placeholder="الوجبات المشهوره">
                                        <i class="fas fa-times-circle"
                                            style="position: absolute;cursor: pointer;color: #D80200;top: 9px;left: 20px;font-size: 19px;"
                                            onclick="removeFeaturedMealInput({{ $key }})"></i>
                                    </div>
                                @endif

                            @empty
                                <div class="col-md-3">
                                    <input type="text" required class="form-control" name="featured_meals[0]"
                                        placeholder="الوجبات المشهوره">

                                </div>
                            @endforelse


                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name">{{ __('restorant.user_id') }}
                        </label>
                        <div>
                            {!! Form::select('user_id', $users, $restorant->user_id, ['required' => 'required','class' => 'form-control',
                            'placeholder' => __('restorant.user_id')]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name">{{ __('restorant.category_id') }}
                        </label>
                        <div>
                            {!! Form::select('category_id', $categories, $restorant->category_id, ['required' => 'required','class' =>
                            'form-control', 'placeholder' => __('restorant.category_id')]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <strong>{{ __('restorant.types') }}</strong>
                        {!! Form::select('types[]', $types, $restorantTypes, ['required' => 'required','id' => 'type-id', 'multiple']) !!}
                    </div>
                    <div class="form-group">
                        <strong>{{ __('restorant.areas') }}</strong>
                        {!! Form::select('areas[]', $newreRegionArr, $restorantAreas, ['required' => 'required','id' => 'area-id', 'multiple']) !!}
                    </div>
                    @if (Auth::user()->hasRole('Super Admin'))
                        <div class="form-group">
                            <label style="width:150px" for="name">{{ __('restorant.featured') }}</label>
                            {!! Form::checkbox('featured', null, $restorant->featured, ['class' => 'form-control',
                            'data-toggle' => 'toggle', 'data-onstyle' => 'primary']) !!}
                        </div>

                    @endif

                    <div class="form-group">
                        <label style="width:150px" for="name">{{ __('متاح') }}</label>
                        {!! Form::checkbox('accepted', null, $restorant->accepted, ['class' => 'form-control', 'data-toggle' => 'toggle',
                        'data-onstyle' => 'primary']) !!}
                    </div>

                </div>

                <div class="col-sm-12 offset-sm-2">
                    {!! Form::submit(__('General.Save'), ['class' => 'btn btn-primary form-control']) !!}
                </div>

                {!! Form::Close() !!}


            </div>

            <script type="text/javascript" src="{{ url('./Panel/adminAssets/bootstrap-filestyle.min.js') }}"></script>
            <script src="{{ url('./Panel/adminAssets/lou-multi/js/jquery.multi-select.js') }}"></script>
            <script src="{{ url('./Panel/adminAssets/jquery.quicksearch.js') }}"></script>
            <script type="text/javascript">
                // run pre selected options
                $('#type-id').multiSelect();
                $('#area-id').multiSelect({
                    selectableHeader: "<input type='text' class='search-input form-control' autocomplete='off' placeholder='ابحث هنا عن الأحياء'>",
                    selectionHeader: "<input type='text' class='search-input form-control' autocomplete='off' placeholder='ابحث هنا عن الأحياء'>",
                    afterInit: function(ms) {
                        var that = this,
                            $selectableSearch = this.$selectableUl.prev(),
                            $selectionSearch = this.$selectionUl.prev(),
                            selectableSearchString = '#' + this.$container.attr('id') +
                            ' .ms-elem-selectable:not(.ms-selected)',
                            selectionSearchString = '#' + this.$container.attr('id') +
                            ' .ms-elem-selection.ms-selected';

                        this.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                            .on('keydown', function(e) {
                                if (e.which === 40) {
                                    this.$selectableUl.focus();
                                    return false;
                                }
                            });

                        this.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                            .on('keydown', function(e) {
                                if (e.which == 40) {
                                    this.$selectionUl.focus();
                                    return false;
                                }
                            });
                    },
                    afterSelect: function() {
                        this.qs1.cache();
                        this.qs2.cache();
                    },
                    afterDeselect: function() {
                        this.qs1.cache();
                        this.qs2.cache();
                    }
                });

            </script>
            <script>
                var equal_featured_counter = 3;
                $(document).ready(function() {

                    var featured_counter = '{{ $sizeOfFeaturedMeals }}';

                    if (featured_counter == 0) {
                        featured_counter = 1;
                    }
                    $('.add_feature_meal').click(function() {
                        if (featured_counter <= equal_featured_counter) {
                            $('.featured_meals_container').prepend(
                                `
                                                        <div class="col-md-3" id="featerd_meal_${featured_counter}">
                                                            <input type="text" class="form-control" name="featured_meals[${featured_counter}]" placeholder="الوجبات المشهوره">
                                                            <i class="fas fa-times-circle" style="position: absolute;cursor: pointer;color: #D80200;top: 9px;left: 20px;font-size: 19px;" onclick="removeFeaturedMealInput(${featured_counter})"></i>
                                                        </div>
                                                            `
                            );
                            featured_counter++;
                        } else {
                            alert('الحد الأقصي أربع وجبات مشهورة');
                        }


                    });


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

                });

                function removeFeaturedMealInput(counter2) {
                    equal_featured_counter++;
                    $('#featerd_meal_' + counter2).remove();

                }

            </script>
        @endsection
