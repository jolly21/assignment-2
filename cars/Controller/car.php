<?php

namespace cars\Controllers;

class car1
{
    private $carsTable;
    private $categoriesTable;
    private $manufacturersTable;
    public function __construct($carsTable, $categoriesTable, $manufacturersTable)
    {
        // public function __construct($carsTable) {
        $this->carsTable = $carsTable;
        $this->categoriesTable = $categoriesTable;
        $this->manufacturersTable = $manufacturersTable;
    }

    //  List all cars
    public function list()
    {
        $cars = $this->carsTable->find('car_status', 'Active');
        return [
            'template' => 'carlist.html.php',
            'title' => 'Car List',
            'variables' => [
                'cars' => $cars, 'manufacturers' => $this->manufacturersTable->count('carId', 1)
                // 'cars' => $cars,
            ]
        ];
    }
    // Listed cars created by the Client
    public function clientlist()
    {
        if (isset($_SESSION['loggedid'])) {
            $userid = $_SESSION['loggedid'];
        }
        $cars = $this->carsTable->find('createdby', $userid);
        return [
            'template' => 'carlist.html.php',
            'title' => 'Car List',
            'variables' => [
                'cars' => $cars, 'manufacturers' => $this->manufacturersTable->count('carId', 1)
                // 'cars' => $cars,
            ]
        ];
    }
    // List all archived cars

    public function listarchived()
    {
        $cars = $this->carsTable->find('car_status', 'Archived');
        return [
            'template' => 'cararchivedlist.html.php',
            'title' => 'Car List',
            'variables' => [
                'cars' => $cars, 'manufacturers' => $this->manufacturersTable->count('carId', 1)
            ]
        ];
    }
    // Filter cars by category'
    public function filter()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        $cars = $this->carsTable->find('categoryId', $id);
        return [
            'template' => 'carlist.html.php',
            'title' => 'Car List',
            'variables' => [
                'cars' => $cars,
                'manufacturers' => $this->manufacturersTable->count('carId', 1)
                // 'cars' => $cars,
            ]
        ];
    }

    // function to filter cars by location
    public function filterlocation()
    {
        if (isset($_GET['location'])) {
            $location = $_GET['location'];
        }
        $cars = $this->carsTable->find('location', $location);
        return [
            'template' => 'carlist.html.php',
            'title' => 'Car List',
            'variables' => [
                'cars' => $cars, 'manufacturers' => $this->manufacturersTable->count('carId', 1)
                // 'cars' => $cars,
            ]
        ];
    }
    // List cars a Client has created'
    public function clientfilter()
    {
        // This function lists only the client cars by the category selected
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        if (isset($_SESSION['loggedtype'])) {
            $usertype = $_SESSION['loggedtype'];
            $userid = $_SESSION['loggedid'];
        }
        if ($usertype == 'Client') {

            $cars = $this->carsTable->findmore('createdBy', $userid, 'categoryId', $id);
        } else {
            $cars = $this->carsTable->find('categoryId', $id);
            # code...
        }
        return [
            'template' => 'carlist.html.php',
            'title' => 'Car List',
            'variables' => [
                'cars' => $cars,
                'manufacturers' => $this->manufacturersTable->count('carId', 1)
            ]
        ];
    }
    // Delete a car
    public function delete()
    {
        $this->carsTable->delete($_POST['id']);
        header('location: /car/list');
    }
    // Archive a car - set status to 'Archive'
    public function archive()
    {
        $this->carsTable->changestatus('car_status', 'Archived', $_POST['id']);
        header('location: /car/list');
    }

    // Save car details'
    public function editSubmit()
    {
        $car = $_POST['car'];
        $this->carsTable->save($car);
        header('location: /car/list');
    }
    // Update car details'
    public function editForm()
    {
        if (isset($_GET['id'])) {
            $result = $this->carsTable->find('id', $_GET['id']);
            $car = $result[0];
        } else {
            $car = false;
        }
        return [
            'template' => 'editcar.html.php',
            'variables' => ['car' => $car, 'categories' => $this->categoriesTable->findAll()],
            'title' => 'Edit Car'
        ];
        header('location: /car/list');
    }
    // Save re-posted car details'
    public function editRepostSubmit()
    {
        $car = $_POST['car'];
        $this->carsTable->save($car);

        header('location: /car/list');
    }
    // Update re-posted car details'
    public function editRepostForm()
    {
        if (isset($_GET['id'])) {
            $result = $this->carsTable->find('id', $_GET['id']);
            $car = $result[0];
        } else {
            $car = false;
        }
        return [
            'template' => 'editrepostcar.html.php',
            'variables' => ['car' => $car, 'categories' => $this->categoriesTable->findAll()],
            'title' => 'Edit Car'
        ];
        header('location: /car/list');
    }
    // Display the About page
    public function about()
    {
        if (isset($_GET['id'])) {
            $result = $this->carsTable->find('id', $_GET['id']);
            $car = $result[0];
        } else {
            $car = false;
        }
        return [
            'template' => 'aboutcar.html.php',
            'variables' => [
                'car' => $car,
                'categories' => $this->categoriesTable->findAll()
            ],
            'title' => 'About Us'
        ];
        header('location: /car/list');
    }
    // REST - save or update car details'
    public function edit()
    {
        if (isset($_POST['car'])) {
            echo $car['title'];
            $this->carsTable->save($_POST['car']);
            header('location: /car/list');
        } else {
            if (isset($_GET['id'])) {
                $result = $this->carsTable->find('id', $_GET['id']);
                $car = $result[0];
            } else {
                $car = false;
            }
            return [
                'template' => 'editcar.html.php',
                'variables' => [
                    'car' => $car,
                    'categories' => $this->categoriesTable->findAll()
                ],
                'title' => 'Edit Car'
            ];
        }
    }
}
