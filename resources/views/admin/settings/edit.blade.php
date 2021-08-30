@extends('admin.layout')
@section('content')
    <script src="{{ url('./Panel/adminAssets/jquery-3.2.1.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.manue-active ul').removeClass('mm-show').find('a').removeClass('mm-active');
            $('#Settingss ul').addClass('mm-show').find('#SettingssEdit').addClass('mm-active');
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

        .app-percent-cont {
            border: 2px solid #D80200;
            padding: 3em;
            margin: 3em;
            border-radius: 1em;
        }

    </style>
    <div class="parts form">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">{{ __('General.Settings') }}</h5>

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::open(['method' => 'patch', 'action' => ['Admin\settingsController@update', $data->id], 'files' =>
                true]) !!}
                <div class="row">
                    <div class="col-md">
                        <div class="position-relative row form-group">
                            <label for="name" class="col-sm-2 col-form-label">{{ __('setting.Address_Arabic') }}</label>
                            <div class="col-sm-10">
                                {!! Form::text('address_ara', $data->address_ara, ['class' => 'form-control', 'placeholder'
                                => __('setting.Address_Arabic')]) !!}
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="name" class="col-sm-2 col-form-label">{{ __('setting.Address_English') }} </label>
                            <div class="col-sm-10">
                                {!! Form::text('address_eng', $data->address_eng, ['class' => 'form-control', 'placeholder'
                                => __('setting.Address_English')]) !!}
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="name" class="col-sm-2 col-form-label">{{ __('General.E-mail') }} </label>
                            <div class="col-sm-10">
                                {!! Form::text('email', $data->email, ['class' => 'form-control', 'placeholder' =>
                                __('General.E-mail')]) !!}
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="name" class="col-sm-2 col-form-label">{{ __('General.Rasheed_Web_Site') }} </label>
                            <div class="col-sm-10">
                                {!! Form::text('rasheed_site', $data->rasheed_site, ['class' => 'form-control',
                                'placeholder' => __('General.Rasheed_Web_Site')]) !!}
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="name" class="col-sm-2 col-form-label">{{ __('General.Telephon') }} </label>
                            <div class="col-sm-10">
                                {!! Form::text('rasheed_telephon', $data->rasheed_telephon, ['class' => 'form-control',
                                'placeholder' => __('General.Telephon')]) !!}
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="name" class="col-sm-2 col-form-label">{{ __('setting.Phone') }}
                            </label>
                            <div class="col-sm-10">
                                {!! Form::text('phone', $data->phone, ['class' => 'form-control', 'placeholder' =>
                                __('setting.Phone')]) !!}
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="name" class="col-sm-2 col-form-label">{{ __('setting.Fax') }}
                            </label>
                            <div class="col-sm-10">
                                {!! Form::text('fax', $data->fax, ['class' => 'form-control', 'placeholder' =>
                                __('setting.Fax')]) !!}
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="name" class="col-sm-2 col-form-label">{{ __('setting.Location') }}
                            </label>
                            <div class="col-sm-10">
                                {!! Form::text('location', $data->location, ['class' => 'form-control', 'placeholder' =>
                                __('setting.Location')]) !!}
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="name" class="col-sm-2 col-form-label">{{ __('الرقم الضريبي') }}
                            </label>
                            <div class="col-sm-10">
                                {!! Form::text('tax_number', $data->tax_number, ['class' => 'form-control', 'placeholder' =>
                                __('الرقم الضريبي')]) !!}
                            </div>
                        </div>



                        <div class="position-relative row form-group">
                            <label for="name" class="col-sm-2 col-form-label">{{ __('setting.Facebook') }}
                            </label>
                            <div class="col-sm-10">
                                {!! Form::text('facebook', $data->facebook, ['class' => 'form-control', 'placeholder' =>
                                __('setting.Facebook')]) !!}
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="name" class="col-sm-2 col-form-label">{{ __('واتساب') }}
                            </label>
                            <div class="col-sm-10">
                                {!! Form::text('whatsapp', $data->whatsapp, ['class' => 'form-control', 'placeholder' =>
                                __('واتساب')]) !!}
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="name" class="col-sm-2 col-form-label">{{ __('setting.Twitter') }}
                            </label>
                            <div class="col-sm-10">
                                {!! Form::text('twitter', $data->twitter, ['class' => 'form-control', 'placeholder' =>
                                __('setting.Twitter')]) !!}
                            </div>
                        </div>


                        <div class="position-relative row form-group">
                            <label for="name" class="col-sm-2 col-form-label">{{ __('setting.Instgram') }}
                            </label>
                            <div class="col-sm-10">
                                {!! Form::text('instgram', $data->instgram, ['class' => 'form-control', 'placeholder' =>
                                __('setting.Instgram')]) !!}
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="name" class="col-sm-2 col-form-label">{{ __('رابط جوجل بلاي') }}
                            </label>
                            <div class="col-sm-10">
                                {!! Form::text('google_play_link', $data->google_play_link, ['class' => 'form-control',
                                'placeholder' => __('رابط جوجل بلاي')]) !!}
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="name" class="col-sm-2 col-form-label">{{ __('رابط أب ستور') }}
                            </label>
                            <div class="col-sm-10">
                                {!! Form::text('appstore_link', $data->appstore_link, ['class' => 'form-control',
                                'placeholder' => __('رابط أب ستور')]) !!}
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="name" class="col-sm-2 col-form-label">{{ __('رابط الفيديو الرئيسي') }}
                            </label>
                            <div class="col-sm-10">
                                {!! Form::text('main_vedio_link', $data->main_vedio_link, ['class' => 'form-control',
                                'placeholder' => __('رابط الفيديو الرئيسي')]) !!}
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="name" class="col-sm-2 col-form-label">{{ __('setting.Products') }}
                            </label>
                            <div class="col-sm-10">
                                {!! Form::number('products', $data->products, ['class' => 'form-control', 'placeholder' =>
                                __('setting.Products')]) !!}
                            </div>
                        </div>

                        <div class="app-percent-cont">
                            <h5 class="card-title">{{ __('نسبة التطبيق') }} </h5>
                            <div class="row">
                                <div class="col-md">
                                    <div class="position-relative row form-group">
                                        <label for="name" class="col-sm-2 col-form-label">{{ __('نسبة') }}
                                        </label>
                                        <div class="col-sm-10">
                                            {!! Form::number('olum_percentage', $data->olum_percentage, ['step' => 'any',
                                            'id' => 'olum_percentage', 'class' => 'form-control', 'placeholder' =>
                                            __('نسبة')]) !!}
                                        </div>
                                    </div>
                                    <div class="position-relative row form-group">
                                        <label for="name" class="col-sm-2 col-form-label">{{ __('مبلغ') }}
                                        </label>
                                        <div class="col-sm-10">
                                            {!! Form::number('olum_price', $data->olum_price, ['step' => 'any', 'id' =>
                                            'olum_price', 'class' => 'form-control', 'placeholder' => __('مبلغ')]) !!}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="app-percent-cont">
                            <h5 class="card-title">{{ __('الضريبة') }} </h5>
                            <div class="row">
                                <div class="col-md">
                                    <div class="position-relative row form-group">
                                        <label for="name" class="col-sm-2 col-form-label">{{ __('نسبة') }}
                                        </label>
                                        <div class="col-sm-10">
                                            {!! Form::number('vat_percentage', $data->vat_percentage, ['step' => 'any', 'id'
                                            => 'vat_percentage', 'class' => 'form-control', 'placeholder' => __('نسبة')])
                                            !!}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>



                    <div class="col-md">
                        <div class="container">
                            <h6 class="card-title">بيانات تواصل معنا</h6>
                            <div class="contactus-container">
                                <div class="position-relative row form-group">
                                    <label for="name" class="col-sm-2 col-form-label">{{ __('عنوان') }} </label>
                                    <div class="col-sm-10">
                                        {!! Form::text('title', $data->title, ['class' => 'form-control', 'placeholder' =>
                                        __('عنوان')]) !!}
                                    </div>
                                </div>
                                <div class="position-relative row form-group">
                                    <label for="name" class="col-sm-2 col-form-label">{{ __('وصف') }} </label>
                                    <div class="col-sm-10">
                                        {!! Form::textarea('description', $data->description, ['rows' => '2', 'cols' => '2',
                                        'class' => 'form-control', 'placeholder' => __('وصف')]) !!}
                                    </div>
                                </div>
                                <div class="position-relative row form-group">
                                    <label for="name" class="col-sm-2 col-form-label">{{ __('General.E-mail') }} </label>
                                    <div class="col-sm-10">
                                        {!! Form::text('email_contact_us_1', $data->email_contact_us_1, ['class' =>
                                        'form-control', 'placeholder' => __('General.E-mail')]) !!}
                                    </div>
                                </div>
                                <div class="position-relative row form-group">
                                    <label for="name" class="col-sm-2 col-form-label">{{ __('General.E-mail') }} </label>
                                    <div class="col-sm-10">
                                        {!! Form::text('email_contact_us_2', $data->email_contact_us_2, ['class' =>
                                        'form-control', 'placeholder' => __('General.E-mail')]) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="name" class="col-sm-2 col-form-label">{{ __('setting.Phone') }}
                                </label>
                                <div class="col-sm-10">
                                    {!! Form::text('phone_contact_us_1', $data->phone_contact_us_1, ['class' =>
                                    'form-control', 'placeholder' => __('setting.Phone')]) !!}
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="name" class="col-sm-2 col-form-label">{{ __('setting.Phone') }}
                                </label>
                                <div class="col-sm-10">
                                    {!! Form::text('phone_contact_us_2', $data->phone_contact_us_2, ['class' =>
                                    'form-control', 'placeholder' => __('setting.Phone')]) !!}
                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <h6 class="card-title">ما هوه أولم</h6>
                            <h5>وصف كبير</h5>
                            <div class="form-group">
                                {!! Form::textarea('olum_decription', $data->olum_decription, ['rows' => '6', 'cols' => '2',
                                'class' => 'form-control', 'placeholder' => __('وصف')]) !!}
                            </div>
                            <h5>كروت ما هوه أولم</h5>
                            <br>
                            <hr>

                            <div class="row">
                                <div class="col-md">
                                    <h6 class="text-center">
                                        الكارت الأول
                                    </h6>
                                    <div class="card">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md text-center">
                                                    {!! Form::file('olum_card_1_photo', null, ['class' => 'form-control',
                                                    'placeholder' => __('type.olum_card_1_photo')]) !!}
                                                </div>
                                                <div class="col-md text-center">
                                                    <img id="olum_card_1_photo" src="{{ url('/images/noimg.jpg') }}"
                                                        style="width: 100%;object-fit: cover;" alt="your image"
                                                        width="200" /><br />

                                                </div>
                                            </div>
                                            {!! Form::text('olum_card_1_title', $data->olum_card_1_title, ['class' =>
                                            'form-control', 'placeholder' => __('عنوان الكارت الأول')]) !!}
                                            {!! Form::textarea('olum_card_1_description', $data->olum_card_1_description,
                                            ['rows' => '6', 'cols' => '2', 'class' => 'form-control', 'placeholder' =>
                                            __('وصف الكارت الأول')]) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <h6 class="text-center">
                                        الكارت الثاني
                                    </h6>
                                    <div class="card">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md text-center">
                                                    {!! Form::file('olum_card_2_photo', null, ['class' => 'form-control',
                                                    'placeholder' => __('type.olum_card_2_photo')]) !!}
                                                </div>
                                                <div class="col-md text-center">
                                                    <img id="olum_card_2_photo" src="{{ url('/images/noimg.jpg') }}"
                                                        style="width: 100%;object-fit: cover;" alt="your image"
                                                        width="200" /><br />

                                                </div>
                                            </div>
                                            {!! Form::text('olum_card_2_title', $data->olum_card_2_title, ['class' =>
                                            'form-control', 'placeholder' => __('عنوان الكارت الثاني')]) !!}
                                            {!! Form::textarea('olum_card_2_description', $data->olum_card_2_description,
                                            ['rows' => '6', 'cols' => '2', 'class' => 'form-control', 'placeholder' =>
                                            __('وصف الكارت الثاني')]) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <h6 class="text-center">
                                        الكارت الثالث
                                    </h6>
                                    <div class="card">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md text-center">
                                                    {!! Form::file('olum_card_3_photo', null, ['class' => 'form-control',
                                                    'placeholder' => __('type.olum_card_3_photo')]) !!}
                                                </div>
                                                <div class="col-md text-center">
                                                    <img id="olum_card_3_photo" src="{{ url('/images/noimg.jpg') }}"
                                                        style="width: 100%;object-fit: cover;" alt="your image"
                                                        width="200" /><br />

                                                </div>
                                            </div>
                                            {!! Form::text('olum_card_3_title', $data->olum_card_3_title, ['class' =>
                                            'form-control', 'placeholder' => __('عنوان الكارت الثالث')]) !!}
                                            {!! Form::textarea('olum_card_3_description', $data->olum_card_3_description,
                                            ['rows' => '6', 'cols' => '2', 'class' => 'form-control', 'placeholder' =>
                                            __('وصف الكارت الثالث')]) !!}
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="col-sm-12 offset-sm-2">
                        {!! Form::submit(__('General.Save'), ['class' => 'btn btn-primary form-control']) !!}
                    </div>

                    {!! Form::Close() !!}
                </div>
            </div>
            <script type="text/javascript" src="{{ url('./Panel/adminAssets/bootstrap-filestyle.min.js') }}"></script>
            <script>
                $(document).ready(function() {

                    $('#olum_percentage').change(function() {
                        $('#olum_price').val(0.0);
                    });

                    $('#olum_price').change(function() {
                        $('#olum_percentage').val(0.0);
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

            </script>
        @endsection
