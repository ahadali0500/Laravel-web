 toastr.options.closeButton = true;
 toastr.options.closeMethod = 'fadeOut';
 toastr.options.closeDuration = 300;
 toastr.options.closeEasing = 'swing';
 toastr.options.showMethod = 'slideDown';
 toastr.options.hideMethod = 'slideUp';
 toastr.options.closeMethod = 'slideUp';
 toastr.options.progressBar = true;

jQuery("#AdminAuth").submit(function(e){
      e.preventDefault();
      jQuery.ajax({
                        url:'/admin/AdminAuth_process',
                        data:jQuery('#AdminAuth').serialize(),
                        type:'post',
                     success:function (result) {     
                      
                       if (result.status=='emptyemail') {
                            jQuery('#alert').html(result.msg);
                      }
                     else if (result.status=='emptypassword') {
                            jQuery('#alert').html(result.msg);
                      }
                      else if (result.status=='success') {
                          toastr.success(result.msg);
                          setTimeout(function(){ window.location = '/admin/dashboard'; }, 3000);
           
                      }
                      else{
                         jQuery('#alert').html('');
                          toastr.error(result.msg);
                      }

                     } 
               });
})

jQuery("#AddCategory").submit(function(e){
      e.preventDefault();
      jQuery.ajax({
                        url:'/admin/AddCategory_process',
                        data:jQuery('#AddCategory').serialize(),
                        type:'post',
                     success:function (result) {     
                      
                       if (result.status=='emptyname') {
                            jQuery('#alert').html(result.msg);
                      }
                      else{
                         jQuery('#alert').html('');
                         $('#AddCategory').trigger("reset");
                          toastr.success(result.msg);
                      }

                     } 
               });
})
jQuery("#UpCategory").submit(function(e){
      e.preventDefault();
      jQuery.ajax({
                        url:'/admin/UpCategory_process',
                        data:jQuery('#UpCategory').serialize(),
                        type:'post',
                     success:function (result) {     
                      
                           
                
                         
                          toastr.success(result.msg);
                  

                     } 
               });
})



jQuery("#AddProduct").submit(function(e){
      e.preventDefault();
       var formData = new FormData(this);
      jQuery.ajax({
                       type: 'POST',
                url: $(this).attr('action'),
                data:formData,
                 cache:false,
                contentType: false,
                processData: false,
                     success:function (result) {     
                      
                       if (result.status=='success') {
                            $('#AddProduct').trigger("reset");
                            toastr.success("Product Addedd Successfully");
                      }
                     } 
               });
})
jQuery("#UpProduct").submit(function(e){
      e.preventDefault();
       var formData = new FormData(this);
      jQuery.ajax({
                       type: 'POST',
                url: $(this).attr('action'),
                data:formData,
                 cache:false,
                contentType: false,
                processData: false,
                     success:function (result) {     
                      
                       if (result.status=='success') {
                            
                              $("#refer").load(location.href + " #refer");
                            toastr.success("Product Updated Successfully");
                      }
                     } 
               });
})

jQuery("#AddSlider").submit(function(e){
      e.preventDefault();
       var formData = new FormData(this);
      jQuery.ajax({
                       type: 'POST',
                url: $(this).attr('action'),
                data:formData,
                 cache:false,
                contentType: false,
                processData: false,
                     success:function (result) {     
                      
                       if (result.status=='success') {
                            $('#AddSlider').trigger("reset");
                            toastr.success("Slider Addedd Successfully");
                      }
                     } 
               });
})

jQuery("#UpSlider").submit(function(e){
      e.preventDefault();
       var formData = new FormData(this);
      jQuery.ajax({
                       type: 'POST',
                url: $(this).attr('action'),
                data:formData,
                 cache:false,
                contentType: false,
                processData: false,
                     success:function (result) {     
                      
                       if (result.status=='success') {
                           
                              $("#refer").load(location.href + " #refer");
                            toastr.success("Slider Updated Successfully");
                      }
                     } 
               });
})


  function userapproval(status,register_id){
      $("#spinner").attr("class","show");
      jQuery.ajax({
                        url:'/admin/userapproval_process',
                        data:{
                              "_token": $('#csrf-token')[0].content,
                                   "status": status,
                                   "register_id": register_id
                        },
                        type:'post',
                     success:function (result) {     
                      
                       if (result.status=='success') {
                          $("#spinner").attr("class","hide");
                             $("#refer").load(location.href + " #refer");
                          
                           toastr.success(result.msg);
                           
                      }
                      

                     } 
               });
  }

