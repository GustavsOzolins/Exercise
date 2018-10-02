<?php

require_once("Products.php");

/**
 * Class DisplayProducts
 */
class DisplayProducts
{
    /**
     * @var Products
     */
    private $results;

    /**
     * DisplayProducts constructor.
     */
    public function __construct()
    {
        $this->results = new Products();
    }

    /**
     * Displays all products
     */
    public function displayProducts()
    {
        $results = $this->results->getProducts();
        // If there is atleast 1 product
        if (count($results) > 0) {
            // output data of each result
            foreach ($results as $result) {
              
                echo "<div class='product-individual'><input type='checkbox' name='checkbox[]' value='" . $result["id"] . "'>
                <div class='product-individual-sku'> " . $result["sku"] . " </div><div class='product-individual-name'> " . $result["name"] . "
                </div><div class='product-individual-price'> " . str_replace('.', ',', $result["price"]) . " $</div><div class='product-individual-attribute'>";

                switch ($result["category_id"]) {
                    case 1:
                        echo "Size: " . $result["attribute"] . " MB";
                        break;
                    case 2:
                        echo "Weight: " . $result["attribute"] . " Kg";
                        break;
                    case 3:
                        echo "Dimension: " . $result["attribute"] . "";
                        break;
                }
                echo "</div></div>";
            }
            // If there is no products
        } else {
            echo "No products have been added yet!";
        }
    }
}
