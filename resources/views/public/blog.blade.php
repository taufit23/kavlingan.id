@extends('public.layouts.master')
@section('title')
    Home
@endsection
@section('content')
    <section class="site-section" id="blog-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h3 class="section-sub-title">Blog</h3>
                    <h2 class="section-title mb-3">Our Blog Posts</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                    <div class="h-entry">
                        <img src="{{ asset('publik/images/img_1.jpg') }}" alt="Image" class="img-fluid">
                        <h2 class="font-size-regular"><a href="#">Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit.</a></h2>
                        <div class="meta mb-4">Ham Brook <span class="mx-2">&bullet;</span> Jan 18, 2019<span
                                class="mx-2">&bullet;</span> <a href="#">News</a></div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores
                            sapiente veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>
                        <p><a href="#">Continue Reading...</a></p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                    <div class="h-entry">
                        <img src="{{ asset('publik/images/img_2.jpg') }}" alt="Image" class="img-fluid">
                        <h2 class="font-size-regular"><a href="#">Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit.</a></h2>
                        <div class="meta mb-4">James Phelps <span class="mx-2">&bullet;</span> Jan 18, 2019<span
                                class="mx-2">&bullet;</span> <a href="#">News</a></div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores
                            sapiente veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>
                        <p><a href="#">Continue Reading...</a></p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                    <div class="h-entry">
                        <img src="{{ asset('publik/images/img_1.jpg') }}" alt="Image" class="img-fluid">
                        <h2 class="font-size-regular"><a href="#">Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit.</a></h2>
                        <div class="meta mb-4">James Phelps <span class="mx-2">&bullet;</span> Jan 18, 2019<span
                                class="mx-2">&bullet;</span> <a href="#">News</a></div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores
                            sapiente veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>
                        <p><a href="#">Continue Reading...</a></p>
                    </div>
                </div>

            </div>
        </div>
    </section>
@stop
