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

    .custom-label{
        font-size: 12px !important;
        font-weight: lighter !important;
    }
</style>

@section('content')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

<div class="content-wrapper" id="home">
    <div class="greennature-content">
        <!-- Above Sidebar Section-->
        <!-- Sidebar With Content Section-->
        <div class="with-sidebar-wrapper">
                <section id="content-section-1">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @if($banners)
                                @foreach($banners as $banner)
                                    <div class="swiper-slide">
                                        <div class="swiper-slide-content">
                                            <img src="{{ asset($banner->image) }}" alt="Banner Image" class="img-fluid banner-image">
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>

                        <!-- Add Navigation Buttons -->
                        <!-- <div class="swiper-button-prev left-arrow"></div>
                        <div class="swiper-button-next right-arrow"></div> -->
                    </div>
                    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
                    <script>
                        document.addEventListener('DOMContentLoaded', () => {
                            const swiper = new Swiper('.swiper-container', {
                                loop: true, // Infinite loop
                                autoplay: {
                                    delay: 5000, // 3 seconds delay
                                    disableOnInteraction: false, // Keep autoplaying even after interactions
                                },
                                pagination: {
                                    el: '.swiper-pagination',
                                    clickable: true, // Pagination is clickable
                                },
                                navigation: {
                                    nextEl: '.right-arrow',
                                    prevEl: '.left-arrow',
                                },
                                effect: 'fade', // Add a fade transition effect
                                fadeEffect: {
                                    crossFade: true,
                                },
                            });
                        });
                    </script>

                </section>
        </div>
    </div>
</div>

