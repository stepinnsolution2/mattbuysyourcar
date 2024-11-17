@extends('master.main')
<style>
    .btn-bg-warning {
        border: 1px solid black; /* Black outline */
        color: black;           /* Black font color */
        background-color: transparent; /* Transparent background */
        transition: background-color 0.3s ease; /* Smooth transition for hover effect */
    }
    /* Hover effect for input buttons */
    .btn-bg-warning:hover {
        background-color: yellow;
        color: black; /* Optional: change text color for contrast */
    }

    /* Maintain focus style when active */
    .btn-bg-warning.active {
        background-color: yellow;
        color: black;
    }
</style>
@section('content')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">



<div>
    <div class="box">
        <h1>tell us about your car</h1>
        <h6>Car Information</h6>
        <form action="#" method="post">
            <div class="row">
                <div class="input-group mb-3">
                    <select class="form-select" id="inputGroupSelect02">
                        <option selected>Type of Car</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <select class="form-select" id="inputGroupSelect02">
                        <option selected>Model of Car</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <input class="form-control" type="text" placeholder="Specification/Trim (e.g.,“E350 Sport”)"
                        aria-label="default input example">
                </div>
                <div class="input-group mb-3">
                    <input class="form-control" type="text" placeholder="Engine Size(1499cc)"
                        aria-label="default input example">
                </div>
                <div class="input-group mb-3">
                    <select class="form-select" id="inputGroupSelect02">
                        <option selected>Year</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <input class="form-control" type="text" placeholder="Engine Size(1499cc)"
                        aria-label="default input example">
                </div>
            </div>
            <button class="button">Next</button>
        </form>
    </div>
</div>



    <!-- Modal -->
        <div class="modal fade" id="carDetailsModal" tabindex="-1" aria-labelledby="carDetailsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="background-color: #1d1d1d; color: white; border-radius: 15px;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="carDetailsModalLabel">TELL US ABOUT YOUR CAR</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="step2Form">
                            @csrf
                            <input type="hidden" name="step" value="2">




                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-warning" style="background-color: #ffcc00; color: black;">Next</button>
                    </div>
                            <button type="button" class="button" onclick="submitStep2()">Submit</button>
                        </form>
                    </div>
            </div>
        </div>

        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#carDetailsModal">
            Tell Us About Your Car
        </button>



<!-- ===========================================================Second Part========================================================================= -->


<div class="second-part">
    <div class="row">
        <div class="ninty">
            <h1 class="rotated-heading">شهادات</h1>
        </div>
        <div class="second-text col-3">
            <h4>Testimonials</h4>
            <h1>What our clients says about us</h1>
            <p>Lorem ipsum dolor sit amet consectetur. Massa nunc cras nisl pellentesque integer sed. amet
                consectetur. Massa nunc cras nisl pellentesque integer sed.</p>
            <button>Sell Your Car</button>
        </div>
        <div class="second-img1 col-4">
            <img src="{{ asset('images/second-image1.JPG') }}" alt="noImage">
        </div>
        <div class="second-img2 col-4">
            <img src="{{ asset('images/second-image2.JPG') }}" alt="noImage">
        </div>
    </div>
</div>



<!-- ==============================================================Third Part====================================================================== -->

<div class="third-part">
    <div class="main-faq">
        <h3 class="faq-yellow-text">FAQ</h3>
        <h1>Frequently Asked Questions</h1>
        <p class="faq-para">Lorem ipsum dolor sit amet consectetur. Massa nunc cras nisl<br> pellentesque integer
            sed. In tortor </p>
        <div class="faqs-container">
            @foreach ($faqs as $faq)
            <div class="faq ">
                <h3 class="faq-title">{{$faq->question}}</h3>
                <p class="faq-text">{{$faq->answer}}</p>
                <button class="faq-toggle">
                    <i class="fa-solid fa-circle-plus"></i>
                    <i class="fa-solid fa-circle-minus"></i>
                </button>
            </div>
            @endforeach



        </div>
    </div>
</div>

<!-- ========================================================fourth part=================================================================================== -->
<div class="fourth-part">
    <div class="row fourth-part-div">
        <div class="left-img">
            <img src="{{ asset('images/fourth.png') }}" alt="Not Found">
        </div>
        <div class="right-text">
            <h4 style="color:#d1be0f;">About us</h4>
            <h1>The story behind our Journey.</h1>
            <p>Lorem ipsum dolor sit amet consectetur. Massa nunc cras nisl pellentesque integer sed. In tortor
                fermentum vel semper vestibulum enim congue ut sit. Eu risus lobortis purus ipsum at. Volutpat
                integer faucibus a massa phasellus id rhoncus ultricies.</p>
            <button>More About Us</button>
        </div>
    </div>
