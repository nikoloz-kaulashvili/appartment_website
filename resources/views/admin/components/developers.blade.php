@extends('admin.index')
@section('content')

    <div class="container-fluid flex-grow-1 container-p-y">
        <form action="/projects" method="get">
            <div class="mt-3 mb-3 form-group d-flex ">
                {{-- <input type="text" name='search' class="mt-2 form-control search" value=""
                    placeholder="მოძებნე პროექტი">
                <button class="btn btn-primary">ძებნა</button> --}}
                <button type="button" class="ml-auto btn btn-primary" data-toggle="modal"
                    data-target="#add_developer">მწარმოებლის
                    დამატება</button>
            </div>
        </form>

        <div class="row">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">დეველოპერული კომპანია</th>
                        <th scope="col">სურათი</th>
                        <th scope="col">რედაქტირება</th>
                        <th scope="col">წაშლა</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($developers as $developer)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{ $developer->name_ge }} - {{ $developer->name_en }}</td>
                            <td> <img src="{{ $developer->image }}" alt=""></td>
                            <td> <button class="btn btn-info" data-toggle="modal"
                                    data-target="#edit_developer_{{ $developer->id }}">რედაქტირება</button>
                            </td>
                            <td> <button class="ml-4 btn btn-danger" data-toggle="modal"
                                    data-target="#delete_developer_{{ $developer->id }}">წაშლა</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    @foreach ($developers as $developer)
        <div class="modal fade bd-example-modal-lg" id="edit_developer_{{ $developer->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">დეველოპერული კომპანიის რედაქტირება</h5>
                        <button type="button" class="close btn btn-primary" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('developers.update', $developer->id) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="mb-3 form-group">
                                <label for="name_ge">დეველოპერული კომპანიის დასახელება (ქართული)</label>
                                <input type="text" class="form-control" name="name_ge" value="{{ $developer->name_ge }}" required>
                            </div>

                            <div class="mb-3 form-group">
                                <label for="name_en">დეველოპერული კომპანიის დასახელება (ინგლისური)</label>
                                <input type="text" class="form-control" name="name_en" value="{{ $developer->name_en }}" required>
                            </div>

                            <div class="mb-3 form-group">
                                <label for="image">სურათი</label>
                                <input type="file" class="form-control" name="image" value="{{ $developer->image }}" required>
                            </div>

                            <button type="submit " class="btn btn-primary">რედაქტირება</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg" id="delete_developer_{{ $developer->id }}" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">დეველოპერული კომპანიის წაშლა</h5>
                        <button type="button" class="close btn btn-primary" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('developers.destroy', $developer->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">წაშლა</button>
                            <a type="button" class="btn btn-primary" href="{{ route('developers.index') }}">გაუქმება</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="modal fade bd-example-modal-lg" id="add_developer" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">დეველოპერული კომპანიის დამატება</h5>
                    <button type="button" class="close btn btn-primary" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('developers.store') }}" enctype='multipart/form-data' method="POST">
                        @csrf
                        <div class="mb-3 form-group">
                            <label for="name_ge">დეველოპერული კომპანიის დასახელება (ქართული)</label>
                            <input type="text" class="form-control" name="name_ge" required>
                        </div>

                        <div class="mb-3 form-group">
                            <label for="name_en">დეველოპერული კომპანიის დასახელება (ინგლისურად)</label>
                            <input type="text" class="form-control" name="name_en" required>
                        </div>

                        <div class="mb-3 form-group">
                            <label for="image">სურათი</label>
                            <input type="file" class="form-control" name="image" required>
                        </div>

                        <button class="btn btn-primary" type="submit">დამატება</button>
                    </form>

                </div>
            </div>
        </div>
    </div>


@stop
