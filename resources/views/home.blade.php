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

<style>
    .background-image {
        width: 100%;
        height: 150vh;
        position: relative;
    }

    .swiper-slide {
        background-size: cover;
        background-position: center;
        height: 100%; /* Ensures full height of the container */
    }
    </style>

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

<style>
    .custom-label{
  font-size: 12px !important;
  font-weight: lighter !important;


}
</style>

@section('content')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">



<div>
    {{-- <div class="swiper-container background-image">
        <div class="swiper-wrapper">
            @if($banners)
            @foreach($banners as $banner)
                <div class="swiper-slide">
                    <div class="swiper-slide-content">
                        <img src="{{ asset($banner->image) }}" alt="" class="img-fluid">
                    </div>
                </div>
            @endforeach
        @endif
        </div>
        <!-- Swiper Navigation Buttons -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <!-- Swiper Pagination -->
        <div class="swiper-pagination"></div>
    </div> --}}
    <div class="box" id="exampleModa">
        <h1>tell us about your car</h1>
        <h6>Car Information</h6>
            <div class="row">
                <div class="input-group mb-3">
                    <select class="form-select" name="car_type" id="inputGroupSelect02">
                        <option selected>Type of Car</option>
                        <option value="Sedan">Sedan</option>
                        <option value="SUV">SUV </option>
                        <option value="Coupe">Coupe</option>
                        <option value="Convertible">Convertible</option>
                        <option value="Truck">Truck</option>
                        <option value="Van">Van</option>
                        <option value="Wagon">Wagon</option>
                        <option value="Sports_car">Sports Car</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <select class="form-select" name="model" id="inputGroupSelect02">
                        <option selected>Model of Car</option>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <input class="form-control" type="text" name="specification" placeholder="Specification/Trim (e.g.,“E350 Sport”)"
                        aria-label="default input example">
                </div>
                <div class="input-group mb-3">
                    <input class="form-control" name="engine_size" type="text" placeholder="Engine Size(1499cc)"
                        aria-label="default input example">
                </div>
                <div class="input-group mb-3">
                    <select class="form-select" name="year" id="inputGroupSelect02">
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <input class="form-control" name="kilometers" type="text" placeholder="kilometers"
                        aria-label="default input example">
                </div>
            </div>
            <button type="button" id="next-button-modal1" class="button btn btn-modal-first" >
                Next
            </button>
    </div>
</div>


    <!-- Modal -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3>TELL US ABOUT YOUR CAR</h3>
                    <h6>Additional Questions</h6>
                    <p>GCC Spec?</p>
                    <div class="button-group">
                        <button type="button" class="btn-modalone" name="gcc_spec" value="yes">Yes GCC</button>
                        <button type="button" class="btn-modalone" name="gcc_spec" value="american">American</button>
                        <button type="button" class="btn-modalone" name="gcc_spec" value="european">European</button>
                        <button type="button" class="btn-modalone" name="gcc_spec" value="japanese">Japanese</button>
                        <button type="button" class="btn-modalone" name="gcc_spec" value="unknown">I Don't Know</button>
                    </div>
                    <p>Overall Condition</p>
                    <div class="button-group">
                        <button type="button" class="btn-modaltwo" name="condition" value="excellent">Excellent</button>
                        <button type="button" class="btn-modaltwo" name="condition" value="good">Good</button>
                        <button type="button" class="btn-modaltwo" name="condition" value="average">Average</button>
                        <button type="button" class="btn-modaltwo" name="condition" value="poor">Poor</button>
                    </div>
                    <p>Paintwork</p>
                    <div class="button-group">
                        <button type="button" class="btn-modalthree" name="paintwork" value="original">Original Paint</button>
                        <button type="button" class="btn-modalthree" name="paintwork" value="partial">Partial Repaint</button>
                        <button type="button" class="btn-modalthree" name="paintwork" value="total">Total Repaint</button>
                        <button type="button" class="btn-modalthree" name="paintwork" value="unknown">I Don't Know</button>
                    </div>
                    <p>Interior Condition</p>
                    <div class="button-group">
                        <button type="button" class="btn-modalfour" name="interior_condition" value="excellent">Excellent</button>
                        <button type="button" class="btn-modalfour" name="interior_condition" value="good">Good</button>
                        <button type="button" class="btn-modalfour" name="interior_condition" value="average">Average</button>
                        <button type="button" class="btn-modalfour" name="interior_condition" value="poor">Poor</button>
                    </div>

                    <div class="custom-radio-container">
                        <span class="question">Service History</span>
                        <label class="custom-radio">
                            <input type="radio" name="service_history" value="yes">
                            <span class="checkmark"></span>
                            Yes
                        </label>
                        <label class="custom-radio">
                            <input type="radio" name="service_history" value="no">
                            <span class="checkmark"></span>
                            No
                        </label>
                    </div>

                    <textarea class="form-control mt-3" name="comment" id="exampleFormControlTextarea1" rows="3"
                        placeholder="Comment Here"></textarea>

                    <div class="custom-radio-container">
                        <span class="question">Loan or Mortgage</span>
                        <label class="custom-radio">
                            <input type="radio" name="loan_secured" value="yes">
                            <span class="checkmark"></span>
                            Yes
                        </label>
                        <label class="custom-radio">
                            <input type="radio" name="loan_secured" value="no">
                            <span class="checkmark"></span>
                            No
                        </label>
                    </div>
                    <button type="button"  id="next-button-modal2" class="btn btn-modal-first" >
                        Next
                    </button>
            </div>
        </div>
    </div>



    <!-- Modal -->

