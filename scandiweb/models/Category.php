<?php

/**
 * Class Category
 */
class Category
{
    private $connection;

    public function __construct()
    {
        $this->connection = new Connection();
    }

    /**
     * Gets all available categories from database
     */
    public function getCategoryList()
    {
        // gets category id and name
        $selectData = "SELECT id, category_name FROM category ORDER BY id ASC";
        $getData = $this->connection->conn()->prepare($selectData);
        $getData->execute();
        $results = $getData->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $result) {
            echo "<option value='" . $result["id"] . "'>" . $result["category_name"] . "</option>";
        }
    }

}