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



<div class="box">
    <h1>Tell us about your car</h1>

    <!-- Tab Navigation -->
    <ul class="nav nav-tabs" id="carTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="step1-tab" data-bs-toggle="tab" data-bs-target="#step1" type="button" role="tab" aria-controls="step1" aria-selected="true">Step 1</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="step2-tab" data-bs-toggle="tab" data-bs-target="#step2" type="button" role="tab" aria-controls="step2" aria-selected="false" disabled>Step 2</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="step3-tab" data-bs-toggle="tab" data-bs-target="#step3" type="button" role="tab" aria-controls="step3" aria-selected="false" disabled>Step 3</button>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content mt-3">
        <!-- Step 1 -->
        <div class="tab-pane fade show active" id="step1" role="tabpanel" aria-labelledby="step1-tab">
            <form id="step1Form">
                @csrf
                <input type="hidden" name="step" value="1">

                <div class="row">
                    <!-- Type of Car Dropdown -->
                    <div class="input-group mb-3">
                        <select class="form-select" name="car_type" id="inputGroupSelect01">
                            <option selected>Type of Car</option>
                            <option value="1">SUV</option>
                            <option value="2">Sedan</option>
                            <option value="3">Hatchback</option>
                        </select>
                    </div>

                    <!-- Car Model Dropdown -->
                    <div class="input-group mb-3">
                        <select class="form-select" name="car_model" id="inputGroupSelect02">
                            <option selected>Model of Car</option>
                            <option value="1">Model 1</option>
                            <option value="2">Model 2</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <input class="form-control" type="text" name="specification" placeholder="Specification/Trim" required>
                    </div>
                    <div class="input-group mb-3">
                        <input class="form-control" type="text" name="engine_size" placeholder="Engine Size (e.g., 1499cc)" required>
                    </div>
                    <div class="input-group mb-3">
                        <select class="form-select" name="year" id="inputGroupSelect03" required>
                            <option selected>Year</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                        </select>
                    </div>
                </div>

                <button class="button" onclick="submitStep1(event)">Next</button>
            </form>
        </div>

        <!-- Step 2 -->
        <div class="tab-pane fade" id="step2" role="tabpanel" aria-labelledby="step2-tab">
            <form id="step2Form">
                <div class="row">
                    <!-- GCC Spec Section -->
                    <div class="mb-1">
                        <label for="gccSpec" class="form-label">GCC Spec?</label>
                        <div class="btn-group d-flex" role="group">
                            <input type="button" class="btn btn-outline-warning btn-bg-warning" value="Yes GCC">
                            <input type="button" class="btn btn-outline-warning btn-bg-warning active" value="American">
                            <input type="button" class="btn btn-outline-warning btn-bg-warning" value="European">
                            <input type="button" class="btn btn-outline-warning btn-bg-warning" value="Japanese">
                            <input type="button" class="btn btn-outline-warning btn-bg-warning" value="I don't know">
                        </div>
                    </div>

                    <!-- Overall Condition -->
                    <div class="mb-1">
                        <label class="form-label">Overall Condition</label>
                        <div class="btn-group d-flex" role="group">
                            <input type="button" class="btn btn-outline-warning btn-bg-warning" value="Excellent">
                            <input type="button" class="btn btn-outline-warning btn-bg-warning" value="Good">
                            <input type="button" class="btn btn-outline-warning btn-bg-warning active" value="Average">
                            <input type="button" class="btn btn-outline-warning btn-bg-warning" value="Poor">
                        </div>
                    </div>

                    <!-- Paintwork -->
                    <div class="mb-1">
                        <label class="form-label">Paintwork</label>
                        <div class="btn-group d-flex" role="group">
                            <input type="button" class="btn btn-outline-warning  btn-bg-warning" value="Original Paint">
                            <input type="button" class="btn btn-outline-warning  btn-bg-warning" value="Partial Repaint">
                            <input type="button" class="btn btn-outline-warning  btn-bg-warning active" value="Total Repaint">
                            <input type="button" class="btn btn-outline-warning  btn-bg-warning" value="I Don't Know">
                        </div>
                    </div>
                </div>
                <button class="button" onclick="submitStep1(event)">Next</button>
            </form>
        </div>

        <!-- Step 3 -->
        <div class="tab-pane fade" id="step3" role="tabpanel" aria-labelledby="step3-tab">
            <form id="step3Form">
                <div class="row">
                    <!-- GCC Spec Section -->
                    <!-- Interior Condition -->
                    <div class="mb-3">
                        <label class="form-label">Interior Condition</label>
                        <div class="btn-group d-flex" role="group">
                            <input type="button" class="btn btn-outline-warning btn-bg-warning" value="Excellent">
                            <input type="button" class="btn btn-outline-warning btn-bg-warning" value="Good">
                            <input type="button" class="btn btn-outline-warning btn-bg-warning active" value="Average">
                            <input type="button" class="btn btn-outline-warning btn-bg-warning" value="Poor">
                        </div>
                    </div>

                    <!-- Service History -->
                    <div class="mb-3">
                        <label class="form-label">Service History</label>
                        <div>
                            <input type="checkbox" id="serviceHistoryYes" name="serviceHistoryYes"><span><label for="serviceHistoryYes">Yes</label></span>

                        </div>
                    </div>

                    <!-- Comment Section -->
                    <div class="mb-3">
                        <label for="comment" class="form-label">Comment here.</label>
                        <textarea class="form-control" id="comment" rows="3" style="background-color: #333; color: white;"></textarea>
                    </div>

                    <!-- Loan or Mortgage -->
                    <div class="mb-3">
                        <label class="form-label">Loan or Mortgage</label>
                        <div>
                            <input type="checkbox" id="loanYes" name="loanYes">
                            <label for="loanYes">Yes</label>
                            <input type="checkbox" id="loanNo" name="loanNo">
                            <label for="loanNo">No</label>
                        </div>
                    </div>
                </div>
                <button class="button" onclick="submitStep1(event)">Next</button>
            </form>
        </div>
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
            <div class="faq ">
                <h3 class="faq-title">
                    Do You Offer Cash Payment When Buying My Car?
                </h3>
                <p class="faq-text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis facere odit debitis omnis
                    esse pariatur dolor adipisci neque? Obcaecati officiis amet animi sapiente, enim cupiditate
                    fugiat nesciunt ipsa corrupti exercitationem!
                </p>
                <button class="faq-toggle">
                    <i class="fas fa-plus"></i>
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="faq">
                <h3 class="faq-title">
                    How Soon Will I Receive Payment For My Car?
                </h3>
                <p class="faq-text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis facere odit debitis omnis
                    esse pariatur dolor adipisci neque? Obcaecati officiis amet animi sapiente, enim cupiditate
                    fugiat nesciunt ipsa corrupti exercitationem!
                </p>
                <button class="faq-toggle">
                    <i class="fas fa-plus"></i>
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="faq">
                <h3 class="faq-title">
                    Do I Need An Appointment To Sell My Car For Cash?
                </h3>
                <p class="faq-text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis facere odit debitis omnis
                    esse pariatur dolor adipisci neque? Obcaecati officiis amet animi sapiente, enim cupiditate
                    fugiat nesciunt ipsa corrupti exercitationem!
                </p>
                <button class="faq-toggle">
                    <i class="fas fa-plus"></i>
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="faq">
                <h3 class="faq-title">
                    What Happens If I Change My Mind After Receiving The Cash?
                </h3>
                <p class="faq-text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis facere odit debitis omnis
                    esse pariatur dolor adipisci neque? Obcaecati officiis amet animi sapiente, enim cupiditate
                    fugiat nesciunt ipsa corrupti exercitationem!
                </p>
                <button class="faq-toggle">
                    <i class="fas fa-plus"></i>
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="faq">
                <h3 class="faq-title">
                    Do You Buy Cars Of Any Make, Model, Or Condition For Cash?
                </h3>
                <p class="faq-text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis facere odit debitis omnis
                    esse pariatur dolor adipisci neque? Obcaecati officiis amet animi sapiente, enim cupiditate
                    fugiat nesciunt ipsa corrupti exercitationem!
                </p>
                <button class="faq-toggle">
                    <i class="fas fa-plus"></i>
                    <i class="fas fa-times"></i>
                </button>
            </div>
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

<!-- ============================================================seven part=================================================================== -->
<div class="seven-part">
    <div class="row">
        <div class="col-4">
            <img src="images/seven-part-img1.JPG" alt="">
        </div>
        <div class="col-4">
            <img src="images/seven-part-img2.JPG" alt="">
        </div>
        <div class="col-4 seting-img">
            <img src="images/seven-part-img3.JPG" alt="">
        </div>
    </div>
</div>

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
