$("select[name=milestone]").change(function () {
    var type=$(this).val()
    /*if(type=='Interested'){
       $("div.agreed_price").removeAttr('hidden');
       $("span.lead-commission").removeAttr('hidden');
       
    }*/
    if(type=='Commission Pending'){
      $("div.follow-up").removeAttr('hidden');
    }

    if(type=='Commission Payment (Sale)' || type=='Commission Payment (Rent)'){
      $(".commission").removeAttr('hidden');
    }

});