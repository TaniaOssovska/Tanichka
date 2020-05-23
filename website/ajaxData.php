<?php

require "elements/db.php";
$sum = 0;
	$data = json_decode($_POST['data']);
	foreach ($data as $key => $value) {
    $id = (int)$value[0];
		$select = mysqli_query($connect,"SELECT * FROM products WHERE id='$id'");
		$row = mysqli_fetch_array($select);
    
	 echo '<div style="padding: 10px 0px;border-radius: 6px;margin-bottom: 10px;">
     <table style="width: 100%;">
        <tbody><tr>
          <td style="vertical-align: top;width: 30px;">
            <div data-id="'.$key.'" class="del-goods">
              <img src="/elements/close-button.svg" style="width: 14px;height: 14px;margin-top: 6px;">
            </div>
          </td> 
          <td style="width: 60px; vertical-align: top;">
            <div style="border-radius: 8px;background: #fff;padding: 5px;width: 64px; height: 92px;border: 1px rgba(56, 56, 56, 0.1) solid;"><img style="display: inline-block; width: 54px; border-radius: 5px; margin: 5px;" src="/files/'.$row['img'].'"></div>
          </td> 
          <td style="vertical-align: top; padding-left: 12px;">
            <div style="display: inline-block; vertical-align: top; font-weight: bold; color: #323232;">'.$row["name"].'</div>
            <div style="display: block; color: #717171; font-weight: bold; font-size: 14px;">Розмір: '.$value[1].'</div>
            <div style="display: flex; vertical-align: top; padding: 0px 0px 0px 0px;">
              <div style="font-weight: bold; line-height: 22px; font-size: 20px;"><span style="color: #717171; ">Ціна: </span>'.(int)$row["price"].' UAH </div>
            </div>
          </td>
          <td>
          </td>
        </tr>
      </tbody></table>
    </div>

  ';
  $sum += (int)$row["price"];
	    
	} 
	
  echo '<table style="width: 100%; border-top: 2px solid #f3f3f3; padding-top: 10px;"><tr style="color: #333; font-weight: bold; font-size: 20px;"><td style="text-align: left;">загальна ціна</td>
    <td style="text-align: right;">'.$sum.' UAH</td>
    </tr>
  </table>
  </div>';