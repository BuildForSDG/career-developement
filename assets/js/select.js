$("select[name=type_of_user]").change(function () {
    var type=$(this).val()
   
    if(type=='trainee'){
      $("div.educational_level").removeAttr('hidden');
    }else {
        $("div.description").removeAttr('hidden');  
    }

   

});