<h2>Claire's Cars</h2>

<p>Welcome to the Claire's Cars</p>

<p>The car has been added to the Claire's Cars <em><?= $car['cartext'] ?></em></p>

<h2>Recent Cars List</h2>
<ul class="listing">
    <!-- Define car list (limit 20) table -->
    <?php
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Title</th>';
    echo '<th style="width: 25%">Model</th>';
    echo '<th style="width: 25%">Description</th>';
    echo '<th style="width: 25%">Price</th>';
    echo '<th style="width: 5%">&nbsp;</th>';
    echo '</tr>';
    foreach ($cars as $car) {
        echo '<tr>';
        echo '<td>' . $car['title'] . '</td>';
        echo '<td>' . $car['model'] . '</td>';
        echo '<td>' . $car['description'] . '</td>';
        echo '<td>' . $car['price'] . '</td>';
        echo '</tr>';
    }
    echo '</thead>';
    echo '</table>';
