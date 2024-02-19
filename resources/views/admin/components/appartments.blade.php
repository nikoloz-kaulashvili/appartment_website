@extends('admin.index')
@section('content')

    <div class="container-fluid flex-grow-1 container-p-y">
        <form action="/projects" method="get">
            <div class="mt-3 mb-3 form-group d-flex ">
                <button type="button" class="ml-auto btn btn-primary" data-toggle="modal"
                    data-target="#add_appartment">ობიექტის დამატება</button>
            </div>
        </form>

        <div class="row">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">დასახელება</th>
                        <th scope="col">ქალაქი</th>
                        <th scope="col">უბანი</th>
                        <th scope="col">ფასი</th>
                        <th scope="col">ფართობი</th>
                        <th scope="col">შეთანხმების ტიპი</th>
                        <th scope="col">ობიექტის ტიპი</th>
                        <th scope="col">საძინებლები</th>
                        <th scope="col">სააბაზანო</th>
                        <th scope="col">სტატუსი</th>
                        <th scope="col">პრიორიტეტი</th>
                        <th scope="col">სურათები</th>
                        <th scope="col">რედაქტირება</th>
                        <th scope="col">წაშლა</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appartments as $appartment)
                        <tr>
                            <th scope="row">{{ $appartment->name_ge }} - {{ $appartment->name_en }}</th>
                            <th scope="row">{{ $appartment->city_id }}</th>
                            <th scope="row">{{ $appartment->district_id }}</th>
                            <th scope="row">{{ $appartment->price }}</th>
                            <th scope="row">{{ $appartment->space }}</th>
                            <th scope="row">{{ $appartment->agreement_type }}</th>
                            <th scope="row">{{ $appartment->property_type }}</th>
                            <th scope="row">{{ $appartment->bedroom }}</th>
                            <th scope="row">{{ $appartment->bathroom }}</th>
                            <th scope="row">{{ $appartment->status == 1 ? 'თავისუფალი' : 'დაკავებული' }}</th>
                            <th scope="row">{{ $appartment->priority == 1 ? 'არარის პრიორიტეტული' : 'პრიორიტეტული' }}</th>
                            <th> <button class="btn btn-info" data-toggle="modal"
                                    data-target="#image_appartment_{{ $appartment->id }}">სურათები</button>
                            </th>
                            <th> <button class="btn btn-info" data-toggle="modal"
                                    data-target="#edit_appartment_{{ $appartment->id }}">რედაქტირება</button>
                            </th>
                            <th> <button class="ml-4 btn btn-danger" data-toggle="modal"
                                    data-target="#delete_appartment_{{ $appartment->id }}">წაშლა</button>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    @foreach ($appartments as $appartment)
        <div class="modal fade bd-example-modal-lg" id="edit_appartment_{{ $appartment->id }}" tabindex="-1"
            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ობიექტის რედაქტირება</h5>
                        <button type="button" class="close btn btn-primary" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('appartments.update', $appartment->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="mb-3 form-group col-md-6 col-12">
                                    <label for="appartment_name">სახელი (ქართულად)</label>
                                    <input type="text" value="{{$appartment->name_ge}}" class="form-control" name="name_ge" required>
                                </div>
                                <div class="mb-3 form-group col-md-6 col-12">
                                    <label for="appartment_name">სახელი (ინგლისურად)</label>
                                    <input type="text" value="{{$appartment->name_en}}" class="form-control" name="name_en" required>
                                </div>
                                <div class="mb-3 form-group col-md-6 col-12">
                                    <label for="appartment_name">მისამართი (ქართულად)</label>
                                    <input type="text" value="{{$appartment->address_ge}}" class="form-control" name="address_ge" required>
                                </div>
                                <div class="mb-3 form-group col-md-6 col-12">
                                    <label for="appartment_name">მისამართი (ინგლისურად)</label>
                                    <input type="text" value="{{$appartment->address_en}}" class="form-control" name="address_en" required>
                                </div>
                                <div class="mb-3 form-group col-md-6 col-12">
                                    <label for="appartment_name">ქალაქი </label>
                                    <select class="form-select" name="city_id" aria-label="Default select example">
                                        <option value="{{ $appartment->city_id }}">{{ $appartment->city_id }}</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name_ge }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 form-group col-md-6 col-12">
                                    <label for="appartment_name">უბანი</label>
                                    <select class="form-select" name="district_id" aria-label="Default select example">
                                        <option value="{{ $appartment->district_id }}">{{ $appartment->district_id }}</option>
                                        @foreach ($districts as $district)
                                            <option value="{{ $district->id }}">{{ $district->name_ge }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 form-group col-md-6 col-12">
                                    <label for="appartment_name">აღწერა (ქართულად)</label>
                                    <textarea class="form-control"  name="description_ge" cols="30" rows="10">{{ $appartment->description_ge }}</textarea>
                                </div>
                                <div class="mb-3 form-group col-md-6 col-12">
                                    <label for="appartment_name">აღწერა (ინგლისურად)</label>
                                    <textarea class="form-control" name="description_en" cols="30" rows="10">{{ $appartment->description_en  }}</textarea>
                                </div>
    
                                <div class="mb-3 form-group col-md-6 col-12">
                                    <label for="appartment_name">ფასი </label>
                                    <input type="number" class="form-control" value="{{$appartment->price}}" name="price" required>
                                </div>
                                <div class="mb-3 form-group col-md-6 col-12">
                                    <label for="appartment_name">ფართი </label>
                                    <input type="number" class="form-control" value="{{$appartment->space}}" step="0.1" name="space" required>
                                </div>
    
                                <div class="mb-3 form-group col-md-6 col-12">
                                    <label for="appartment_name">შეთანხმების ტიპი </label>
                                    <select class="form-select" name="agreement_type" aria-label="Default select example"
                                        required>
                                        <option value="{{$appartment->agreement_type}}">{{$appartment->agreement_type}}</option>
                                        <option value="იყიდება">იყიდება</option>
                                        <option value="გირავდება">გირავდება</option>
                                        <option value="ქირავდება">ქირავდება</option>
                                        <option value="ქირავდება დღიურად">ქირავდება დღიურად</option>
                                    </select>
                                </div>
                                <div class="mb-3 form-group col-md-6 col-12">
                                    <label for="appartment_name">ობიექტის ტიპი </label>
                                    <select class="form-select" name="property_type" aria-label="Default select example"
                                        required>
                                        <option value="{{$appartment->property_type}}">{{$appartment->property_type}}</option>
                                        <option value="ბინა">ბინა</option>
                                        <option value="სახლელბი & აგარაკები">სახლი ან აგარაკი</option>
                                        <option value="კომერციული ფართები">კომერციული ფართი</option>
                                        <option value="მიწის ნაკვეთები">მიწის ნაკვეთი</option>
                                        <option value="სასტუმროები">სასტუმრო</option>
                                        <option value="ავტოსადგომები">ავტოსადგომი</option>

                                    </select>
                                </div>
                                <div class="mb-3 form-group col-md-6 col-12">
                                    <label for="appartment_name">რემონტი </label>
                                    <select class="form-select" name="repair" aria-label="Default select example">
                                        <option value="{{$appartment->repair}}">{{$appartment->repair}}</option>
                                        <option value="ახალ გარემონტებული">ახალ გარემონტებული</option>
                                        <option value="ძველი გარემონტებული">ძველი გარემონტებული</option>
                                        <option value="მიმდინარეობს რემონტი">მიმდინარეობს რემონტი</option>
                                        <option value="სარემონტო">სარემონტო</option>
                                        <option value="თეთრი კარკასი">თეთრი კარკასი</option>
                                        <option value="შავი კარკასი">შავი კარკასი</option>
                                        <option value="მწვანე კარკასი">მწვანე კარკასი</option>
                                    </select>
                                </div>
                                <div class="mb-3 form-group col-md-6 col-12">
                                    <label for="appartment_name">გათბობა </label>
                                    <select class="form-select" name="heating" aria-label="Default select example">
                                        <option value="{{$appartment->heating}}">{{$appartment->heating}}</option>
                                        <option value="ცენტრალური გათბობა">ცენტრალური გათბობა</option>
                                        <option value="გაზის გამათბობელი">გაზის გამათბობელი</option>
                                        <option value="იატაკის გათბობა">იატაკის გათბობა</option>
                                        <option value="დენის გამათბობელი">დენის გამათბობელი</option>
                                    </select>
                                </div>
                                <div class="mb-3 form-group col-md-6 col-12">
                                    <label for="appartment_name">საწყობი </label>
                                    <select class="form-select" name="storage" aria-label="Default select example">
                                        <option value="{{$appartment->storage}}">{{$appartment->storage}}</option>
                                        <option value="სარდაფი">სარდაფი</option>
                                        <option value="სხვენი">სხვენი</option>
                                        <option value="საკუჭნაო">საკუჭნაო</option>
                                        <option value="გარე სათავსო">გარე სათავსო</option>
                                        <option value="საერთო სათავსო">საერთო სათავსო</option>
                                    </select>
                                </div>
                                <div class="mb-3 form-group col-md-6 col-12">
                                    <label for="appartment_name">პარკინგი </label>
                                    <select class="form-select" name="parking" aria-label="Default select example">
                                        <option value="{{$appartment->parking}}">{{$appartment->parking}}</option>
                                        <option value="ავტოფარეხი">ავტოფარეხი</option>
                                        <option value="პარკინგის ადგილი">პარკინგის ადგილი</option>
                                    </select>
                                </div>
                                <div class="mb-3 form-group col-md-6 col-12">
                                    <label for="appartment_name">რუკის ლინკი </label>
                                    <input type="text" class="form-control" value="{{$appartment->map}}" name="map">
                                </div>
                                {{--  --}}
                                <div class="mb-3 form-group col-md-6 col-12">
                                    <label for="appartment_name">საძინებელი </label>
                                    <input type="number" max="10" class="form-control" value="{{$appartment->bedroom}}" name="bedroom">
                                </div>
                                <div class="mb-3 form-group col-md-6 col-12">
                                    <label for="appartment_name">სააბაზანო </label>
                                    <input type="number"  max="10" class="form-control" value="{{$appartment->bathroom}}" name="bathroom">
                                </div>
    
                                <div class="mb-3 form-group col-md-6 col-12">
                                    <label for="appartment_name">სტატუსი </label>
                                    <select class="form-select" name="status" aria-label="Default select example">
                                        <option value="{{$appartment->status}}">{{ $appartment->status == 1 ? 'თავისუფალი' : 'დაკავებული' }}</option>
                                        <option value="1">თავისუფალი</option>
                                        <option value="2">დაკავებული</option>
                                    </select>
                                </div>
                                <div class="mb-3 form-group col-md-6 col-12">
                                    <label for="appartment_name">პრიორიტეტი </label>
                                    <select class="form-select" name="priority" aria-label="Default select example">
                                        <option value="{{$appartment->priority}}">{{ $appartment->priority == 1 ? 'არარის პრიორიტეტული' : 'პრიორიტეტული' }}</option>
                                        <option value="1">არარის პრიორიტეტული</option>
                                        <option value="2">პრიორიტეტული</option>
                                    </select>
                                </div>
                                <div class="mb-3 form-group col-md-6 col-12">
                                    
                                </div>
                                <div class="form-check form-switch col-md-3 col-sm-6 col-12">
                                    <input class="form-check-input" value="1" type="checkbox" {{ $appartment->balcony == 1 ? 'checked' : '' }} name="balcony">
                                    <label class="form-check-label">აივანი</label>
                                </div>
                                <div class="form-check form-switch col-md-3 col-sm-6 col-12">
                                    <input class="form-check-input" value="1" type="checkbox" {{ $appartment->porch == 1 ? 'checked' : '' }} name="porch">
                                    <label class="form-check-label">ვერანდა</label>
                                </div>
                                <div class="form-check form-switch col-md-3 col-sm-6 col-12">
                                    <input class="form-check-input" value="1" type="checkbox" {{ $appartment->loggia == 1 ? 'checked' : '' }} name="loggia">
                                    <label class="form-check-label">ლოჟი</label>
                                </div>
                                <div class="form-check form-switch col-md-3 col-sm-6 col-12">
                                    <input class="form-check-input" value="1" type="checkbox" {{ $appartment->natural_gas == 1 ? 'checked' : '' }} name="natural_gas">
                                    <label class="form-check-label">გაზი</label>
                                </div>
                                <div class="form-check form-switch col-md-3 col-sm-6 col-12">
                                    <input class="form-check-input" value="1" type="checkbox" {{ $appartment->Internet == 1 ? 'checked' : '' }} name="Internet">
                                    <label class="form-check-label">ინტერნეტი</label>
                                </div>
                                <div class="form-check form-switch col-md-3 col-sm-6 col-12">
                                    <input class="form-check-input" value="1" type="checkbox" {{ $appartment->fireplace == 1 ? 'checked' : '' }} name="fireplace">
                                    <label class="form-check-label">ბუხარი</label>
                                </div>
                                <div class="form-check form-switch col-md-3 col-sm-6 col-12">
                                    <input class="form-check-input" value="1" type="checkbox" {{ $appartment->furniture == 1 ? 'checked' : '' }} name="furniture">
                                    <label class="form-check-label">ავეჯი</label>
                                </div>
                                <div class="form-check form-switch col-md-3 col-sm-6 col-12">
                                    <input class="form-check-input" value="1" type="checkbox" {{ $appartment->passenger_elevator == 1 ? 'checked' : '' }} name="passenger_elevator">
                                    <label class="form-check-label">სამგზავრო ლიფთი</label>
                                </div>
                                <div class="form-check form-switch col-md-3 col-sm-6 col-12">
                                    <input class="form-check-input" value="1" type="checkbox" {{ $appartment->freight_elevator == 1 ? 'checked' : '' }} name="freight_elevator">
                                    <label class="form-check-label">სატვირთო ლიფტი</label>
                                </div>
                                <div class="form-check form-switch col-md-3 col-sm-6 col-12">
                                    <input class="form-check-input"  value="1" type="checkbox" {{ $appartment->telephone == 1 ? 'checked' : '' }} name="telephone">
                                    <label class="form-check-label">ტელეფონი</label>
                                </div>
                                <div class="form-check form-switch col-md-3 col-sm-6 col-12">
                                    <input class="form-check-input" value="1" type="checkbox" {{ $appartment->tv == 1 ? 'checked' : '' }} name="tv">
                                    <label class="form-check-label">ტელევიზორი</label>
                                </div>
                                <div class="form-check form-switch col-md-3 col-sm-6 col-12">
                                    <input class="form-check-input" value="1" type="checkbox" {{ $appartment->conditioner == 1 ? 'checked' : '' }} name="conditioner">
                                    <label class="form-check-label">კონდინციონერი</label>
                                </div>
                            </div>
                            <button type="submit" class="mt-3 btn btn-primary">ობიექტის რედაქტირება</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg" id="delete_appartment_{{ $appartment->id }}" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ობიექტის წაშლა</h5>
                        <button type="button" class="close btn btn-primary" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('appartments.destroy', $appartment->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">ობიექტის წაშლა</button>
                            <a href="{{ route('appartments.index') }}" class="btn btn-secondary">უარყოფა</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" id="image_appartment_{{ $appartment->id }}" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">სურათის დამატება</h5>
                        <button type="button" class="close btn btn-primary" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('product_images.store', $appartment->id) }}" enctype="multipart/form-data"
                            method="post">
                            @csrf
                            <div class="mb-3 form-group col-md-6 col-12">
                                <input type="file" class="form-control" name="images[]" multiple required>
                            </div>
                            <button type="submit" class="mb-5 btn btn-primary">ატვირთვა</button>
                        </form>
                        <form action="{{route('product_images.destroy')}}" enctype="multipart/form-data" method="post">
                            @csrf
                            @method('DELETE')
                            <div class="row appartment-image">
                                @foreach ($images->where('product_id', $appartment->id) as $image)
                                    <div class="mb-3 col-6 col-md-3">
                                        <input class="form-check-input" type="checkbox" name="image_input[]" value="{{$image->id}}" id="flexCheckDefault">
                                        <img src="{{ $image->image_path }}" alt="">
                                    </div>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-danger">წაშლა</button>

                        </form>
                        

                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="modal fade bd-example-modal-lg" id="add_appartment" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ობიექტის დამატება</h5>
                    <button type="button" class="close btn btn-primary" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('appartments.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="mb-3 form-group col-md-6 col-12">
                                <label for="appartment_name">სახელი (ქართულად)</label>
                                <input type="text" class="form-control" name="name_ge" required>
                            </div>
                            <div class="mb-3 form-group col-md-6 col-12">
                                <label for="appartment_name">სახელი (ინგლისურად)</label>
                                <input type="text" class="form-control" name="name_en" required>
                            </div>
                            <div class="mb-3 form-group col-md-6 col-12">
                                <label for="appartment_name">მისამართი (ქართულად)</label>
                                <input type="text" class="form-control" name="address_ge" required>
                            </div>
                            <div class="mb-3 form-group col-md-6 col-12">
                                <label for="appartment_name">მისამართი (ინგლისურად)</label>
                                <input type="text" class="form-control" name="address_en" required>
                            </div>
                            <div class="mb-3 form-group col-md-6 col-12">
                                <label for="appartment_name">ქალაქი </label>
                                <select class="form-select" name="city_id" aria-label="Default select example">
                                    <option value="" selected>არჩევა</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name_ge }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 form-group col-md-6 col-12">
                                <label for="appartment_name">უბანი</label>
                                <select class="form-select" name="district_id" aria-label="Default select example">
                                    <option value="" selected>არჩევა</option>
                                    @foreach ($districts as $district)
                                        <option value="{{ $district->id }}">{{ $district->name_ge }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 form-group col-md-6 col-12">
                                <label for="appartment_name">აღწერა (ქართულად)</label>
                                <textarea class="form-control" name="description_ge" cols="30" rows="10"></textarea>
                            </div>
                            <div class="mb-3 form-group col-md-6 col-12">
                                <label for="appartment_name">აღწერა (ინგლისურად)</label>
                                <textarea class="form-control" name="description_en" cols="30" rows="10"></textarea>
                            </div>

                            <div class="mb-3 form-group col-md-6 col-12">
                                <label for="appartment_name">ფასი </label>
                                <input type="number" class="form-control" name="price" required>
                            </div>
                            <div class="mb-3 form-group col-md-6 col-12">
                                <label for="appartment_name">ფართი </label>
                                <input type="number" class="form-control" step="0.1" name="space" required>
                            </div>

                            <div class="mb-3 form-group col-md-6 col-12">
                                <label for="appartment_name">შეთანხმების ტიპი </label>
                                <select class="form-select" name="agreement_type" aria-label="Default select example"
                                    required>
                                    <option value="" selected>არჩევა</option>
                                    <option value="იყიდება">იყიდება</option>
                                    <option value="გირავდება">გირავდება</option>
                                    <option value="ქირავდება">ქირავდება</option>
                                    <option value="ქირავდება დღიურად">ქირავდება დღიურად</option>
                                </select>
                            </div>
                            <div class="mb-3 form-group col-md-6 col-12">
                                <label for="appartment_name">ობიექტის ტიპი </label>
                                <select class="form-select" name="property_type" aria-label="Default select example"
                                    required>
                                    <option value="" selected>არჩევა</option>
                                    <option value="ბინა">ბინა</option>
                                    <option value="სახლელბი & აგარაკები">სახლი ან აგარაკი</option>
                                    <option value="კომერციული ფართები">კომერციული ფართი</option>
                                    <option value="მიწის ნაკვეთები">მიწის ნაკვეთი</option>
                                    <option value="სასტუმროები">სასტუმრო</option>
                                    <option value="ავტოსადგომები">ავტოსადგომი</option>
                                </select>
                            </div>
                            <div class="mb-3 form-group col-md-6 col-12">
                                <label for="appartment_name">რემონტი </label>
                                <select class="form-select" name="repair" aria-label="Default select example">
                                    <option value="" selected>არჩევა</option>
                                    <option value="ახალ გარემონტებული">ახალ გარემონტებული</option>
                                    <option value="ძველი გარემონტებული">ძველი გარემონტებული</option>
                                    <option value="მიმდინარეობს რემონტი">მიმდინარეობს რემონტი</option>
                                    <option value="სარემონტო">სარემონტო</option>
                                    <option value="თეთრი კარკასი">თეთრი კარკასი</option>
                                    <option value="შავი კარკასი">შავი კარკასი</option>
                                    <option value="მწვანე კარკასი">მწვანე კარკასი</option>
                                </select>
                            </div>
                            <div class="mb-3 form-group col-md-6 col-12">
                                <label for="appartment_name">გათბობა </label>
                                <select class="form-select" name="heating" aria-label="Default select example">
                                    <option value="" selected>არჩევა</option>
                                    <option value="ცენტრალური გათბობა">ცენტრალური გათბობა</option>
                                    <option value="გაზის გამათბობელი">გაზის გამათბობელი</option>
                                    <option value="იატაკის გათბობა">იატაკის გათბობა</option>
                                    <option value="დენის გამათბობელი">დენის გამათბობელი</option>
                                </select>
                            </div>
                            <div class="mb-3 form-group col-md-6 col-12">
                                <label for="appartment_name">საწყობი </label>
                                <select class="form-select" name="storage" aria-label="Default select example">
                                    <option value="" selected>არჩევა</option>
                                    <option value="სარდაფი">სარდაფი</option>
                                    <option value="სხვენი">სხვენი</option>
                                    <option value="საკუჭნაო">საკუჭნაო</option>
                                    <option value="გარე სათავსო">გარე სათავსო</option>
                                    <option value="საერთო სათავსო">საერთო სათავსო</option>
                                </select>
                            </div>
                            <div class="mb-3 form-group col-md-6 col-12">
                                <label for="appartment_name">პარკინგი </label>
                                <select class="form-select" name="parking" aria-label="Default select example">
                                    <option value="" selected>არჩევა</option>
                                    <option value="ავტოფარეხი">ავტოფარეხი</option>
                                    <option value="პარკინგის ადგილი">პარკინგის ადგილი</option>
                                </select>
                            </div>
                            <div class="mb-3 form-group col-md-6 col-12">
                                <label for="appartment_name">რუკის ლინკი </label>
                                <input type="text" class="form-control" name="map">
                            </div>
                            {{--  --}}
                            <div class="mb-3 form-group col-md-6 col-12">
                                <label for="appartment_name">საძინებელი </label>
                                <input type="number" max="10" class="form-control" name="bedroom">
                            </div>
                            <div class="mb-3 form-group col-md-6 col-12">
                                <label for="appartment_name">სააბაზანო </label>
                                <input type="number" max="10" class="form-control" name="bathroom">
                            </div>

                            <div class="mb-3 form-group col-md-6 col-12">
                                <label for="appartment_name">სტატუსი </label>
                                <select class="form-select" name="status" aria-label="Default select example">
                                    <option value="1">თავისუფალი</option>
                                    <option value="2">დაკავებული</option>
                                </select>
                            </div>
                            <div class="mb-3 form-group col-md-6 col-12">
                                <label for="appartment_name">პრიორიტეტი </label>
                                <select class="form-select" name="priority" aria-label="Default select example">
                                    <option value="1">არარის პრიორიტეტული</option>
                                    <option value="2">პრიორიტეტული</option>
                                </select>
                            </div>
                            <div class="mb-3 form-group col-md-6 col-12">
                            </div>

                            <div class="form-check form-switch col-md-3 col-sm-6 col-12">
                                <input class="form-check-input" value="1" type="checkbox" name="balcony">
                                <label class="form-check-label">აივანი</label>
                            </div>
                            <div class="form-check form-switch col-md-3 col-sm-6 col-12">
                                <input class="form-check-input" value="1" type="checkbox" name="porch">
                                <label class="form-check-label">ვერანდა</label>
                            </div>
                            <div class="form-check form-switch col-md-3 col-sm-6 col-12">
                                <input class="form-check-input" value="1" type="checkbox" name="loggia">
                                <label class="form-check-label">ლოჟი</label>
                            </div>
                            <div class="form-check form-switch col-md-3 col-sm-6 col-12">
                                <input class="form-check-input" value="1" type="checkbox" name="natural_gas">
                                <label class="form-check-label">გაზი</label>
                            </div>
                            <div class="form-check form-switch col-md-3 col-sm-6 col-12">
                                <input class="form-check-input" value="1" type="checkbox" name="Internet">
                                <label class="form-check-label">ინტერნეტი</label>
                            </div>
                            <div class="form-check form-switch col-md-3 col-sm-6 col-12">
                                <input class="form-check-input" value="1" type="checkbox" name="fireplace">
                                <label class="form-check-label">ბუხარი</label>
                            </div>
                            <div class="form-check form-switch col-md-3 col-sm-6 col-12">
                                <input class="form-check-input" value="1" type="checkbox" name="furniture">
                                <label class="form-check-label">ავეჯი</label>
                            </div>
                            <div class="form-check form-switch col-md-3 col-sm-6 col-12">
                                <input class="form-check-input" value="1" type="checkbox"
                                    name="passenger_elevator">
                                <label class="form-check-label">სამგზავრო ლიფთი</label>
                            </div>
                            <div class="form-check form-switch col-md-3 col-sm-6 col-12">
                                <input class="form-check-input" value="1" type="checkbox" name="freight_elevator">
                                <label class="form-check-label">სატვირთო ლიფტი</label>
                            </div>
                            <div class="form-check form-switch col-md-3 col-sm-6 col-12">
                                <input class="form-check-input" value="1" type="checkbox" name="telephone">
                                <label class="form-check-label">ტელეფონი</label>
                            </div>
                            <div class="form-check form-switch col-md-3 col-sm-6 col-12">
                                <input class="form-check-input" value="1" type="checkbox" name="tv">
                                <label class="form-check-label">ტელევიზორი</label>
                            </div>
                            <div class="form-check form-switch col-md-3 col-sm-6 col-12">
                                <input class="form-check-input" value="1" type="checkbox" name="conditioner">
                                <label class="form-check-label">კონდინციონერი</label>
                            </div>
                        </div>
                        <button type="submit" class="mt-3 btn btn-primary">ობიექტის დამატება</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@stop
