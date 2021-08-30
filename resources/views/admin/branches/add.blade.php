@extends('admin.layout')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ url('./Panel/adminAssets/lou-multi/css/multi-select.css') }}">
    <script src="{{ url('./Panel/adminAssets/jquery-3.2.1.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.manue-active ul').removeClass('mm-show').find('a').removeClass('mm-active');
            $('#Restorants ul').addClass('mm-show').find('#BranchesCreat').addClass('mm-active');
        });

    </script>
    <style>
        .fa-cloud-upload-alt {
            font-size: 1em;
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

    </style>
    <div class="parts form container">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">{{ __('branch.add_branch') }}</h5>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="map-container">
                    <label>{{ __('branch.location') }} <span
                            style="color: red">{{ __('branch.(Drag the marker to locate the branch)') }}</span>
                    </label>
                    <div id="map" style="height: 300px;width: 100%"></div>
                </div>
                {!! Form::open(['method' => 'post', 'action' => 'Admin\BranchesController@store', 'files' => true]) !!}
                <div class="container">

                    <div class="map-container">
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    {{-- <label
                                        for="name">{{ __('branch.location_lat') }}</label> --}}
                                    {!! Form::text('location_lat', null, ['class' => 'form-control', 'id' => 'location_lat',
                                    'placeholder' => __('branch.location_lat')]) !!}
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    {{-- <label
                                        for="name">{{ __('branch.location_lon') }}</label> --}}
                                    {!! Form::text('location_lon', null, ['class' => 'form-control', 'id' => 'location_lon',
                                    'placeholder' => __('branch.location_lon')]) !!}
                                    {!! Form::hidden('from_restorant', false) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">{{ __('branch.restorant_id') }}
                        </label>
                        <div>
                            {!! Form::select('restorant_id', $restorants, null, ['class' => 'form-control', 'placeholder' =>
                            __('branch.restorant_id')]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">{{ __('branch.user_id') }}
                        </label>
                        <div>
                            {!! Form::select('user_id', $users, null, ['class' => 'form-control', 'placeholder' =>
                            __('branch.user_id')]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">{{ __('المنطقة') }}
                        </label>
                        <div>
                            {!! Form::select('area_id', $areas, null, ['class' => 'form-control', 'placeholder' =>
                            __('المنطقة')]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">{{ __('branch.name') }}
                        </label>
                        <div>
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('branch.name')])
                            !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name">{{ __('branch.location_name') }}
                        </label>
                        <div>
                            {!! Form::text('location_name', null, ['class' => 'form-control', 'placeholder' =>
                            __('branch.location_name')]) !!}
                        </div>
                    </div>
                    <h6 class="">{{ __('branch.Opened_time') }}</h6>
                    <div class="row">
                        <div class="col-md-5 text-center ">
                            <div class="form-group">
                                <div>
                                    {!! Form::text('open_from', null, ['id' => 'open_from', 'class' => 'form-control',
                                    'placeholder' => __('branch.open_from')]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 text-center ">{{ __('branch.To') }}</div>
                        <div class="col-md-5 text-center ">
                            <div class="form-group">
                                <div>
                                    {!! Form::text('open_to', null, ['id' => 'open_to', 'class' => 'form-control',
                                    'placeholder' => __('branch.open_to')]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <strong>{{ __('أيام العمل') }}</strong>
                        {!! Form::select('open_dayes[]', $week, [], ['id' => 'week-id', 'class' => 'form-control',
                        'multiple']) !!}
                    </div>
                    <div class="form-group">
                        <label for="name">{{ __('نبذه عن الفرع') }}
                        </label>
                        <div>
                            {!! Form::textarea('description', null, [
                            'class' => 'form-control',
                            'placeholder' => __('نبذه عن
                            الفرع'),
                            ]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="width:150px" for="name">{{ __('يوجد سفرة') }}</label>
                        {!! Form::checkbox('eat_in_branch', null, 1, ['class' => 'form-control', 'data-toggle' => 'toggle',
                        'data-onstyle' => 'primary']) !!}
                    </div>
                    <div class="form-group">
                        <label style="width:150px" for="name">{{ __('أمكانية التوصيل للسيارة') }}</label>
                        {!! Form::checkbox('delever_to_car', null, 1, ['class' => 'form-control', 'data-toggle' => 'toggle',
                        'data-onstyle' => 'primary']) !!}
                    </div>
                    <div class="multiupload-images">
                        <div class="form-group">
                            <label class="control-label mb-10 text-left">{{ __('branch.photos') }}</label>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div id="fine-uploader-gallery"></div>
                            </div>
                        </div>

                        <link href="{{ url('fine-uploader/fine-uploader-gallery.css') }}" rel="stylesheet">
                        <script src="{{ url('fine-uploader/fine-uploader.js') }}"></script>
                        <script type="text/template" id="qq-template-gallery">

                            <div class="qq-uploader-selector qq-uploader qq-gallery" qq-drop-area-text="Drop files here">
                                                            <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
                                                                <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                                                    class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
                                                            </div>
                                                            <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
                                                                <span class="qq-upload-drop-area-text-selector"></span>
                                                            </div>
                                                            <div class="qq-upload-button-selector qq-upload-button">
                                                                
                                                            </div>
                                                            <span class="qq-drop-processing-selector qq-drop-processing">
                                                                <span>Processing dropped files...</span>
                                                                <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
                                                            </span>
                                                            <ul class="qq-upload-list-selector qq-upload-list" role="region" aria-live="polite"
                                                                aria-relevant="additions removals">
                                                                <li>
                                                                    <span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>
                                                                    <div class="qq-progress-bar-container-selector qq-progress-bar-container">
                                                                        <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                                                            class="qq-progress-bar-selector qq-progress-bar"></div>
                                                                    </div>
                                                                    <span class="qq-upload-spinner-selector qq-upload-spinner"></span>
                                                                    <div class="qq-thumbnail-wrapper">
                                                                        <img class="qq-thumbnail-selector" qq-max-size="120" qq-server-scale>
                                                                    </div>
                                                                    <button type="button" class="qq-upload-cancel-selector qq-upload-cancel">X</button>
                                                                    <button type="button" class="qq-upload-retry-selector qq-upload-retry">
                                                                        <span class="qq-btn qq-retry-icon" aria-label="Retry"></span>
                                                                        Retry
                                                                    </button>

                                                                    <div class="qq-file-info">
                                                                        <div class="qq-file-name">
                                                                            <span class="qq-upload-file-selector qq-upload-file"></span>
                                                                            <span class="qq-edit-filename-icon-selector qq-edit-filename-icon"
                                                                                aria-label="Edit filename"></span>
                                                                        </div>
                                                                        <input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">
                                                                        <span class="qq-upload-size-selector qq-upload-size"></span>
                                                                        <button type="button" class="qq-btn qq-upload-delete-selector qq-upload-delete">
                                                                            <span class="qq-btn qq-delete-icon" aria-label="Delete"></span>
                                                                        </button>
                                                                        <button type="button" class="qq-btn qq-upload-pause-selector qq-upload-pause">
                                                                            <span class="qq-btn qq-pause-icon" aria-label="Pause"></span>
                                                                        </button>
                                                                        <button type="button" class="qq-btn qq-upload-continue-selector qq-upload-continue">
                                                                            <span class="qq-btn qq-continue-icon" aria-label="Continue"></span>
                                                                        </button>
                                                                    </div>
                                                                </li>
                                                            </ul>

                                                            <dialog class="qq-alert-dialog-selector">
                                                                <div class="qq-dialog-message-selector"></div>
                                                                <div class="qq-dialog-buttons">
                                                                    <button type="button" class="qq-cancel-button-selector">Close</button>
                                                                </div>
                                                            </dialog>

                                                            <dialog class="qq-confirm-dialog-selector">
                                                                <div class="qq-dialog-message-selector"></div>
                                                                <div class="qq-dialog-buttons">
                                                                    <button type="button" class="qq-cancel-button-selector">No</button>
                                                                    <button type="button" class="qq-ok-button-selector">Yes</button>
                                                                </div>
                                                            </dialog>

                                                            <dialog class="qq-prompt-dialog-selector">
                                                                <div class="qq-dialog-message-selector"></div>
                                                                <input type="text">
                                                                <div class="qq-dialog-buttons">
                                                                    <button type="button" class="qq-cancel-button-selector">Cancel</button>
                                                                    <button type="button" class="qq-ok-button-selector">Ok</button>
                                                                </div>
                                                            </dialog>
                                                        </div>

                                                    </script>
                    </div>
                </div>

                <div class="col-sm-12 offset-sm-2">
                    {!! Form::submit(__('General.Save'), ['class' => 'btn btn-primary form-control']) !!}
                </div>

                {!! Form::Close() !!}


            </div>
            <style>
                .custom-map-control-button {
                    appearance: button;
                    background-color: #fff;
                    border: 0;
                    border-radius: 2px;
                    box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
                    cursor: pointer;
                    margin: 10px;
                    padding: 0 0.5em;
                    height: 40px;
                    font: 400 18px Roboto, Arial, sans-serif;
                    overflow: hidden;
                }

                .custom-map-control-button:hover {
                    background: #ebebeb;
                }

            </style>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/ripples.min.js">
            </script>
            {{-- <script
                src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/material.min.js">
            </script> --}}
            {{-- <script type="text/javascript"
                src="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/js/material.min.js"></script>
            --}}
            <script type="text/javascript" src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>
            <script type="text/javascript" src="{{ url('./Panel/adminAssets/bootstrap-material-datetimepicker.js') }}">
            </script>
            <script type="text/javascript" src="{{ url('./Panel/adminAssets/bootstrap-filestyle.min.js') }}"></script>
            <script src="{{ url('./Panel/adminAssets/lou-multi/js/jquery.multi-select.js') }}"></script>
            <script>
                $('#week-id').multiSelect();
                $(document).ready(function() {
                    $('input[type=file]').filestyle({
                        badge: true,
                        input: false,
                        text: '',
                        htmlIcon: '<i class="fas fa-cloud-upload-alt"></i>'
                    });
                });
                var marker;

                function initMap() {
                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 13,
                        center: {
                            lat: 59.325,
                            lng: 18.070
                        }
                    });

                    marker = new google.maps.Marker({
                        map: map,
                        draggable: true,
                        animation: google.maps.Animation.DROP,
                        position: {
                            lat: 59.327,
                            lng: 18.067
                        }
                    });
                    marker.addListener('click', toggleBounce);

                    marker.addListener('drag', handleEvent);
                    marker.addListener('dragend', handleEvent);

                    infoWindow = new google.maps.InfoWindow();
                    const locationButton = document.createElement("button");
                    locationButton.textContent = "تحديد موقعك الحالى";
                    locationButton.classList.add("custom-map-control-button");
                    map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
                    locationButton.addEventListener("click", () => {
                        // Try HTML5 geolocation.
                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(
                                (position) => {
                                    const pos = {
                                        lat: position.coords.latitude,
                                        lng: position.coords.longitude,
                                    };
                                    // infoWindow.setPosition(pos);
                                    // infoWindow.setContent("تم تحديد موقعك");
                                    // infoWindow.open(map);
                                    map.setCenter(pos);
                                    marker.setPosition(pos);
                                    document.getElementById('location_lat').value = position.coords.latitude;
                                    document.getElementById('location_lon').value = position.coords.longitude;
                                },
                                () => {
                                    handleLocationError(true, infoWindow, map.getCenter());
                                }
                            );
                        } else {
                            // Browser doesn't support Geolocation
                            handleLocationError(false, infoWindow, map.getCenter());
                        }
                    });
                }

                function handleEvent(event) {
                    document.getElementById('location_lat').value = event.latLng.lat();
                    document.getElementById('location_lon').value = event.latLng.lng();
                }

                function toggleBounce() {
                    if (marker.getAnimation() !== null) {
                        marker.setAnimation(null);
                        console.log(marker);
                    } else {
                        marker.setAnimation(google.maps.Animation.BOUNCE);
                    }
                }
                $(document).ready(function() {

                    $('#open_to , #open_from')
                        .bootstrapMaterialDatePicker({
                            date: false,
                            shortTime: false,
                            format: 'HH:mm'
                        });


                });

            </script>

            <script async defer
                src="https://maps.google.com/maps/api/js?key=AIzaSyDelRc2qG_jkXp65asF97imzw_C3gdz0d4&signed_in=true&callback=initMap">
            </script>
            <script>
                var galleryUploader = new qq.FineUploader({
                    debug: true,
                    params: {
                        _token: '{{ csrf_token() }}'
                    },
                    element: document.getElementById("fine-uploader-gallery"),
                    template: 'qq-template-gallery',
                    request: {
                        endpoint: "{{ url('./imageuploads') }}",
                    },
                    session: {
                        endpoint: "{{ url('./getuploadedImages') }}"
                    },
                    thumbnails: {
                        placeholders: {
                            waitingPath: "{{ url('fine-uploader/placeholders/waiting-generic.png') }}",
                            notAvailablePath: "{{ url('fine-uploader/placeholders/not_available-generic.png') }}"
                        }
                    },
                    validation: {
                        allowedExtensions: ['jpeg', 'jpg', 'gif', 'png']
                    },
                    deleteFile: {
                        enabled: true, // defaults to false
                        endpoint: `{{ url('./imageuploadsdelete') }}`,
                    },
                    callbacks: {
                        onSessionRequestComplete: function(response, success, xhrOrXdr) {
                            for (var i = 0; i < response.length; i++) {
                                var obj = response[i];
                            }
                        },
                        onSubmitDelete: function(id) {
                            this.setDeleteFileParams({
                                _token: '{{ csrf_token() }}',
                                id: this.getUuid(id)
                            }, id);
                        },
                        onSubmit: function(id, fileName) {
                            var newParams = {
                                    newPar: 321
                                },
                                finalParams = {
                                    _token: '{{ csrf_token() }}'
                                };

                            qq.extend(finalParams, newParams);
                            this.setParams(finalParams);
                        },
                        onComplete: function(id, xhr, isError) {
                            this.setDeleteFileParams({
                                _token: '{{ csrf_token() }}',
                                id: this.getUuid(id)
                            }, id);
                        },
                        onDelete: function(id) {
                            var newParams = {
                                    newPar: 321
                                },
                                finalParams = {
                                    _token: '{{ csrf_token() }}',
                                    id: '33082e10-38e9-4888-8d95-19c34de63d03'
                                };
                            this.setDeleteFileParams({
                                _token: '{{ csrf_token() }}',
                                id: this.getUuid(id)
                            }, id);
                        },
                    }
                });

            </script>
        @endsection
