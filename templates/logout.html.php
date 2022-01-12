<?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    ?>
    <section class="left">
        <ul>
            <li><a href="cars.php">Cars</a></li>
            <li><a href="categories.php">Categories</a></li>
        </ul>
    </section>
    <section class="right">
    <h2>You are now logged out</h2>
    </section>
    <?php
    }
    else {
        header('location: /car/list');
}
?>