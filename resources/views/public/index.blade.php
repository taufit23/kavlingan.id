@extends('public.layouts.master')
@section('title')
    Home
@endsection
@section('content')
    <div class="site-section" id="home-section">
        <div class="container">
            <div class="row align-items-lg-center">
                <div class="col-md-6 mb-5 mb-lg-0 position-relative">
                    <img src="{{ asset('publik/images/about_1.jpg') }}" class="img-fluid" alt="Image">
                    <div class="experience">
                        <span class="year">50 years</span>
                        <span class="caption">of experience</span>
                    </div>
                </div>
                <div class="col-md-5 ml-auto">
                    <h3 class="section-sub-title">About Us</h3>
                    <h2 class="section-title mb-3">Welcome To Consula</h2>
                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui fuga ipsa,
                        repellat blanditiis nihil, consectetur. Consequuntur eum inventore, rem maxime, nisi
                        excepturi ipsam libero ratione adipisci alias eius vero vel!</p>
                    <p><a href="#" class="btn btn-primary btn-black--hover">Learn More</a></p>
                </div>
            </div>
        </div>
    </div>

    {{-- <section class="site-section border-bottom" id="team-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h3 class="section-sub-title">Team</h3>
                    <h2 class="section-title mb-3">Our Team</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
                    <div class="person text-center">
                        <img src="{{ asset('publik/images/person_2.jpg') }}" alt="Image"
                            class="img-fluid rounded-circle w-50 mb-5">
                        <h3>John Rooster</h3>
                        <p class="position text-muted">Co-Founder, President</p>
                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi at consequatur
                            unde molestiae quidem provident voluptatum deleniti quo iste error eos est praesentium
                            distinctio cupiditate tempore suscipit inventore deserunt tenetur.</p>
                        <ul class="ul-social-circle">
                            <li><a href="#"><span class="icon-facebook"></span></a></li>
                            <li><a href="#"><span class="icon-twitter"></span></a></li>
                            <li><a href="#"><span class="icon-linkedin"></span></a></li>
                            <li><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
                    <div class="person text-center">
                        <img src="{{ asset('publik/images/person_3.jpg') }}" alt="Image"
                            class="img-fluid rounded-circle w-50 mb-5">
                        <h3>Tom Sharp</h3>
                        <p class="position text-muted">Co-Founder, COO</p>
                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi at consequatur
                            unde molestiae quidem provident voluptatum deleniti quo iste error eos est praesentium
                            distinctio cupiditate tempore suscipit inventore deserunt tenetur.</p>
                        <ul class="ul-social-circle">
                            <li><a href="#"><span class="icon-facebook"></span></a></li>
                            <li><a href="#"><span class="icon-twitter"></span></a></li>
                            <li><a href="#"><span class="icon-linkedin"></span></a></li>
                            <li><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="300">
                    <div class="person text-center">
                        <img src="{{ asset('publik/images/person_4.jpg') }}" alt="Image"
                            class="img-fluid rounded-circle w-50 mb-5">
                        <h3>Winston Hodson</h3>
                        <p class="position text-muted">Marketing</p>
                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi at consequatur
                            unde molestiae quidem provident voluptatum deleniti quo iste error eos est praesentium
                            distinctio cupiditate tempore suscipit inventore deserunt tenetur.</p>
                        <ul class="ul-social-circle">
                            <li><a href="#"><span class="icon-facebook"></span></a></li>
                            <li><a href="#"><span class="icon-twitter"></span></a></li>
                            <li><a href="#"><span class="icon-linkedin"></span></a></li>
                            <li><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="site-section border-bottom" id="beli-section">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">Fancy Product</h5>
                                <!-- Product price-->
                                $40.00 - $80.00
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Sale badge-->
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale
                        </div>
                        <!-- Product image-->
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">Special Item</h5>
                                <!-- Product reviews-->
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>
                                <!-- Product price-->
                                <span class="text-muted text-decoration-line-through">$20.00</span>
                                $18.00
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Sale badge-->
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale
                        </div>
                        <!-- Product image-->
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">Sale Item</h5>
                                <!-- Product price-->
                                <span class="text-muted text-decoration-line-through">$50.00</span>
                                $25.00
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">Popular Item</h5>
                                <!-- Product reviews-->
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>
                                <!-- Product price-->
                                $40.00
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Sale badge-->
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale
                        </div>
                        <!-- Product image-->
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">Sale Item</h5>
                                <!-- Product price-->
                                <span class="text-muted text-decoration-line-through">$50.00</span>
                                $25.00
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">Fancy Product</h5>
                                <!-- Product price-->
                                $120.00 - $280.00
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Sale badge-->
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale
                        </div>
                        <!-- Product image-->
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">Special Item</h5>
                                <!-- Product reviews-->
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>
                                <!-- Product price-->
                                <span class="text-muted text-decoration-line-through">$20.00</span>
                                $18.00
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">Popular Item</h5>
                                <!-- Product reviews-->
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>
                                <!-- Product price-->
                                $40.00
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <a href="{{ route('home.beli') }}" class="btn btn-outline-primary btn-sm">Lihat Lainya</a>
            </div>
        </div>
    </section>

    <section class="site-section testimonial-wrap" id="testimonials-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h3 class="section-sub-title">People Says</h3>
                    <h2 class="section-title mb-3">Testimonials</h2>
                </div>
            </div>
        </div>
        <div class="slide-one-item home-slider owl-carousel">
            <div>
                <div class="testimonial">

                    <blockquote class="mb-5">
                        <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde
                            reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae
                            illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
                    </blockquote>

                    <figure class="mb-4 d-flex align-items-center justify-content-center">
                        <div><img src="{{ asset('publik/images/person_3.jpg') }}" alt="Image" class="w-50 img-fluid mb-3">
                        </div>
                        <p>John Smith</p>
                    </figure>
                </div>
            </div>
            <div>
                <div class="testimonial">

                    <blockquote class="mb-5">
                        <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde
                            reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae
                            illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
                    </blockquote>
                    <figure class="mb-4 d-flex align-items-center justify-content-center">
                        <div><img src="{{ asset('publik/images/person_2.jpg') }}" alt="Image" class="w-50 img-fluid mb-3">
                        </div>
                        <p>Christine Aguilar</p>
                    </figure>

                </div>
            </div>

            <div>
                <div class="testimonial">

                    <blockquote class="mb-5">
                        <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde
                            reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae
                            illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
                    </blockquote>
                    <figure class="mb-4 d-flex align-items-center justify-content-center">
                        <div><img src="{{ asset('publik/images/person_4.jpg') }}" alt="Image" class="w-50 img-fluid mb-3">
                        </div>
                        <p>Robert Spears</p>
                    </figure>


                </div>
            </div>

            <div>
                <div class="testimonial">

                    <blockquote class="mb-5">
                        <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde
                            reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae
                            illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
                    </blockquote>
                    <figure class="mb-4 d-flex align-items-center justify-content-center">
                        <div><img src="{{ asset('publik/images/person_4.jpg') }}" alt="Image" class="w-50 img-fluid mb-3">
                        </div>
                        <p>Bruce Rogers</p>
                    </figure>

                </div>
            </div>

        </div>
    </section>

    <section class="site-section" id="about-section">
        <div class="container">
            <div class="row mb-5">

                <div class="col-md-5 ml-auto mb-5 order-md-2" data-aos="fade">
                    <img src="{{ asset('publik/images/about_1.jpg') }}" alt="Image" class="img-fluid rounded">
                </div>
                <div class="col-md-6 order-md-1" data-aos="fade">

                    <div class="row">


                        <div class="col-12 mb-4">
                            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet
                                incidunt magnam corrupti, odit eos harum quaerat nostrum voluptatibus aspernatur
                                eligendi accusantium cum, impedit blanditiis voluptate commodi doloribus, nemo
                                dignissimos recusandae.</p>
                        </div>
                        <div class="col-md-12 mb-md-5 mb-0 col-lg-6">
                            <div class="unit-4">
                                <div class="unit-4-icon mr-4 mb-3"><span class="text-primary icon-adb"></span></div>
                                <div>
                                    <h3>Web &amp; Mobile Specialties</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis
                                        consect.</p>
                                    <p class="mb-0"><a href="#">Learn More</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-md-5 mb-0 col-lg-6">
                            <div class="unit-4">
                                <div class="unit-4-icon mr-4 mb-3"><span class="text-primary icon-assignment"></span></div>
                                <div>
                                    <h3>Intuitive Thinkers</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis.
                                    </p>
                                    <p class="mb-0"><a href="#">Learn More</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

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
            <div class="col-md-12 text-center">
                <a href="{{ route('home.blog') }}" class="btn btn-outline-primary btn-sm">Lihat Lainya</a>
            </div>

        </div>
    </section>




@endsection
