@extends('layouts.master')

@section('content')

    <div class="about">
        <div class="container_width">
            <div class="row d_flex">
                <div class="col-md-7">
                    <div class="titlepage text_align_left">
                        <h2>About Corona Virus </h2>
                        <p>English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for
                        </p>
                        <a class="read_more" href="about.html">About More</a>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="about_img text_align_center">
                        <figure><img src="{{themes('images/about.png')}}" alt="#"/></figure>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