<div class="box" id="exampleModa">
    <h1>tell us about your car</h1>
    <h6>Car Information</h6>
        <div class="row">
            <div class="input-group mb-3">
                <select class="form-select" name="car_type" id="car_type">
                    <option value="" selected disabled>Type of Car</option>
                    @foreach($carTypes as $carType)
                        <option value="{{ $carType->id }}">{{ $carType->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group mb-3">
                <select class="form-select" name="model" id="model">
                    <option value="" selected disabled>Model of Car</option>
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
                    <option value="2018">2018</option>
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <input class="form-control" name="kilometers" type="text" placeholder="kilometers"
                    aria-label="default input example">
            </div>
        </div>
        <button type="button" id="next-button-modal1" class="button btn" >
            Next
        </button>
</div>



    <!-- Modal -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">

            <div class="modal-content">
                <h3>TELL US ABOUT YOUR CAR</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                    <div class="row">
                        <button type="button" id="back-button-modal1" class="btn btn-modal-first">
                            Back
                        </button>
                        <button type="button"  id="next-button-modal2" class="btn btn-modal-first" >
                            Next
                        </button>
                    </div>
            </div>
        </div>
    </div>



    <!-- Modal -->

<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content image-modal">
                <h3>TELL US ABOUT YOUR CAR</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="custom-image-upload">
                        <h2>Upload Images</h2>
                        <p>Upload images of your car.</p>
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
                    <div class="row">
                        <button type="button" id="back-button-modal2" class="btn btn-modal-first">
                            Back
                        </button>
                        <button type="button" class="btn btn-modal-first"  id="next-button-modal3">
                            Next
                        </button>
                    </div>
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
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="contact-info-form">
                    <h3>Contact Information:</h3>
                      <div class="form-group">
                        <input type="text" name="first_name" required placeholder="First Name" class="form-control" />
                        <input type="text" name="last_name" placeholder="Last Name" class="form-control" />
                      </div>
                      <div class="form-group">
                        <input type="number" name="phone_number" required placeholder="Phone Number" class="form-control" min="0" maxlength="13" />
                        <input type="email" name="email" placeholder="Email Address" class="form-control" />
                      </div>
                      <div class="form-group">
                        <input style="min-height: 70px;" name="address" type="text" placeholder="Location where car ..." class="form-control full-width" />
                      </div>
                  </div>
                  <div class="row">
                    <button type="button" id="back-button-modal3" class="btn btn-modal-first">
                        Back
                    </button>
                    <button type="button" id = "submitbutton" class="btn btn-modal-first">Submit</button>

                  </div>
            </div>
        </div>
    </div>


<!-- ===========================================================Second Part========================================================================= -->


<div class="second-part container mt-5 mb-5 position-relative overflow-hidden" id="testimonials">
    <div class="row g-3">
        <div class=" col-md-1">
            <h1 class="rotated-heading">شهادات</h1>
        </div>
        <div class="col-md-4 second-text">
            <h4>Testimonials</h4>
            <h1>{{$settings->testimonial_header}}</h1>
            <p>{{$settings->testimonial_description}}</p>
            <button><a href="#exampleModa" style="text-decoration:none;color:black;">Sell Your Car</a></button>
        </div>
        <div class="col-md-7">
            <div class="swiper swiper-test">
                <div class="swiper-wrapper">
                <!-- Slide 1 -->
                 @foreach($testimonials as $testimonial)
                    <div class="swiper-slide">
                        <div class="card custom-card">
                            <img src="{{ asset($testimonial->image_path) }}" alt="{{ $testimonial->name }}">
                            <div class="custom-card-content  pb-4">
                                <h3 class="card-title ">{{ $testimonial->name }}</h3>
                                <p class="card-text">{{ $testimonial->description }}</p>
                                <!-- <a href="#" class="btn btn-transparent text-light border border-light">Read More</a> -->
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>



<!-- ==============================================================Third Part====================================================================== -->

<div class="third-part">
    <div class="main-faq">
        <h3 class="faq-yellow-text">FAQ</h3>
        <h1>{{$settings->faq_header}}</h1>
        <p class="faq-para">{{$settings->faq_description}}</p>
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
<div class="fourth-part" id="about_us">
    <div class="row fourth-part-div">
        <div class="col-md-6 p-0">
            <div class="left-img">
                <img src="{{ asset($about->image_path) }}" alt="Not Found">
            </div>
        </div>
        <div class="col-md-6 p-0">
            <div class="right-text">
                <h4 style="color:#d1be0f;">About us</h4>
                <h1>{{$about->name ?? 'The story behind our Journey'}}</h1>
                <p>{{$about->description}}</p>
                <button class="mr-2"><a href="{{ url('/#testimonials') }}" style="text-decoration:none;color:#fff;">More About Us <i class="fa-solid fa-arrow-right" style="color:#d1be0f;"></i></a></button>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================fifth part==================================================================== -->

<div class="fifth-part">
    <div class="row">
        <div class="ninty col-md-2">
            <h1 class="rotated-heading-fifth">لماذا نحن؟</h1>
        </div>
        <div class="fifth-text col-md-5 col-sm-12">
            <h1>{{$settings->Uniqueness_header}}</h1>
            <p>{{$settings->Uniqueness_description}}</p>
            <button><a href="#exampleModa" style="text-decoration:none;color:black;">Sell Your Car</a></button>
        </div>
        <div class="fifth-img col-md-5 col-sm-12">
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
<div class="sixth-part mb-5">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-9 left-part-six">
                <h5 style="color:#FCE80A;margin-bottom:0;">Blog</h5>
                <h1 class="blog-heading">Maximizing Your Car’s Value! Tips, Tricks, and Industry News!<span><button class="six-btn-1"><a href="#exampleModa" style="text-decoration:none;color:black;">Sell Your Car</a></button>
                    <!-- <button class="six-btn-2">Latest Article</button> -->
                </span></h1>

            </div>
            <div class="col-md-1 ninty">
                <h1 class="rotated-heading-part">مدونة</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="swiper swiper-blog">
                    <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                     @foreach($blogs as $blog)
                        <div class="swiper-slide">
                            <div class="card custom-card">
                                <img src="{{ asset($blog->image_path) }}" alt="{{ $blog->name }}">
                                <div class="custom-card-content  pb-4">
                                    <h3 class="card-title">{{ $blog->name }}</h3>
                                    <p class="card-text">{{ $blog->subtitle }}</p>
                                    <a href="{{ url('blog/view/'.$blog->id.'/'.$blog->name) }}" class="btn btn-transparent text-light border border-light">Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
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
<!-- <div class="container pt-5 overflow-hidden">
    <div class="swiper-container swiper-card">
      <div class="swiper-wrapper">

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
</div> -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <!-- Include SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
      // Initialize Swiper
   const swiper = new Swiper('.swiper-test', {
     slidesPerView: 6, // Number of slides to show at once on larger screens
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
     // Initialize Swiper
     const swiper2 = new Swiper('.swiper-blog', {
     slidesPerView: 3, // Number of slides to show at once on larger screens
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
         slidesPerView: 3, // Show 3 slides on tablets
       },
       1024: {
         slidesPerView: 3, // Maintain 3 slides on desktops and larger screens
       },
     },
   });

     </script>
<!-- ===========================================================eight part================================================================== -->

<!-- <div class="eight-part container my-5">
    <div class="row text-center">
        <div class="col-md-4">
            <img src="images/habd.png" style="max-width:100%;height: 200px;" class="mb-2" alt=""><br>
            <span class="h3" >Instant Payment</span ><br>
            <p class="mt-3">Lorem ipsum dolor sit amet consectetur. Massa nunc cras nisl pellentesque integer sed. In tortor</p>
        </div>
        <div class="col-md-4">
            <img src="images/process.png" style="max-width:100%;height: 200px;" class="mb-2" alt=""><br>
            <span class="h3" >Hassle-Free Process</span >
            <p class="mt-3">Lorem ipsum dolor sit amet consectetur. Massa nunc cras nisl pellentesque integer sed. In tortor</p>
        </div>
        <div class="col-md-4">
            <img src="images/Frame.png" style="max-width:100%;height: 200px;" class="mb-2" alt=""><br>
            <span class="h3" >Certified and Trusted</span >
            <p class="mt-3">Lorem ipsum dolor sit amet consectetur. Massa nunc cras nisl pellentesque integer sed. In tortor</p>
        </div>
    </div>
</div> -->
<script src="{{ asset('js/faq.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // -----------------------For Car type and Car Model Drop Down
    document.addEventListener('DOMContentLoaded', function () {

    const carTypeSelect = document.getElementById('car_type');
    const modelSelect = document.getElementById('model');

    carTypeSelect.addEventListener('change', function () {
        const carTypeId = this.value;

        // Clear previous models
        modelSelect.innerHTML = '<option value="" selected disabled>Model of Car</option>';

        if (carTypeId) {
            fetch(`/get-models?car_type_id=${carTypeId}`)
                .then(response => response.json())
                .then(models => {
                    for (const [id, name] of Object.entries(models)) {
                        const option = document.createElement('option');
                        option.value = id;
                        option.textContent = name;
                        modelSelect.appendChild(option);
                    }
                })
                .catch(error => console.error('Error fetching models:', error));
        }
    });
});

</script>

<script>
    document.querySelector('input[name="phone_number"]').addEventListener('input', function (e) {
    if (this.value.length > 14) {
        this.value = this.value.slice(0, 14); // Limit to 10 digits
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
                car_type: $("select[name='car_type']").val() || '',
                model: $("select[name='model']").val() || '',
                specification: $("input[name='specification']").val(),
                engine_size: $("input[name='engine_size']").val(),
                year: $("select[name='year']").val(),
                kilometers: $("input[name='kilometers']").val(),
            };
            // Move to next modal
            $("#exampleModal").modal("show");
        });

        $("#back-button-modal1").click(function () {
        // Close the current modal
            $("#exampleModal").modal("hide");

        });

        $("#back-button-modal2").click(function () {
        // Close the current modal
            $("#exampleModal1").modal("hide");

            // Open the previous modal
            $("#exampleModal").modal("show");
        });

        $("#back-button-modal3").click(function () {
        // Close the current modal
            $("#exampleModal2").modal("hide");

            // Open the previous modal
            $("#exampleModal1").modal("show");
        });

        // Modal 2 - Collect additional data and move to next modal
        $("#next-button-modal2").click(function () {
            modalData.additional_questions = {
                gcc_spec: $("button[name='gcc_spec'].active").val() || '',
                condition: $("button[name='condition'].active").val() || '',
                paintwork: $("button[name='paintwork'].active").val() || '',
                interior_condition: $("button[name='interior_condition'].active").val() || '',
                service_history: $("input[name='service_history']:checked").val() || '',
                comment: $("textarea[name='comment']").val(),
                loan_secured: $("input[name='loan_secured']:checked").val() || '',
            };
            // Move to next modal
            $("#exampleModal").modal("hide");
            $("#exampleModal1").modal("show");
        });

        // Modal 3 - Collect image data and move to next modal
        $("#next-button-modal3").click(function () {
            let images = [];
            let totalSize = 0; // Corrected the array initialization
            let isValid = true;
            let fileInput = document.getElementById("custom-file-input");
                // Loop through files in the file input
                Array.from(fileInput.files).forEach(file => {
                    if (!['image/jpeg', 'image/png', 'image/jpg'].includes(file.type)) {
                Swal.fire({
                    title: 'Invalid File Type!',
                    text: 'Please upload images in JPEG or PNG format.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                isValid = false;
                return;
                }
                    // Validate image size (5MB max)
                    totalSize += file.size;
                    if (totalSize > 5 * 1024 * 1024) {
                        Swal.fire({
                            title: 'Total File Size Exceeded!',
                            text: 'The total size of all images must not exceed 5MB.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                        totalSize -= file.size; // Rollback last addition
                        isValid = false;
                        return;
                    }
                    images.push(file);  // Push file object, not the file name
                });
                if (isValid) {
                    modalData.images = images; // Save only if all validations pass

                    // Move to the next modal
                    $("#exampleModal1").modal("hide");
                    $("#exampleModal2").modal("show");
                } else {
                    // If invalid, stay on the current modal
                    console.log('Validation failed. Staying on the same modal.');
                }
        });

        // Modal 4 - Collect contact data and submit everything

            $("#submitbutton").click(function () {
                // Get values of the required fields
                var firstName = $("input[name='first_name']").val().trim();
                var phoneNumber = $("input[name='phone_number']").val().trim();

                // Check if required fields are empty
                if (firstName === "" || phoneNumber === "") {
            // If either required field is empty, show a SweetAlert warning
            Swal.fire({
                title: 'Required Fields Missing!',
                text: 'Please fill in both First Name and Phone Number.',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
        } else {
            // If all required fields are filled, proceed with the modal data collection
            modalData.contact_info = {
                first_name: firstName,
                last_name: $("input[name='last_name']").val(),
                phone_number: phoneNumber,
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
                        title: 'Thank you for your inquiry!',
                        text: 'Mathew will come back to you soon.',
                        showConfirmButton: true
                    });
                    // Optionally redirect or reset modal data
                    modalData = {};
                    // Clear all inputs in the modals
                    $('input').val(''); // Clear all input fields
                    $('textarea').val(''); // Clear all textarea fields
                    $('select').prop('selectedIndex', 0); // Reset select inputs
                    $('button').removeClass('active'); // Remove active class from buttons
                    $('#custom-file-input').val(''); // Clear file input

                    // Hide all modals
                    $('.modal').modal('hide');
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
        }
        });
    });

</script>

@endsection


