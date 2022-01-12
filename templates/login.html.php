<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>
    <section class="left">
        <ul>
            <li><a href="jobs.php">Jobs</a></li>
            <li><a href="categories.php">Categories</a></li>
        </ul>
    </section>
    <section class="right">
        <h2>You are now logged in</h2>
    </section>
<?php
} else { ?>
    <h2>Log in</h2>
    <!-- Define login form -->
    <form action="/user/login" method="POST" style="padding: 40px">
        <label>Enter User Name</label>
       
        <input type="text" name="username" required />
        <label>Enter Password</label>
        
        <input type="password" name="password" required />
        <input type="submit" name="submit" value="Log In" />
    </form>
<?php
}
?>