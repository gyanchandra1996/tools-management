function showMessage(msg,name,alertclass){
   
    $htm='<div class="alert '+alertclass+'"><button type="button" class="close"data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>'+name+'! </strong>'+msg+'</div>';

    $('#settingMsg').html($htm);

 

  }