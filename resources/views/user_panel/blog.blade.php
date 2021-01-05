@extends('user_panel.app')

@section('bg-img',asset('frontend_assets/img/home-bg.jpg'))
@section('title','Welcome To NewBlog')
@section('sub-heading',' mighty small from 150 miles up')
@section('posted-by','..')

@section('main-content')
<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @foreach($post_data as $value)
            <div class="post-preview">
                <a href="{{url('post/'.$value->slug)}}">
                    <h2 class="post-title">
                        <!-- Man must explore, and this is exploration at its greatest -->
                        {{$value->title}}
                    </h2>
                    <h3 class="post-subtitle">
                        <!-- Problems look mighty small from 150 miles up -->
                        {{$value->subtitle}}
                    </h3>
                </a>
                <p class="post-meta">Posted by
                    <a href="#">{{$value->role_name}}</a>

                    on {{date('d F Y', strtotime($value->created_at))}}
                </p>
            </div>
            <hr>
            @endforeach
            <!-- <div class="post-preview">
                <a href="post.html">
                    <h2 class="post-title">
                        I believe every human has a finite number of heartbeats. I don't intend to waste any of mine.
                    </h2>
                </a>
                <p class="post-meta">Posted by
                    <a href="#">Start Bootstrap</a>
                    on September 18, 2019
                </p>
            </div>
            <hr>
            <div class="post-preview">
                <a href="post.html">
                    <h2 class="post-title">
                        Science has not yet mastered prophecy
                    </h2>
                    <h3 class="post-subtitle">
                        We predict too much for the next year and yet far too little for the next ten.
                    </h3>
                </a>
                <p class="post-meta">Posted by
                    <a href="#">Start Bootstrap</a>
                    on August 24, 2019
                </p>
            </div>
            <hr>
            <div class="post-preview">
                <a href="post.html">
                    <h2 class="post-title">
                        Failure is not an option
                    </h2>
                    <h3 class="post-subtitle">
                        Many say exploration is part of our destiny, but it’s actually our duty to future generations.
                    </h3>
                </a>
                <p class="post-meta">Posted by
                    <a href="#">Start Bootstrap</a>
                    on July 8, 2019
                </p>
            </div>
            <hr> -->
            <!-- Pager -->
            <div class="clearfix">
                <!-- <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a> -->
                {{$post_data->links()}}

            </div>
        </div>
    </div>
</div>

<hr>
@endsection