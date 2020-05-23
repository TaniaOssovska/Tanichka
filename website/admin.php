<?php require "elements/db.php";

session_start();

if(isset($_POST["username"]) and isset($_POST["password"])){
  $login = $_POST["username"];$password = md5($_POST["password"]);
  $select = mysqli_query($connect,"SELECT * FROM users WHERE login = '$login' AND password = '$password'");
  if($select->num_rows){
    $row_login = mysqli_fetch_array($select);
    $_SESSION['login'] = $row_login["login"];
  } 
}





if(isset($_SESSION["login"])){
  $User = $_SESSION["login"];
}
else{
  $User = false;
}

?> 

<!DOCTYPE html>
<html> 
<head>
    <?php require_once "elements/header.php";?>
</head>
<body> 
  <div style="width: 100%; ">
      <div id="rs_allpage" style="margin-top: 0px!important; padding-top: 15px;">
        <a href="/">
          <img width="90px" src="/files/logo.png"><div style="font-weight: bold; font-size: 32px; line-height: 20px;margin-bottom: 20px; margin-top: 4px; margin-left: 20px; color: #555; display: inline-block; vertical-align: bottom;" class="menu_infotext">Admin</div> 
        </a>
      </div>

  </div></div>


<div id="rs_allpage">
  <div id="rs_body">

<br>
<?php 

if($User == "admin"){

  echo ' <table border="1" style="margin: auto;">
   <center>Список замовлень</center><br>
   <tr>
    <th>№</th>
    <th>Сума</th>
    <th>Інформація про замовлення</th>
    <th>Товари</th>
   </tr>';
  $select = mysqli_query($connect,"SELECT * FROM orders ORDER BY id DESC");
    for($i = 0;$i < mysqli_num_rows($select);$i++){
      $row_orders = mysqli_fetch_array($select);
$cart = json_decode($row_orders['cart']);
$products = "";
foreach ($cart as $key => $value) {
        $id = $value[0];
        $size = $value[1];
        $select_product = mysqli_query($connect,"SELECT * FROM products WHERE id='$id'");
        $row_product = mysqli_fetch_array($select_product);
        $products .= $row_product["name"]." - ".$size."<br>";
}
      echo '
      <tr> 

      <td>'.$row_orders['id'].'</td>
      <td>'.$row_orders['sum'].'</td>
      <td>Ім\'я - '.$row_orders['name'].'<br> Email - '.$row_orders['email'].'<br> Телефон - '.$row_orders['phone'].'<br> Коментар - '.$row_orders['comment'].'<br> Адреса - '.$row_orders['delivery_address'].'</td>
      <td>'.$products.'</td>

      </tr>';
       
  }

   

  echo '</table>';



}else{

  echo '<form action="admin.php" method = "post">
        <label for="username">Username:</label> <input type="username" id="usename" name="username"><br /><br />
        <label for="password">Password:</label> <input type="text" id="password" name="password"><br /><br />
        <button type = "submit">Login</button>
    </form>';


}


?>





</div>

    <?php require "elements/footer.php"; ?>
</div>
</body>
</html>