</div>

<!-- ============================================================fifth part==================================================================== -->


<div class="fifth-part">
    <div class="row">
        <div class="ninty">
            <h1 class="rotated-heading">لماذا نحن؟</h1>
        </div>
        <div class="fifth-text col-4">
            <h1>What sets us Apart?</h1>
            <p>Lorem ipsum dolor sit amet consectetur. Massa nunc cras nisl pellentesque integer sed. In tortor
                fermentum vel semper vestibulum enim congue ut sit. Eu risus lobortis purus ipsum at. Volutpat
                integer faucibus a massa phasellus id rhoncus ultricies.</p>
            <br>
            <p>Lorem ipsum dolor sit amet consectetur. Massa nunc cras nisl pellentesque integer sed. In tortor
                fermentum vel semper vestibulum enim congue ut sit. Eu risus lobortis purus ipsum at. Volutpat
                integer faucibus a massa phasellus id rhoncus ultricies.</p>
            <button>Sell Your Car</button>
        </div>
        <div class="fifth-img col-4">
            <img src="images/fifth-im.jpg" alt="noImage">
        </div>
    </div>
</div>


<!-- ============================================================sixth part======================================================================= -->
<div class="sixth-part">
    <div class="left-part-six">
        <h5 style="color:#d1be0f; margin-bottom: -12px;">Blog</h5>
        <h1>Maximizing Your Car’s Value! Tips, Tricks, and Industry News!</h1>
        <button class="six-btn-1">Sell Your Car</button>
        <button class="six-btn-2">Latest Article</button>
    </div>

    <div class="ninty">
        <h1 class="rotated-heading-part">مدونة</h1>
    </div>
</div>
<style>
    .custom-card {
      position: relative;
      overflow: hidden;
      color: white;
      height: 400px;
    }
    .custom-card img {
      object-fit: cover;
      width: 100%;
      height: 400px;
    }
    .custom-card-content {
        position: absolute;
        top: 63%;
        left: 37%;
        transform: translate(-50%, -50%);
    }
    .custom-card .btn {
      margin-top: 15px;
    }
  </style>
<!-- ============================================================seven part=================================================================== -->
<div class="container pt-5 overflow-hidden">
      <div class="swiper-container">
        <div class="swiper-wrapper">
          <!-- Slide 1 -->
          <div class="swiper-slide">
              <div class="card custom-card">
                  <img src="{{ asset('images/hr.jfif') }}" alt="Card Background Image">
                  <div class="custom-card-content  pb-4">
                    <h3 class="card-title ">Card Title</h3>
                    <p class="card-text">This is a description for the card. It provides some details about the content.</p>
                    <a href="#" class="btn btn-transparent text-light border border-light">Read More</a>
                  </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="card custom-card">
                <img src="{{ asset('images/gp.jfif') }}" alt="Card Background Image">
                <div class="custom-card-content">
                  <h3 class="card-title">Card Title</h3>
                  <p class="card-text">This is a description for the card. It provides some details about the content.</p>
                  <a href="#" class="btn btn-transparent text-light border border-light">Read More</a>
                </div>
          </div>
          </div>
          <div class="swiper-slide">
            <div class="card custom-card">
                <img src="{{ asset('images/pc.jfif') }}" alt="Card Background Image">
                <div class="custom-card-content">
                  <h3 class="card-title">Card Title</h3>
                  <p class="card-text">This is a description for the card. It provides some details about the content.</p>
                  <a href="#" class="btn btn-transparent text-light border border-light">Read More</a>
                </div>
          </div>
          </div>
          <div class="swiper-slide">
            <div class="card custom-card">
                <img src="{{ asset('images/gp.jfif') }}" alt="Card Background Image">
                <div class="custom-card-content">
                  <h3 class="card-title">Card Title</h3>
                  <p class="card-text">This is a description for the card. It provides some details about the content.</p>
                  <a href="#" class="btn btn-transparent text-light border border-light">Read More</a>
                </div>
          </div>
          </div>
      </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
 <script>
   // Initialize Swiper
