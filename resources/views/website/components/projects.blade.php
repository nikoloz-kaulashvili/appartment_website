@extends('website.index')
@section('content')
<div class="minsection">
    <!--sub-Banner-start-->
    <div class="sub-banner pt-90 pb-90">
        <div class="container">
            <div class="col-md-8 offset-md-2">
                <div class="text-center text-line">
                    <h1>პროექტები</h1>
                    <ul class="text-c">
                        <li>Home</li>
                        <li>|</li>
                        <li class="color-t">პროექტები</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="blog-home pt-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-2 col-xs-12">
                  <div class="blog-h-t">
                    <h2>პროექტები</h2>
                </div>
               </div>
            </div>
            <div class="row">
                @foreach ($projects as $project)
                   <div class="mb-4 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="blog-h">
                            <div class="blog-img">
                                <a href="/projects?id={{$project->id}}"><img src="{{$project->image}}" alt=""></a>
                            </div>
                            <div class="blog-t">
                                <span> {{ $project->created_at->format('Y-m-d') }}</span>
                                <h4><a href="blog-details.html">{{$project->name_ge}} - {{$project->name_en}}</a></h4>
                                <a href="blog-details.html" class="blog-h-btn">დეტალურად</a>
                            </div>
                        </div>
                    </div> 
                @endforeach
                
            </div>
        </div>
    </section>
</div>
@stop