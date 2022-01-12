<?php ?>
<input type="hidden" name="enquiry[enquiry_id]" value="<?= $enquiry['enquiry_id'] ?? '' ?>" />
<label>Enter Name</label>
<!-- <input type="text" name="enquirer_name" /> -->
<input type="text" name="enquiry[enquirer_name]" value="<?= $enquiry['enquirer_name'] ?? '' ?>" required />
<label>Enter Email</label>
<!-- <input type="text" name="enquirer_email" /> -->
<input type="text" name="enquiry[enquirer_email]" value="<?= $enquiry['enquirer_email'] ?? '' ?>" required />
<label>Enter Telephone Number</label>
<!-- <input type="text" name="enquirer_tel" /> -->
<input type="text" name="enquiry[enquirer_tel]" value="<?= $enquiry['enquirer_tel'] ?? '' ?>" required />
<label>Enter Enquiry</label>
<!-- <input type="text" name="enquiry" /> -->
<input type="text" name="enquiry[enquiry]" value="<?= $enquiry['enquiry'] ?? '' ?> required " />
<input type="submit" name="submit" value="Submit" />
</form>