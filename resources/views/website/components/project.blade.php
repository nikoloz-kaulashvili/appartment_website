@extends('website.index')
@section('content')
<div class="minsection">
    <!--sub-Banner-start-->
    <div class="sub-banner pt-90 pb-90">
        <div class="container">
            <div class="col-md-8 offset-md-2">
                <div class="text-center text-line">
                    <h1>{{$project->name_ge}}</h1>
                    <ul class="text-c">
                        <li>Home</li>
                        <li>|</li>
                        <li class="color-t">პროექტი</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="pt-60 pb-90 min-ser-s">
        <div class="container">
            <div class="row">
                <div class="col-md-5 pr-70">
                    <div class="img-ser">
                        <img src="{{$project->image}}" alt="" class="img-fluid" />
                    </div>
                </div>
                <div class="col-md-7 pl-90 pt-120">
                    <div class="min-con-ser">
                        <h2>
                            {{$project->name_ge}}
                        </h2>
                        {{$project->description_ge}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</div>
@stop