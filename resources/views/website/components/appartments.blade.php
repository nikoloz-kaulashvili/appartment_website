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
                    <div class="col-md-3" >
                        <div class="min-list-pro">
                            <span class="head-text">ფილტრი <img src="website/images/filter.png" alt=""
                                    class="img-po-f" /></span>
                            <div class="min-f-list">
                                <form action="{{ route('main.appartments') }}" method="get">
                                    <div class="filter-list">
                                        <div class="widget_list widget_categories">
                                            <ul>
                                                @if ($cities)
                                                    @foreach ($cities as $city)
                                                        @php
                                                            $districts = DB::table('districts')
                                                                ->where('city_id', '=', $city->id)
                                                                ->get();
                                                        @endphp
                                                        <li class="widget_sub_categories ">
                                                            <a href="#" class="city cities-filter"
                                                                data="{{ $city->id }}">{{ $city->name_ge }}</a>
                                                            <ul class="widget_dropdown_categories">
                                                                @if ($districts)
                                                                    @foreach ($districts as $district)
                                                                        <li><a href="#"
                                                                                class="district district-filter"
                                                                                data="{{ $district->id }}">{{ $district->name_ge }}</a>
                                                                        </li>
                                                                    @endforeach
                                                                @endif
                                                            </ul>
                                                        </li>
                                                    @endforeach
                                                @endif
                                                <input type="hidden" id="city" name="city_id">
                                                <input type="hidden" id="district" name="district_id">
                                                <hr>
                                            </ul>
                                        </div>
                                        <h3>უძრავი ქონების ტიპი</h3>
                                        <ul>
                                            <li>
                                                <label for="Apartment">
                                                    <input type="checkbox" name="property_type[]"
                                                        {{ in_array('ბინა', $req['property_type'] ?? []) ? 'checked' : '' }}
                                                        value="ბინა" class="filter" />
                                                    ბინები</label>
                                            </li>
                                            <li>
                                                <label for="Office"><input value="სახლელბი & აგარაკები"
                                                        {{ in_array('სახლელბი & აგარაკები', $req['property_type'] ?? []) ? 'checked' : '' }}
                                                        type="checkbox" name="property_type[]" class="filter" />სახლები &
                                                    აგარაკები</label>
                                            </li>
                                            <li>
                                                <label for="Rooms"><input type="checkbox"
                                                        {{ in_array('კომერციული ფართები', $req['property_type'] ?? []) ? 'checked' : '' }}
                                                        name="property_type[]" class="filter"
                                                        value="კომერციული ფართები" />კომერციული ფართები</label>
                                            </li>
                                            <li>
                                                <label for="House"><input name="property_type[]"
                                                        {{ in_array('მიწის ნაკვეთები', $req['property_type'] ?? []) ? 'checked' : '' }}
                                                        type="checkbox" class="filter" value="მიწის ნაკვეთები" />მიწის
                                                    ნაკვეთები</label>
                                            </li>
                                            <li>
                                                <label for="Villa"><input name="property_type[]"
                                                        {{ in_array('სასტუმროები', $req['property_type'] ?? []) ? 'checked' : '' }}
                                                        type="checkbox" class="filter"
                                                        value="სასტუმროები" />სასტუმროები</label>
                                            </li>
                                            <li>
                                                <label for="Villa"><input name="property_type[]"
                                                        {{ in_array('ავტოსადგომი', $req['property_type'] ?? []) ? 'checked' : '' }}
                                                        type="checkbox" class="filter"
                                                        value="ავტოსადგომი" />ავტოსადგომი</label>
                                            </li>
                                        </ul>
                                    </div>
                                    <hr>
                                    <div class="filter-list">
                                        <h3>გარიგების ტიპი</h3>
                                        <ul>
                                            <li>
                                                <label for="Sale"><input name="agreement_type[]"
                                                        {{ in_array('იყიდება', $req['agreement_type'] ?? []) ? 'checked' : '' }}
                                                        value="იყიდება" type="checkbox" id="Sale"
                                                        class="filter" />იყიდება</label>
                                            </li>
                                            <li>
                                                <label for="Rent"><input name="agreement_type[]"
                                                        {{ in_array('გირავდება', $req['agreement_type'] ?? []) ? 'checked' : '' }}
                                                        value="გირავდება" type="checkbox" id="Rent"
                                                        class="filter" />გირავდება</label>
                                            </li>
                                            <li>
                                                <label for="OpenHouse"><input name="agreement_type[]"
                                                        {{ in_array('ქირავდება', $req['agreement_type'] ?? []) ? 'checked' : '' }}
                                                        value="ქირავდება" type="checkbox" id="OpenHouse"
                                                        class="filter" />ქირავდება</label>
                                            </li>
                                            <li>
                                                <label for="HotOffer"><input name="agreement_type[]"
                                                        {{ in_array('ქირავდება დღიურად', $req['agreement_type'] ?? []) ? 'checked' : '' }}
                                                        value="ქირავდება დღიურად" type="checkbox" id="HotOffer"
                                                        class="filter" />ქირავდება დღიურად</label>
                                            </li>
                                        </ul>
                                    </div>
                                    <hr>
                                    <div class="filter-list">
                                        <h3>რემონტი</h3>
                                        <div class="form-group none">
                                            <div class="input-with-icon">
                                                <select id="Bedrooms" name="repair" class="form-control">
                                                    <option value="{{ $req->repair  ??  '' }}">{{ $req->repair  ??  'არჩევა' }}</option>
                                                    <option value="ახალ გარემონტებული">ახალ გარემონტებული</option>
                                                    <option value="ძველი გარემონტებული">ძველი გარემონტებული</option>
                                                    <option value="მიმდინარეობს რემონტი">მიმდინარეობს რემონტი</option>
                                                    <option value="სარემონტო">სარემონტო</option>
                                                    <option value="თეთრი კარკასი">თეთრი კარკასი</option>
                                                    <option value="შავი კარკასი">შავი კარკასი</option>
                                                    <option value="მწვანე კარკასი">მწვანე კარკასი</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="filter-list">
                                        <h3>Price Range ( $ )</h3>
                                        <div class="form-group none">
                                            <div class="d-flex input-with-icon">
                                                <input class="mr-1 form-control" value="{{ $req->start_price  ??  '' }}" name="start_price" placeholder="დან"
                                                    type="number">
                                                <input class="ml-1 form-control" value="{{ $req->end_price  ??  '' }}" name="end_price" placeholder="მდე"
                                                    type="number">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="filter-list">
                                        <h3>Rooms</h3>
                                        <div class="form-group none">
                                            <label>საძინებელი</label>
                                            <div class="input-with-icon">
                                                <select name="bedroom" class="form-control">
                                                    <option value="{{ $req->bedroom  ??  '' }}">{{ $req->bedroom  ??  'არჩევა' }}</option>
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
                                                <select  name="bathroom" class="form-control">
                                                    <option value="{{ $req->bathroom  ??  '' }}">{{ $req->bathroom  ??  'არჩევა' }}</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="filter-list">
                                        <h3>მახასიათებლები</h3>
                                        <div class="d-flex">
                                            <ul>
                                                <li>
                                                    <label for="Sale"><input {{ ($req['balcony'] ?? null) == 1 ? 'checked' : '' }} type="checkbox" value="1"
                                                            name="balcony" class="filter" />აივანი</label>
                                                </li>
                                                <li>
                                                    <label for="Rent"><input {{ ($req['porch'] ?? null) == 1 ? 'checked' : '' }} type="checkbox" value="1"
                                                            name="porch" class="filter" />ვერანდა</label>
                                                </li>
                                                <li>
                                                    <label for="OpenHouse"><input {{ ($req['loggia'] ?? null) == 1 ? 'checked' : '' }} type="checkbox" value="1"
                                                            name="loggia" class="filter" />ლოჯი</label>
                                                </li>
                                                <li>
                                                    <label for="HotOffer"><input {{ ($req['natural_gas'] ?? null) == 1 ? 'checked' : '' }} type="checkbox" value="1"
                                                            name="natural_gas" class="filter" />ბუნებრივი აირი</label>
                                                </li>
                                                <li>
                                                    <label for="OpenHouse"><input {{ ($req['internet'] ?? null) == 1 ? 'checked' : '' }} type="checkbox" value="1"
                                                            name="internet" class="filter" />ინტერნეტი</label>
                                                </li>
                                                <li>
                                                    <label for="OpenHouse"><input {{ ($req['fireplace'] ?? null) == 1 ? 'checked' : '' }} type="checkbox" value="1"
                                                            name="fireplace" class="filter" />ბუხარი</label>
                                                </li>
                                            </ul>
                                            <ul>
                                                <li>
                                                    <label for="OpenHouse"><input {{ ($req['furniture'] ?? null) == 1 ? 'checked' : '' }} type="checkbox" value="1"
                                                            name="furniture" class="filter" />ავეჯი</label>
                                                </li>
                                                <li>
                                                    <label for="OpenHouse"><input {{ ($req['passenger_elevator'] ?? null) == 1 ? 'checked' : '' }} type="checkbox" value="1"
                                                            name="passenger_elevator" class="filter" />სამგზავრო
                                                        ლიფტი</label>
                                                </li>
                                                <li>
                                                    <label for="OpenHouse"><input {{ ($req['freight_elevator'] ?? null) == 1 ? 'checked' : '' }} type="checkbox" value="1"
                                                            name="freight_elevator" class="filter" />სატვირთო
                                                        ლიფტი</label>
                                                </li>
                                                <li>
                                                    <label for="OpenHouse"><input {{ ($req['telephone'] ?? null) == 1 ? 'checked' : '' }} type="checkbox" value="1"
                                                            name="telephone" class="filter" />ტელეფონი</label>
                                                </li>
                                                <li>
                                                    <label for="OpenHouse"><input {{ ($req['tv'] ?? null) == 1 ? 'checked' : '' }} type="checkbox" value="1"
                                                            name="tv" class="filter" />ტელევიზორი</label>
                                                </li>
                                                <li>
                                                    <label for="OpenHouse"><input {{ ($req['conditioner'] ?? null) == 1 ? 'checked' : '' }} type="checkbox" value="1"
                                                            name="conditioner" class="filter" />კონდინციონერი</label>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                    <hr>
                                    <div class="filter-list">
                                        <h3>გათბობა</h3>
                                        <ul>
                                            <li>
                                                <label for="Sale"><input name="heating[]"
                                                        {{ in_array('ცენტრალური გათბობა', $req['heating'] ?? []) ? 'checked' : '' }}
                                                        type="checkbox" value="ცენტრალური გათბობა" 
                                                        class="filter" />ცენტრალური გათბობა</label>
                                            </li>
                                            <li>
                                                <label for="Rent"><input name="heating[]"
                                                        {{ in_array('გაზის გამათბობელი', $req['heating'] ?? []) ? 'checked' : '' }}
                                                        type="checkbox" value="გაზის გამათბობელი" 
                                                        class="filter" />გაზის გამათბობელი</label>
                                            </li>
                                            <li>
                                                <label for="OpenHouse"><input name="heating[]"
                                                        {{ in_array('იატაკის გათბობა', $req['heating'] ?? []) ? 'checked' : '' }}
                                                        type="checkbox" value="იატაკის გათბობა" 
                                                        class="filter" />დენის გამათბობელი</label>
                                            </li>
                                            <li>
                                                <label for="HotOffer"><input name="heating[]"
                                                        {{ in_array('დენის გამათბობელი', $req['heating'] ?? []) ? 'checked' : '' }}
                                                        type="checkbox" value="დენის გამათბობელი" 
                                                        class="filter" />იატაკის გათბობა</label>
                                            </li>
                                        </ul>
                                    </div>
                                    <hr>
                                    <div class="filter-list">
                                        <h3>პარკინგი</h3>
                                        <ul>
                                            <li>
                                                <label for="Sale"><input type="checkbox" name="parking[]"
                                                        {{ in_array('ავტოფარეხი', $req['parking'] ?? []) ? 'checked' : '' }}
                                                        value="ავტოფარეხი" 
                                                        class="filter" />ავტოფარეხი</label>
                                            </li>
                                            <li>
                                                <label for="Rent"><input type="checkbox" name="parking[]"
                                                        {{ in_array('პარკინგის ადგილი', $req['parking'] ?? []) ? 'checked' : '' }}
                                                        value="პარკინგის ადგილი" 
                                                        class="filter" />პარკინგის ადგილი</label>
                                            </li>
                                        </ul>
                                    </div>
                                    <hr>
                                    <div class="filter-list">
                                        <h3>სათავსო</h3>
                                        <ul>
                                            <li>
                                                <label for="Sale"><input type="checkbox" value="სარდაფი"
                                                        {{ in_array('სარდაფი', $req['storage'] ?? []) ? 'checked' : '' }}
                                                        name="storage[]" class="filter" />სარდაფი</label>
                                            </li>
                                            <li>
                                                <label for="Rent"><input type="checkbox" value="სხვენი"
                                                        {{ in_array('სხვენი', $req['storage'] ?? []) ? 'checked' : '' }}
                                                        name="storage[]" class="filter" />სხვენი</label>
                                            </li>
                                            <li>
                                                <label for="OpenHouse"><input type="checkbox" value="საკუჭნაო"
                                                        {{ in_array('საკუჭნაო', $req['storage'] ?? []) ? 'checked' : '' }}
                                                        name="storage[]" class="filter" />საკუჭნაო</label>
                                            </li>
                                            <li>
                                                <label for="HotOffer"><input type="checkbox" value="გარე სათავსო"
                                                        {{ in_array('გარე სათავსო', $req['storage'] ?? []) ? 'checked' : '' }}
                                                        name="storage[]" class="filter" />გარე სათავსო</label>
                                            </li>
                                            <li>
                                                <label for="HotOffer"><input type="checkbox" value="საერთო სათავსო"
                                                        {{ in_array('საერთო სათავსო', $req['storage'] ?? []) ? 'checked' : '' }}
                                                        name="storage[]" class="filter" />საერთო სათავსო</label>
                                            </li>
                                        </ul>
                                    </div>
                                    <hr>
                                    <button class="btn btn-primary">გაფილტვრა</button>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row list-search-view" >
                            @foreach ($appartments as $appartment)
                                <div class="col-md-4">
                                    <div class="min-f-box">
                                        <div class="img-f-b">
                                            <a href="{{ route('main.show.appartment', $id = $appartment->id) }}">
                                                <img src="{{ $image->where('product_id', $appartment->id)->pluck('image_path')->first() }}"
                                                    alt="" class="img-fluid" />
                                            </a>
                                            <span class="tag-l curency-changer">$</span>

                                            <span class="fav add-wishlist" data="{{ $appartment->id }}"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                                    <path
                                                        d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                                                </svg></span>
                                        </div>
                                        <div class="f-cont-f">
                                            <h3>
                                                <a href="{{ route('main.show.appartment', $id = $appartment->id) }}">{{ $appartment->name_ge }}
                                                    -
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

        $('.district').click(function() {
            $('.district').css('color', 'black');
            var districtValue = $(this).attr('data');
            $(this).css('color', '#273573');
            $('#district').val(districtValue);
            console.log(districtValue)
        });

        var cityValue = ''; // Initialize cityValue

        $('.city').click(function() {
            $('.city').css('color', 'black');
            var dataValue = $(this).attr('data');
            $(this).attr('data')
            if (cityValue == dataValue) {
                cityValue = '';
                $('#city').val('');
                $('#district').val('');
                $('.district').css('color', 'black');
                $(this).siblings('ul').slideToggle('medium');
                console.log(cityValue)

            } else {
                $(this).css('color', '#273573');
                cityValue = dataValue;
                $('#city').val(dataValue);
                $('#district').val('');
                $('.district').css('color', 'black');
                $('.city').siblings('ul').slideUp('medium');
                $(this).siblings('ul').slideToggle('medium');
                console.log(cityValue)
            }
        });
    </script>
@stop
