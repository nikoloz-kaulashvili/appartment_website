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
                                        <div class="search_hero_wrapping">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-3 col-sm-12">
                                                    <div class="form-group">
                                                        <label>City/Street</label>
                                                        <div class="input-with-icon">
                                                            <select id="location" class="form-control">
                                                                <option value="">&nbsp;</option>
                                                                <option value="1">New York City</option>
                                                                <option value="2">Honolulu, Hawaii</option>
                                                                <option value="3">California</option>
                                                                <option value="4">New Orleans</option>
                                                                <option value="5">Washington</option>
                                                                <option value="6">Charleston</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-3 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Property Type</label>
                                                        <div class="input-with-icon">
                                                            <select id="ptypes" class="form-control">
                                                                <option value="">&nbsp;</option>
                                                                <option value="1">All categories</option>
                                                                <option value="2">Apartment</option>
                                                                <option value="3">Villas</option>
                                                                <option value="4">Commercial</option>
                                                                <option value="5">Offices</option>
                                                                <option value="6">Garage</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-4 col-sm-12">
                                                    <div class="form-group none">
                                                        <label>Price Range</label>
                                                        <div class="input-with-icon">
                                                            <select id="price" class="form-control">
                                                                <option value="">&nbsp;</option>
                                                                <option value="1">From 40,000 To 10m</option>
                                                                <option value="2">From 60,000 To 20m</option>
                                                                <option value="3">From 70,000 To 30m</option>
                                                                <option value="3">From 80,000 To 40m</option>
                                                                <option value="3">From 90,000 To 50m</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-1 col-md-2 col-sm-12 small-padd">
                                                    <div class="form-group none">
                                                        <a href="#" class="btn search-btn">GO!</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
            <section class="pt-90 pb-60 pop-pro pop-pro-mar">
                <div class="container">
                    <div class="mb-40 row">
                        <div class="col-md-5">
                            <div class="heading-t fadeInUp animated">
                                <h2>პოპულარული კატეგორიები</h2>
                            </div>
                        </div>

                    </div>

                    <div class="p-0 shadow-none tab-content" id="pills-tabContent">
                        <div class="tab-pane fade active show" id="pills-all" role="tabpanel"
                            aria-labelledby="pills-all-tab">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="min-pro-box">
                                        <a href="pro-details.html">
                                            <img src="/website/images/f1.png" alt="" class="bg-pro-i" />
                                        </a>
                                        <div class="min-box-t">
                                            <h3>
                                                <a href="pro-details.html">Villa on Hollywood Boulevard</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="min-pro-box">
                                        <a href="pro-details.html">
                                            <img src="/website/images/f1.png" alt="" class="bg-pro-i" />
                                        </a>
                                        <div class="min-box-t">
                                            <h3>
                                                <a href="pro-details.html">Villa on Hollywood Boulevard</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="min-pro-box">
                                        <a href="pro-details.html">
                                            <img src="/website/images/f1.png" alt="" class="bg-pro-i" />
                                        </a>
                                        <div class="min-box-t">
                                            <h3>
                                                <a href="pro-details.html">Villa on Hollywood Boulevard</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="min-pro-box">
                                        <a href="pro-details.html">
                                            <img src="/website/images/f1.png" alt="" class="bg-pro-i" />
                                        </a>
                                        <div class="min-box-t">
                                            <h3>
                                                <a href="pro-details.html">Villa on Hollywood Boulevard</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="min-pro-box">
                                        <a href="pro-details.html">
                                            <img src="/website/images/f1.png" alt="" class="bg-pro-i" />
                                        </a>
                                        <div class="min-box-t">
                                            <h3>
                                                <a href="pro-details.html">Villa on Hollywood Boulevard</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="min-pro-box">
                                        <a href="pro-details.html">
                                            <img src="/website/images/f1.png" alt="" class="bg-pro-i" />
                                        </a>
                                        <div class="min-box-t">
                                            <h3>
                                                <a href="pro-details.html">Villa on Hollywood Boulevard</a>
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
                                <div class="min-f-box">
                                    <div class="img-f-b">
                                        <a href="pro-details.html">
                                            <img src="{{$image->where('product_id', $appartment->id)->pluck('image_path')->first()}}" alt="" class="img-fluid" />
                                        </a>
                                        @if ($appartment->priority == 2)
                                          <span class="tag-l">VIP</span>
                                        @endif
                                          <span class="fav">FAV</span>
                                    </div>
                                    <div class="f-cont-f">
                                        <h3>
                                            <a href="pro-details.html">{{$appartment->name_ge}} - {{$appartment->name_en}}</a>
                                        </h3>
                                        <ul class="img-map-co">
                                            <li>
                                                <img src="/website/images/map.png" alt="" class="map-i" />
                                                {{$appartment->address_ge}} - {{$appartment->address_en}}
                                            </li>
                                            <li>
                                                <img src="/website/images/clock.png" alt="" class="map-i" />
                                                {{$appartment->created_at->format('Y-m-d')}}
                                            </li>
                                        </ul>
                                        <div class="d-flex">
                                          <h3 class="price-m price">{{$appartment->price}}</h3>
                                          <h3 class="price-m curency">$</h3>
                                        </div>
                                        

                                        <ul class="amini-con">
                                            <li>
                                                <img src="/website/images/b-bed.png" alt=""
                                                    class="icon-ami" /><br />
                                                საძინებელი {{$appartment->bedroom}}
                                            </li>
                                            <li>
                                                <img src="/website/images/b-bat.png" alt=""
                                                    class="icon-ami" /><br />
                                                სააბაზანო {{$appartment->bathroom}}
                                            </li>
                                            <li>
                                                <img src="/website/images/b-s.png" alt=""
                                                    class="icon-ami" /><br />
                                                ფართი {{$appartment->space}}
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="detail-b">
                                        <a href="pro-details.html" class="see-det"> დეტალურად </a>

                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </section>
        @stop
