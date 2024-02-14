@extends('website.index')
@section('content')
<div class="minsection">
    <!--sub-Banner-start-->
    <div class="sub-banner pt-90 pb-90">
        <div class="container">
            <div class="col-md-8 offset-md-2">
                <div class="text-center text-line">
                    <h1>დეველოპერები</h1>
                    <ul class="text-c">
                        <li>Home</li>
                        <li>|</li>
                        <li class="color-t">დეველოპერები</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--sub-Banner-End-->
    <section class="popular pb-70">
        <div class="container">
            <div class="row">
                <div class="popular-t pb-30">
                    <br>
                </div>
            </div>
            <div class="row">
                
                @foreach ($developers as $developer)
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <a href="/projects?project_id={{$developer->id}}">
                            <div class="shadow Villa">
                            <img src="{{$developer->image}}" alt="">
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@stop