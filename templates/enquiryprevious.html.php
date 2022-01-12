<?php
if (isset($_SESSION['loggedtype'])) {
    $usertype = $_SESSION['loggedtype'];
    $userid = $_SESSION['loggedid'];
    $username = $_SESSION['loggeduser'];
}
?>

    <h2>Previous Enquiry</h2>
    <!-- Define previous enquiries form -->
    <form action="/enquiry/edit" method="POST" style="padding: 40px">
        <input type="hidden" name="enquiry[enquiry_id]" value="<?= $enquiry['enquiry_id'] ?? '' ?>" />
        <label>Name</label>
        <input type="text" name="enquiry[enquirer_name]" value="<?= $enquiry['enquirer_name'] ?? '' ?>" />
        <label>Email</label>
        <input type="text" name="enquiry[enquirer_email]" value="<?= $enquiry['enquirer_email'] ?? '' ?>" />
        <label>Telephone Number</label>
        <input type="text" name="enquiry[enquirer_tel]" value="<?= $enquiry['enquirer_tel'] ?? '' ?>" />
        <label>Enquiry</label><input type="text" name="enquiry[enquiry]" value="<?= $enquiry['enquiry'] ?? '' ?>" />
        <label>Enquiry Response</label>
        <input type="text" name="enquiry[enquiry_response]" value="<?= $enquiry['enquiry_response'] ?? '' ?>" />
        <label>Responded By</label>
        <input type="text" name="enquiry[enquiry_response_username]" value="<?= $enquiry['enquiry_response_username'] ?? '' ?>" />
        <input type="hidden" name="enquiry[enquiry_response_date]" value="<?= $enquiry['enquiry_response_date'] ?? '' ?>" />
        <input type="hidden" name="enquiry[enquiry_response_handler]" value="<?= $enquiry['enquiry_response_handler'] ?? '' ?>" />
        <input type="submit" name="submit" value="Cancel" />
    </form>