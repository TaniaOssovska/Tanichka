var cart = new Array();

function showCart() {
  if (!isEmpty($.cookie('cart')) || count($.cookie('cart')) == 2) {
      $('.main-cart').html('<table style="width: 100%; margin-top: 12px;"><tbody><tr><td style="width:; vertical-align: top;"><div style="border-radius: 8px;background: #fff;padding: 15px 25px;width: calc(100% - 50px); border: 1px rgba(56, 56, 56, 0.1) solid;"><div style="display: flex; vertical-align: top; padding: 0px 0px 0px 0px;"><div style="font-weight: bold; line-height: 22px; font-size: 20px;"><span style="color: #717171; display: none;">Price: </span>Кошик порожній</div></div><div style="display: block; color: #717171; font-weight: bold; font-size: 14px; padding-top: 8px;">Ваш кошик наразі порожній, додайте один з наших товарів щоб зробити замовлення.</div></div></td></tr></tbody></table>');
  }
  else { 
    $.ajax({  
      url: "/ajaxData.php",  
      type: "POST",
      data: "data="+$.cookie('cart'), 
      beforeSend: function() {
        $(".main-cart").html('<div style="text-align: center; width: 100%;"><img src="/img/loading.gif" style="align: center; width: 100px;"></div>');
      },
      success: function(html){  
        $(".main-cart").html(html);  
        $('.del-goods').on('click', delGoods);
      }  
    }); 
  }
} 

function loadCart() {
  if ($.cookie('cart')) {
      cart = JSON.parse($.cookie('cart'));
      showCart();
  }
  else {
      $('.main-cart').html('<table style="width: 100%;margin-top: 12px;"><tbody><tr><td style="width:; vertical-align: top;"><div style="border-radius: 8px;background: #fff;padding: 15px 25px;width: calc(100% - 50px); border: 1px rgba(56, 56, 56, 0.1) solid;"><div style="display: flex; vertical-align: top; padding: 0px 0px 0px 0px;"><div style="font-weight: bold; line-height: 22px; font-size: 20px;"><span style="color: #717171; display: none;">Price: </span>Кошик порожній</div></div><div style="display: block; color: #717171; font-weight: bold; font-size: 14px; padding-top: 8px;">Ваш кошик наразі порожній, додайте один з наших товарів щоб зробити замовлення.</div></div></td></tr></tbody></table>');
  }
}

function addToCart() {

  var id = $(this).attr('data-id');
  var size = $(this).attr('data-size');
  var new_product = count(cart);
  cart.push([id,size]); 

  saveCart();
  showCart();  

  document.location.href="/cart.php";
}

function delGoods() {
  cart = JSON.parse($.cookie('cart'));
  var id = $(this).attr('data-id');

  cart.pop(id);
  saveCart();
  showCart();
}

function saveCart() {
  $.cookie('cart', JSON.stringify(cart), { path: '/' }); //корзину в строку
}

function isEmpty(object) {
  for (var key in object)
  if (object.hasOwnProperty(key)) return true;
  return false;
}
function count(obj) {
  var count = 0;
  for(var prs in obj){
      if(obj.hasOwnProperty(prs)) count++;
  }
  return count;
} 

$(document).ready(function () {
  loadCart();
  $('.add-to-cart').on('click', addToCart);
});