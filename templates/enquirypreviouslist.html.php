<h2>Previous Enquiries</h2>


<?php
echo '<table>';
echo '<thead>';
echo '<tr>';
echo '<th>Name</th>';
echo '<th style="width: 5%">&nbsp;</th>';
echo '<th style="width: 20%">Enquiry</th>';
echo '<th style="width: 5%">&nbsp;</th>';
echo '<th style="width: 20%">Handler</th>';
echo '<th style="width: 5%">&nbsp;</th>';
echo '<th style="width: 15%">Response Date</th>';
echo '<th style="width: 5%">&nbsp;</th>';
echo '<th style="width: 5%">&nbsp;</th>';
echo '</tr>';
foreach ($enquiries as $enquiry) {
    echo '<tr>';
    echo '<td>' . $enquiry['enquirer_name'] . '</td>';
    echo '<td>' . $enquiry['enquiry'] . '</td>';
    echo '<td>' . $enquiry['enquiry_response'] . '</td>';
    echo '<td>' . $enquiry['enquiry_response_date'] . '</td>';
    echo '<td>' . $enquiry['enquiry_response_username'] . '</td>';
    // View Response allows the Admin user to see the response ofthe completed enquiry
    echo '<td><a style="float: right" href="/enquiry/editprevious?id=' . $enquiry['enquiry_id'] . '">View Response</a></td>';
    echo '</tr>';
}
echo '</thead>';
echo '</table>';
