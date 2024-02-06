


@extends('admin.index')
@section('content')

    <div class="container-fluid flex-grow-1 container-p-y">
        <form action="/projects" method="get">
            <div class="mt-3 mb-3 form-group d-flex ">
                <button type="button" class="ml-auto btn btn-primary" data-toggle="modal" data-target="#add_district">უბნის დამატება</button>
            </div>
        </form>

        <div class="row">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">უბანი</th>
                        <th scope="col">ქალაქი</th>
                        <th scope="col">რედაქტირება</th>
                        <th scope="col">წაშლა</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($districts as $district)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{ $district->name_ge }} - {{ $district->name_en }}</td>
                            <td>{{ $district->city_id }}</td>
                            <td> <button class="btn btn-info" data-toggle="modal"
                                    data-target="#edit_district_{{ $district->id }}">რედაქტირება</button>
                            </td>
                            <td> <button class="ml-4 btn btn-danger" data-toggle="modal"
                                    data-target="#delete_district_{{ $district->id }}">წაშლა</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    @foreach ($districts as $district)
        <div class="modal fade bd-example-modal-lg" id="edit_district_{{ $district->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">უბნის რედაქტირება</h5>
                        <button type="button" class="close btn btn-primary" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('districts.update', $district->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 form-group">
                                <label for="city_name">უბნის სახელი (ქართულად)</label>
                                <input type="text" class="form-control" value="{{$district->name_ge}}"  name="name_ge" required>
                            </div>
                            <div class="mb-3 form-group">
                                <label for="city_name">უბნის სახელი (ინგლისური)</label>
                                <input type="text" class="form-control" value="{{$district->name_en}}"  name="name_en" required>
                            </div>
                            <div class="mb-3 form-group">
                                <label for="city_id">აირჩიეთ ქალაქი</label>
                                <select class="form-control" id="city_id"  name="city_id" required>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}" @if($city->id == $district->city_id) selected @endif>{{ $city->name_ge }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="mt-3 btn btn-primary">უბნის რედაქტირება</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg" id="delete_district_{{ $district->id }}" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">უბნის წაშლა</h5>
                        <button type="button" class="close btn btn-primary" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('districts.destroy', $district->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">უბნის წაშლია</button>
                            <a href="{{ route('districts.index') }}" class="btn btn-secondary">გაუქმება</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="modal fade bd-example-modal-lg" id="add_district" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">უბნის დამატება</h5>
                    <button type="button" class="close btn btn-primary" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('districts.store') }}" method="post">
                        @csrf
                        <div class="mb-3 form-group">
                            <label for="city_name">უბნის სახელი (ქართულად)</label>
                            <input type="text" class="form-control"   name="name_ge" required>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="city_name">უბნის სახელი (ინგლისური)</label>
                            <input type="text" class="form-control"  name="name_en" required>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="city_id">აირჩიეთ ქალაქი</label>
                            <select class="form-control" id="city_id" name="city_id" required>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name_ge }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="mt-3 btn btn-primary">უბნის დამატება</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@stop
