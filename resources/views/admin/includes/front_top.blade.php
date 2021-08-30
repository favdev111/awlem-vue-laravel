    <!--------------------------- NAVBAR START ------------------------------>
    <div class="container-fluid nav-container" id="nave-container">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="{{ url('/') }}">{{ __('General.ELRASHEED') }}</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="fas fa-bars"></i>
                    </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item" id="home-nav">
                            <a class="nav-link" href="{{ url('/') }}">{{ __('General.Home') }}<span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item" id="product-nav">
                            <a class="nav-link" href="{{ url('/product') }}"
                                tabindex="-1">{{ __('product.Products') }}</a>
                        </li>
                        <li class="nav-item" id="vehicle-nav">
                            <a class="nav-link" href="{{ url('/vehicle') }}"
                                tabindex="-1">{{ __('vehicle.Vehicles') }}</a>
                        </li>
                        <li class="nav-item" id="article-nav">
                            <a class="nav-link" href="{{ url('/article') }}"
                                tabindex="-1">{{ __('article.Articles') }}</a>
                        </li>
                        <li class="nav-item" id="brand-nav">
                            <a class="nav-link" href="{{ url('/brand') }}" tabindex="-1">{{ __('brand.Brands') }}</a>
                        </li>
                        <li class="nav-item" id="contactUs-nav">
                            <a class="nav-link" href="{{ url('/contactUs') }}"
                                tabindex="-1">{{ __('General.Contact_Us') }}</a>
                        </li>
                        @if ($settingsFront['language'] == 1)
                        <a href="{{ url('/?lang=en') }}" class="btn lang-btn"> {{ __('General.EN') }} </a>
                    @else
                        <a href="{{ url('/?lang=ar') }}" class="btn lang-btn"> {{ __('General.AR') }}</a>
                    @endif

                    </ul>
                  

                </div>
            </nav>
        </div>
    </div>
    <!--------------------------- NAVBAR END ------------------------------>