<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content image-modal">
                <h3>TELL US ABOUT YOUR CAR</h3>
                    <div class="custom-image-upload">
                        <h2>Upload Images</h2>
                        <p>Upload at least 6 images of your car.</p>
                        <div class="custom-upload-box">
                            <label for="custom-file-input" class="custom-upload-label">
                                <div class="custom-upload-icon">⬆</div>
                                <span class="custom-upload-button">Upload Images</span>
                            </label>
                            <input type="file" id="custom-file-input" name="images[]" accept="image/*" multiple style="display: none;" />
                            <p class="custom-upload-info">
                                5 Mb maximum file size accepted in the following formats: jpg, jpeg, png<br>
                                Upload at least 6 images of your car
                            </p>
                            <p id="image-error" class="text-danger" style="display: none;">You must upload at least 6 images!</p>
                        </div>
                    </div>
                    <button type="button" class="btn btn-modal-first"  id="next-button-modal3">
                        Next
                    </button>
            </div>
        </div>
    </div>

    <!-- ==================================================================Contact Modal============================================================ -->

    <!-- Button trigger modal -->


    <!-- Modal -->

    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content contact-modal">
                <h3>TELL US ABOUT YOUR CAR</h3>
                <div class="contact-info-form">
                    <h3>Contact Information:</h3>
                      <div class="form-group">
                        <input type="text" name="first_name" placeholder="First Name" class="form-control" />
                        <input type="text" name="last_name" placeholder="Last Name" class="form-control" />
                      </div>
                      <div class="form-group">
                        <input type="number" name="phone_number" placeholder="Phone Number" class="form-control" min="0" maxlength="13" />
                        <input type="email" name="email" placeholder="Email Address" class="form-control" />
                      </div>
                      <div class="form-group">
                        <input style="min-height: 70px;" name="address" type="text" placeholder="Location where car ..." class="form-control full-width" />
                      </div>
                  </div>
                  <button type="button" class="button">Submit</button>
            </div>
        </div>
    </div>


<!-- ===========================================================Second Part========================================================================= -->


<div class="second-part container mt-3 mb-5 position-relative overflow-hidden">
    <div class="row g-3">
        <div class=" col-md-1">
            <h1 class="rotated-heading">شهادات</h1>
        </div>
        <div class="second-text  col-md-4">
            <h4>Testimonials</h4>
            <h1>What our clients says about us</h1>
            <p>Lorem ipsum dolor sit amet consectetur. Massa nunc cras nisl pellentesque integer sed. amet
                consectetur. Massa nunc cras nisl pellentesque integer sed.</p>
            <button>Sell Your Car</button>
        </div>
        <div class="col-md-7">
            <div class="swiper swiper-test">
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
    </div>
