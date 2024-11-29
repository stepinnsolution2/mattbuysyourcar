<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>OutreachCrown</title> -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        table {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
            background-color: #ffffff;
            border-collapse: collapse;
        }
        .header {
            margin-left: 10px;
            padding: 12px;
            color: #fff;
            font-size: 22px;
        }
        .section {
            padding: 20px;
            text-align: left;
            color: #333;
        }
        .footer {
            padding: 10px;
            background-color: #f1f1f1;
            text-align: center;
            font-size: 12px;
            color: #777;
        }
        .footer a {
            color: #4CAF50;
            text-decoration: none;
        }

        .flex-container {
        display: flex;
        padding: 8px 20px;
    }

    .flex-item {
        box-sizing: border-box; /* Ensure padding doesn't affect width */
        background-color: #f9f9f9;
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 14px;
        max-width: 30%;
        margin: 5px 10px;
    }

    .flex-item p {
        margin: 8px 0; /* Adjust spacing between paragraphs */
        color: #333;
        line-height: 1.5;
    }


        /* Images Section */
        .car-images {
            display: flex;
            flex-wrap: wrap;
            gap: 15px; /* Increased gap for better spacing */
            justify-content: center; /* Center images for a balanced layout */
            padding: 10px; /* Add padding for breathing space */
        }

        .car-images img {
            width: 120px; /* Slightly larger width */
            height: 120px; /* Slightly larger height */
            object-fit: cover;
            border: 2px solid #e0e0e0; /* Subtle border for a polished look */
            border-radius: 8px; /* Slightly more rounded corners */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Soft shadow for depth */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .car-images a {
            display: inline-block;
            transition: transform 0.3s ease;
        }

        .car-images a:hover img {
            transform: scale(1.1); /* Slight zoom on hover */
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2); /* Enhanced shadow on hover */
            border-color: #007bff; /* Highlighted border on hover */
        }

        .car-images a:hover {
            transform: translateY(-3px); /* Subtle lift on hover */
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .car-images img {
                width: 90px; /* Adjust width for smaller screens */
                height: 90px;
            }
            .car-images {
                gap: 10px; /* Reduce gap for smaller screens */
            }
        }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .flex-item {
            flex: 1 1 calc(50% - 20px); /* 2 columns on medium screens */
        }
    }

    @media (max-width: 480px) {
        .flex-item {
            flex: 1 1 100%; /* 1 column on small screens */
        }
    }
    </style>
</head>
<body>

    <table>
        <tr>
            <td class="header">
                <!-- <h2 style="color:#fff !important;font-family: cursive;">Mattbuysyourcar</h2> -->
                 <img src="{{ asset('images/logo.png') }}" width="200px" alt="">
            </td>
        </tr>
        <tr>
            <td class="section">
                <p><strong>Dear Matt,</strong></p>
                <p>I hope this email finds you well.</p>
                <p>A user has submitted their car details for sale. You can review the complete information in the admin panel. Here’s a summary of the car details:<strong></strong>!</p>

                <div class="flex-container">
                    <div class="flex-item">
                        @if(!empty($formData['car_type']))
                            <p><strong>Car Type:</strong> {{ $formData['car_type'] }}</p>
                        @endif
                        @if(!empty($formData['model']))
                            <p><strong>Model:</strong> {{ $formData['model'] }}</p>
                        @endif
                        @if(!empty($formData['specification']))
                            <p><strong>Specification:</strong> {{ $formData['specification'] }}</p>
                        @endif
                        @if(!empty($formData['engine_size']))
                            <p><strong>Engine Size:</strong> {{ $formData['engine_size'] }}</p>
                        @endif
                        @if(!empty($formData['year']))
                            <p><strong>Year:</strong> {{ $formData['year'] }}</p>
                        @endif
                        @if(!empty($formData['kilometers']))
                            <p><strong>Kilometers:</strong> {{ $formData['kilometers'] }}</p>
                        @endif
                    </div>

                    <div class="flex-item">
                        @if(!empty($formData['gcc_spec']))
                            <p><strong>GCC Spec:</strong> {{ $formData['gcc_spec'] }}</p>
                        @endif
                        @if(!empty($formData['condition']))
                            <p><strong>Condition:</strong> {{ $formData['condition'] }}</p>
                        @endif
                        @if(!empty($formData['paintwork']))
                            <p><strong>Paintwork:</strong> {{ $formData['paintwork'] }}</p>
                        @endif
                        @if(!empty($formData['interior_condition']))
                            <p><strong>Interior Condition:</strong> {{ $formData['interior_condition'] }}</p>
                        @endif
                        @if(!empty($formData['service_history']))
                            <p><strong>Service History:</strong> {{ $formData['service_history'] }}</p>
                        @endif
                        @if(!empty($formData['comment']))
                            <p><strong>Comment:</strong> {{ $formData['comment'] }}</p>
                        @endif
                        @if(!empty($formData['loan_secured']))
                            <p><strong>Loan Secured:</strong> {{ $formData['loan_secured'] }}</p>
                        @endif
                    </div>

                    <div class="flex-item">
                        @if(!empty($formData['first_name']))
                            <p><strong>First Name:</strong> {{ $formData['first_name'] }}</p>
                        @endif
                        @if(!empty($formData['last_name']))
                            <p><strong>Last Name:</strong> {{ $formData['last_name'] }}</p>
                        @endif
                        @if(!empty($formData['phone_number']))
                            <p><strong>Phone Number:</strong> {{ $formData['phone_number'] }}</p>
                        @endif
                        @if(!empty($formData['email']))
                            <p><strong>Email:</strong> {{ $formData['email'] }}</p>
                        @endif
                        @if(!empty($formData['address']))
                            <p><strong>Address:</strong> {{ $formData['address'] }}</p>
                        @endif
                    </div>
                </div>

                @if(!empty($formData['car_images']))
                    <p><strong>Car Images:</strong></p>
                    <div class="car-images">
                            @foreach(json_decode($formData['car_images'], true) as $image)
                                <a href="{{ asset('storage/' . $image) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $image) }}" alt="Car Image">
                                </a>
                            @endforeach
                    </div>
                @endif

                <br>
                <p>Takecare.... Have a nice day!</p>
                <br>
                <p><strong>Regards,</strong></p>
                <p>{{ $formData['first_name'] }}  {{ $formData['last_name'] }}</p>
            </td>
        </tr>
        <tr>
            <td class="footer">
                <p>Copyright &copy; 2024 All rights reserved. | Developed by <a href="https://stepinnsolution.com/">StepinnSolution</a></p>
                <p><a href="https://www.mattbuysyourcar.com">Visit the Website</a></p>
            </td>
        </tr>
    </table>

</body>
</html>
