<?php

namespace car\Controllers;

class manufacturer
{
    private $manufacturersTable;
    private $carsTable;
    public function __construct($manufacturersTable, $carsTable)
    {
        // public function __construct($manufacturersTable) {
        $this->manufacturersTable = $manufacturersTable;
        $this->carsTable = $carsTable;
    }
    // function to list manufacturers
    public function list()
    {
        if (isset($_GET['id'])) {
            $manufacturers = $this->manufacturersTable->find('carId', $_GET['id']);
            $result = $this->carsTable->find('id', $_GET['id']);
            $car = $result[0];
        }
        return [
            'template' => 'manufacturerlist.html.php',
            'title' => 'Manufacturer List',
            'variables' => [
                'manufacturers' => $manufacturers, 'car' => $car
            ]
        ];
    }
    // function to save manufacturers
    public function editSubmit()
    {
        $manufacturer = $_POST['manufacturer'];
        $this->manufacturersTable->save($manufacturer);
        header('location: /manufacturer/list');
    }

    
    // function to update manufacturers
    public function editForm()
    {
        if (isset($_GET['id'])) {
            $result = $this->manufacturersTable->find('id', $_GET['id']);
            $manufacturer = $result[0];
        } else {
            $manufacturer = false;
        }
        return [
            'template' => 'editmanufacturer.html.php',
            'variables' => ['manufacturer' => $manufacturer],
            'title' => 'Edit Manufacturer'
        ];
        header('location: /manufacturer/list');
    }

    
    // function to add an manufacturer
    public function editManufacturerForm()
    {
        if (isset($_GET['id'])) {
            $manufacturer = false;
        } else {
            $manufacturer = false;
        }
        return [
            'template' => 'editmanufacturer.html.php',
            'variables' => ['manufacturer' => $manufacturer],
            'title' => 'Edit manufacturer'
        ];
        header('location: /manufacturer/list');
    }
    // function to edit manufacturers
    public function edit()
    {
        if (isset($_GET['id'])) {
            if (isset($_POST['manufacturer'])) {
                echo 'Am I in this function?';
                $manufacturer = $_POST['manufacturer'];
                $this->manufacturersTable->save($manufacturer);
                header('location: /car/list');
            } else {
                $result = $this->carsTable->find('id', $_GET['id']);
                $cars = $result[0];
                echo $cars['id'];
                $manufacturer = false;
                return [
                    'template' => 'editmanufacturer.html.php',
                    'variables' => ['manufacturer' => $manufacturer, 'car' => $cars],
                    'title' => 'Edit manufacturer'


                ];
            }
        } else {
            $manufacturer = false;
        }
    }
   
}
