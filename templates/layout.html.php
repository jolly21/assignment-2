<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="/styles.css" />
	<title>Claires's Cars - Home</title>
</head>

<body>
	<header>
		<section>
			<aside>
				<h3>Opening Hours:</h3>
				<p>Mon-Fri: 09:00-17:30</p>
				<p>Sat: 09:00-17:00</p>
				<p>Sun: closed</p>
			</aside>
			<img src="/images/logo.png" />

		</section>
	</header>
	<nav>
		<ul>
			<li><a href="/">Home</a></li>
			<li><a href="/cars.php">Showroom</a></li>
			<li><a href="/car/about">About Us</a></li>
			<li><a href="/enquiry/edit">Contact us</a></li>
		</ul>
	</nav>
	<img src="/images/randombanner.php" />
	</nav>

	<main class="sidebar">
		<section class="left">
			<ul>

				<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
				?>
					<?php if (((isset($_SESSION['loggedtype'])) && (($_SESSION['loggedtype']
						== 'Admin') || ($_SESSION['loggedtype'] == 'Staff')))) { ?>
						<li><a href="/car/list">Cars</a></li>
						<li><a href="/category/list">Categories</a></li>
						<br><br>
						<li><a href="/enquiry/list">Enquiries</a></li>
						<li><a href="/user/list">Users</a></li>
					<?php } ?>
					<li><a href="/user/logout">Log out</a></li>
				<?php } else { ?>
					
					<br><br>
					<li><a href="/user/login">Login</a></li>
				<?php } ?>
			</ul>
		</section>
		<section class="right">
		</section>
		<?= $output ?>
	</main>
	<footer>

		<footer>
			&copy; Claire's Cars 2018
		</footer>
</body>

</html>