<?php
require_once('Models/Product.php');
require_once('Models/ProductDetail.php');

// $prod1 = new Product('pippo', 'none', 12.34, 'pluto');
// $prod2 = new ProductDetail('pippo', 'none', 12.34, 'pluto', 'cat', 'food');

// var_dump($prod1, $prod2);

include 'db.php';
$productsList = [];
foreach($products as $key => $value){
    ${'product' . $key} = new ProductDetail($value['name'], $value['imgPath'], $value['price'], $value['brand'], $value['category'], $value['use'], $value['id']);
    $productsList[] = ${'product' . $key};

}
var_dump($productsList);


?>

<main>
    <section class="container">

        <div class="card-section">
            <?php foreach ($productsList as $productObj) {
            ?>
            <div class="card-wrapper">
                <div class="card">
                    <div class="card-img">
                        <img src="<?php echo $productObj->imgPath?>" alt="Pet Thing">
                    </div>
                    <div class="card-txt">
                        <h4><?php echo $productObj->name?></h4>
                        <div>€<?php echo $productObj->price?></div>
                        <div class="brand"><?php echo $productObj->brand?></div>
                    </div>
                    <div class="card-icons"></div>
                </div>
            </div>
                <?php }?>
        </div>
    </section>


</main>