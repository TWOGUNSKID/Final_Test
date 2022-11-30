<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<style>
		body {
			margin: 0px;
			font-family: sans-serif;
		}
		.main{
			width: 80%;
			margin: auto;
			display: grid;
			grid-template-columns: 25% 25% 25% 25%;
			background-color: white;
			text-align: center;
			padding: 10px;
			margin-top: 1%;
		}

		.holder{
			background-color: white;
			display: block;
			height: 95%;
			background-color: #f8f8f8;
			padding: 3%;
			padding-bottom: 10%;
		}

		.picture{
			height: 55%;
			width: 100%;
		}

		.description{
			display: block;
			text-align: left;
			font-family: sans-serif;
			font-size: 17px;
			padding-top: 3%;
		}

		.rating{
			text-align: left;
			padding-top: 3%;
		}

		.checked {
			color: orange;
		}

		.price{
			text-align: left;
			font-family: sans-serif;
			font-size: 22px;
			padding-top: 3%;
		}

		.button{
			width: 40%;
			height: 5%;
			border-radius: 30px 30px 30px 30px;
			background-color: #F6D55C;
			border: 1px solid #F6D55C;
			margin-top: 2%;
		}

		.amount{
			width: 12%;
		}

		.navbar {
			background-color: #20639B;
			width: 100%;
			height: 5%;
			box-shadow: 2px 4px 8px black;
			color: white;
		}

		.nav-links {
			width: 10%;
			height: 100%;
			float: left;
			text-align: center;
			align-items: center;
			font-size: 20px;
			padding: 5px;
			box-sizing: border-box;
		}

		.nav-links:hover {
			background-color: grey;
		}

		a {
			color: inherit;
			text-decoration: none;
		}

	</style>
	<body>
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "1219";
			$dbname = "shop";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);

			/* Check connection
			if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			}
			echo "Connected successfully";
			*/
		?>
		<div class="navbar">
			<a href="Catalogue.php">
				<div class="nav-links">
					Catalogue
				</div>
			</a>
			<div class="nav-links" style="float: right;">
				Checkout
			</div>
		</div>
		<div class="main">
			<?php
				$sql = "SELECT * FROM product";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) 
				{
					while($row = $result->fetch_assoc()) 
					{
			?>
				<div class="holder">
					<div class="picture">
						<img src="Products/<?php echo $row['Picture']; ?>" style="height: 100%; width: 100%;">
					</div>
					<div class="description">
						<?php echo $row["Name"]." - ".$row["Description"]; ?>
					</div>
					<div class="rating">
						<?php
							for ($c=0;$c<$row["Rating"]+1;$c++)
							{
						?>
						<span class="fa fa-star checked"></span>
						<?php
							}
						?>
					</div>
					<div class="price">
						<?php echo $row["Price"]; ?>
					</div>
					<form action="">
						<input type="number" class="amount" name="Quantity">
						<input type="button" value="Add to Cart" class="button" name="<?php echo $row['Product_ID']; ?>">
					</form>
				</div>
			<?php
					}
				}
			?>
		</div>
	</body>
</html>