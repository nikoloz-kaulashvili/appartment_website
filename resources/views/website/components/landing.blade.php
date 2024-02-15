@extends('website.index')
@section('content')
    <div class="main">
        <div class="minsection">
            <!-- Slider-Start -->
            <div class="swiper mySwiper main-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide cover-background" style="background-image: url(/website/images/banner1.png)">
                    </div>
                    <div class="swiper-slide cover-background" style="background-image: url(/website/images/banner2.png)">
                    </div>
                    <div class="swiper-slide cover-background" style="background-image: url(/website/images/banner3.png)">
                    </div>
                </div>
                <div class="po-ab-se">
                    <div class="container">
                        <div class="content-slider">
                            <h1>Search Your Next Home</h1>
                            <h4>
                                Find new & featured property located in your local city.
                            </h4>
                            <div class="row justify-content-center mt-50">
                                <div class="col-xl-10 col-lg-11 col-md-12">
                                    <div class="full_search_box">
                                        <form action="{{ route('main.appartments') }}" method="get">
                                            <div class="search_hero_wrapping">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                                        <div class="form-group">
                                                            <label>ქალაქი</label>
                                                            <div class="input-with-icon">
                                                                <select id="location" name="city" class="form-control">
                                                                    <option value="">&nbsp;</option>
                                                                    @foreach ($cities as $city)
                                                                        <option value="{{ $city->id }}">
                                                                            {{ $city->name_ge }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                                        <div class="form-group">
                                                            <label>შეთანხმების ტიპი</label>
                                                            <div class="input-with-icon">
                                                                <select id="ptypes" name="agreement_type"
                                                                    class="form-control">
                                                                    <option value="">&nbsp;</option>
                                                                    <option value="იყიდება">იყიდება</option>
                                                                    <option value="გირავდება">გირავდება</option>
                                                                    <option value="ქირავდება">ქირავდება</option>
                                                                    <option value="ქირავდება დღიურდა">ქირავდება დღიურდა
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                                        <div class="form-group none">
                                                            <label>უძრავი ქონების ტიპი</label>
                                                            <div class="input-with-icon">
                                                                <select id="price" name="property_type"
                                                                    class="form-control">
                                                                    <option value="">&nbsp;</option>
                                                                    <option value="ბინები">ბინები</option>
                                                                    <option value="სახლელბი & აგარაკები">სახლი ან აგარაკი
                                                                    </option>
                                                                    <option value="კომერციული ფართები">კომერციული ფართი
                                                                    </option>
                                                                    <option value="მიწის ნაკვეთები">მიწის ნაკვეთი</option>
                                                                    <option value="სასტუმროები">სასტუმრო</option>
                                                                    <option value="ავტოსადგომები">ავტოსადგომი</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-12 small-padd">
                                                        <div class="border-none form-group none">
                                                            <button class="btn search-btn">ძებნა</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <!-- Slider-End -->
            <!--Popular Properties Start-->
            <section class="pt-90 pb-60 pop-pro pop-pro-mar categories">
                <div class="container">
                    <div class="mb-40 row">
                        <div class="col-md-5">
                            <div class="heading-t fadeInUp animated">
                                <h2>კატეგორიები</h2>
                            </div>
                        </div>

                    </div>

                    <div class="p-0 shadow-none tab-content" id="pills-tabContent">
                        <div class="tab-pane fade active show" id="pills-all" role="tabpanel"
                            aria-labelledby="pills-all-tab">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="min-pro-box">
                                        <a href="/appartments?property_type=ბინები">
                                            <img src="/website/images/1.jpg" alt="" class="bg-pro-i" />
                                        </a>
                                        <div class="min-box-t">
                                            <h3>
                                                <a href="/appartments?property_type=ბინები">ბინები</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="min-pro-box">
                                        <a href="/appartments?property_type=სახლები & აგარაკები">
                                            <img src="/website/images/2.jpeg" alt="" class="bg-pro-i" />
                                        </a>
                                        <div class="min-box-t">
                                            <h3>
                                                <a href="/appartments?property_type=სახლები & აგარაკები">სახლები &
                                                    აგარაკები</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="min-pro-box">
                                        <a href="/appartments?property_type=კომერციული ფართები">
                                            <img src="/website/images/3.jpg" alt="" class="bg-pro-i" />
                                        </a>
                                        <div class="min-box-t">
                                            <h3>
                                                <a href="/appartments?property_type=კომერციული ფართები">კომერციული
                                                    ფართები</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="min-pro-box">
                                        <a href="/appartments?property_type=მიწის ნაკვეთები">
                                            <img src="/website/images/4.jpg" alt="" class="bg-pro-i" />
                                        </a>
                                        <div class="min-box-t">
                                            <h3>
                                                <a href="/appartments?property_type=მიწის ნაკვეთები">მიწის ნაკვეთები</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="min-pro-box">
                                        <a href="/appartments?property_type=სასტუმროები">
                                            <img src="/website/images/5.jpg" alt="" class="bg-pro-i" />
                                        </a>
                                        <div class="min-box-t">
                                            <h3>
                                                <a href="/appartments?property_type=სასტუმროები">სასტუმროები</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="min-pro-box">
                                        <a href="/appartments?property_type=ავტოსადგომები">
                                            <img src="/website/images/6.jpg" alt="" class="bg-pro-i" />
                                        </a>
                                        <div class="min-box-t">
                                            <h3>
                                                <a href="/appartments?property_type=ავტოსადგომები">ავტოსადგომები</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Popular Properties End-->
            <section class="Architects pt-70 pb-70 mt-70">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="architect">
                                <img src="/website/images/a-group.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="mt-3 architact-t">
                                <h2>ჩვენს შესახებ</h2>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                    has been the industry's standard dummy text ever since the 1500s, when an unknown
                                    printer took a galley of type and scrambled</p>
                                <a href="" class="architact-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Featured Listings Start-->
            <section class="pt-60 pb-60 pop-pro pop-pro-mar">
                <div class="container">
                    <div class="mb-40 row">
                        <div class="col-md-5">
                            <div class="heading-t fadeInUp animated">
                                <h2>VIP ბინები</h2>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="right-all">
                                <a href="/appartments" class="view-all">მეტის ნახვა</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        @foreach ($appartments as $appartment)
                            <div class="col-md-4">
                                <div class=" min-f-box">
                                    <div class="img-f-b">
                                        <a href="{{ route('main.show.appartment', $id = $appartment->id) }}">
                                            <img src="{{ $image->where('product_id', $appartment->id)->pluck('image_path')->first() }}"
                                                alt="" class="img-fluid" />
                                        </a>
                                        <span class="tag-l curency-changer">$</span>
                                        <span class="fav add-wishlist" data="{{$appartment->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="30"
                                                height="30" fill="currentColor" class="bi bi-heart"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                                            </svg></span>
                                    </div>
                                    <div class="f-cont-f">
                                        <h3>
                                            <a href="{{ route('main.show.appartment', $id = $appartment->id) }}">{{ $appartment->name_ge }}
                                                - {{ $appartment->name_en }}</a>
                                        </h3>
                                        <ul class="img-map-co">
                                            <li>
                                                <img src="/website/images/map.png" alt="" class="map-i" />
                                                {{ $appartment->address_ge }} - {{ $appartment->address_en }}
                                            </li>
                                            <li>
                                                <img src="/website/images/clock.png" alt="" class="map-i" />
                                                {{ $appartment->created_at->format('Y-m-d') }}
                                            </li>
                                        </ul>
                                        <div class="d-flex">
                                            <h3 class="price-m price">{{ $appartment->price }}</h3>
                                            <h3 class="price-m curency">$</h3>
                                        </div>


                                        <ul class="amini-con">
                                            <li>
                                                <img src="/website/images/b-bed.png" alt=""
                                                    class="icon-ami" /><br />
                                                საძინებელი {{ $appartment->bedroom }}
                                            </li>
                                            <li>
                                                <img src="/website/images/b-bat.png" alt=""
                                                    class="icon-ami" /><br />
                                                სააბაზანო {{ $appartment->bathroom }}
                                            </li>
                                            <li>
                                                <img src="/website/images/b-s.png" alt=""
                                                    class="icon-ami" /><br />
                                                ფართი {{ $appartment->space }}
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="detail-b">
                                        <a href="/appartment?property_type=ბინები" class="see-det"> დეტალურად </a>

                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </section>
            <script>
                $(document).ready(function() {
                    // Event listener for the button click
                    $('.curency-changer').click(function() {
                        // Toggle the currency symbol between "$" and "₾"
                        $('.curency').text(function(index, text) {
                            return text === '$' ? '₾' : '$';
                        });
                        $('.curency-changer').text(function(index, text) {
                            return text === '$' ? '₾' : '$';
                        });

                        // Adjust the numeric value displayed in elements with the class "price"
                        $('.price').text(function(index, text) {
                            // Parse the numeric value from the text content
                            var numericValue = parseFloat(text);

                            if ($('.curency').text() === '₾') {
                                // If the currency symbol is "₾", multiply the numeric value by 2
                                numericValue *= {{ $rate }};
                            } else {
                                // If the currency symbol is "$", divide the numeric value by 2
                                numericValue /= {{ $rate }};
                            }

                            // Format the numeric value to display ".00" at the end
                            return numericValue.toFixed(2);
                        });
                    });
                });
            </script>
        @stop