</div>



<!-- ==============================================================Third Part====================================================================== -->

<div class="third-part mb-5">
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
            <img src="images/fourth.png" alt="Not Found">
        </div>
        <div class="right-text">
            <h4 style="color:#d1be0f;">About us</h4>
            <h1>The story behind our Journey.</h1>
            <p>Lorem ipsum dolor sit amet consectetur. Massa nunc cras nisl pellentesque integer sed. In tortor
                fermentum vel semper vestibulum enim congue ut sit. Eu risus lobortis purus ipsum at. Volutpat
                integer faucibus a massa phasellus id rhoncus ultricies.</p>
            <button class="mr-2">More About Us <i class="fa-solid fa-arrow-right" style="color:#d1be0f;"></i></button>
        </div>
    </div>
</div>

<!-- ============================================================fifth part==================================================================== -->

<div class="fifth-part">
    <div class="row">
        <div class="ninty">
            <h1 class="rotated-heading-fifth">لماذا نحن؟</h1>
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
<style>
    /* Default margin-top for larger screens */
    .custom-margin-top {
        margin-top: 5rem;
    }

    /* For screens smaller than 768px (mobile/tablet) */
    @media (max-width: 768px) {
        .custom-margin-top {
            margin-top: 34rem !important;
        }
    }
    </style>
    <div class="sixth-part">
        <div class="left-part-six">
            <h5 style="color:#FCE80A; margin-bottom: -12px;">Blog</h5>
            <h1 class="blog-heading">Maximizing Your Car’s Value! Tips, Tricks, and Industry News!<span><button class="six-btn-1">Sell Your Car</button>
                <button class="six-btn-2">Latest Article</button></span></h1>
            
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
    <div class="swiper-container swiper-card">
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
</div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <!-- Include SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
      // Initialize Swiper
   const swiper = new Swiper('.swiper-card', {
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
     // Initialize Swiper
     const swiper2 = new Swiper('.swiper-test', {
     slidesPerView: 2, // Number of slides to show at once on larger screens
     spaceBetween: 0, // Space between the slides (increased for better clarity)
     loop: true, // Infinite loop for slides

     breakpoints: {
       0: {
         slidesPerView: 1, // Show 1 slide on very small mobile screens
       },
       576: {
         slidesPerView: 1, // Show 2 slides on slightly larger mobile screens
       },
       768: {
         slidesPerView: 2, // Show 3 slides on tablets
       },
       1024: {
         slidesPerView: 2, // Maintain 3 slides on desktops and larger screens
       },
     },
   });

     </script>
<!-- ===========================================================eight part================================================================== -->

<div class="eight-part container mb-5">
    <div class="row mb-5">
        <div class=" col-md-4">
            <img src="images/habd.png" style="max-width:100%;height: 200px;" alt=""><br>
            <span class="h3" >Instant Payment</span ><br>
            <p>Lorem ipsum dolor sit amet consectetur. Massa nunc cras nisl pellentesque integer sed. In tortor</p>
        </div>
        <div class=" col-md-4">
            <img src="images/process.png" style="max-width:100%;height: 200px;" alt=""><br>
            <span class="h3" >Hassle-Free Process</span >
            <p>Lorem ipsum dolor sit amet consectetur. Massa nunc cras nisl pellentesque integer sed. In tortor</p>
        </div>
        <div class=" col-md-4">
            <img src="images/Frame.png" style="max-width:100%;height: 200px;" alt=""><br>
            <span class="h3" >Certified and Trusted</span >
            <p>Lorem ipsum dolor sit amet consectetur. Massa nunc cras nisl pellentesque integer sed. In tortor</p>
        </div>
    </div>
</div>
<script src="{{ asset('js/faq.js') }}"></script>
@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    document.querySelector('input[name="phone_number"]').addEventListener('input', function (e) {
    if (this.value.length > 10) {
        this.value = this.value.slice(0, 10); // Limit to 10 digits
    }
});
</script>
<script>

// {{-- -----------------------------For button input selection------------------------------ --}}

document.addEventListener('DOMContentLoaded', () => {
    const selectedData = {};

    document.querySelectorAll('.button-group button').forEach(button => {
        button.addEventListener('click', function () {
            // Remove active class from sibling buttons
            const siblings = this.parentElement.querySelectorAll('button');
            siblings.forEach(sibling => sibling.classList.remove('active'));

            // Add active class to clicked button
            this.classList.add('active');

            // Save the selected value
            const groupName = this.parentElement.previousElementSibling.textContent.trim(); // Group label
            selectedData[groupName] = this.textContent.trim();
        });
    });
});
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let modalData = {};

        // Modal 1 - Collect car info
        document.getElementById("next-button-modal1").addEventListener("click", function() {
            modalData.car_info = {
                car_type: $("select[name='car_type']").val(),
                model: $("select[name='model']").val(),  // Corrected 'modal' to 'model'
                specification: $("input[name='specification']").val(),
                engine_size: $("input[name='engine_size']").val(),
                year: $("select[name='year']").val(),
                kilometers: $("input[name='kilometers']").val(),
            };
            // Move to next modal
            $("#exampleModal").modal("show");
        });

        // Modal 2 - Collect additional data and move to next modal
        $("#next-button-modal2").click(function () {
            modalData.additional_questions = {
                gcc_spec: $("button[name='gcc_spec'].active").val(),
                condition: $("button[name='condition'].active").val(),
                paintwork: $("button[name='paintwork'].active").val(),
                interior_condition: $("button[name='interior_condition'].active").val(),
                service_history: $("input[name='service_history']:checked").val(),
                comment: $("textarea[name='comment']").val(),
                loan_secured: $("input[name='loan_secured']:checked").val(),
            };
            // Move to next modal
            $("#exampleModal").modal("hide");
            $("#exampleModal1").modal("show");
        });

        // Modal 3 - Collect image data and move to next modal
        $("#next-button-modal3").click(function () {
            let images = [];  // Corrected the array initialization
            let fileInput = document.getElementById("custom-file-input");
            if (fileInput.files.length > 0) {
                // Loop through files in the file input
                Array.from(fileInput.files).forEach(file => {
                    images.push(file);  // Push file object, not the file name
                });

                if (images.length >= 6) {
                    modalData.images = images;  // Store the files in modalData
                    // Move to next modal
                    $("#exampleModal1").modal("hide");
                    $("#exampleModal2").modal("show");
                } else {
                    alert("You must upload at least 6 images!");
                }
            } else {
                alert("You must upload at least 6 images!");
            }
        });

        // Modal 4 - Collect contact data and submit everything
        $(".button").click(function () {
            modalData.contact_info = {
                first_name: $("input[name='first_name']").val(),
                last_name: $("input[name='last_name']").val(),
                phone_number: $("input[name='phone_number']").val(),
                email: $("input[name='email']").val(),
                address: $("input[name='address']").val(),
            };

            $("#exampleModal2").modal("hide");

            // Prepare FormData object for file uploads
            let formData = new FormData();
            // Append all the data into formData
            for (let key in modalData.car_info) {
                formData.append('car_info[' + key + ']', modalData.car_info[key]);
            }

            for (let key in modalData.additional_questions) {
                formData.append('additional_questions[' + key + ']', modalData.additional_questions[key]);
            }

            for (let key in modalData.contact_info) {
                formData.append('contact_info[' + key + ']', modalData.contact_info[key]);
            }

            // Append the images (file objects) to formData
            modalData.images.forEach(function (file, index) {
                formData.append('images[]', file);
            });

            // CSRF token setup
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Send all the collected data via AJAX
            $.ajax({
                url: '/car-details/store',  // Replace with your store route URL
                type: 'POST',
                data: formData,
                processData: false,  // Don't process the files
                contentType: false,  // Let the browser set the content type
                success: function (response) {
                    // SweetAlert for success
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Data saved successfully!',
                        showConfirmButton: true
                    });
                    // Optionally redirect or reset modal data
                },
                error: function (xhr, status, error) {
                    // SweetAlert for error
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Error occurred while saving data!',
                        showConfirmButton: true
                    });
                }
            });

        });
    });
