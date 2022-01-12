<?php

namespace cars\Controllers;
// session_start();
class Enquiry
{
    private $enquiriesTable;
    public function __construct($enquiriesTable)
    {
        $this->enquiriesTable = $enquiriesTable;
    }
    // function to list enquiries
    public function list()
    {
        // List enquiries where the Status is Active
        $enquiries = $this->enquiriesTable->find('enquiry_status', 'Active');
        return [
            'template' => 'enquirylist.html.php',
            'title' => 'Enquiry List',
            'variables' => [
                'enquiries' => $enquiries
            ]
        ];
    }

    // function to list previous enquiries
    public function previous()
    {
        // List enquiries where the Status is Active
        $enquiries = $this->enquiriesTable->find('enquiry_status', 'Complete');
        return [
            'template' => 'enquirypreviouslist.html.php',
            'title' => 'Enquiry List',
            'variables' => [
                'enquiries' => $enquiries

            ]

        ];
    }
    // function to save enquiries
    public function editSubmit()
    {
        $enquiry = $_POST['enquiry'];
        $this->enquiriesTable->save($enquiry);
        if (((isset($_SESSION['loggedtype'])) && (($_SESSION['loggedtype'] == 'Admin') || ($_SESSION['loggedtype'] == 'Staff')))) {
            header('location: /enquiry/list');
        } else {
            header('location: /cars/homepage');
        }
    }
    // function to edit enquiries
    public function editForm()
    {
        if (isset($_GET['id'])) {
            $result = $this->enquiriesTable->find('enquiry_id', $_GET['id']);
            $enquiry = $result[0];
        } else {
            $enquiry = false;
        }
        return [
            'template' => 'enquiry.html.php',
            'variables' => ['enquiry' => $enquiry],
            'title' => 'Edit Enquiry'

        ];
        header('location: /enquiry/list');
    }
    // function to edit previous enquiries
    public function editPreviousForm()
    {
        if (isset($_GET['id'])) {
            $result = $this->enquiriesTable->find('enquiry_id', $_GET['id']);
            $enquiry = $result[0];
        } else {
            $enquiry = false;
        }
        return [
            'template' => 'enquiryprevious.html.php',
            'variables' => ['enquiry' => $enquiry],
            'title' => 'Edit Enquiry'
        ];
        header('location: /enquiry/list');
    }
    // function to complete enquiries
    public function complete()
    {
        $this->enquiriesTable->changestatus('enquiry_status', 'Complete', $_POST['id']);
        header('location: /enquiry/list');
    }
}
