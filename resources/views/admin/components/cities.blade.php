@extends('admin.index')
@section('content')

    <div class="container-fluid flex-grow-1 container-p-y">
        <form action="/projects" method="get">
            <div class="mt-3 mb-3 form-group d-flex ">
                <button type="button" class="ml-auto btn btn-primary" data-toggle="modal" data-target="#add_city">ქალაქის დამატება</button>
            </div>
        </form>

        <div class="row">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ქალაქი</th>
                        <th scope="col">რედაქტირება</th>
                        <th scope="col">წაშლა</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cities as $city)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{ $city->name_ge }} - {{ $city->name_en }}</td>
                            <td> <button class="btn btn-info" data-toggle="modal"
                                    data-target="#edit_city_{{ $city->id }}">რედაქტირება</button>
                            </td>
                            <td> <button class="ml-4 btn btn-danger" data-toggle="modal"
                                    data-target="#delete_city_{{ $city->id }}">წაშლა</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    @foreach ($cities as $city)
        <div class="modal fade bd-example-modal-lg" id="edit_city_{{ $city->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ქალაქის რედაქტირება</h5>
                        <button type="button" class="close btn btn-primary" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('cities.update', $city->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="city_name">ქალაქის სახელი (ქართულად)</label>
                                <input type="text" class="mb-3 form-control" value="{{$city->name_ge}}" name="name_ge" required>
                            </div>
                            <div class="form-group">
                                <label for="city_name">ქალაქის სახელი (ინგლისურად)</label>
                                <input type="text" class="mb-3 form-control" value="{{$city->name_en}}" name="name_en" required>
                            </div>
                            <button type="submit" class="mt-3 btn btn-primary">ქალაქის რედაქტირება</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg" id="delete_city_{{ $city->id }}" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ქალაქის წაშლა</h5>
                        <button type="button" class="close btn btn-primary" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('cities.destroy', $city->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">ქალაქის წაშლა</button>
                            <a href="{{ route('cities.index') }}" class="btn btn-secondary">უარყოფა</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="modal fade bd-example-modal-lg" id="add_city" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ქალაქის დამატება</h5>
                    <button type="button" class="close btn btn-primary" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('cities.store') }}" method="post">
                        @csrf
                        <div class="mb-3 form-group">
                            <label for="city_name">ქალაქის სახელი (ქართულად)</label>
                            <input type="text" class="form-control" name="name_ge" required>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="city_name">ქალაქის სახელი (ინგლისურად)</label>
                            <input type="text" class="form-control" name="name_en" required>
                        </div>
                        <button type="submit" class="mt-3 btn btn-primary">ქალაქის დამატება</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@stop