</script>


<script>
    //----------------------------For atleast 6 images-----------------------

    document.addEventListener('DOMContentLoaded', () => {
    const fileInput = document.getElementById('custom-file-input');
    const nextButton = document.getElementById('next-button');
    const errorElement = document.getElementById('image-error');
    const currentModal = document.getElementById('exampleModal1');
    const nextModalElement = document.getElementById('exampleModal2');

    nextButton.addEventListener('click', (e) => {
        const files = fileInput.files;

        // Check if the number of uploaded files is less than 6
        if (files.length < 6) {
            e.preventDefault(); // Prevent button default behavior
            errorElement.style.display = 'block'; // Show the error message
        } else {
            errorElement.style.display = 'none'; // Hide the error message

            // Hide the current modal
            const currentModalInstance = bootstrap.Modal.getInstance(currentModal);
            currentModalInstance.hide();

            // Show the next modal
            const nextModalInstance = new bootstrap.Modal(nextModalElement);
            nextModalInstance.show();
        }
    });
});
</script>
{{--
<script>
    // -------------------------------------Stor Car and user info---------------------------

    document.querySelector(".btn.btn-modal-first").addEventListener("click", function () {
    // Collect car form data
    const carData = new FormData();
        alert("ok");
    // Collect car type, model, specification, engine size, year, kilometers
    carData.append("car_type", document.querySelector("select[name='car_type']").value);
    carData.append("model", document.querySelector("select[name='modal']").value);
    carData.append("specification", document.querySelector("input[name='specification']").value);
    carData.append("engine_size", document.querySelector("input[name='engine_size']").value);
    carData.append("year", document.querySelector("select[name='year']").value);
    carData.append("kilometers", document.querySelector("input[name='kilometers']").value);

    // Collect modal questions and checkboxes (if applicable)
    carData.append("gcc_spec", document.querySelector("input[name='gcc_spec']:checked")?.value || null);
    carData.append("condition", document.querySelector("input[name='condition']:checked")?.value || null);
    carData.append("paintwork", document.querySelector("input[name='paintwork']:checked")?.value || null);
    carData.append("interior_condition", document.querySelector("input[name='interior_condition']:checked")?.value || null);
    carData.append("service_history", document.querySelector("input[name='service_history']:checked")?.value || null);
    carData.append("loan_secured", document.querySelector("input[name='loansec']:checked")?.value || null);
    carData.append("comment", document.querySelector("textarea[name='comment']").value);

    // Collect user information
    carData.append("first_name", document.querySelector("input[name='first_name']").value);
    carData.append("last_name", document.querySelector("input[name='last_name']").value);
    carData.append("email", document.querySelector("input[name='email']").value);
    carData.append("phone_number", document.querySelector("input[name='phone_number']").value);
    carData.append("address", document.querySelector("input[name='address']").value);

    // Collect the images (if any)
    const imageInput = document.querySelector("input[name='car_images']");
    if (imageInput.files.length > 0) {
        for (let i = 0; i < imageInput.files.length; i++) {
            carData.append("car_images[]", imageInput.files[i]);
        }
    }

    // Send data via AJAX using FormData
    fetch("/store-car-info", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
        },
        body: carData,
    })
    .then(response => response.json())
    .then(result => {
        if (result.success) {
            alert("Car data submitted successfully!");
            // Optionally hide the modal and show the next one
            const currentModal = bootstrap.Modal.getInstance(document.getElementById("exampleModal"));
            currentModal.hide();
            const nextModal = new bootstrap.Modal(document.getElementById("exampleModal1"));
            nextModal.show();
        } else {
            alert("Error submitting car data.");
        }
    })
    .catch(error => console.error("Error:", error));
});

</script> --}}


