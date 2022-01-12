<?php

namespace cars\Controllers;

class careers
{
    private $careersTable;
    public function __construct($careersTable)
    {
        $this->faqsTable = $careersTable;
    }
    // function to list Careers
    public function list()
    {

        $careers = $this->careersTable->findAll();

        return [
            'template' => 'careerlist.html.php',
            'title' => 'Careers',
            'variables' => [
                'careers' => $careers
            ]
        ];
    }
}
