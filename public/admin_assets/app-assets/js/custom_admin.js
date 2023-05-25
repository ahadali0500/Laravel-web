           $(document).ready(function(){

                  jQuery("#cate").change(function(){
                   let cid = jQuery(this).val();
                         jQuery.ajax({
                      url:'/admin/getcategory',
                      data: {
                           "_token": $('#token').val(),
                           "cid": cid
                      },
                        type:'post',
                     success:function (result) {  
                           jQuery('#subcate').html(result);
                     } 
               });
                  });
           });