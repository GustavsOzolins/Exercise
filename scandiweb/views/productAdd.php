<?php
require_once("../models/Products.php");
require_once("../models/Category.php");
$products = new Products();
$categories = new Category();
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Scandiweb test task</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../public/style/style.css">
</head>
<body>
<div class="container">
    <!-- header block start -->
    <header>
        <div class="title">Product Add</div>
        <div class="options">
            <button name="add-product" form="attributeForm">Save</button>
        </div>
    </header>
    <!-- header block end -->
    <!-- product-list block start -->
    <div class="product-list">
        <!-- Form for user input -->
        <form method="post" id="attributeForm">
            <!-- Displays each product input info in separate block -->
            <div class="form-group">
                <label>SKU</label>
                <input minlength="4" name="sku" placeholder="Enter SKU" required>
                <div class="label-description">Unique number for product</div>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input minlength="4" name="name" placeholder="Enter name of product" required>
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="number" min="0" step="0.01" name="price" placeholder="Enter product price" required>
                <div class="label-description">Input number (valid inputs - 5 or 3,7 or 10,99)</div>
            </div>
            <div class="form-group">
                <label class="special">Type switcher</label>
                <select name="category" onchange="getAttributeField(this.value)" required>
                    <option value="" disabled selected>Select product category</option>
                    <!-- Gets and displays all available categories from database -->
                    <?php $categories->getCategoryList(); ?>
                </select>
            </div>
            <div class="form-group-attribute"></div>
        </form>
    </div>
    <!-- product-list block end -->
</div>
</body>
<script type="text/javascript" src="../public/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../public/js/js.js"></script>
</html>
