<?php require "elements/db.php";?> 
<!DOCTYPE html>
<html >
<head>
    <?php require_once "elements/header.php";?>
<script type="text/javascript">
$(document).ready(function () { 
    saveCart();
    showCart();
}); 

</script> 

</head>
<body>
  <?php require "elements/menu.php"; ?>
<div id="rs_allpage" style="border-bottom: 2px solid #28282812; border-bottom: 0px solid #28282812; padding-bottom: 20px; margin-bottom: -15px; -webkit-font-smoothing: antialiased;">
    <div id="rs_body">
        <main style="padding-top: 5px; padding-bottom: 25px;">
          <div style="display: inline-block; width: 100%; text-align: left; border-right: 0px solid #c8e6cc; border-radius: 8px; margin: 20px 0px;">
            <div style="display: block;/* color: #333; */font-weight: bold;font-size: 28px;vertical-align: top;padding: 0px 15px 10px 0px;-webkit-font-smoothing: antialiased;">Корзина</div>
          </div>
          <div style="float: left; width: 100%;">
            <div class="main-cart cart-right-block" style=" border-radius: 6px!important;">
            </div>
            <div class="email-field cart-left-block" style="float: left; display:inline-block; margin-top: -14px;margin-top: 0px;"> 

<form action="/order.php" method="POST" style="padding-right: 10px;">
  <p><input required id="email" name="email" type="email" placeholder="Ваш e-mail" class="rs_input-text"></p> 
  <p><input required id="name" name="name" type="text" placeholder="Ваше ім'я" class="rs_input-text"></p>
  <p><input required id="phone" name="phone" type="tel" class="input input--tel rs_input-text" placeholder="+38 (0__) ___-__-__" class="rs_input-typetext"></p>
  <p><textarea id="comment" onkeyup="" name="comment" type="text" placeholder="Коментарі та побажання до замовлення" class="rs_input-text" style="-webkit-appearance: none;"></textarea></p>
  <p><input required id="address" name="address" type="text" class="input input--tel rs_input-text" placeholder="Ваша адреса" class="rs_input-typetext"></p>



  <p>
    <input type="submit" class="button-big" style="margin-top: 10px;" value="Замовити">
  </p>
</form>

            </div> 
          </div>

        </main>

    </div>
</div>

    <?php require "elements/footer.php"; ?>

</body>
</html>