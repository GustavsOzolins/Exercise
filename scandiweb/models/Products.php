    <?php
    require_once("Connection.php");

    /**
     * Class Products
     */
    class Products
    {
        private $connection;
        private $results;

        /**
         * Products constructor.
         */
        public function __construct()
        {
            $this->connection = new Connection();
            $this->getWhichButtonPressed();
        }

        /**
         * * Selects all products from products table
         */
        public function getProducts()
        {
            $selectData = "SELECT * FROM products ORDER BY category_id ASC";
            $getData = $this->connection->conn()->prepare($selectData);
            $getData->execute();
            $this->results = $getData->fetchAll(PDO::FETCH_ASSOC);
            return $this->results;
        }

        /**
         * @param $sku
         * @param $name
         * @param $price
         * @param $option
         * @param $attribute
         * Adds product to database
         */
        public function saveProduct($sku, $name, $price, $option, $attribute)
        {
            // Inserts users added product into database
            $insertData = "INSERT INTO products(sku, name, price, category_id, attribute) VALUES (:sku, :name, :price, :category_id, :attribute)";
            $addProduct = $this->connection->conn()->prepare($insertData);
            $addProduct->bindParam(':sku', $sku, PDO::PARAM_STR);
            $addProduct->bindParam(':name', $name, PDO::PARAM_STR);
            $addProduct->bindParam(':price', $price, PDO::PARAM_STR);
            $addProduct->bindParam(':category_id', $option, PDO::PARAM_INT);
            $addProduct->bindParam(':attribute', $attribute, PDO::PARAM_STR);
            $addProduct->execute();
        }

        /**
         * @param $cnt
         * Deletes selected products from database
         */
        public function deleteProducts($cnt)
        {
            // Iterates through and finds and deletes selected data
            for ($i = 0; $i < $cnt; $i++) {
                $del_id = $_POST['checkbox'][$i];
                $getData = "DELETE FROM products WHERE id= :del_id";
                $deleteData = $this->connection->conn()->prepare($getData);
                $deleteData->bindParam(':del_id', $del_id);
                $deleteData->execute();
            }
        }

        /**
         * Gets which button has been pressed
         */
        private function getWhichButtonPressed()
        {
            switch (isset($_POST)) {
                // if new-product has been set - redirects to productAdd.php page
                case isset($_POST['new-product']):
                    header('Location: ./views/productAdd.php');
                    break;
                // if delete has been set - calls checkboxSet function
                case isset($_POST['delete']):
                    $this->checkboxSet();
                    break;
                // if add-product has been set - calls addProduct function
                case isset($_POST['add-product']):
                    $this->addProduct();
            }
        }

        /**
         * gets count on how many checkboxes have been checked and pass it to deleteProducts function
         */
        private function checkboxSet()
        {
            if (isset($_POST['checkbox'])) {
                $cnt = count($_POST['checkbox']);
                $this->deleteProducts($cnt);
            } else {
                header('Location: index.php');
            }
        }

        /**
         * gets users entered info and pass it to saveProduct function
         */
        private function addProduct()
        {
            $sku = $_POST['sku'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $selectOption = $_POST['category'];
            // detects which post has been set and defines it as attribute
            switch (isset($_POST)) {
                case isset($_POST['size']):
                    $attribute = $_POST['size'];
                    break;
                case isset($_POST['weight']):
                    $attribute = $_POST['weight'];
                    break;
                case isset($_POST['height']) && isset($_POST['width']) && isset($_POST['length']):
                    $attribute = $_POST['height'] . "x" . $_POST['width'] . "x" . $_POST['length'];
                    break;
                case empty($attribute):
                    header('Location: ./productAdd.php');
            }
            $this->saveProduct($sku, $name, $price, $selectOption, $attribute);
            // redirects user to homepage
            header('Location: ./../index.php');
            exit;
        }
    }
