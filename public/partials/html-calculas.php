<?php 

/**
 * The plugin bootstrap file
 *
 *
 * @link              http://www.flance.info
 * @since             1.1.2
 * @package           Flance_aliexpress_dropship
 *
 * @wordpress-plugin
 * Plugin Name:       Flance Aliexpress Dropship
 * Description:       
 * Version:           1.1.2
 * Author:            Rusty 
 * Author URI:        http://www.flance.info
 * Text Domain:       flance_aliexpress_dropship
 * Domain Path:       /languages
 */

 $html .=   '<script type="text/javascript">
//<![CDATA[

  (function( $ ) {
	  

var '.$formclass.'formclass = \''.$formclass.'\';

 //formclassobject[0] = \''.$formclass.'\';

var formclass = \''.$formclass.'\';
//'.$formclass.'addme ('.$formclass.'formclass);

$(\'.wamp_add_order_item_\'+formclass).on(\'click\', function(){
	
		theForms = document.getElementsByTagName("form");
		var reload= "no";
for(i=0;i<theForms.length;i++){

if (theForms[i].id.indexOf("flance") >= 0){

	formclass = theForms[i].id;

	reload = window[formclass+\'addme\'](formclass);
	
}

}




});



this.'.$formclass.'addme =function (formclass){
var paramObj = {};

$.each($(\'#\'+formclass).serializeArray(), function(_, kv) {
	
	
  if (paramObj.hasOwnProperty(kv.name)) {
    paramObj[kv.name] = $.makeArray(paramObj[kv.name]);
    paramObj[kv.name].push(kv.value);
  }
  else {
    paramObj[kv.name] = kv.value;
  }
  
  
});


 var quantityf = 0;
  var ids = {};   ';

    foreach($idi as $k=>$value) {
     $html .=   '

     quantityf += parseFloat(document.getElementById ("quantity"+formclass+"_'.$value.'").value);
      qty =   parseFloat(document.getElementById ("quantity"+formclass+"_'.$value.'").value)

      if (qty > 0){
		  
		 // alert(qty);

        ids["'.$value.'"] =qty;
		qty=0;
      }



     ';

      }

$html .=   '
   


var x=quantityf;

var errorline = {};



if (x==null || x=="" || x==0 || x<0)
  {
 
   errorline[\''.$formclass.'txt\']=document.getElementById(formclass+"error");
    errorline[\''.$formclass.'txt_1\']=document.getElementById(formclass+"error_1");
   errorline[\''.$formclass.'txt\'].innerHTML="<div id=\"errorstyle\" >Please enter quantity more than 0 at least for one product</div>";
   errorline[\''.$formclass.'txt_1\'].innerHTML="<div id=\"errorstyle\" >Please enter quantity more than 0 at least for one product</div>";

  return false;
  }else{


  $.ajax({
			url: WPURLS.ajaxurl,
			type:\'POST\',
			data:{ action: \'flance_amp_add_to_cart\', ids: ids,paramObj },
			dataType: \'json\',
			beforeSend: function() {
				$(\'#wamp_add_items_button_\'+formclass).attr(\'disabled\', true);
				$(\'#wamp_add_items_button_\'+formclass).nextAll().remove();
				$(\'#wamp_add_items_button_\'+formclass).after(\'<img class="wamp_loading_img" style="padding-left: 10px;" src="\' + WPURLS.siteurl + \'img/loading.gif"><b class="wamp_loading_text">Please Wait...</b>\');
			
			
			},
			success:function(results){
				
				';
				
				global $woocommerce;
$cart_url = $woocommerce->cart->get_cart_url();
//$html .= 'window.location = "'.$cart_url.'"; // for redirection to the cart
$html .= '
$(\'#wamp_add_items_button_\'+formclass).attr(\'disabled\', false);
$(\'#wamp_add_items_button_\'+formclass).nextAll().remove();
$(\'#wamp_add_items_button_\'+formclass).after(\'<b class="wamp_loading_text">Successfully Added</b>\');


var redirect = \''.$params['redirect'].'\';
var reload = \''.$params['reload'].'\';
var redirectlink = \''.$params['redirectlink'].'\';	

	
setTimeout(function() {
if (redirect == \'y\') {
	


//window.location =	redirectlink;

	
}else if(reload == \'y\'){
 window.location.reload() ;	
	
}



}, 2000);			


		}
		})


  }
			}
		
		
		})( jQuery );




            var Virtuemartone'.$formclass.' = {
	productone : function(carts) {
				carts.each(function(){
					var cart = jQuery(this),
					addtocart = cart.find(\'input.addtocart-button\'),';
                                        
                 
    foreach($idi as $k=>$value) {
     $html .=   'plus'.$value.'   = cart.find(\'#quantity-plus'.$formclass.'_'.$value.'\'),
		minus'.$value.'  = cart.find(\'#quantity-minus'.$formclass.'_'.$value.'\'),
                quantity'.$value.' = cart.find(\'#quantity'.$formclass.'_'.$value.'\'),
                pricequa'.$value.' = cart.find(\'#pricequa'.$formclass.'_'.$value.'\'),
           pricetax'.$value.' = cart.find(\'#pricetax'.$formclass.'_'.$value.'\'),
                ';
      
      }
					
			$html .=   ' 
                        
                        	 
                        virtuemart_product_id = cart.find(\'input[name="virtuemart_product_id[]"]\').val();
';
                                        
                                        
    foreach($idi as $k=>$value) {
					
			$html .=   '		
                        plus'.$value.'.click(function() {


						var Qtt = parseInt(quantity'.$value.'.val());
						
						
						if (!isNaN(Qtt)) {
							quantity'.$value.'.val(Qtt + 1);
                                                        var totalQtt'.$formclass.' = 0;
                                                       var totaltax'.$formclass.' = 0;
                                                        
                                                        ';
                                                       
                                              foreach($idi as $r=>$prodis) { 
                                                  
                                             
                                               $html .=   '
											   
                                                totalQtt'.$formclass.' += parseFloat(pricequa'.$prodis.'.val()*parseInt(quantity'.$prodis.'.val()));
                                               totaltax'.$formclass.' += parseFloat(pricetax'.$prodis.'.val()*parseInt(quantity'.$prodis.'.val()));
                                               
                                           
                                               ';    
                                                  }
                                           $html .=   '        
                                                       jQuery("#total").val(
                                                       totalQtt'.$formclass.'.toFixed(2)
                                                      );  
                                                       jQuery("#totaltax'.$formclass.'").val(
                                                       totaltax'.$formclass.'.toFixed(2)
                                                      ); 
                                                    if (totaltax'.$formclass.' >0) {
						cart.find("#prodtax'.$formclass.'").html(totaltax'.$formclass.'.toFixed(2));
                                                
                                                }else {
                                                 cart.find("#prodtax'.$formclass.'").html("0.00");
                                                  
                                                    }
													
													
                                                     if (totalQtt'.$formclass.' >0) {
                                                  cart.find("#prodtotal'.$formclass.'").html(totalQtt'.$formclass.'.toFixed(2));// total pricequa
							 var '.$formclass.'txt=document.getElementById("'.$formclass.'error"); // remove error notice for zero total value
				    var '.$formclass.'txt_1=document.getElementById("'.$formclass.'error_1");
				  '.$formclass.'txt.innerHTML="";
				  '.$formclass.'txt_1.innerHTML="";
											
                                                
                                                    }else{
                                                      
                                                   cart.find("#prodtotal'.$formclass.'").html("0.00");
                                                   
                                                      }
						}
						
					});
                                        	minus'.$value.'.click(function() {
						var Qtt = parseInt(quantity'.$value.'.val());
						var totaltax'.$formclass.' = 0;
                                                var totalQtt'.$formclass.' = 0;
                                                if (!isNaN(Qtt) && Qtt>0) {
							quantity'.$value.'.val(Qtt - 1);
                                                          
                                                          
                                                          ';
                                              foreach($idi as $r=>$prodis) { 
                                                  
                                               $html .=   '
                                                totalQtt'.$formclass.' += pricequa'.$prodis.'.val()*parseInt(quantity'.$prodis.'.val());
                                                totaltax'.$formclass.' += parseFloat(pricetax'.$prodis.'.val()*parseInt(quantity'.$prodis.'.val()));
                                              
                                               
                                               ';    
                                                  }
                                           $html .=   '  
                                           
                                              
                                                          jQuery("#total").val(
                                                       totalQtt'.$formclass.'.toFixed(2)
                                                      );  
                                                       jQuery("#totaltax'.$formclass.'").val(
                                                       totaltax'.$formclass.'.toFixed(2)
                                                      ); 
						} else { 
                                                    
                                                    quantity'.$value.'.val(0) ;
                                                       ';
                                              foreach($idi as $r=>$prodis) { 
                                                  
                                               $html .=   '
                                                totalQtt'.$formclass.' += pricequa'.$prodis.'.val()*parseInt(quantity'.$prodis.'.val());
                                                totaltax'.$formclass.' += parseFloat(pricetax'.$prodis.'.val()*parseInt(quantity'.$prodis.'.val()));
                                              
                                               
                                               ';    
                                                  }
                                           $html .=   '
                                                       jQuery("#total").val(
                                                       totalQtt'.$formclass.'.toFixed(2)
                                                      );  
                                                       jQuery("#totaltax'.$formclass.'").val(
                                                       totaltax'.$formclass.'.toFixed(2)
                                                      ); 
                                                    }
                                                    
                                                 
                                                
                                                 if (totaltax'.$formclass.' >0) {
						cart.find("#prodtax'.$formclass.'").html(totaltax'.$formclass.'.toFixed(2));
                                                
                                                }else {
                                                 cart.find("#prodtax'.$formclass.'").html("0.00");
                                                  
                                                    }
                                              
                                                   if (totalQtt'.$formclass.' >0) {
                                                  cart.find("#prodtotal'.$formclass.'").html(totalQtt'.$formclass.'.toFixed(2));
                                                
                                                    }else{
                                                      
                                                   cart.find("#prodtotal'.$formclass.'").html("0.00");
                                                   
                                                      }  
					});
				
				';
      
                             }
				  $html .=   ' });

			},
                        	productcal : function(carts) {
				carts.each(function(){
					var cart = jQuery(this),
					addtocart = cart.find(\'input.addtocart-button\'),';
                                        
                                        
    foreach($idi as $k=>$value) {
     $html .=   'plus'.$value.'   = cart.find(\'#quantity-plus'.$value.'\'),
		minus'.$value.'  = cart.find(\'#quantity-minus'.$value.'\'),
                quantity'.$value.' = cart.find(\'#quantity'.$value.'\'),
                pricequa'.$value.' = cart.find(\'#pricequa'.$value.'\'),
           pricetax'.$value.' = cart.find(\'#pricetax'.$value.'\'),
                ';
      
      }
					
			$html .=   '	
                        
                        
                        virtuemart_product_id = cart.find(\'input[name="virtuemart_product_id[]"]\').val();


                  ';

                                        
    foreach($idi as $k=>$value) {
					
			$html .=   '		
                   
                                        	
						var Qtt = parseInt(quantity'.$value.'.val());
						if (!isNaN(Qtt) && Qtt>0) {
							quantity'.$value.'.val(Qtt);
                                                          var totalQtt'.$formclass.' = 0;
                                                           var totaltax'.$formclass.' = 0;
                                                          ';
                                              foreach($idi as $r=>$prodis) { 
                                                  
                                               $html .=   '
                                                totalQtt'.$formclass.' += pricequa'.$prodis.'.val()*parseInt(quantity'.$prodis.'.val());
                                                totaltax'.$formclass.' += parseFloat(pricetax'.$prodis.'.val()*parseInt(quantity'.$prodis.'.val()));
                                              
                                               
                                               ';    
                                                  }
                                           $html .=   '        
                                                          jQuery("#total").val(
                                                       totalQtt'.$formclass.'.toFixed(2)
                                                      );  
                                                       jQuery("#totaltax'.$formclass.'").val(
                                                       totaltax'.$formclass.'.toFixed(2)
                                                      ); 
						} else { 
                                                    
                                                    quantity'.$value.'.val(0) ;
                                                      
                                                    
                                                    }
                                                if (totaltax'.$formclass.' >0) {
						cart.find("#prodtax'.$formclass.'").html(totaltax'.$formclass.'.toFixed(2));
                                                
                                                }else {
                                                 cart.find("#prodtax'.$formclass.'").html("0.00");
                                                  
                                                    }
                                                    
                                                    if (totalQtt'.$formclass.' >0) {
                                                  cart.find("#prodtotal'.$formclass.'").html(totalQtt'.$formclass.'.toFixed(2));
                                                
                                                    }else{
                                                      
                                                   cart.find("#prodtotal'.$formclass.'").html("0.00");
                                                   
                                                      }
				
				';
      
                             }
				  $html .=   ' });

			},
                       totalprice : function (form) {
				
				
				return false; // prevent reload
			}, 
                        
                        
                        
                        };
                        jQuery.noConflict();
		jQuery(document).ready(function($) {
                  
			Virtuemartone'.$formclass.'.productone($("form.'.$formclass.'"));
			
			
		
                //        Virtuemartone'.$formclass.'.productcal($("form.'.$formclass.'"));
 
			
		});
//]]>
</script>';

?>