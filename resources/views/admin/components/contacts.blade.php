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
                        <th scope="col">ელფოსტა</th>
                        <th scope="col">გამოგზავნის თარიღი</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <th scope="row">{{$contact->id}}</th>
                            <td>{{$contact->email}}</td>
                            <td>{{$contact->created_at}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@stop
