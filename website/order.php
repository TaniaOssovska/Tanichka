<?php require "elements/db.php";?> 
<!DOCTYPE html>
<html lang="uk">
<head>
    <title>Замовлення</title>
    <?php require_once "elements/header.php";?>
</head>
<body>

<?php require "elements/menu.php"; ?>

<div id="rs_allpage">
    <div id="rs_body" style="text-align: center; padding: 30px 0px;">


<div style="font-size: 22px; padding-bottom: 20px;"><b style="color: #333;">Дякуємо за ваше замовлення, з Вами найближчим часом зв'яжеться менеджер.</b></div>


<table align="center" class="act-table">
        <tr>
          <td class="act-table2">
            <div style="font-size: 22px; padding-bottom: 20px;"><b style="color: #333;">Ваше замовлення:</b></div>

<?php
$status = 0;
$sum = 0;
$email = addslashes($_POST["email"]); 
$name = addslashes($_POST["name"]);
$phone = addslashes($_POST["phone"]);
$comment = addslashes($_POST["comment"]);
$delivery_address = addslashes($_POST["address"]);
$cart_json = $_COOKIE['cart'];
$cart = json_decode($_COOKIE['cart']);

foreach ($cart as $key => $value) {
  $id = $value[0];
  $size = $value[1];
  $select = mysqli_query($connect,"SELECT * FROM products WHERE id='$id'");
  $row = mysqli_fetch_array($select);
  
  $sum += (int)$row["price"];
}

$insert = mysqli_query($connect,"INSERT INTO orders(sum,email,name,phone,comment,delivery_address,cart) VALUES ('$sum','$email','$name','$phone','$comment','$delivery_address','$cart_json')");

	foreach ($cart as $key => $value) {
    $id = $value[0];
    $size = $value[1];
		$select = mysqli_query($connect,"SELECT * FROM products WHERE id='$id'");
		$row = mysqli_fetch_array($select);
?>
<table style="width: 100%; text-align: left; margin-bottom: 20px;">
  <tr>
    <td style="width: 60px; vertical-align: top;">
      <div style="border-radius: 8px;background: #fff;padding: 5px;width: 64px; height: 92px;border: 1px rgba(56, 56, 56, 0.1) solid;"><img style="display: inline-block; width: 54px; border-radius: 5px; margin: 5px;" src="/files/<?= $row["img"]?>"></div>
    </td>
    <td style="vertical-align: top; padding-left: 12px;">
      <div style="display: inline-block; vertical-align: top; font-weight: bold; color: #323232;"><?= $row["name"]?></div>

      <div style="display: block; color: #717171; font-weight: bold; font-size: 14px;">Розмір: <?= $size?></div>

      <div style="display: flex; vertical-align: top; padding: 0px 0px 0px 0px;">
        <div style="font-weight: bold; line-height: 22px; font-size: 20px;"><span style="color: #717171; display: none;">Price: </span><?= $row["price"]?> UAH </div>
      </div>
    </td>
  </tr>
</table>

<?php                       	   
	}
?>
    <table style="width: 100%; border-top: 2px solid #f3f3f3; padding-top: 10px;">
      <tr style="color: #333; font-weight: bold; font-size: 20px;">
        <td style="text-align: left;">загальна ціна</td>
      <td style="text-align: right;"><?= $sum?> UAH</td>
    </tr>

  </table>

    </div>
  </div>
</body> 
</html>