 toastr.options.closeButton = true;
 toastr.options.closeMethod = 'fadeOut';
 toastr.options.closeDuration = 300;
 toastr.options.closeEasing = 'swing';
 toastr.options.showMethod = 'slideDown';
 toastr.options.hideMethod = 'slideUp';
 toastr.options.closeMethod = 'slideUp';
 toastr.options.progressBar = true;
jQuery("#Register").submit(function(e){
      e.preventDefault();
      jQuery("#btnvalue").html('loading....')
      jQuery.ajax({
                        url:'Register_process',
                        data:jQuery('#Register').serialize(),
                        type:'post',
                     success:function (result) {     
                      
                       if (result.status=='error1') {
                            jQuery('#alert1').html(result.msg);
                            jQuery("#btnvalue").html('Register')
                      }
                     else if (result.status=='error2') {
                            jQuery('#sapo').html(result.msg).css("color", "red");
                              jQuery("#btnvalue").html('Register')
                      }
                      else{
                            jQuery('#rem2').hide();
                            jQuery('#rem1').show().animate({ scrollTop: 0 }, 1000);
                      jQuery('.black-bg').animate({ scrollTop: 0 }, 1000);;

                      }

                     } 
               });
})


jQuery("#login").submit(function(e){
      e.preventDefault();
      
      jQuery.ajax({
                        url:'login_process',
                        data:jQuery('#login').serialize(),
                        type:'post',
                     success:function (result) {     
                      
                       if (result.status=='error') {
                            jQuery('#alert').html(result.msg).css("color", "red");
                      }
                      else{
                             jQuery('#alert').html(result.msg).css("color", "green");
                             setTimeout(function(){ window.location = '/'; }, 2000);

                      }

                     } 
               });
})


function addtocart(product_id,qty){
             jQuery.ajax({
                        url:'/addtocart_process',
                       
                         data: {
                               "_token": $('#csrf-token')[0].content,
                                   "product_id": product_id,
                                   "qty": qty
                                },
                        type:'post',
                     success:function (result) {     
                       if (result.status=='success') {
           
                           $("#numrefer").load(location.href + " #numrefer");
                            $("#numrefer2").load(location.href + " #numrefer2");
                             $("#numrefer3").load(location.href + " #numrefer3");
                               $("#numrefer4").load(location.href + " #numrefer4");
                           toastr.success("Added To Cart");
                      }
                      else if(result.status=='inventryerror'){
 toastr.warning(result.msg);
                      }
                     else{
                         $("#numrefer").load(location.href + " #numrefer");
                            $("#numrefer2").load(location.href + " #numrefer2");
                             $("#numrefer3").load(location.href + " #numrefer3");
                             $("#numrefer4").load(location.href + " #numrefer4");
                           toastr.info("Product Already Exits");
                      }
                     

                     } 
               });
}


 function cartqty(cart_id,qty){
     jQuery.ajax({
                        url:'/cartqty_process',
                       
                         data: {
                               "_token": $('#csrf-token')[0].content,
                                   "cart_id": cart_id,
                                   "qty": qty
                                },
                        type:'post',
                     success:function (result) {     
                       if (result.status=='success') {
           
                           $("#numrefer").load(location.href + " #numrefer");
                            $("#numrefer2").load(location.href + " #numrefer2");
                             $("#numrefer3").load(location.href + " #numrefer3");
                               $("#numrefer4").load(location.href + " #numrefer4");
                                 $("#cart_ref1"+cart_id).load(location.href + " #cart_ref1"+cart_id);
                                   $("#cart_ref2").load(location.href + " #cart_ref2");
                                     jQuery("#"+cart_id+"_dev").css("border","1px solid #ddd");
                           toastr.success("Quantity Updated!");
                      }else if(result.status=='inventryerror'){
                        jQuery("#"+cart_id+"_dev").css("border","1px solid red");
  toastr.warning(result.msg);
                      }
                     } 
               });
 }

 function cartdel(cart_id) {
       jQuery.ajax({
                        url:'/cartqtydel_process',
                       
                         data: {
                               "_token": $('#csrf-token')[0].content,
                                   "cart_id": cart_id,
                                },
                        type:'post',
                     success:function (result) {     
                       if (result.status=='success') {
           
                           $("#numrefer").load(location.href + " #numrefer");
                            $("#numrefer2").load(location.href + " #numrefer2");
                             $("#numrefer3").load(location.href + " #numrefer3");
                               $("#numrefer4").load(location.href + " #numrefer4");
                                $("#cart_ref3").load(location.href + " #cart_ref3");
                                
                                   $("#cart_ref2").load(location.href + " #cart_ref2");
                           toastr.success("Product Deleted!");
                      }
                     } 
               });
 }
