@extends('layout.header')

@section('title', 'Library')

@section('content')
<link rel="stylesheet" href="{{ asset('css/library.css') }}">
<section class="row align-items-center justify-content-center">
            <div class="col-4">
                <div class="p-2 header1"><h1>New & Trending</h1></div>
                <div class="p-2 desc">Get to know the books everyone loves and read right now!</div>
                <div class="p-2 buttonText"><button class="greyButton" style="padding: 9px;">Explore now</button></div>
            </div>
            <div class="col-8">
                <div class="text-center p-2">
                    <img src="GoTG 3.jpg" style="width: 70%;" />
                </div>
            </div>
        </section>

        <!-- Featured Categories -->
        <section>
            <div class="row justify-content-between align-items-center g-2">
                <div class="col header2"><h1>Featured Categories</h1></div>
                <div class="col desc" style="text-align: right;">All Categories</div>
            </div>
            <div class="row justify-content-center align-items-center g-2">
                <div class="col">
                    <div class="text-center">
                      <span class="fa-stack fa-2x">
                        <i class="fa-solid fa-circle fa-stack-2x" style="color: #DEDEDE;"></i>
                        <i class="fas fa-user-secret fa-stack-1x fa-inverse" style="color: #bb86fc;"></i>
                      </span>
                    </div>
                    <div class="text-center desc">Crime</div>
                </div>
                <div class="col">
                  <div class="text-center">
                    <span class="fa-stack fa-2x">
                      <i class="fa-solid fa-circle fa-stack-2x" style="color: #DEDEDE;"></i>
                      <i class="fas fa-ghost fa-stack-1x fa-inverse" style="color: #fa496d;"></i>
                    </span>
                  </div>
                  <div class="text-center desc">Horror</div>
                </div>
                <div class="col">
                  <div class="text-center">
                    <span class="fa-stack fa-2x">
                      <i class="fa-solid fa-circle fa-stack-2x" style="color: #DEDEDE;"></i>
                      <i class="fas fa-heart fa-stack-1x fa-inverse" style="color: #e67a7a;"></i>
                    </span>
                  </div>
                  <div class="text-center desc">Romance</div>
                </div>
                <div class="col">
                  <div class="text-center">
                    <span class="fa-stack fa-2x">
                      <i class="fa-solid fa-circle fa-stack-2x" style="color: #DEDEDE;"></i>
                      <i class="fas fa-feather fa-stack-1x fa-inverse" style="color: #99e5e9;"></i>
                    </span>
                  </div>
                  <div class="text-center desc">Biography</div>
                </div>
                <div class="col">
                  <div class="text-center">
                    <span class="fa-stack fa-2x">
                      <i class="fa-solid fa-circle fa-stack-2x" style="color: #DEDEDE;"></i>
                      <i class="fas fa-stethoscope fa-stack-1x fa-inverse" style="color: #EAB4B4;"></i>
                    </span>
                  </div>
                  <div class="text-center desc">Health</div>
                </div>
                <div class="col">
                    <div class="text-center">
                    <span class="fa-stack fa-2x">
                      <i class="fa-solid fa-circle fa-stack-2x" style="color: #DEDEDE;"></i>
                      <i class="fas fa-wand-magic fa-stack-1x fa-inverse" style="color: #EAC6AC;"></i>
                    </span>
                  </div>
                  <div class="text-center desc">Fantasy</div>
                </div>
                <div class="col">
                  <div class="text-center">
                    <span class="fa-stack fa-2x">
                      <i class="fa-solid fa-circle fa-stack-2x" style="color: #DEDEDE;"></i>
                      <i class="fas fa-children fa-stack-1x fa-inverse" style="color: #d49139;"></i>
                    </span>
                  </div>
                  <div class="text-center desc">Children</div>
                </div>
            </div>
        </section>

        <!-- Jump to books based on.. -->
        <section>
          <div class="row justify-content-center align-items-center g-2">
            <div class="col-md-4 col-8">
              <div class="card" style="background-color: #E2D8EE;">
                <div class="card-body">
                  <h4 class="card-title header3">New Books</h4>
                  <div class="row">
                    <div class="col-8">
                      <p class="card-text desc">Get the latest book with the touch of your hand</p>
                    </div>
                    <div class="col-4 p-2">
                      <img src="GoTG 3.jpg" style="max-width: 100%; height: auto;">
                    </div>
                  </div>
                  <div class="row">
                    <button class="greyButton">Shop Now</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-8">
              <div class="card" style="background-color: #ECE6D4;">
                <div class="card-body">
                  <h4 class="card-title header3">Trending Now</h4>
                  <div class="row">
                    <div class="col-8">
                      <p class="card-text desc">See what everyone read these days</p>
                    </div>
                    <div class="col-4 p-2">
                      <img src="GoTG 3.jpg" style="max-width: 100%; height: auto;">
                    </div>
                  </div>
                  <div class="row">
                    <button class="greyButton">Shop Now</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-8">
              <div class="card" style="background-color: #ECDBDB;">
                <div class="card-body">
                  <h4 class="card-title header3">Recommended</h4>
                  <div class="row">
                    <div class="col-8">
                      <p class="card-text desc">See what we especially pick for you today</p>
                    </div>
                    <div class="col-4 p-2">
                      <img src="GoTG 3.jpg" style="max-width: 100%; height: auto;">
                    </div>
                  </div>
                  <div class="row">
                    <button class="greyButton">Shop Now</button>
                  </div>
                </div>
              </div>
            </div>
        </section>

        <!-- New Books -->
        <section>
          <div class="row"><h1 class="header2">New Books</h1></div>
          <div class="row justify-content-center">
            <div class="col-md-4 col-8">
              <div class="row">
                <div class="col-4">
                  <img src="Atomic Habits.jpg" class="w-100">
                </div>
                <div class="col-8 col-md-4">
                  <div class="p-2">
                    <span class="inline-block card-genre">Mystery</span>
                    <span class="inline-block card-rating"><i class="fa-solid fa-star" style="color: #ffa219;"></i>5.0</span>
                  </div>
                  <div class="p-2">
                    <h5 class="card-header">Atomic Habits</h5>
                    <p class="desc">James Clear</p>
                  </div>
                  <div class="p-2">
                    <h5 class="book-price">Rp 20.000</h5>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-8">
              <div class="row">
                <div class="col-4">
                  <img src="Atomic Habits.jpg" class="w-100">
                </div>
                <div class="col-8 col-md-4">
                  <div class="p-2">
                    <span class="inline-block card-genre">Mystery</span>
                    <span class="inline-block card-rating"><i class="fa-solid fa-star" style="color: #ffa219;"></i>5.0</span>
                  </div>
                  <div class="p-2">
                    <h5 class="card-header">Atomic Habits</h5>
                    <p class="desc">James Clear</p>
                  </div>
                  <div class="p-2">
                    <h5 class="book-price">Rp 20.000</h5>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-8">
              <div class="row">
                <div class="col-4">
                  <img src="Atomic Habits.jpg" class="w-100">
                </div>
                <div class="col-8 col-md-4">
                  <div class="p-2">
                    <span class="inline-block card-genre">Mystery</span>
                    <span class="inline-block card-rating"><i class="fa-solid fa-star" style="color: #ffa219;"></i>5.0</span>
                  </div>
                  <div class="p-2">
                    <h5 class="card-header">Atomic Habits</h5>
                    <p class="desc">James Clear</p>
                  </div>
                  <div class="p-2">
                    <h5 class="book-price">Rp 20.000</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!--  -->
        <section>
          <div>
            <h2 class="header2">Best Sellers</h2>
            <div id="carouselExampleCaptions" class="carousel slide">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active align-items-center">
                  <img src="Atomic Habits.jpg" class="d-block mx-auto w-25" alt="...">
                  <div class="carousel-caption d-none d-md-block dark-caption">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                  </div>
                </div>
                <div class="carousel-item align-items-center">
                  <img src="Atomic Habits.jpg" class="d-block mx-auto w-25" alt="...">
                  <div class="carousel-caption d-none d-md-block dark-caption">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                  </div>
                </div>
                <div class="carousel-item align-items-center">
                  <img src="Atomic Habits.jpg" class="d-block mx-auto w-25" alt="...">
                  <div class="carousel-caption d-none d-md-block dark-caption">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                  </div>
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </section>

        <section>
            <h1 class="header2">Recommendation</h1>
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <div class="card mb-3">
                      <div class="w-100 overflow-hidden p-3 d-flex align-items-center">
                        <img src="Atomic Habits.jpg" class="w-25 object-fit-cover mx-auto" alt="...">
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="card mb-3">
                      <div class="w-100 overflow-hidden p-3 d-flex align-items-center">
                        <img src="No Longer Human.jpeg" class="w-25 object-fit-cover mx-auto" alt="...">
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="card mb-3">
                      <div class="w-100 overflow-hidden p-3 d-flex align-items-center">
                        <img src="GoTG 3.jpg" class="w-25 object-fit-cover mx-auto" alt="...">
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      </div>
                    </div>
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
        </section>
        <section>
            <div><h1 class="header2">Special Offers</h1></div>
            <div>Explore our exclusive collection of discounted books from the amazing publishers. Uncover literary gems and indulge in captivating stories at unbeatable prices. Shop now and ignite your passion for reading!</div>
            <div class="row justify-content-center">
                <div class="col-md-4 col-8">
                    <div class="card text-start">
                      <img class="card-img-top" src="Atomic Habits.jpg" alt="Title">
                      <div class="card-body">
                        <h4 class="card-title">Title</h4>
                        <p class="card-text">Body</p>
                      </div>
                    </div>
                </div>
                <div class="col-md-4 col-8">
                  <div class="card text-start">
                  <img class="card-img-top" src="Atomic Habits.jpg" alt="Title">
                  <div class="card-body">
                    <h4 class="card-title">Title</h4>
                    <p class="card-text">Body</p>
                  </div>
                </div>
                </div>
                <div class="col-md-4 col-8">
                  <div class="card text-start">
                  <img class="card-img-top" src="Atomic Habits.jpg" alt="Title">
                  <div class="card-body">
                    <h4 class="card-title">Title</h4>
                    <p class="card-text">Body</p>
                  </div>
                </div>
                </div>
            </div>
        </section>
    </main>
@endsection
