<!DOCTYPE html>
<html lang="en-US">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mattbuysyourcar</title>
    <!-- Swiper CSS -->
    <link href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    

</head>
<style>
    /* .background-image{
        background-image: url('images/main-header.jpg');
        background-size: cover;
        width: 100%;
        height:150vh;
        position: relative;
    } */
</style>
<body>
    <header>
        <div class="row">
            <div class="col-12 col-sm-6">
                <nav>
                    <div class="logo">
                        <img src="{{asset('images/logo.png')}}" alt="Logo" class="logo">
                    </div>
                    <div class="navs-links">
                        <ul>
                            <li><a href="#" class="">Home</a></li>
                            <li><a href="#" class="">About</a></li>
                            <li><a href="#" class="">Contact</a></li>
                            <button class="nav-button">Sell Your Car</button>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- is search -->
    @yield('content')
    <footer>
        <div class="upper-footer">
            <h1>Subscribe To Get Updates</h1>
            <h6>Sell your Car in minutes!</h6>
            <div class="input-group mt-3">
                <input type="text" class="form-control" placeholder="Enter Your Mail" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn-footer" type="button" id="button-addon2">Submit</button>
                </div>
        </div>
        <div class="mid-footer">
            <ul>
                <li>About</li>
                <li>Contact Us</li>
                <li>Terms Of Service</li>
            </ul>
        </div>
        <div class="down-footer">
            <div class="left">
                <h5>Copyright 2024. All Right Reserved</h5>
            </div>
            <div class="right">
                <img src="images/facebook.png" alt="">
                <img src="images/linkedin.png" alt="">
                <img src="images/insta.png" alt="">
            </div>
        </div>
    </footer>

  <!-- body-wrapper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
  crossorigin="anonymous"></script>
 <!-- Swiper JS -->

</body>
</html>
