<?php

namespace Job\Controllers;

class Category
{
    private $categoriesTable;
    public function __construct($categoriesTable)
    {
        $this->categoriesTable = $categoriesTable;
    }
    // function to list categories
    public function list()
    {
        $categories = $this->categoriesTable->findAll();
        return [
            'template' => 'categorylist.html.php',
            'title' => 'Category List',
            'variables' => [
                'categories' => $categories

            ]
        ];
    }
    // function to delete categories
    public function delete()
    {
        $this->categoriesTable->delete($_POST['id']);
        header('location: /category/list');
    }
    public function editSubmit()
    {
        $category = $_POST['category'];
        $this->categoriesTable->save($category);
        header('location: /category/list');
    }
    // function to edit categories
    public function editForm()
    {
        if (isset($_GET['id'])) {
            $result = $this->categoriesTable->find('id', $_GET['id']);
            $category = $result[0];
        } else {
            $category = false;
        }
        return [
            'template' => 'editcategory.html.php',
            'variables' => ['category' => $category],
            'title' => 'Edit Category'
        ];
        header('location: /job/list');
    }
    // function to edit categories
    public function edit()
    {
        if (isset($_POST['category'])) {
            $this->categoriesTable->save($_POST['category']);

            header('location: /category/list');
        } else {
            if (isset($_GET['id'])) {
                $result = $this->categoriesTable->find('id', $_GET['id']);
                $category = $result[0];
            } else {
                $category = false;
            }
            return [
                'template' => 'editcategory.html.php',
                'variables' => ['category' => $category],
                'title' => 'Edit Category'
            ];
        }
    }
}