$("input[type=checkbox]").change(function() {
      //when select a checkbox, it will disable other checkboxes.
      $("input[type=checkbox]").not($(this)).prop('checked', false);
    });


 function catefilterc(category_id) {
 jQuery("#category").val(category_id);
  jQuery("#filter").submit();
 }
 function pricefilter(val){

 var getvalues=val.split(" - ");
var minprice = getvalues[0].substring(1);
var maxprice = getvalues[1].substring(1);

  jQuery("#minprice").val(minprice);
  jQuery("#maxprice").val(maxprice);
  jQuery("#filter").submit();
}
jQuery("#fp_email").submit(function(e){
      e.preventDefault();
   
      jQuery("#bbttnn").html('loading....')
      jQuery.ajax({
                        url:'fp_email_process',
                        data:jQuery('#fp_email').serialize(),
                        type:'post',
                     success:function (result) {     
                      
                       if (result.status=='success') {
                        $('#fp_email').trigger("reset");
                        toastr.success(result.msg);
                            jQuery("#bbttnn").html('Register')
                      }
                    
                      else{
                        toastr.error(result.msg);
                        jQuery("#bbttnn").html('Register')

                      }

                     } 
                     });
               });
           
 

 
 jQuery("#AddContact").submit(function(e){
      e.preventDefault();
      jQuery.ajax({
                        url:'AddContact_process',
                        data:jQuery('#AddContact').serialize(),
                        type:'post',
                     success:function (result) {     
                      
                       if (result.status=='emptyname') {
                            jQuery('#alert').html(result.msg);
                      }
                      else{
                         jQuery('#alert').html('');
                         $('#AddContact').trigger("reset");
                          toastr.success(result.msg);
                      }

                     } 
               });
});

jQuery("#Addaccount").submit(function(e){
  e.preventDefault();
  jQuery.ajax({
                    url:'/AccountUpdate_process',
                    data:jQuery('#Addaccount').serialize(),
                    type:'post',
                 success:function (result) {     
                  
                   if (result.status=='emptyname') {
                        jQuery('#alert').html(result.msg);
                  }
                  else{
                     
                     $('#Addaccount').trigger("reset");
                      toastr.success(result.msg);
                  }

                 } 
           });
});
jQuery("#passwordchange_process").submit(function(e){
  e.preventDefault();
  jQuery.ajax({
                    url:'/passwordchange_process',
                    data:jQuery('#passwordchange_process').serialize(),
                    type:'post',
                 success:function (result) {     
                  
                   if (result.status=='error') {
                         toastr.error(result.msg);
                  }
                  else{
               
                     $('#passwordchange_process').trigger("reset");
                      toastr.success(result.msg);
                  }

                 } 
           });
});
jQuery("#rp_process").submit(function(e){
      e.preventDefault();
    
      jQuery.ajax({
                        url:'/rp_process',
                        data:jQuery('#rp_process').serialize(),
                        type:'post',
                     success:function (result) {     
                      
                       if (result.status=='success') {
                        $('#fp_email').trigger("reset");
                        toastr.success(result.msg);
                            
                      }
                    
                      else{
                        toastr.error(result.msg);
                        

                      }

                     } 
                     });
               });

               jQuery("#checkout_process").submit(function(e){
                  e.preventDefault();
                  jQuery("#btn").html('Loading....').prop('disabled', true).css('color', '#4aa5a8');
                  jQuery.ajax({
                                    url:'/checkout_process',
                                    data:jQuery('#checkout_process').serialize(),
                                    type:'post',
                                 success:function (result) {     
                                  
                                   if (result.status=='success') {
                                    jQuery("#btn").hide();
                                    toastr.success(result.msg);
                                     setTimeout(function(){ window.location = '/orderdetail/'+result.order_id }, 2000);
                                        
                                  }
                                 } 
                                 });
                           });
  