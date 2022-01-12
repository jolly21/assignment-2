
			<form action="editcar.php" method="POST" enctype="multipart/form-data">

<input type="hidden" name="id" value="<?php echo $car['id']; ?>" />
<label>Name</label>
<input type="text" name="name" value="<?php echo $car['name']; ?>" />

<label>Description</label>
<textarea name="description"><?php echo $car['description']; ?></textarea>

<label>Price</label>
<input type="text" name="price" value="<?php echo $car['price']; ?>" />

<label>Category</label>

<select name="manufacturerId">
<?php
    $stmt = $pdo->prepare('SELECT * FROM manufacturers');
    $stmt->execute();

    foreach ($stmt as $row) {
        if ($car['categoryId'] == $row['id']) {
            echo '<option selected="selected" value="' . $row['id'] . '">' . $row['name'] . '</option>';
        }
        else {
            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';	
        }
        
    }

?>

</select>


<?php

    if (file_exists('../productimages/' . $car['id'] . '.jpg')) {
        echo '<img src="../productimages/' . $car['id'] . '.jpg" />';
    }
?>
<label>Product image</label>

<input type="file" name="image" />

<input type="submit" name="submit" value="Save Product" />

</form>
