<! DOCTYPE html>
<!-- 
	Name: Osman Fazlić
	Course name: Web Applications Development
	Professor: Ali Almisreb
	Date: November 24th, 2019
 -->
 
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM posts ORDER BY Date DESC, PostId DESC";
$result = $conn->query($sql);

?>
<html>
	<head>
		<title>Sport IUS</title>
		<link href="projekat1css.css" type="text/css" rel="stylesheet">	
	</head>
	
	<body>
		<div class="top">
			<a href="#home">Home</a>
			<a href="#contact">Contact</a>
			<a href="#about">About</a>
		</div>

		<h1>Osman Fazlić</h1>
		<img class='photo' src="Osman_slika.jpg" width="300" height="300"/>

		<?php
		
		while ($row = $result->fetch_assoc()) {
		?>
		<div class="post">
			<h2><?= $row["PostTitle"];?></h2>
			<?php $dateFormatted = date("d/m/Y", strtotime($row["Date"]));?>
			<h3><?= $dateFormatted;?></h3>
			<img class="photo-post" src="<?= $row["PostImage"];?>">
			<p>
			<?= $row["TextContent"];?>
			</p>
			<p>Author: <?php echo $row["AuthorName"] . " " . $row["AuthorSurname"];?></p>
		</div>
		<?php 
		} 
		$conn->close();
		?>
	</body>
</html>