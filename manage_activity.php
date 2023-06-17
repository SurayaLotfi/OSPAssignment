<!DOCTYPE html>
<html lang="en">
<!--divinectorweb.com-->
<head>
    <meta charset="UTF-8">
    <title>How to create a pop up window using html css</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Zen+Tokyo+Zoo&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="style.css"> -->
    
</head>
<body>
   <h3>Your Company</h3>
	<h5>We Are Award Winning Web Design Agency From NewYork. We will help you improve your website and digital marketing, to increase your leads and sales online.</h5>
	<div class="box">
		<a class="button" href="#divOne">Contact US</a>
	</div>
	<div class="overlay" id="divOne">
		<div class="wrapper">
			<h2>Please Fill up The Form</h2><a class="close" href="#">&times;</a>
			<div class="content">
				<div class="container">
					<form>
						<label>Full Name</label>
						<input placeholder="Your name.." type="text">
						<label>Phone Number</label>
						<input placeholder="Your last name.." type="text">
						<input type="submit" value="Submit">
					</form>
				</div>
			</div>
		</div>
	</div>

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background: #e7e7e7;
            height: 100vh;
        }
        h3 {
            text-align: center;
            color: #413b3b;
            text-transform: uppercase;
            font-size: 80px;
            font-family: 'Zen Tokyo Zoo', cursive;
        }
        h5 {
            text-align: center;
            color: #82807f;
            margin: 80px auto;
            font-size: 20px;
            width: 50%;
            line-height: 1.7;
        }
        .box {
            text-align: center;
        }
        .button {
            font-size: 1em;
            padding: 15px 35px;
            color: #fff;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease-out;
            background: #403e3d;
            border-radius: 50px;
        }
        .overlay {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.8);
            transition: opacity 500ms;
            visibility: hidden;
            opacity: 0;
        }
        .overlay:target {
            visibility: visible;
            opacity: 1;
        }
        .wrapper {
            margin: 70px auto;
            padding: 20px;
            background: #e7e7e7;
            border-radius: 5px;
            width: 30%;
            position: relative;
            transition: all 5s ease-in-out;
        }
        .wrapper h2 {
            margin-top: 0;
            color: #333;
        }
        .wrapper .close {
            position: absolute;
            top: 20px;
            right: 30px;
            transition: all 200ms;
            font-size: 30px;
            font-weight: bold;
            text-decoration: none;
            color: #333;
        }
        .wrapper .close:hover {
            color: #06D85F;
        }
        .wrapper .content {
            max-height: 30%;
            overflow: auto;
        }
        /*form*/

        .container {
            border-radius: 5px;
            background-color: #e7e7e7;
            padding: 20px 0;
        }
        form label {
            text-transform: uppercase;
            font-weight: 500;
            letter-spacing: 3px;
        }
        input[type=text], select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }
        input[type="submit"] {
            background-color: #413b3b;
            color: #fff;
            padding: 15px 50px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-size: 15px;
            text-transform: uppercase;
            letter-spacing: 3px;
        }
    </style>
</body>
</html>