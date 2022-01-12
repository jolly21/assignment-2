<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
    <h2>Archived Cars List</h2>
    <!-- Define archived cars list -->
    <?php
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Title</th>';
    echo '<th style="width: 15%">Car</th>';
    echo '<th style="width: 5%">&nbsp;</th>';
    echo '<th style="width: 15%">&nbsp;</th>';
    echo '<th style="width: 5%">&nbsp;</th>';
    echo '<th style="width: 5%">&nbsp;</th>';
    echo '</tr>';
    foreach ($cars as $car) {
        echo '<tr>';
        echo '<td>' . $car['title'] . '</td>';
        echo '<td>' . $car['Car'] . '</td>';
        echo '<td><a style="float: right" href="/car/repost?id=' . $car['id'] . '">Repost</a></td>';
        echo '<td><form method="post" action="/car/delete">
            <input type="hidden" name="id" value="' . $car['id'] . '" />
            <input type="submit" name="submit" value="Delete" />
            </form></td>';
        echo '</tr>';
    }
    echo '</thead>';
    echo '</table>';
} else { ?>
    <section class="right">
        <?php if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $name = $_GET['name']; ?>
            <?php echo "<h1> $name Cars</h1>"; ?>
        <?php } ?>
        <ul class="listing">
        <?php foreach ($cars as $car) {
            echo '<li>';
            echo '<div class="details">';
            echo '<h2>' . $car['title'] . '</h2>';
            echo '<h3>' . $car['car'] . '</h3>';
            echo '<p>' . nl2br($car['description']) . '</p>';
            echo '<a class="more" method="post" href="/cars/edit?id=' . $car['id'] . '">View this Car</a>';
            echo '</div>';
            echo '</li>';
        }
    }
        ?>
        </ul>
    </section>