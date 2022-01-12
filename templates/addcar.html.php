<form action="addcar.php" method="POST" enctype="multipart/form-data">
				<label>Car Model</label>
				<input type="text" name="model" />

				<label>Description</label>
				<textarea name="description"></textarea>

				<label>Price</label>
				<input type="text" name="price" />

				<label>Category</label>

				<select name="manufacturerId">
				<?php
					$stmt = $pdo->prepare('SELECT * FROM manufacturers');
					$stmt->execute();

					foreach ($stmt as $row) {
						echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
					}

				?>

				</select>

				<label>Image</label>

				<input type="file" name="image" />

				<input type="submit" name="submit" value="Add Car" />

			</form>