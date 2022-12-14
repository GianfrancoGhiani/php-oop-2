<?php
require_once('Models/Product.php');
require_once('Models/ProductDetail.php');
require_once('Models/Account.php');

// $prod1 = new Product('pippo', 'none', 12.34, 'pluto');
// $prod2 = new ProductDetail('pippo', 'none', 12.34, 'pluto', 'cat', 'food');

// var_dump($prod1, $prod2);

include 'ProductsList.php';
$productsList = [];
foreach($products as $key => $value){
    ${'product' . $key} = new ProductDetail($value['name'], $value['imgPath'], $value['price'], $value['brand'], $value['category'], $value['use'], $value['id']);
    $productsList[] = ${'product' . $key};

}

// var_dump($productsList);
function getName($name) {
    if (empty($name)) {
    throw new Exception("no name here");
    }
    return $name;
    }


?>

<main id="app">
    <section class="container">

        <div class="card-section">
            <?php foreach ($productsList as $productObj) {
            ?>
            <div class="card-wrapper">
                <div class="card" @click="getElementbyID(<?php echo $productObj->getID()?>)">
                    <div class="card-img">
                        <img src="<?php echo $productObj->imgPath?>" alt="Pet Thing">
                    </div>
                    <div class="card-txt">
                        <h4><?php                
                        try {
                            echo getName($productObj->name);
                            } catch (Exception $e) {
                            echo 'Error: ' . $e->getMessage();
                            }
                        ?></h4>
                        <div class="price">€<?php echo $productObj->price?></div>
                        <div class="brand"><?php echo $productObj->brand?></div>
                    </div>
                    <div class="card-icons">
                        <?php echo ($productObj->category == 'dog')? '<i class="fa-solid fa-dog"></i>' : '<i class="fa-solid fa-cat"></i>' ?>
                        <?php if ($productObj->use == 'food'){
                            echo'<i class="fa-solid fa-utensils"></i>';
                            } elseif ($productObj->use == 'bed') {
                                echo '<i class="fa-solid fa-bed"></i>';
                            }else{
                                echo '<i class="fa-solid fa-gamepad"></i>';}
                                    ?>
                    </div>
                </div>
            </div>
                <?php }?>
        </div>
    </section>
    <aside class="side-char">
        <div v-for="(item, index) in chart" :key="index" class="char-row">
            <h4>{{item[0].name}} {{item[0].category == 'dog'? 'per cani': 'per gatti'}}</h4>
            <div>{{item[0].price}}</div>
        </div>
        <div v-if="totalPrice" class="total-price">
            Totale: €{{totalPrice}}
            <form action="login.php">
                <input type="hidden" name="shop">
                <button type="submit" class="btn-shop">Acquista ora</button>
            </form>
        </div>
        
    </aside>

</main>