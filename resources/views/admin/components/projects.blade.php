@extends('admin.index')
@section('content')

    <div class="container-fluid flex-grow-1 container-p-y">
        <form action="/projects" method="get">
            <div class="mt-3 mb-3 form-group d-flex ">
                <button type="button" class="ml-auto btn btn-primary" data-toggle="modal" data-target="#add_project">პროექტის დამატება</button>
            </div>
        </form>

        <div class="row">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">პროექტი</th>
                        <th scope="col">დეველოპერული კომპანია</th>
                        <th scope="col">მისამართი</th>
                        <th scope="col">სურათი</th>
                        <th scope="col">რედაქტირება</th>
                        <th scope="col">წაშლა</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{ $project->name_ge }} - {{ $project->name_en }}</td>
                            <td>{{ $project->developer_id }}</td>
                            <td>{{ $project->address_ge }} - {{ $project->address_ge }}</td>
                            <td><img src="{{ $project->image }}" alt=""></td>
                            <td> <button class="btn btn-info" data-toggle="modal"
                                    data-target="#edit_project_{{ $project->id }}">რედაქტირება</button>
                            </td>
                            <td> <button class="ml-4 btn btn-danger" data-toggle="modal"
                                    data-target="#delete_project_{{ $project->id }}">წაშლა</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    @foreach ($projects as $project)
        <div class="modal fade bd-example-modal-lg" id="edit_project_{{ $project->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">პროექტის რედაქტირება</h5>
                        <button type="button" class="close btn btn-primary" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('projects.update', $project->id) }}" enctype='multipart/form-data' method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="city_name">პროექტის დასახელება (ქართულად)</label>
                                <input type="text" class="form-control" value="{{$project->name_ge}}"  name="name_ge" required>
                            </div>
                            <div class="form-group">
                                <label for="city_name">პროექტის დასახელება (ინგლისურად)</label>
                                <input type="text" class="form-control" value="{{$project->name_en}}"  name="name_en" required>
                            </div>
                            <div class="form-group">
                                <label for="city_id">აირჩიეთ დეველოპერუილი კომპანია</label>
                                <select class="form-control" id="city_id"  name="developer_id" required>
                                    @foreach ($developers as $developer)
                                        <option value="{{ $developer->id }}" @if($developer->id == $project->developer_id) selected @endif>{{ $developer->name_ge }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label >პროექტის მისამართი (ქართულად)</label>
                                <input type="text" class="form-control" value="{{$project->address_ge}}"  name="address_ge" required>
                            </div>
                            <div class="form-group">
                                <label >პროექტის მისამართი (ინგლისურად)</label>
                                <input type="text" class="form-control" value="{{$project->address_en}}" name="address_en" required>
                            </div>
                            <div class="form-group">
                                <label >სურათი</label>
                                <input type="file" class="form-control" value="{{$project->image}}"  name="image" >
                            </div>
                            <div class="form-group">
                                <label for="city_name">პროექტის აღწერა (ქართულად)</label>
                                <textarea name="description_ge" class="form-control" value="{{$project->description_ge}}" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="city_name">პროექტის აღწერა (ინგლისურად)</label>
                                <textarea name="description_en" class="form-control" value="{{$project->description_en}}" cols="30" rows="10"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">პროექტის რედაქტირება</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg" id="delete_project_{{ $project->id }}" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">კატეგორიის წაშლა</h5>
                        <button type="button" class="close btn btn-primary" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('projects.destroy', $project->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">პროექტის წაშლა</button>
                            <a href="{{ route('projects.index') }}" class="btn btn-secondary">გაუქმება</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="modal fade bd-example-modal-lg" id="add_project" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">კატეგორიის დამატება</h5>
                    <button type="button" class="close btn btn-primary" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('projects.store') }}" enctype='multipart/form-data' method="post">
                        @csrf
                        <div class="form-group">
                            <label >პროექტის დასახელება (ქართულად)</label>
                            <input type="text" class="form-control"   name="name_ge" required>
                        </div>
                        <div class="form-group">
                            <label >პროექტის დასახელება (ინგლისურად)</label>
                            <input type="text" class="form-control"  name="name_en" required>
                        </div>
                        <div class="form-group">
                            <label for="developer_id">აირჩიეთ დეველოპერული კომპანია</label>
                            <select class="form-control" id="developer_id" name="developer_id" required>
                                @foreach ($developers as $developer)
                                    <option value="{{ $developer->id }}">{{ $developer->name_ge }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label >პროექტის მისამართი (ქართულად)</label>
                            <input type="text" class="form-control"   name="address_ge" required>
                        </div>
                        <div class="form-group">
                            <label >პროექტის მისამართი (ინგლისურად)</label>
                            <input type="text" class="form-control"  name="address_en" required>
                        </div>
                        <div class="form-group">
                            <label >სურათი</label>
                            <input type="file" class="form-control"   name="image" required>
                        </div>
                        <div class="form-group">
                            <label for="city_name">პროექტის აღწერა (ქართულად)</label>
                            <textarea name="description_ge" class="form-control"  cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="city_name">პროექტის აღწერა (ინგლისური)</label>
                            <textarea name="description_en" class="form-control"  cols="30" rows="10"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">დამატება</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@stop
