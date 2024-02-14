@extends('website.index')
@section('content')
<div class="minsection">
    <!--Ser-details-start-->
    <section class="pt-25 pb-25 property-details">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="left-side-detail">
                        <span class="tag-l curency-changer changer">$</span>
                        <button class="btn btn-primary favorite">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                          </svg>
                        </button>
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                @foreach ($images as $image)
                                    <div class="swiper-slide"><img src="{{$image->image_path}}" alt="" class="img-fluid" /></div>
                                @endforeach
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                          </div>
                        
                          <!-- Swiper JS -->
                          <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
                        
                          <!-- Initialize Swiper -->
                          <script>
                            var swiper = new Swiper(".mySwiper", {
                              navigation: {
                                nextEl: ".swiper-button-next",
                                prevEl: ".swiper-button-prev",
                              },
                            });
                          </script>
                        <div class="f-cont-f">
                            <h3>{{$appartment->name_ge}}</h3>
                            <ul class="img-map-co map-i-con">
                                <li>
                                    <img src="/website/images/clock.png" alt="" class="map-i">
                                    {{$appartment->created_at}}
                                </li>
                                <li>
                                    <img src="/website/images/map.png" alt="" class="map-i">
                                    {{$appartment->address_ge}}
                                </li>
                            </ul>
                            <div class="d-flex">
                                <h3 class="price-m price">{{$appartment->price}}</h3>
                                <h3 class="price-m curency">$</h3>
                            </div>
                        </div>
                        <div class="min-details">
                            <h3>დეტალები</h3>
                            <div class="min-det-f-list">
                                <ul class="property-list-f list-unstyled">
                                    <li>
                                        <div class="d-flex">
                                            <b>ფასი:</b>
                                            <h5 class=" price">{{$appartment->price}}</h5>
                                            <h5 class=" curency">$</h5>
                                        </div> 
                                    </li>
                                    <li><b>ზომა:</b> {{$appartment->space}} kv2</li>
                                    <li><b>საძინებელი:</b> {{$appartment->bedroom}}</li>
                                    <li><b>სააბაზანო:</b> {{$appartment->bathroom}}</li>
                                    <li><b>ტიპი:</b> {{$appartment->property_type}}</li>
                                </ul>
                                <ul class="property-list-f list-unstyled">
                                    <li><b>შეთანხმების ტიპი:</b> {{$appartment->agreement_type}}</li>
                                    <li><b>რემონტი:</b> {{$appartment->repair}}</li>
                                    <li><b>გათბობა:</b> {{$appartment->heating}}</li>
                                    <li><b>სათავსო:</b> {{$appartment->storage}}</li>
                                    <li><b>პარკინგი:</b> {{$appartment->parking}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="min-details">
                            <h3>აღწერა</h3>
                            {{$appartment->description_ge}}
                        </div>
                        <div class="min-details">
                            <h3>დამატებითი პარამეტრები</h3>
                            <ul class="min-feature">
                                <ul class="property-list-f list-unstyled">
                                    <li><b>აივანი:</b> {{ $appartment->balcony == 1 ? "+" : "-" }}</li>
                                    <li><b>ვერანდა:</b> {{ $appartment->porch == 1 ? "+" : "-" }}</li>
                                    <li><b>ლოჯი:</b> {{ $appartment->loggia == 1 ? "+" : "-" }}</li>
                                    <li><b>გაზი:</b> {{ $appartment->natural_gas == 1 ? "+" : "-" }}</li>
                                    <li><b>ინტერნეტი:</b> {{ $appartment->Internet == 1 ? "+" : "-" }}</li>
                                    <li><b>ბუხარი:</b> {{ $appartment->fireplace == 1 ? "+" : "-" }}</li>
                                </ul>
                                <ul class="property-list-f list-unstyled">
                                    <li><b>ავეჯი:</b> {{ $appartment->furniture == 1 ? "+" : "-" }}</li>
                                    <li><b>სამგზავრო ლიფტი:</b> {{ $appartment->passenger_elevator == 1 ? "+" : "-" }}</li>
                                    <li><b>სატვირთო ლიფტი:</b> {{ $appartment->freight_elevator == 1 ? "+" : "-" }}</li>
                                    <li><b>ტელეფონი:</b>{{ $appartment->telephone == 1 ? "+" : "-" }}</li>
                                    <li><b>ტელევიზორი:</b> {{ $appartment->tv == 1 ? "+" : "-" }}</li>
                                    <li><b>კონდინციონერი:</b> {{ $appartment->conditioner == 1 ? "+" : "-" }}</li>
                                </ul>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container map-container">
            {!! $appartment->map !!}
        </div>
    </section>
    <!--Ser-details-End-->
</div>
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

                if ($('.curency-changer').text() === '₾') {
                    // If the currency symbol is "₾", multiply the numeric value by 2
                    numericValue *= {{$rate}};
                } else {
                    // If the currency symbol is "$", divide the numeric value by 2
                    numericValue /= {{$rate}};
                }

                // Format the numeric value to display ".00" at the end
                return numericValue.toFixed(2);
            });
        });
    });
</script>
@stop