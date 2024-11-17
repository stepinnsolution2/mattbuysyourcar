<!DOCTYPE html>
<html lang="en-US">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <!-- Swiper CSS -->
  <link href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" rel="stylesheet">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
            integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <title>Car - Project</title>
    </head>
<body>
    <div class="main-header">
        <nav>
            <div class="logo">
                <h1>LOGO</h1>
            </div>
            <div class="navs-links">
                <ul>
                    <li>Home</li>
                    <li>About</li>
                    <li>Contact</li>
                    <button class="nav-button">Sell Your Car</button>
                </ul>
            </div>
        </nav>
    </div>
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
  <script src="{{ asset('./js/faq.js') }}"></script>
 <!-- Swiper JS -->

</body>

<!--  16:08 GMT -->
</html>
