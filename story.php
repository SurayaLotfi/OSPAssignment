<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Share Your Story</title>
	<style>
        .navbar {
      overflow: hidden;
      background-color: #333;
      font-family: Arial, sans-serif;
    }

    .navbar a {
      float: left;
      display: block;
      color: white;
      text-align: center;
      padding: 14px 20px;
      text-decoration: none;
    }

    .navbar a:hover {
      background-color: #ddd;
      color: black;
    }
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}
		h1 {
			margin: 0;
			padding: 1em;
			background-color: #6699CC;
			color: white;
			text-align: center;
		}
		form {
			margin: 1em;
			padding: 1em;
			border: 1px solid #ccc;
		}
		label {
			display: block;
			margin-bottom: 0.5em;
		}
		input[type=text], textarea {
			display: block;
			margin-bottom: 1em;
			width: 100%;
		}
		input[type=submit] {
			background-color: #6699CC;
			color: white;
			border: none;
			padding: 0.5em;
			cursor: pointer;
		}
		.story {
			margin: 1em;
			padding: 1em;
			border: 1px solid #ccc;
		}
		.story h2 {
			margin-top: 0;
		}
		.delete {
			color: red;
			cursor: pointer;
		}
	</style>
</head>
<body>
<div class="navbar">
            <a href="home.php">Home</a>
            <a href="news.php">News</a>
            <a href="tips.php">Prevention Tips</a>
            <a href="gethelp.php">Get Help</a>
            <a href="newstories.php">Sharing</a>
            <a href="story.php">Share your story</a>
          </div>
	<h1>Share Your Story</h1>
	<form action="story.php" method="POST">
		<label for="story">Tell us your story:</label>
		<textarea name="story" rows="5" required></textarea>

		<input type="submit" value="Submit">
	</form>
    
    
	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$story = $_POST["story"];

		if (!isset($_SESSION["stories"])) {
			$_SESSION["stories"] = array();
		}

		// Add the new story to the beginning of the array of stories
		array_unshift($_SESSION["stories"], $story);
	}

	// Display all the stories on the web page
	if (isset($_SESSION["stories"])) {
		foreach ($_SESSION["stories"] as $key => $s) {
			echo "<div class='story'>";
			echo "<h2>Story:</h2>";
			echo "<p>$s</p>";
			echo "<p class='delete' onclick='deleteStory($key)'>Delete</p>";
			echo "</div>";
		}
	}

	// Delete a story if requested
	if (isset($_GET["delete"])) {
		$deleteIndex = $_GET["delete"];
		unset($_SESSION["stories"][$deleteIndex]);
		$_SESSION["stories"] = array_values($_SESSION["stories"]);
	}
	?>

	<script>
        function deleteStory(index) {
        if (index !== undefined && confirm("Are you sure you want to delete this story?")) {
            window.location.href = "story.php?delete=" + index;
        }
        }
	</script>
    <div class = "story">
    <h2>Story:</h2>
    <p>I was bullied throughout my childhood for being different. I was constantly made fun of for my appearance, my hobbies, and the way I spoke. The taunts and insults took a toll on my mental health and self-esteem. It wasn't until I found a supportive group of friends and learned to embrace my differences that I was able to overcome the trauma of my past experiences. 
        Today, I am a confident and successful individual, but the scars of my bullying experiences still linger. Stay strong fellas, we got this.</p>
    </div>
    
    <div class = "story">
    <h2>Story:</h2>
    <p>I was bullied throughout my childhood for being different. I was constantly made fun of for my appearance, my hobbies, and the way I spoke. The taunts and insults took a toll on my mental health and self-esteem. It wasn't until I found a supportive group of friends and learned to embrace my differences that I was able to overcome the trauma of my past experiences. 
        Today, I am a confident and successful individual, but the scars of my bullying experiences still linger. Stay strong fellas, we got this.</p>
    </div>

</body>
</html>
