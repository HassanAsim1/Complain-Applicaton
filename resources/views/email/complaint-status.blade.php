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
        <h1>Complaint Status</h1>
        <p>Your complaint status is as follows:</p>
        <div class="complaint-info">
            <p><span class="complaint-id">ID:</span> {{$complain->id}}</p>
            <p><strong>Title:</strong> {{ $complain->title }}</p>
            <p><strong>Description:</strong> {{ $complain->description }}</p>
            <p><strong>Status:</strong> {{ $complain->status }}</p>
        </div>
        <p>Thank you for using our service. We appreciate your feedback and will keep you updated regarding the status of your complaint. Please stay tuned for further notifications and updates.</p>
        <!-- Add more content as needed -->
    </div>
</body>
</html>