const swiper = new Swiper('.swiper-container', {
  slidesPerView: 3, // Number of slides to show at once on larger screens
  spaceBetween: 0, // Space between the slides (increased for better clarity)
  loop: true, // Infinite loop for slides
  
  breakpoints: {
    0: {
      slidesPerView: 1, // Show 1 slide on very small mobile screens
    },
    576: {
      slidesPerView: 2, // Show 2 slides on slightly larger mobile screens
    },
    768: {
      slidesPerView: 3, // Show 3 slides on tablets
    },
    1024: {
      slidesPerView: 3, // Maintain 3 slides on desktops and larger screens
    },
  },
});

  </script>
<!-- ===========================================================eight part================================================================== -->

<div class="eight-part">
    <div class="row">
        <div class="first-eight col-4">
            <img src="images/habd.png" alt="">
            <h1>Instant Payment</h1>
            <p>Lorem ipsum dolor sit amet consectetur. Massa nunc cras nisl pellentesque integer sed. In tortor</p>
        </div>
        <div class="second-eight col-4">
            <img src="images/process.png" alt="">
            <h1>Hassle-Free Process</h1>
            <p>Lorem ipsum dolor sit amet consectetur. Massa nunc cras nisl pellentesque integer sed. In tortor</p>
        </div>
        <div class="third-eight col-4">
            <img src="images/Frame.png" alt="">
            <h1>Certified and Trusted</h1>
            <p>Lorem ipsum dolor sit amet consectetur. Massa nunc cras nisl pellentesque integer sed. In tortor</p>
        </div>
    </div>
</div>
<script src="{{ asset('js/faq.js') }}"></script>
@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- JavaScript for Tabs Navigation -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
    // Step 1 Form Submission
    function submitStep1(event) {
        event.preventDefault();

        // Perform validation for Step 1
        const step1Form = document.getElementById("step1Form");
        if (step1Form.checkValidity()) {
            // Enable Step 2 tab and navigate to it
            const step2Tab = document.getElementById("step2-tab");
            step2Tab.disabled = false;
            step2Tab.click();
        } else {
            step1Form.reportValidity();
        }
    }

    // Step 2 Form Submission
    function submitStep2(event) {
        event.preventDefault();

        // Perform validation for Step 2
        const step2Form = document.getElementById("step2Form");
        if (step2Form.checkValidity()) {
            // Enable Step 3 tab and navigate to it
            const step3Tab = document.getElementById("step3-tab");
            step3Tab.disabled = false;
            step3Tab.click();
        } else {
            step2Form.reportValidity();
        }
    }

    // Step 3 Form Submission
    function submitStep3(event) {
        event.preventDefault();

        // Perform validation for Step 3
        const step3Form = document.getElementById("step3Form");
        if (step3Form.checkValidity()) {
            alert("Form submitted successfully!");
        } else {
            step3Form.reportValidity();
        }
    }

    // Attach event listeners to buttons
    document.querySelector("#step1Form .button").addEventListener("click", submitStep1);
    document.querySelector("#step2Form .button").addEventListener("click", submitStep2);
    document.querySelector("#step3Form .button").addEventListener("click", submitStep3);
});

</script>

<script>

function submitStep1(event) {
    // Prevent the default form submission behavior
    event.preventDefault();

    let form = document.getElementById('step1Form');
    let formData = new FormData(form);
    fetch("{{ route('car-details.store') }}", {
    method: "POST",
    headers: {
        "X-CSRF-Token": document.querySelector('input[name="_token"]').value
    },
    body: formData
    })
    .then(response => {
        return response.json(); // This may throw an error if the response is not valid JSON
    })
    .then(data => {
        if (data.next_step === 2) {
            $('#step1Modal').modal('hide');
            $('#step2Modal').modal('show');
        } else {
            alert("Error submitting step 1");
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert("An error occurred, please try again.");
    });
}

function submitStep2() {
    let form = document.getElementById('step2Form');
    let formData = new FormData(form);

    fetch("{{ route('car-details.store') }}", {
        method: "POST",
        headers: {
            "X-CSRF-Token": document.querySelector('input[name=_token]').value
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.message) {
            alert(data.message);
            // Optionally close the modal after final submission
            $('#step2Modal').modal('hide');
        } else {
            alert("Error submitting step 2");
        }
    })
    .catch(error => console.error('Error:', error));
}
</script>
