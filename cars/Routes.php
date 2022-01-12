<?php

namespace cars;
class Routes implements \CSY2028\Routes {

    private $categoriesTable;
    private $carsTable;
    private $manufacturerTable;
    public function getRoutes();
    public function getPage($route);
    public function checkLogin($route); 
    
    {

        require '../database.php';

        $this->carsTable = new \CSY2028\DatabaseTable($pdo, 'car', 'id');
        $this->categoriesTable = new \CSY2028\DatabaseTable($pdo, 'category', 'id');
        $userTable = new \CSY2028\DatabaseTable($pdo, 'user', 'id');
        $this->manufacturerTable = new \CSY2028\DatabaseTable($pdo, 'manufacturer', 'id');
        $careersTable = new \CSY2028\DatabaseTable($pdo, 'career', 'career_id');
        $enquiriesTable = new \CSY2028\DatabaseTable($pdo, 'enquiry', 'enquiry_id');
        $carController = new \cars\Controllers\Car($this->carsTable, $this->categoriesTable, $this->manufacturersTable);
        $categoryController = new \cars\Controllers\Category($this->categoriesTable);


        
        $userController = new \cars\Controllers\User($userTable);
        $manufacturerController = new \cars\Controllers\manufacturer($this->manufacturersTable, $this->carsTable);
        $careerController = new \cars\Controllers\Career($careersTable);
        $enquiryController = new \cars\Controllers\Enquiry($enquiriesTable);
        // define routes
        $routes = [
            'cars/homepage' => [
                'GET' => [
                    'controller' => $carController,
                    'function' => 'listLimit'
                ]
            ],
            'cars/list' => [
                'GET' => [
                    'controller' => $carController,
                    'function' => 'list'
                ]
            ],
            'car/clientlist' => [
                'GET' => [
                    'controller' => $carController,
                    'function' => 'clientlist'
                ]
            ],
            'car/filter' => [
                'GET' => [
                    'controller' => $carController,
                    'function' => 'filter'
                ]
            ],
            'car/repost' => [

                'GET' => [
                    'controller' => $carController,
                    'function' => 'editRepostForm'
                ],
                'POST' => [
                    'controller' => $carController,
                    'function' => 'editRepostSubmit'
                ],
                'login' => true
            ],
            'job/listarchived' => [
                'GET' => [
                    'controller' => $carController,
                    'function' => 'listarchived'
                ]
            ],
            'job/clientfilter' => [
                'GET' => [
                    'controller' => $carController,
                    'function' => 'clientfilter'
                ]
            ],
            'job/edit' => [
                'GET' => [
                    'controller' => $carController,
                    'function' => 'editForm'
                ],
                'POST' => [
                    'controller' => $carController,

                    'function' => 'editSubmit'
                ],
                'login' => true
            ],
            'job/delete' => [
                'POST' => [
                    'controller' => $carController,
                    'function' => 'delete'
                ],
                'login' => true
            ],
            'job/archive' => [
                'POST' => [
                    'controller' => $carController,
                    'function' => 'archive'
                ],
                'login' => true
            ],
            'job/about' => [
                'GET' => [
                    'controller' => $carController,
                    'function' => 'about'
                ],
            ],
            'job/location' => [
                'GET' => [
                    'controller' => $carController,
                    'function' => 'filterlocation'
                ],
            ],
            'category/list' => [

                'GET' => [
                    'controller' => $categoryController,
                    'function' => 'list'
                ]
            ],
            'category/edit' => [
                'GET' => [
                    'controller' => $categoryController,
                    'function' => 'editForm'
                ],
                'POST' => [
                    'controller' => $categoryController,
                    'function' => 'editSubmit'
                ],
                'login' => true
            ],
            'category/delete' => [
                'POST' => [
                    'controller' => $categoryController,
                    'function' => 'delete'
                ],
                'login' => true
            ],
            'user/list' => [
                'GET' => [
                    'controller' => $userController,
                    'function' => 'list'
                ]
            ],
            'user/removeaccess' => [
                'POST' => [

                    'controller' => $userController,
                    'function' => 'removeaccess'
                ]
            ],
            'user/register' => [
                'GET' => [
                    'controller' => $userController,
                    'function' => 'registerForm'
                ],
                'POST' => [
                    'controller' => $userController,
                    'function' => 'registerSubmit'
                ],
                'login' => true
            ],
            'user/login' => [
                'POST' => [
                    'controller' => $userController,
                    'function' => 'login'
                ],
                'GET' => [
                    'controller' => $userController,
                    'function' => 'login'
                ]
            ],
            'user/logout' => [
                'GET' => [
                    'controller' => $userController,
                    'function' => 'logout'
                ],
                'login' => true

            ],
            'manufacturer/list' => [
                'GET' => [
                    'controller' => $manufacturerController,
                    'function' => 'list'
                ],
                'login' => true
            ],
            'manufacturerant/edit' => [
                'GET' => [
                    'controller' => $manufacturerController,
                    'function' => 'editManufacturerForm'
                ],
                'POST' => [
                    'controller' => $manufacturerController,
                    'function' => 'editSubmit'
                ],
            ],
            'manufacturer/cvs' => [
                'GET' => [
                    'controller' => $manufacturerController,
                    'function' => 'cvs'
                ],
                'login' => true
            ],
            'career/list' => [
                'GET' => [
                    'controller' => $careerController,
                    'function' => 'list'
                ]
            ],

            'enquiry/edit' => [
                'GET' => [
                    'controller' => $enquiryController,
                    'function' => 'editForm'
                ],
                'POST' => [
                    'controller' => $enquiryController,
                    'function' => 'editSubmit'
                ],
            ],
            'enquiry/editprevious' => [
                'GET' => [
                    'controller' => $enquiryController,
                    'function' => 'editPreviousForm'
                ],
                'POST' => [
                    'controller' => $enquiryController,
                    'function' => 'editSubmit'
                ],
            ],
            'enquiry/list' => [
                'GET' => [
                    'controller' => $enquiryController,
                    'function' => 'list'
                ]
            ],
            'enquiry/complete' => [
                'POST' => [
                    'controller' => $enquiryController,
                    'function' => 'complete'

                ]
            ],
            'enquiry/listprevious' => [
                'GET' => [
                    'controller' => $enquiryController,
                    'function' => 'previous'
                ]
            ],
        ];
        return $routes;

    }
    
    // send database values to template
    public function getLayoutVariables()
    {
        return [
            'categories' => $this->categoriesTable->findAll(),
            'cars' => $this->carsTable->findDistinctLocation()
        ];
    }
    // validate login
    public function checkLogin($route)
    {
        // session_start();
        if (!isset($_SESSION['loggedin'])) {
            header('location: /car/list');
        }
    }
    
}
