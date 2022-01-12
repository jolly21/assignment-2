<?php
class CategoryController
{
    private $categoriesTable;

    public function __construct($categoriesTable)
    {
        $this->categoriesTable = $categoriesTable;
    }

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

    public function delete()
    {
        $this->categoriesTable->delete($_POST['id']);

        header('location: /category/list');
    }

    public function edit()
    {
        if (isset($_POST['category'])) {

            $this->categoriesTable->save($_POST['category']);

            header('location: /category/list');
        }
    }
}
