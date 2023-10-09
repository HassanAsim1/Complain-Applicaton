<!DOCTYPE html>
<html>
<head>
    <title>Complaint Submitted</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 20px 0 0; /* Add margin-top of 20px */
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        p {
            color: #555;
            line-height: 1.6;
        }
        .complaint-info {
            background-color: #f2f2f2;
            padding: 10px;
            border-radius: 5px;
        }
        .complaint-id {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Complaint Submitted</h1>
        <p>Your complaint has been submitted successfully:</p>
        <div class="complaint-info">
            <p><span class="complaint-id">ID:</span> {{$complain->id}}</p>
            <p><strong>Title:</strong> {{ $complain->title }}</p>
            <p><strong>Description:</strong> {{ $complain->description }}</p>
        </div>
        <p>Thank you for submitting your complaint. We have received it, and our team will review and assign it to a developer for further action. Please keep an eye on your email and our website for updates and notifications regarding your complaint.</p>
        <!-- Add more content as needed -->
    </div>
</body>
</html>
