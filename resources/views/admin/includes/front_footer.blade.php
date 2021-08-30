 <!--------------------------- FOOTER START ------------------------------>
 <footer class="container-fluid">
     <div class="container">
         <div class="row">
             <div class="col-lg-3 col-md-6 col-sm-12 footer-logo">
                 <p> {{ __('General.ELRASHEED') }} </p>
             </div>
             <div class="col-lg-3 col-md-6 col-sm-12 footer-pages">
                 <h4> {{ __('General.Quick_links') }} </h4>
                 <div class="pages-links">
                     <a href="{{ url('/product') }}">{{ __('product.Products') }}</a>
                     <a href="{{ url('/brand') }}">{{ __('brand.Brands') }}</a>
                     <a href="{{ url('/vehicle') }}">{{ __('vehicle.Vehicles') }}</a>
                     <a href="{{ url('/article') }}">{{ __('article.Articles') }}</a>
                 </div>
             </div>
             <div class="col-lg-3 col-md-6 col-sm-12 footer-contact-info">
                 <h4> {{ __('General.Contact_Us') }} </h4>
                 <div class="company-info">
                     <div class="part">
                         <img src="{{ url('frontEnd/assets/css/imgs/location-icon.svg') }}" alt="">
                         <p>
                             @php
                             $field_presenter = 'address_' . $settingsFront['langType3'] ;
                             echo $settingData['settings']->$field_presenter;
                             @endphp
                     </div>
                     <div class="part">
                         <img src="{{ url('frontEnd/assets/css/imgs/tele-icon.svg') }}" alt="">
                         <p>{{ $settingData['settings']->phone }}</p>
                     </div>
                     <div class="part">
                         <img src="{{ url('frontEnd/assets/css/imgs/phone-icon.svg') }}" alt="">
                         <p>{{ $settingData['settings']->fax }}</p>
                     </div>
                 </div>
             </div>
             <div class="col-lg-3 col-md-6 col-sm-12 footer-sub-and-social">
                 <div class="top-sub-section">
                     <h4> {{ __('General.Register_for_the_magazine') }} </h4>
                     <p>{{ __('General.Subscribe_to_get_our_latest_news') }}</p>
                     @if (count($errors) > 0)
                         <div class="alert alert-danger">
                             <ul>
                                 @foreach ($errors->all() as $error)
                                     <li>{{ $error }}</li>
                                 @endforeach
                             </ul>
                         </div>
                     @endif
                     {!! Form::open(['method' => 'post', 'action' => 'Admin\FollowersController@store']) !!}
                     <div class="input-group">

                         {!! Form::text('email', null, ['class' => 'form-control email-input', 'placeholder' =>
                         __('General.E-mail'), 'aria-label' => "Recipient's username", 'aria-describedby' =>
                         'basic-addon2']) !!}
                         <div class="input-group-append">
                             {!! Form::submit(__('General.Subscribe'), ['class' => 'btn input-group-text yellow-btn', 'id' =>
                             'basic-addon2']) !!}

                         </div>

                     </div>
                     {!! Form::Close() !!}
                 </div>
                 <div class="social-links">
                     <a href="{{ $settingData['settings']->facebook }}" target="blank"><i
                             class="fab fa-facebook-f"></i></a>
                     <a href="{{ $settingData['settings']->twitter }}" target="blank"><i class="fab fa-twitter"></i></a>

                     <a href="{{ $settingData['settings']->instgram }}" target="blank"><i
                             class="fab fa-instagram"></i></a>
                 </div>
             </div>
         </div>
     </div>
     <div class="row copyright">
         <p> {{ __('General.All_rights_reserved_to_Simi_Colon_Software_Company') }} </p>
     </div>
 </footer>
 <!--------------------------- FOOTER END ------------------------------>
