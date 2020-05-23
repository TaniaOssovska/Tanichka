<div style="width: 100%; ">
      <div id="rs_allpage" style="margin-top: 0px!important; padding-top: 15px;">
      <div style="margin: 10px 10px 0px 10px; padding: 0px 5px 15px 5px; vertical-align: top; border-bottom: 2px solid #f3f3f3;" class="mobile_menu">
        <div style="width: 90%; display: inline-block; height: 40px; margin-top: 9px; text-align: left;">
              <a href="/">
                <img width="180px" src="/files/logo.png">
              </a>
<?php
  $select = mysqli_query($connect,"SELECT * FROM products_categories ORDER BY id");
  for($i = 0;$i < mysqli_num_rows($select);$i++){
    $row_menu = mysqli_fetch_array($select);

  echo '<a style="vertical-align: bottom;" href="/'.$row_menu["url"].'"><div style="font-weight: bold; font-size: 22px; line-height: 20px;margin-bottom: 5%; margin-top: 4px; margin-left: 20px; color: #555; display: inline-block; vertical-align: top;" class="menu_infotext">'.$row_menu["name"].'</div></a>';
  }
  ?>

        </div>

         <div style="width: 9%; display: inline-block; height: 40px; margin-top: 9px; text-align: left;">
          
          <a href="/cart.php" style="vertical-align: bottom;">
            <img src="//spheresclothing.com/core/elements/basket-icon.svg" style="width: 32px;margin-bottom: 30%; margin-left: 10px; padding-right: 15px;">
          </a>
        </div>

      </div>

  </div></div>