function orderstatus(order_id,){
    var  status=jQuery('.bv_'+order_id).val();
       $("#spinner").attr("class","show");
      jQuery.ajax({
                        url:'/admin/orderstatus_process',
                        data:{
                              "_token": $('#csrf-token')[0].content,
                                   "status": status,
                                   "order_id": order_id
                        },
                        type:'post',
                     success:function (result) {     
                      
                       if (result.status=='success') {
                          $("#spinner").attr("class","hide");
                             $("#refer").load(location.href + " #refer");
                          
                           toastr.success(result.msg);
                           
                      }
                      

                     } 
               });
}

function category_status(category_id){

       $("#spinner").attr("class","show");
      jQuery.ajax({
                        url:'/admin/categorystatus_process',
                        data:{
                              "_token": $('#csrf-token')[0].content,
                                   "category_id": category_id
                        },
                        type:'post',
                     success:function (result) {     
                      
                       if (result.status=='success') {
                          $("#spinner").attr("class","hide");
                             $("#refer").load(location.href + " #refer");
                          
                           toastr.success(result.msg);
                           
                      }
                      

                     } 
               });
}

function category_delete(category_id){

       $("#spinner").attr("class","show");
      jQuery.ajax({
                        url:'/admin/categorydelete_process',
                        data:{
                              "_token": $('#csrf-token')[0].content,
                                   "category_id": category_id
                        },
                        type:'post',
                     success:function (result) {     
                      
                       if (result.status=='success') {
                          $("#spinner").attr("class","hide");
                             $("#refer").load(location.href + " #refer");
                          
                           toastr.success(result.msg);
                           
                      }
                      

                     } 
               });
}


function sliderdelete(slider_id){
  $("#spinner").attr("class","show");
      jQuery.ajax({
                        url:'/admin/sliderdelete',
                        data:{
                              "_token": $('#csrf-token')[0].content,
                                   "slider_id": slider_id
                        },
                        type:'post',
                     success:function (result) {     
                      
                       if (result.status=='success') {
                          $("#spinner").attr("class","hide");
                             $("#refer").load(location.href + " #refer");
                          
                           toastr.success(result.msg);
                           
                      }
                      

                     } 
               });
}


function productdelete(product_id){
      $("#spinner").attr("class","show");
      jQuery.ajax({
                        url:'/admin/productdelete',
                        data:{
                              "_token": $('#csrf-token')[0].content,
                                   "product_id": product_id
                        },
                        type:'post',
                     success:function (result) {     
                      
                       if (result.status=='success') {
                          $("#spinner").attr("class","hide");
                             $("#refer").load(location.href + " #refer");
                          
                           toastr.success("Product Deleted Successfully");
                           
                      }
                      

                     } 
               });
}
function product_status(product_id){
      $("#spinner").attr("class","show");
      jQuery.ajax({
                        url:'/admin/product_status',
                        data:{
                              "_token": $('#csrf-token')[0].content,
                                   "product_id": product_id
                        },
                        type:'post',
                     success:function (result) {     
                      
                       if (result.status=='success') {
                          $("#spinner").attr("class","hide");
                             $("#refer").load(location.href + " #refer");
                          
 toastr.success(result.msg);                           
                      }
                      

                     } 
               });
}
function  pidel(id){
  $("#spinner").attr("class","show");
      jQuery.ajax({
                        url:'/admin/pidel',
                        data:{
                              "_token": $('#csrf-token')[0].content,
                                   "id": id
                        },
                        type:'post',
                     success:function (result) {     
                      
                       if (result.status=='success') {
                          $("#spinner").attr("class","hide");
                             $("#refer").load(location.href + " #refer");
                          
                       toastr.success("Image Deleted Successfully");                           
                      }
                      

                     } 
               });
}









