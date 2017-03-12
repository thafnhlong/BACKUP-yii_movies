function handleAjax(url,method,dataType,data,success,beforesend,error){
   if(url != ''){
      if (typeof(method) == 'undefined'){
         method = 'POST'
      }
      if(typeof(beforesend) == 'undefined'){
         beforesend = function(){};
      }
      if(typeof(error) == 'undefined'){
         error = function(){};
      }
      if(typeof(success) == 'undefined'){
         success = function(){};
      }
      $.ajax({
         url:url,
         type:method,
         dataType: dataType,
         data:data,
         beforeSend: beforesend,
         success:success,
         error:error, 
         
      });  
   }
}
function removeSign(str){
   str= str.toLowerCase();
   str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
   str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
   str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");
   str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
   str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
   str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");
   str= str.replace(/đ/g,"d");
   str= str.replace(/!|@|\$|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\'| |\"|\&|\#|\[|\]|~/g,"-");
   str= str.replace(/-+-/g,"-"); //thay thế 2- thành 1-
   str= str.replace(/^\-+|\-+$/g,"");//cắt bỏ ký tự - ở đầu và cuối chuỗi
   return str;

}
function format_number(num) {
    val = num.value;
    val = val.replace(/[^\d.]/g,"");
    arr = val.split('.');
    lftsde = arr[0];
    rghtsde = arr[1];
    result = "";
    lng = lftsde.length;
    j = 0;
    for (i = lng; i > 0; i--){
        j++;
        if (((j % 3) == 1) && (j != 1)){
            result = lftsde.substr(i-1,1) + "," + result;
        }else{
            result = lftsde.substr(i-1,1) + result;
        }
    }
    if(rghtsde==null){
        num.value = result;
    }else{
        num.value = result+'.'+arr[1];
    }
}
function toggleClassByElement(className,elm){
   if($(elm).hassClass(className)){
      $(elm).removeClass(className);
   }else{
      $(elm).addClass(className);
   }
}
/*------- Toggle Module -------*/
function toggleModule(obj){
   __this = $(obj);
   parent = __this.parents('#wraper');
   if(parent.hasClass('_smn')){
      parent.removeClass('_smn');
   }else{
      parent.addClass('_smn');
   }
}
function deleteOnlyRow(obj){
   id = $(obj).attr('data-id');
   data = {'id':id};
   var updateHMTL = function(data){
      if(data != ''){
         alert($.trim(data));
         $(obj).parents('.even').remove();
      }
   }
   var beforeSend = function(){}
   var conf = confirm("Xóa dòng này ?");
   if(conf)
      handleAjax('delete.php','POST',data,updateHMTL,beforeSend);
}

function activeRow(obj){
   $checkBox = $(obj).find('input[type="checkbox"].active-row');
   $checked  = $(obj).find('div.checker span');
   var value = $checkBox.val();
   var id = $checkBox.attr('data-id');
   
   value = Math.abs(value-1);
   data = {'active':value,'id':id};
   beforeSend = function(){
      $checked.addClass('loading');
   };
   updateHTML = function(){
      if(value == 0){
         $checked.removeClass('checked');
      }else{
         $checked.addClass('checked')
      }
      $checkBox.val(value);
      $checked.removeClass('loading');
   };
   handleAjax('ajax_active.php','POST',data,updateHTML,beforeSend);
}

//Show news to home
function checkHomeNews(obj){
   $checkBox = $(obj).find('input[type="checkbox"].active-row');
   $checked  = $(obj).find('div.checker span');
   var value = $checkBox.val();
   var id = $checkBox.attr('data-id');
   
   value = Math.abs(value-1);
   data = {'check':value,'id':id};
   beforeSend = function(){
      $checked.addClass('loading');
   };
   updateHTML = function(){
      if(value == 0){
         $checked.removeClass('checked');
      }else{
         $checked.addClass('checked')
      }
      $checkBox.val(value);
      $checked.removeClass('loading');
   };
   handleAjax('ajax_check_home.php','POST',data,updateHTML,beforeSend);
  
}

//Show playlist to silide
function checkSlidePlaylist(obj){
   $checkBox = $(obj).find('input[type="checkbox"].active-row');
   $checked  = $(obj).find('div.checker span');
   var value = $checkBox.val();
   var id = $checkBox.attr('data-id');
   
   value = Math.abs(value-1);
   data = {'check':value,'id':id};
   beforeSend = function(){
      $checked.addClass('loading');
   };
   updateHTML = function(){
      if(value == 0){
         $checked.removeClass('checked');
      }else{
         $checked.addClass('checked')
      }
      $checkBox.val(value);
      $checked.removeClass('loading');
   };
   handleAjax('ajax_check_slide.php','POST',data,updateHTML,beforeSend);
  
}
//Show video to home
function checkHomeVideo(obj){
   $checkBox = $(obj).find('input[type="checkbox"].active-row');
   $checked  = $(obj).find('div.checker span');
   var value = $checkBox.val();
   var id = $checkBox.attr('data-id');
   
   value = Math.abs(value-1);
   data = {'check':value,'id':id};
   beforeSend = function(){
      $checked.addClass('loading');
   };
   updateHTML = function(){
      if(value == 0){
         $checked.removeClass('checked');
      }else{
         $checked.addClass('checked')
      }
      $checkBox.val(value);
      $checked.removeClass('loading');
   };
   handleAjax('ajax_check_home.php','POST',data,updateHTML,beforeSend);
  
}

//Show video to home
function checkSlideVideo(obj){
   $checkBox = $(obj).find('input[type="checkbox"].active-row');
   $checked  = $(obj).find('div.checker span');
   var value = $checkBox.val();
   var id = $checkBox.attr('data-id');
   
   value = Math.abs(value-1);
   data = {'check':value,'id':id};
   beforeSend = function(){
      $checked.addClass('loading');
   };
   updateHTML = function(){
      if(value == 0){
         $checked.removeClass('checked');
      }else{
         $checked.addClass('checked')
      }
      $checkBox.val(value);
      $checked.removeClass('loading');
   };
   handleAjax('ajax_check_slide.php','POST',data,updateHTML,beforeSend);
  
}
function showEditTitleUpload(obj){
   $(obj).parents('li').find('.name-movie').addClass('hide');
   $(obj).parents('li').find('.input-edit-title').removeClass('hide');
   $(obj).parents('li').find('.input-edit-title').focus();
}
function deleteItemUpload(obj){
   var __this     = $(obj);
   var __parent   = __this.parents(".video-item");
   var id         = __parent.attr('data-id');
   data_send      = {'id':id};
   succ = function(data){
      if($.trim(data) == "Xóa thành công"){
         __parent.remove();
      }
   }
   handleAjax('../videos/delete.php','POST',data_send,succ);
}
function updateNameItemUpload(obj){
   var __this     = $(obj);
   var __parent   = __this.parents(".video-item");
   var name       = __this.val();
   var id         = __parent.attr('data-id');
   var elmName    = __parent.find('.name-movie');
   data_send = {'id':id,'name':name};
   succ = function(data){
      //if(parseInt(data) == 1){
         elmName.html(name);
         __this.addClass('hide');
         elmName.removeClass('hide');
      //}
   }
   handleAjax('../videos/aj_update.php','POST',data_send,succ);
}
function activeItemUpload(obj){
   var __this     = $(obj);
   var strID = '';
   $('.list-video .video-item').each(function(){
      strID += $(this).attr('data-id') + ",";
   });
   succ = function(data){
      if(data != "0"){
         $('.list-video').html('<div class="alert alert-success fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Thành công</div>')
      }
   }
   data_send = {'vid_id':strID};
   if(strID != '')
      handleAjax('../videos/ajax_active.php','POST',data_send,succ);
}
function createPlaylistItemUpload(obj){
   var __this     = $(obj);
   var strID = '';
   var pla_name = $("#pla_name").val();
   var cat_id = $("#cat_id").val();
   $('.list-video .video-item').each(function(){
      strID += $(this).attr('data-id') + ",";
   });
   succ = function(data){
      console.log(data)
      if(data != "0"){
         alert($.trim(data));
      }
   }
   data_send = {'vid_id':strID,'name':pla_name,'cat_id':cat_id};
   if(strID != '' && pla_name != '')
      handleAjax('ajax_create_playlist.php','POST',data_send,succ);
   else{
      $("#pla_name").focus();
   }
}

//
/*------- Sửa tên video -------*/
function showEditVidName(obj){
   elmVidName = $(obj).parents('td').find('.edit-vid-name');
   elmVidName.removeClass('hide');
   elmVidName.focus();
}
function editQuickVidName(obj){
   val = $(obj).val();
   id = $(obj).attr('data-id');
   success = function(data){
      $(obj).addClass('hide');
      $(obj).parent().find('.vid-name').html(val);
   }
   data = {'id':id,'vid_name':val};
   handleAjax('ajax_quick_edit_name.php','POST',data,success);
}

//Add video from Link youtube to My playlist
function addVideoToPlaylist(obj,pla_id,cat_id){
   var __this = $(obj);
   var elmUrl = __this.parents('td').find('.url-video-youtube');
   var url = elmUrl.val();
   data_send = {'url':url,'pla_id':pla_id,'cat_id':cat_id};
   if(url !=''){
      before = function(){
         elmUrl.addClass('loading');
      };
      succ = function(data){
         elmUrl.val('');
         elmUrl.attr('placeholder',$.trim(data));
         elmUrl.removeClass('loading');
      }
      handleAjax('ajax_add_video.php','POST',data_send,succ,before);
   }
}
//Filter playlist
function filterPlayListByCate(obj){
   cat_id = $(obj).val();
   data_send = {'cat_id':cat_id};
   var succ = function(data){
      $('#pla_id').html(data);
   };
   var before = function(){
      
   }
   handleAjax('ajax_filter_playlist.php','POST',data_send,succ,before);
}

//Continue get video from search
function getContinue($obj){
   var cat_id = $("#cat_id").val();
   var max_results = $("#max_results").val();
   var keyword = $("#keyword").val();
   var pla_id = $obj.attr('data-pla-id');
   var data_send = {"pla_id":pla_id,"cat_id":cat_id,"max_results":max_results,"keyword":keyword};
   var before = function(){
      $("#keyword").addClass('loading');
   }
   var succ = function(data){
      $(".list-video").html(data);
      $("#keyword").removeClass('loading');
   }
}
// function xóa ảnh
function delImage(obj){
   var file = $(obj).attr('data-file');
   var data_send = {'file':file};
   var succ = function(data){
      $(obj).parent().hide();
   }
   var conf = confirm("Xóa ảnh này");
   if(conf)
      handleAjax('ajax_del_image.php','POST',data_send,succ);
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function (e) {
            $('#preview-upload').attr('src', e.target.result);
            $("#preview-upload").cropper({
                aspectRatio: 16 / 9,
                autoCropArea:1,
                crop: function(e) {
                  $("#x").val(e.x);
                  $("#y").val(e.y);
                  $("#w").val(e.width);
                  $("#h").val(e.height);
                }
            }).cropper('replace',e.target.result);
            
        }
        reader.readAsDataURL(input.files[0]);
    }
}