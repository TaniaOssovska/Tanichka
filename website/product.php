<?php 
require "elements/db.php";
$id = (int)$_GET['id'];

$select = mysqli_query($connect,"SELECT * FROM products WHERE id = '$id'");
$row = mysqli_fetch_array($select);
$product_id = $row["id"];

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
      <div style="padding-top: 10px;  vertical-align: top;">
        <div style="display: inline-block;" class="product_block_left">
    <main class="main-cont">
      <section>
        <div class="prod-pics-sect">
          <div class="main-prod-cont">
            <img src="<?php echo '/files/'.$row['img'].'';?>" class="current" style="width:100%; padding: 0px; cursor: pointer;">           
          </div>
        </div>
      </section>
    </main>
        </div>
        <div style="display: inline-block; vertical-align: top;" class="product_block_right">
          <div style="font-family: 'Helvetica Neue'; display: inline-block;" class="product_block_right-in">

            <div style="font-weight: bold; font-size: 28px; line-height: 32px; vertical-align: middle;"><?php echo $row['name'];?>
          </div>
            <div style="font-weight: bold; font-size: 28px; line-height: 60px; color: #555;"><?php echo $row['price'];?> UAH
          </div>
            <div style="font-weight: ; font-size: 16px; line-height: 22px; padding-top: 0px; width: 300px;">
              <?php echo $row['description'];?>
               <div style=" vertical-align: top; text-align:; font-weight: bold;">

          </div>
            </div>
            <table style="margin-top: 20px;"> 
              <tbody><tr>
                <td>
    <div style="font-weight: bold;font-size: 18px;line-height: 18px;margin-top: 0px;color: #757575;-webkit-font-smoothing: antialiased;">розмір:</div>
           <div class="select-style">
    <select name="size" id="input-size">
      <option value="S">S</option>
      <option value="M">M</option>
      <option value="L">L</option>
    </select><i class="fas fa-sort" style="margin-left: -20px;"></i>

  </div>
  </td>

</tr>
</tbody></table>
  



 <div style="margin-top:20px; background: #cccccc6b; border-radius: 5px; padding: 0px 20px 10px 20px;">  
            
  <table style="width: 100%; padding-top: 8px;">
    <tbody><tr>
      <td>
        <div style="-webkit-font-smoothing: antialiased; letter-spacing: 0.3px; font-size: 14px;line-height: 15px;color: #757575;padding-left: 0px; font-weight: bold;">
        <i class="fas fa-clock" style="padding-right: 5px;"></i> Термін доставки 2-3 робочі дні.</div>
      </td>
    </tr>
  </tbody></table>

      </div>

  <div id="add-to-cart" class="add-to-cart button-big"  data-id="<?= $id;?>" data-size="S">Додати в кошик</div> 

    <script type="text/javascript">

      $("#input-size").change(function(){
          $('.add-to-cart').attr("data-size",  $.trim($('#input-size option[value="'+$('#input-size').val()+'"]').text()));
      });
    </script>

  </div>
  </div>
      </div>
   </div>
 </div>

<?php require "elements/footer.php"; ?>
</body>
</html>