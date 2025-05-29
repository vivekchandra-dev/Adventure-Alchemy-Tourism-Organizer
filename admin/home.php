<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome, Admin!</title>
    <style>
        /* CSS for welcome message */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #e6f7ff;
        }

        .navbar {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }

        .welcome-message {
            text-align: center;
            padding: 10px;
            color: #333;
        }

        .welcome-message h1 {
            font-size: 45px;
            margin-bottom: 10px;
        }

        .welcome-message p {
            font-size: 32px;
            color: #333;
            margin-bottom: 10px;
        }

        .dashboard-container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
            padding: 10px;
        }

        .dashboard-card {
    width: 250px;
    height: 200px;
    margin: 50px;
    padding: 20px;
    background-color: #00505c; /* Deep teal color */
    color: white; /* White text for better contrast */
    box-shadow: 0 0 15px rgba(255, 255, 255, 0.2);
    border-radius: 12px;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.dashboard-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.25);
}

.dashboard-card h2 {
    font-size: 35px;
    margin-bottom: 10px;
    color: #fff; /* White text */
}

.dashboard-card p {
    font-size: 18px;
    color: #ddd; /* Lighter text color */
    margin-bottom: 20px;
}

.dashboard-card a {
    text-decoration: none;
    color: inherit;
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    transition: all 0.3s ease;
}

.dashboard-card a:hover {
    text-decoration: none;
    color: inherit;
    transform: scale(1.05);
}

        .video-container {
            width: 600px; /* Adjust width as needed */
            height: 400px; /* Adjust height as needed */
            border: 5px solid #fff; /* Optional border around the container */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Optional box shadow */
            overflow: hidden;
        }

        .video-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>
<body>



<div class="welcome-message">
    <h1>Welcome to Dashboard!</h1>
    <p>Explore and manage your tourism activities here.</p>
</div>

<div class="dashboard-container">
    
    <div class="dashboard-card" id="packages">
        <a href="<?php echo base_url ?>admin/?page=packages">
            <h2>Packages</h2>
            <p>Create, edit, and manage tour packages.</p>
        </a>
    </div>

    <div class="dashboard-card" id="bookings">
    <a href="<?php echo base_url ?>admin/?page=books">
            <h2>Bookings</h2>
            <p>View and manage bookings made by tourists.</p>
        </a>
    </div>

    <div class="dashboard-card" id="inquiries">
    <a href="<?php echo base_url ?>admin/?page=inquiries">
        <h2>Inquiries</h2>
        <p>Respond to inquiries from potential tourists.</p>
    </a>
    </div>

    <a href="<?php echo base_url ?>admin/?page=review" class="dashboard-card" id="ratings-reviews">
    <h2>Ratings and Reviews</h2>
    <p>View and manage ratings and reviews.</p>
</a>

    <div class="dashboard-card" id="settings">
    <a href="<?php echo base_url ?>admin/?page=system_info">
        <h2>Settings</h2>
        <p>Customize and manage dashboard settings.</p>
        </a>
    </div>

    
    <!--<div class="video-container"> -->
        <!-- For Image -->
       <!-- <img src="bat.jpg" alt="Welcome Image"> -->
        <!-- Or for Video -->
        <!--
        <video controls>
            <source src="your-video-path.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        -->
    </div>
</div>

</body>
</html>


