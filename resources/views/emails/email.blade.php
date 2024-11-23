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
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-collapse: collapse;
        }
        .header {
            text-align: center;
            padding: 12px;
            background-color: #7c8998;
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
                <br>
                <p>I hope this email finds you well.</p>
                <p>A user has submitted their car details for sale. You can review the complete information in the admin panel. Here’s a summary of the car details:<strong></strong>!</p>
                <br>
                <p><strong>Car Type:</strong> {{ $formData['car_type'] }}</p>
                <p><strong>Model:</strong> {{ $formData['model'] }}</p>
                <p><strong>Specification:</strong> {{ $formData['specification'] }}</p>
                <p><strong>Engine Size:</strong> {{ $formData['engine_size'] }}</p>
                <p><strong>Year:</strong> {{ $formData['year'] }}</p>
                <p><strong>Kilometers:</strong> {{ $formData['kilometers'] }}</p>
                <br>
                <p><strong>GCC Spec:</strong> {{ $formData['gcc_spec'] }}</p>
                <p><strong>Condition:</strong> {{ $formData['condition'] }}</p>
                <p><strong>Paintwork:</strong> {{ $formData['paintwork'] }}</p>
                <p><strong>Interior Condition:</strong> {{ $formData['interior_condition'] }}</p>
                <p><strong>Service History:</strong> {{ $formData['service_history'] }}</p>
                <p><strong>Comment:</strong> {{ $formData['comment'] }}</p>
                <p><strong>Loan Secured:</strong> {{ $formData['loan_secured'] }}</p>
                <br>
                <p><strong>First Name:</strong> {{ $formData['first_name'] }}</p>
                <p><strong>Last Name:</strong> {{ $formData['last_name'] }}</p>
                <p><strong>Phone Number:</strong> {{ $formData['phone_number'] }}</p>
                <p><strong>Email:</strong> {{ $formData['email'] }}</p>
                <p><strong>Address:</strong> {{ $formData['address'] }}</p>
                <br>
                <p><strong>Car Images:</strong></p>
                <br>
                <div>
                    @foreach(json_decode($formData['car_images'], true) as $image)
                        <a href="{{ asset('storage/' . $image) }}" target="_blank">
                            <img src="{{ asset('storage/' . $image) }}" alt="Car Image" style="width: 150px; height: 150px; margin: 5px;">
                        </a>
                    @endforeach
                </div>
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
