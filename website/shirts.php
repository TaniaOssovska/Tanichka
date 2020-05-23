<?php require "elements/db.php";

$category_id = 1;

$row = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM products_categories WHERE id = '$category_id'"));

?>
<!DOCTYPE html>
<html> 
<head>
  <?php require_once "elements/header.php";?>
</head>
<body> 
  <?php require "elements/menu.php"; ?>

    <div id="rs_allpage">
        <div id="rs_body">
      <div style="display: flex; width: 100%; margin-top: 25px; text-align: left; -webkit-font-smoothing: antialiased;">
        <div style="background: #f9f9f9; border-radius: 5px; padding: 0px 30px 0px 30px; width: calc(100% - 60px);">
            <div style="font-weight: bold; font-size: 36px; line-height: 42px; transform: uppercase; display: inline-block; width: 100%; z-index: 99999;">
              <p><?= $row['name'];?></p>
            </div>
        </div>
      </div>
  <?php 
  $select = mysqli_query($connect,"SELECT * FROM products WHERE category='$category_id' AND availability='1' ORDER BY rating DESC");

    for($i = 0;$i < mysqli_num_rows($select);$i++){
      $row = mysqli_fetch_array($select);

      echo '<a href="/product.php?id='.$row['id'].'" >
      <div class="shop-product-list-1">
        <div class="shop-product-list-in" style="text-align: center; margin-bottom: 30px;">
          <img src="/files/'.$row['img'].'" style="padding: 25px 45px 0px 45px;width: 70%;">
          <div style="text-align: center;">
            <div style="font-weight: bold; font-size: 22px; line-height: 26px; vertical-align: middle;">
              '.$row['name'].' <br> '.$row['price'].' UAH
            </div>
          </div> 
        </div> 
      </div></a>';
       
  }
  ?>
</div>

<?php require "elements/footer.php"; ?>
</div>
</body>
</html>