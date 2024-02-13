@extends('website.index')
@section('content')
    <div class="minsection">
        <!--sub-Banner-start-->
        <div class="sub-banner pt-90 pb-90">
            <div class="container">
                <div class="col-md-8 offset-md-2">
                    <div class="text-center text-line">
                        <h1>Property List</h1>
                        <ul class="text-c">
                            <li>Home</li>
                            <li>|</li>
                            <li class="color-t">Property List</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--sub-Banner-End-->
        <!--Ser-details-start-->
        <section class="pt-40 pb-40 property-list">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3" id="">
                        <div class="min-list-pro" id="">
                            <span class="head-text">Filter <img src="website/images/filter.png" alt=""
                                    class="img-po-f" /></span>
                            <div class="min-f-list">
                                <div class="filter-list">
                                    <h3>უძრავი ქონების ტიპი</h3>
                                    <ul>
                                        <li>
                                            <label for="Apartment"><input type="checkbox" id="Apartment" class="filter" />
                                                ბინები</label>
                                        </li>
                                        <li>
                                            <label for="Office"><input value="სახლელბი & აგარაკები" type="checkbox" id="Office"
                                                    class="filter" />სახლები & აგარაკები</label>
                                        </li>
                                        <li>
                                            <label for="Rooms"><input type="checkbox" id="Rooms"
                                                    class="filter" value="კომერციული ფართები" />კომერციული ფართები</label>
                                        </li>
                                        <li>
                                            <label for="House"><input type="checkbox" id="House"
                                                    class="filter" value="მიწის ნაკვეთები" />მიწის ნაკვეთები</label>
                                        </li>
                                        <li>
                                            <label for="Villa"><input type="checkbox" id="Villa"
                                                    class="filter" value="სასტუმროები" />სასტუმროები</label>
                                        </li>
                                        <li>
                                            <label for="Villa"><input type="checkbox" id="Villa"
                                                    class="filter" value="ავტოსადგომი" />ავტოსადგომი</label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="filter-list">
                                    <h3>გარიგების ტიპი</h3>
                                    <ul>
                                        <li>
                                            <label for="Sale"><input type="checkbox" id="Sale"
                                                    class="filter" />იყიდება</label>
                                        </li>
                                        <li>
                                            <label for="Rent"><input type="checkbox" id="Rent"
                                                    class="filter" />გირავდება</label>
                                        </li>
                                        <li>
                                            <label for="OpenHouse"><input type="checkbox" id="OpenHouse"
                                                    class="filter" />ქირავდება</label>
                                        </li>
                                        <li>
                                            <label for="HotOffer"><input type="checkbox" id="HotOffer"
                                                    class="filter" />ქირავდება დღიურად</label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="filter-list">
                                    <h3>რემონტი</h3>
                                    <div class="form-group none">
                                        <div class="input-with-icon">
                                            <select id="Bedrooms" class="form-control">
                                                <option value="">&nbsp;</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="3">4</option>
                                                <option value="3">5+</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="filter-list">
                                    <h3>Price Range ( $ )</h3>
                                    <div class="form-group none">
                                        <div class="d-flex input-with-icon">
                                            <input class="mr-1 form-control" placeholder="დან" type="number">
                                            <input class="ml-1 form-control" placeholder="მდე" type="number" >
                                        </div>
                                    </div>
                                </div>
                                <div class="filter-list">
                                    <h3>Rooms</h3>
                                    <div class="form-group none">
                                        <label>საძინებელი</label>
                                        <div class="input-with-icon">
                                            <select id="Bedrooms" class="form-control">
                                                <option value="">&nbsp;</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="3">4</option>
                                                <option value="3">5+</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group none">
                                        <label>სააბაზანო</label>
                                        <div class="input-with-icon">
                                            <select id="Bathrooms" class="form-control">
                                                <option value="">&nbsp;</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="filter-list">
                                    <h3>მახასიათებლები</h3>
                                    <div class="d-flex">
                                        <ul>
                                            <li>
                                                <label for="Sale"><input type="checkbox" id="Sale"
                                                        class="filter" />აივანი</label>
                                            </li>
                                            <li>
                                                <label for="Rent"><input type="checkbox" id="Rent"
                                                        class="filter" />ვერანდა</label>
                                            </li>
                                            <li>
                                                <label for="OpenHouse"><input type="checkbox" id="OpenHouse"
                                                        class="filter" />ლოჯი</label>
                                            </li>
                                            <li>
                                                <label for="HotOffer"><input type="checkbox" id="HotOffer"
                                                        class="filter" />ბუნებრივი აირი</label>
                                            </li>
                                            <li>
                                                <label for="OpenHouse"><input type="checkbox" id="OpenHouse"
                                                        class="filter" />ინტერნეტი</label>
                                            </li>
                                            <li>
                                                <label for="OpenHouse"><input type="checkbox" id="OpenHouse"
                                                        class="filter" />ბუხარი</label>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li>
                                                <label for="OpenHouse"><input type="checkbox" id="OpenHouse"
                                                        class="filter" />ავეჯი</label>
                                            </li>
                                            <li>
                                                <label for="OpenHouse"><input type="checkbox" id="OpenHouse"
                                                        class="filter" />სამგზავრო ლიფტი</label>
                                            </li>
                                            <li>
                                                <label for="OpenHouse"><input type="checkbox" id="OpenHouse"
                                                        class="filter" />სატვირთო ლიფტი</label>
                                            </li>
                                            <li>
                                                <label for="OpenHouse"><input type="checkbox" id="OpenHouse"
                                                        class="filter" />ტელეფონი</label>
                                            </li>
                                            <li>
                                                <label for="OpenHouse"><input type="checkbox" id="OpenHouse"
                                                        class="filter" />ტელევიზორი</label>
                                            </li>
                                        </ul>
                                    </div>

                                </div>

                                <div class="filter-list">
                                    <h3>გათბობა</h3>
                                    <ul>
                                        <li>
                                            <label for="Sale"><input type="checkbox" id="Sale"
                                                    class="filter" />ცენტრალური გათბობა</label>
                                        </li>
                                        <li>
                                            <label for="Rent"><input type="checkbox" id="Rent"
                                                    class="filter" />გაზის გამათბობელი</label>
                                        </li>
                                        <li>
                                            <label for="OpenHouse"><input type="checkbox" id="OpenHouse"
                                                    class="filter" />დენის გამათბობელი</label>
                                        </li>
                                        <li>
                                            <label for="HotOffer"><input type="checkbox" id="HotOffer"
                                                    class="filter" />იატაკის გათბობა</label>
                                        </li>
                                    </ul>
                                </div>

                                <div class="filter-list">
                                    <h3>პარკინგი</h3>
                                    <ul>
                                        <li>
                                            <label for="Sale"><input type="checkbox" id="Sale"
                                                    class="filter" />ავტოფარეხი</label>
                                        </li>
                                        <li>
                                            <label for="Rent"><input type="checkbox" id="Rent"
                                                    class="filter" />პარკინგის ადგილი</label>
                                        </li>
                                    </ul>
                                </div>

                                <div class="filter-list">
                                    <h3>სათავსო</h3>
                                    <ul>
                                        <li>
                                            <label for="Sale"><input type="checkbox" id="Sale"
                                                    class="filter" />სარდაფი</label>
                                        </li>
                                        <li>
                                            <label for="Rent"><input type="checkbox" id="Rent"
                                                    class="filter" />სხვენი</label>
                                        </li>
                                        <li>
                                            <label for="OpenHouse"><input type="checkbox" id="OpenHouse"
                                                    class="filter" />საკუჭნაო</label>
                                        </li>
                                        <li>
                                            <label for="HotOffer"><input type="checkbox" id="HotOffer"
                                                    class="filter" />გარე სათავსო</label>
                                        </li>
                                        <li>
                                            <label for="HotOffer"><input type="checkbox" id="HotOffer"
                                                    class="filter" />საერთო სათავსო</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row list-search-view" id="">
                            @foreach ($appartments as $appartment)
                                <div class="col-md-4">
                                    <div class="min-f-box">
                                        <div class="img-f-b">
                                            <a href="{{route('main.show.appartment', $id = $appartment->id)}}">
                                                <img src="{{ $image->where('product_id', $appartment->id)->pluck('image_path')->first() }}"
                                                    alt="" class="img-fluid" />
                                            </a>
                                            <span class="tag-l curency-changer">$</span>

                                            <span class="fav"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                                              </svg></span>
                                        </div>
                                        <div class="f-cont-f">
                                            <h3>
                                                <a href="{{route('main.show.appartment', $id = $appartment->id)}}">{{ $appartment->name_ge }} -
                                                    {{ $appartment->name_en }}</a>
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
                                            <a href="pro-details.html" class="see-det"> დეტალურად </a>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
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

                    if ($('.curency').text() === '₾') {
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
