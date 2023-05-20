<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
</head>

<body>
    <div class="ps-5 pe-5 pt-5 pb-5 d-flex flex-row justify-content-between" style="background-color: #637784;">
        <div>
            <h1 style="font-family: 'Poppins'; font-weight: 600; color: white;">Subscribe our newsletter
                <br>
                for newest books updates
            </h1>
        </div>
        <div class="d-flex align-items-center">
            <form class="form-inline my-2 my-lg-0 m-auto" onclick="getVal()">
                @csrf
                <input class="subscribe-bar me-3" type="email" id="email-sub" placeholder="Enter your email address">
                <button type="button" class="btn-sub" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Subscribe
                </button>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Subscription</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <span id="show-email"></span>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="ps-5 pe-5 pt-5 pb-5" style="background: #3E3E3E;">
        <div class="footer-top d-flex flex-row justify-content-between pb-5" style="border-bottom: 1px solid #C8C8C8">
            <div class="title-footer flex-column w-50">
                <div class="mb-3">
                    <img width="182px" height="91px" src="{{ Storage::url('assets/logowhite.png') }}">
                </div>
                <div class="text-footer">
                    EbookZ Store is one of the best bookstore that currently happening in Indonesia.
                    You can buy and view books, also get a reward from us!
                </div>
            </div>
            <div class="contact-footer flex-column align-items-center">
                <div class="text-footer">
                    <h1>Contact Us</h1>
                </div>
                <div class="text-footer">
                    Service@gmail.com
                </div>
                <div class="text-footer">
                    Jl. Jalur Sutera Barat
                </div>
                <div class="text-footer">
                    +62
                </div>
            </div>
            <div class="socmed-footer align-items-end">
                <div class = "text-footer">
                    <h1>Follow Us!</h1>
                </div>
                <div class="text-footer">
                    Yes, we are on social media!
                </div>
                <div class="flex-row socmed-icon">
                    <img width="64px" height="64px" src="{{ Storage::url('assets/facebook.png') }}">
                    <img width="64px" height="64px" src="{{ Storage::url('assets/twitter.png') }}">
                    <img width="72px" height="72px" src="{{ Storage::url('assets/instagram.png') }}">
                </div>
            </div>
        </div>
        <div class="mt-5 d-flex footer-bottom align-items-center justify-content-between">
            <div class="text-footer">
                © 2023 Ebookz. All rights reserved
            </div>
            <div class="payment-icon d-flex flex-row">
                <img width="112px" height="45px" src="{{ Storage::url('assets/mandiri.png') }}">
                <img width="112px" height="45px" src="{{ Storage::url('assets/visa.png') }}">
                <img width="112px" height="45px" src="{{ Storage::url('assets/bca.png') }}">
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function genreValidation() {
            let country = document.getElementById("genre").value;

            if (country == 'newgenre') {
                document.getElementById("new-genre-form").style.display = "block";
            } else {
                document.getElementById("new-genre-form").style.display = "none";
            }
        }

        function getVal() {
            let val = document.getElementById("email-sub").value;
            console.log(val.length);
            if (val.length == 0) {
                document.getElementById("show-email").innerHTML = "Please kindly insert your email first!";
            } else if (!(val.endsWith("mail.com"))) {
                document.getElementById("show-email").innerHTML = "Please insert an email!";

            } else {
                document.getElementById("show-email").innerHTML =
                    "Thank you for subscribing ! Any updates will be informed via " + val;
            }
        }
    </script>

</body>

</html>
