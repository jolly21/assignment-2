<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
	<h2>Jobs List</h2>
	<ul class="listing">
		<a class="new" href="/job/edit">Add new job</a>
		<br>
		<?php if (((isset($_SESSION['loggedtype'])) && (($_SESSION['loggedtype'] ==
			'Admin') || ($_SESSION['loggedtype'] == 'Staff')))) { ?>
			<a class="new" href="/job/listarchived">Re-post old jobs</a>
		<?php } ?>
		<!-- Define job list table -->
		<?php
		echo '<table>';
		echo '<thead>';
		echo '<tr>';
		echo '<th>Title</th>';
		echo '<th style="width: 15%">Salary</th>';
		echo '<th style="width: 15%">Category</th>';
		echo '<th style="width: 5%">&nbsp;</th>';
		echo '<th style="width: 15%">&nbsp;</th>';
		echo '<th style="width: 5%">&nbsp;</th>';
		echo '<th style="width: 5%">&nbsp;</th>';
		echo '</tr>';
		// Unfortunately, need to make a database call as cannot get entity classes to work!!!
		$servername = "v.je";
		$username = "student";
		$password = "student";
		$dbname = "job";
		foreach ($jobs as $job) {
			echo '<tr>';
			echo '<td>' . $job['title'] . '</td>';
			echo '<td>' . $job['salary'] . '</td>';
			// Create connection

			$conn = mysqli_connect($servername, $username, $password, $dbname);

			// Check connection
			if (mysqli_connect_errno()) {
				// Connection Failed
				echo 'Failed to connect to MySQL ' . mysqli_connect_errno();
			}
			// get category details
			$categorysql = "SELECT name FROM category WHERE id = $job[categoryId]";

			if ($categoryresult = mysqli_query($conn, $categorysql)) {
				// Query successful
				while ($row = mysqli_fetch_array($categoryresult)) {
					if (mysqli_num_rows($categoryresult) == 0) {
						echo '<tr><td colspan="4">No Rows Returned</td></tr>';
					} else {
						// store the category name
						$categoryName = $row['name'];
					}
				}
			} else {
				echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
			};
			// display category
			echo '<td>' . $categoryName . '</td>';
			// display the edit link
			echo '<td><a style="float: right" href="/job/edit?id=' . $job['id'] . '">Edit</a></td>';
			//get applicant count details
			$applicantsql = "SELECT count(*) as Count FROM job.applicants WHERE jobid = $job[id]";
			if ($applicantresult = mysqli_query($conn, $applicantsql)) {
				// Query successful
				while ($row = mysqli_fetch_array($applicantresult)) {
					if (mysqli_num_rows($applicantresult) == 0) {
						echo '<tr><td colspan="4">No Rows Returned</td></tr>';
					} else {
						// store the applicant count
						$applicantCount = $row['Count'];
					}
				}
			} else {
				echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
			};
			// display View Applicants
			echo '<td><a style="float: right" method="post" href="/applicant/list?id=' . $job['id'] . '">View applicants </a></td>';
			// display the appicant count
			echo '<td>' . ' (' . $applicantCount . ') ' . '</td>';
			if (((isset($_SESSION['loggedtype'])) && (($_SESSION['loggedtype'] == 'Admin') || ($_SESSION['loggedtype'] == 'Staff')))) {
				// Display the Archive action
				echo '<td><form method="post" action="/job/archive">
            <input type="hidden" name="id" value="' . $job['id'] . '" />
            <input type="submit" name="submit" value="Archive" />
            </form></td>';
				// Display the Delete action
				echo '<td><form method="post" action="/job/delete">
            <input type="hidden" name="id" value="' . $job['id'] . '" />
            <input type="submit" name="submit" value="Delete" />
            </form></td>';
				echo '</tr>';
			}
		}
		echo '</thead>';
		echo '</table>';
	} else { ?>
		<section class="right">
			<?php if (isset($_GET['id'])) {
				$id = $_GET['id'];
				$name = $_GET['name']; ?>
				<?php echo "<h1> $name Jobs</h1>"; ?>
			<?php } ?>
			<ul class="listing">
			<?php foreach ($jobs as $job) {
				echo '<li>';
				echo '<div class="details">';

				echo '<h2>' . $job['title'] . '</h2>';
				echo '<h3>' . $job['salary'] . '</h3>';
				echo '<p>' . nl2br($job['description']) . '</p>';
				echo '<a class="more" method="post" href="/applicant/edit?id=' . $job['id'] . '">Apply for this job</a>';
				echo '</div>';
				echo '</li>';
			}
		}
			?>
			</ul>
		</section>