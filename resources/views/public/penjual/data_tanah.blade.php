@extends('public.penjual.layouts.master')
@section('title')
    Data Tanah
@endsection

@section('content')
    <div id="colorlib-main">
        <section class="ftco-section ftco-no-pt ftco-no-pb">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-xl-8 px-md-5 py-5">
                        <a href="{{ route('penjual.data_tanah.jual') }}" class="btn btn-sm btn-block btn-info">Tambah
                            Tanah</a>
                        <div class="row pt-md-4">
                            <div class="col-md-12">
                                <div class="blog-entry-2 ftco-animate">
                                    <a href="single.html" class="img"
                                        style="background-image: url({{ url('publik/penjual/images/image_1.jpg') }});"></a>
                                    <div class="text pt-4">
                                        <h3 class="mb-4"><a href="#">Nama Iklan Tanah</a></h3>
                                        <p class="mb-4">Deskripsi Iklan Tanah</p>
                                        <div class="author mb-4 d-flex align-items-center">
                                            <div class="ml-3 info">
                                                <h3><a href="#">Luas Tanah</a>, <span>214132131 H.a</span></h3>
                                                <h3><a href="#">Tanggal Posting</a>, <span>June 28, 2019</span></h3>
                                            </div>
                                        </div>
                                        <div class="meta-wrap d-md-flex align-items-center">
                                            <div class="half order-md-last text-md-right">
                                                <p class="meta">
                                                    <span><i class="icon-heart"></i>3</span>
                                                    <span><i class="icon-eye"></i>100</span>
                                                    <span><i class="icon-comment"></i>5</span>
                                                </p>
                                            </div>
                                            <div class="half">
                                                <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Continue
                                                        Reading</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- END-->
                    </div>
                    {{-- <div class="col-xl-4 sidebar ftco-animate bg-light pt-5">
                        <div class="sidebar-box pt-md-4">
                            <form action="#" class="search-form">
                                <div class="form-group">
                                    <span class="icon icon-search"></span>
                                    <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                                </div>
                            </form>
                        </div>
                        <div class="sidebar-box ftco-animate">
                            <h3 class="sidebar-heading">Categories</h3>
                            <ul class="categories">
                                <li><a href="#">Fashion <span>(6)</span></a></li>
                                <li><a href="#">Technology <span>(8)</span></a></li>
                                <li><a href="#">Travel <span>(2)</span></a></li>
                                <li><a href="#">Food <span>(2)</span></a></li>
                                <li><a href="#">Photography <span>(7)</span></a></li>
                            </ul>
                        </div>

                        <div class="sidebar-box ftco-animate">
                            <h3 class="sidebar-heading">Popular Articles</h3>
                            <div class="block-21 mb-4 d-flex">
                                <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                                <div class="text">
                                    <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control</a></h3>
                                    <div class="meta">
                                        <div><a href="#"><span class="icon-calendar"></span> June 28, 2019</a></div>
                                        <div><a href="#"><span class="icon-person"></span> Dave Lewis</a></div>
                                        <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-21 mb-4 d-flex">
                                <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                                <div class="text">
                                    <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control</a></h3>
                                    <div class="meta">
                                        <div><a href="#"><span class="icon-calendar"></span> June 28, 2019</a></div>
                                        <div><a href="#"><span class="icon-person"></span> Dave Lewis</a></div>
                                        <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-21 mb-4 d-flex">
                                <a class="blog-img mr-4" style="background-image: url(images/image_3.jpg);"></a>
                                <div class="text">
                                    <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control</a></h3>
                                    <div class="meta">
                                        <div><a href="#"><span class="icon-calendar"></span> June 28, 2019</a></div>
                                        <div><a href="#"><span class="icon-person"></span> Dave Lewis</a></div>
                                        <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="sidebar-box ftco-animate">
                            <h3 class="sidebar-heading">Tag Cloud</h3>
                            <ul class="tagcloud">
                                <a href="#" class="tag-cloud-link">animals</a>
                                <a href="#" class="tag-cloud-link">human</a>
                                <a href="#" class="tag-cloud-link">people</a>
                                <a href="#" class="tag-cloud-link">cat</a>
                                <a href="#" class="tag-cloud-link">dog</a>
                                <a href="#" class="tag-cloud-link">nature</a>
                                <a href="#" class="tag-cloud-link">leaves</a>
                                <a href="#" class="tag-cloud-link">food</a>
                            </ul>
                        </div>

                        <div class="sidebar-box subs-wrap img py-4" style="background-image: url(images/bg_1.jpg);">
                            <div class="overlay"></div>
                            <h3 class="mb-4 sidebar-heading">Newsletter</h3>
                            <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia</p>
                            <form action="#" class="subscribe-form">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Email Address">
                                    <input type="submit" value="Subscribe" class="mt-2 btn btn-white submit">
                                </div>
                            </form>
                        </div>

                        <div class="sidebar-box ftco-animate">
                            <h3 class="sidebar-heading">Archives</h3>
                            <ul class="categories">
                                <li><a href="#">December 2018 <span>(10)</span></a></li>
                                <li><a href="#">September 2018 <span>(6)</span></a></li>
                                <li><a href="#">August 2018 <span>(8)</span></a></li>
                                <li><a href="#">July 2018 <span>(2)</span></a></li>
                                <li><a href="#">June 2018 <span>(7)</span></a></li>
                                <li><a href="#">May 2018 <span>(5)</span></a></li>
                            </ul>
                        </div>


                        <div class="sidebar-box ftco-animate">
                            <h3 class="sidebar-heading">Paragraph</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem
                                necessitatibus voluptate quod mollitia delectus aut.</p>
                        </div>
                    </div><!-- END COL --> --}}
                </div>
            </div>
        </section>
    </div><!-- END COLORLIB-MAIN -->
@endsection
