<h2>Enquiries</h2>
<!-- This page lists all Active Enquiries -->
<!-- Only Admin users can see the list of previous enquiries -->
<?php if ((isset($_SESSION['loggedtype'])) && ($_SESSION['loggedtype'] == 'Admi
n')) { ?>
    <a class="new" href="/enquiry/listprevious">View Previous Enquiries</a>
<?php } ?>
<!-- Define enquiry table -->
<?php
echo '<table>';
echo '<thead>';
echo '<tr>';
echo '<th>Name</th>';
echo '<th style="width: 20%">Enquiry</th>';
echo '<th style="width: 20%">Response</th>';
echo '<th style="width: 15%">Response Date</th>';
echo '<th style="width: 5%">&nbsp;</th>';
echo '</tr>';
foreach ($enquiries as $enquiry) {
    echo '<tr>';
    echo '<td>' . $enquiry['enquirer_name'] . '</td>';
    echo '<td>' . $enquiry['enquiry'] . '</td>';
    echo '<td>' . $enquiry['enquiry_response'] . '</td>';
    echo '<td>' . $enquiry['enquiry_response_date'] . '</td>';
    // Respond allows the user to add a response to the enquiry
    echo '<td><a style="float: right" href="/enquiry/edit?id=' . $enquiry['enquiry_id'] . '">Respond</a></td>';
    // Complete updates the enquiry status to 'Complete'
    echo '<td><form method="post" action="/enquiry/complete">
                            <input type="hidden" name="id" value="' . $enquiry['enquiry_id'] . '" />
" />
<input type="submit" name="submit" value="Complete
            </form></td>';
    echo '</tr>';
}
echo '</thead>';
echo '</table>';
