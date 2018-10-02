<?php
require_once("models/Products.php");
require_once("models/DisplayProducts.php");
$products = new Products();
$displayProducts = new DisplayProducts();
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Scandiweb test task</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="public/style/style.css">
</head>
<body>
<div class="container">
    <!-- header block start -->
    <header>
        <div class="title">Product List</div>
        <div class="options">
            <form method="post">
                <button name="new-product">Add new product</button>
                <button name="delete" form="attributeForm">Delete selected</button>
            </form>
        </div>
    </header>
    <!-- header block end -->
    <form method="post" id="attributeForm">
        <!-- Displays all products -->
        <div class="product-list">
            <?php $displayProducts->displayProducts(); ?>
        </div>
    </form>
</div>
</body>
<script type="text/javascript" src="public/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="public/js/js.js"></script>
</html>