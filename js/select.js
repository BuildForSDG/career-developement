$("select[name=type_of_user]").change(function () {
    var type=$(this).val()
   
    if(type ==="trainee"){
      $("div.educational_level").removeAttr("hidden");
    }else if(type === "trainer"){
      $("div.description").removeAttr("hidden");
      $("div.category").removeAttr("hidden");
    }
    else {
        $("div.description").removeAttr("hidden");  
    }

   

});