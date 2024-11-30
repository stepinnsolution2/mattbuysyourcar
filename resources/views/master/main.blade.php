<!DOCTYPE html>
<html lang="en-US">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('images/favicons.png') }}" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"><link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,500,500italic,700,700italic'><link rel="stylesheet" href="./style.css">
    <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@100..900&display=swap" rel="stylesheet">
    <title>Mattbuysyourcar</title>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/gallery.css') }}">


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
                        <a href="{{ url('/#home') }}">
                            <img src="{{asset('images/logo.png')}}" alt="Logo" class="logo">
                        </a>
                    </div>
                    <div class="navs-links">
                        <ul>
                            <li><a href="{{ url('/#home') }}" class="">Home</a></li>
                            <li><a href="{{ url('/#about_us') }}" class="">About</a></li>
                            <button class="nav-button"><a href="#exampleModa" style="text-decoration:none;color:black;">Sell Your Car</a></button>
                        </ul>
                    </div>
                    <div class="mobile-nav-links">
                        <button id="menu-toggle" style="text-decoration:none;color:black;" class="nav-button">☰</button>
                        <ul id="menu" class="menu">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('/#about_us') }}">About</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- is search -->
    @yield('content')
    <footer>
        <div class="row">
            <div class="col-md-12 col-sm-12 justify-content-center">
                <div class="upper-footer">
                    <h1>Subscribe To Get Updates</h1>
                    <h6>Sell your Car in minutes!</h6>
                    <div class="input-group mt-3">
                        <input type="text" id="email_sub" class="form-control" placeholder="Enter Your Mail" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn-footer" type="button" id="button-addon2">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="mid-footer">
                    <ul>
                        <li><a href="{{ url('/#about_us') }}">About</a></li>
                        <li><a href="">Terms Of Service</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- <div class="row justify-content-between">
            <div class="col-md-6 col-sm-12 p-0">
            <div class="down-footer">
                <div class="left">
                    <h6>Copyright &copy 2024. All Right Reserved</h6>
                </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 p-0">
                <div class="down-footer">
                    <div class="right">
                        <img src="images/facebook.png" width="10px" alt="">
                        <img src="images/linkedin.png" width="10px" alt="">
                        <img src="images/insta.png" width="10px" alt="">
                    </div>
                </div>
            </div>
        </div> -->
        <div class="down-footer">
            <div class="left">
                <h6>Copyright &copy 2024. All Right Reserved</h6>
            </div>
            <div class="right">
                @if($setting->facebook_link)
                    <a href="{{ $setting->facebook_link }}">
                        <img src="{{ asset('images/facebook.png') }}" class="social-image" width="25px" alt="Facebook">
                    </a>
                @endif

                @if($setting->linkedin_link)
                    <a href="{{ $setting->linkedin_link }}">
                        <img src="{{ asset('images/linkedin.png') }}" class="social-image" width="25px" alt="LinkedIn">
                    </a>
                @endif

                @if($setting->instagram_link)
                    <a href="{{ $setting->instagram_link }}">
                        <img src="{{ asset('images/insta.png') }}" class="social-image" width="25px" alt="Instagram">
                    </a>
                @endif
                @if($setting->twitter_link)
                    <a href="{{ $setting->twitter_link }}">
                        <img src="{{ asset('images/twitter.png') }}" class="social-image" width="25px" alt="Twitter">
                    </a>
                @endif

                @if($setting->utube_link)
                    <a href="{{ $setting->utube_link }}">
                        <img src="{{ asset('images/youtube.png') }}" class="social-image" width="25px" alt="YouTube">
                    </a>
                @endif
            </div>
        </div>
    </footer>

    <script>
		(function (w, d, s, u) {
		w.gbwawc = {
		url: u,
		options: {
				waId: "923078558517",
				siteName: "Matthew Garth",
				siteTag: "Typically replies within an hour",
				siteLogo: "{{ asset('images/logo.png') }}",
				widgetPosition: "RIGHT",
				triggerMessage: "Chat with me...",
				welcomeMessage: "Hi there 👋",
				brandColor: "#25D366",
				messageText: "How can I help you?",
				replyOptions: ['Consult with me about your Car'],
                widgetPositionMarginX: "35",
                widgetPositionMarginY: "50",
			},
		};
		var h = d.getElementsByTagName(s)[0],
		j = d.createElement(s);
		j.async = true;
		j.src = u + "/whatsapp-widget.min.js?_=" + Math.random();
		h.parentNode.insertBefore(j, h);
		})(window, document, "script", "https://waw.gallabox.com");
	</script>

    <script>
	$(document).ready(function() {

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$('#button-addon2').on('click', function(event) {
			event.preventDefault(); // Prevent the default form submission

			// Simple JS validation
			const email = $('#email_sub').val().trim();

			function validateEmail(email) {
				const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
				return emailRegex.test(email);
			}

			if (email === '') {
				Swal.fire({
					icon: 'warning',
					title: 'Validation Error',
					text: 'Email is required. Please fill them out.',
					confirmButtonText: 'OK'
				});
				return;
			}

			if (!validateEmail(email)) {
				Swal.fire({
					icon: 'warning',
					title: 'Invalid Email',
					text: 'Please enter a valid email address.',
					confirmButtonText: 'OK'
				});
				return;
			}

			// Collect form data
			const formData = {
				email: $('#email_sub').val()
			};
			// Send AJAX request
			$.ajax({
				url: '{{ url('subscribe/store') }}', // Replace with your server endpoint
				type: 'POST',
				data: formData,
				success: function(response) {
					// Display SweetAlert success message
					if(response.status){
						Swal.fire({
							icon: 'success',
							title: 'Success!',
							text: 'Successfully Subscribed.',
							confirmButtonText: 'OK'
						});
					}else{
						Swal.fire({
							icon: 'warning',
							title: 'Warning!',
							text: 'Already Subscribed.',
							confirmButtonText: 'OK'
						});
					}

					// Reset the form fields
					$('#email_sub').val("");
				},
				error: function(xhr, status, error) {
					// Display SweetAlert error message
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Something went wrong! Please try again later.',
						confirmButtonText: 'OK'
					});
				}
			});
		});
	});
	</script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const toggleButton = document.getElementById("menu-toggle");
            const menu = document.getElementById("menu");

            toggleButton.addEventListener("click", function () {
                menu.classList.toggle("active"); // Toggle the 'active' class
            });
        });
    </script>

  <!-- body-wrapper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
 <!-- Swiper JS -->

</body>
</html>
