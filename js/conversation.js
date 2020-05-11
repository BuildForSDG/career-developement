$('.detailtoggle').click(function(){
	
	if($('.timelines').is(':hidden')){
        
        var id=$(this).attr('id');
        var value=id.split('-');
        //alert(value[0]);
          
        $.post('/get/conversation',{
            name:value[1],
            property_id:value[0]
            
         },
         function(res){
            var jpr=JSON.parse(res);
            
            conversation=jpr.conversations;
            console.log(conversation);
             markup="";
          if(conversation.length){   
          for(i=0;i<conversation.length;i++){

            markup+='<ul class="timeline" >'
                                             
                                                +'<li class="time-label">'
                                                    +'<span class="bg-red">'
                                                        +conversation[i].date
                                                    +'</span>'
                                                +'</li>'
                                               
                                                +'<li>'
                                                    
                                                    +'<i class="fa fa-envelope bg-blue"></i>'
                                                    +'<div class="timeline-item">'
                                                        +'<span class="time"><i class="fa fa-clock-o"></i>'+conversation[i].time+'</span>'
                                            
                                                        +'<h3 class="timeline-header"><a href="#">'+conversation[i].admin+'</a> <small>(Admin)</small></h3>' 
                                            
                                                        +'<div class="timeline-body">'
                                                           +conversation[i].proposal
                                                        +'</div>'
                                            
                                                    +'</div>'
                                                +'</li>'
                                                
                                                +'<li>'
                                                        +'<i class="fa fa-user bg-aqua"></i>'
                                          
                                                        +'<div class="timeline-item">'
                                                          +'<span class="time"><i class="fa fa-clock-o"></i>'+ conversation[i].time+'</span>'
                                          
                                                          +'<h3 class="timeline-header no-border"><a href="#">'+conversation[i].lead_name+'</a><small>(Client)</small></h3>'
                                                          +'<div class="timeline-body">'
                                                              +conversation[i].feedback
                                                        +'</div>'
                                                        +'</div>'
                                                      +'</li>'
                                              
                                            
                                            +'</ul>'
                                           
          
            }
        
      
      
       $('#'+value[0]).append(markup);
        $('.timelines').show();
        //$(this).text('Close');

          }

          else{
            //$(this).text('See Conversation')
            //$('#'+value[0]+'-'+value[1]).text('See Conversation');
            alert('No Conversation Yet');
            
          }

         })
      


	}else{
    //$(this).text('See Conversation');
        $('.timeline').remove();
        $('.timelines').hide();
        
	}
});


//select property based on contract type


$('input[name=contract]').change(function(){
  // $('.third').remove();
  // $('.search').show();
   list=[];

   $("select[name=property]").children().remove();

  var contract=$("input[name='contract']:checked").val();
  //alert(contract);
  $.post('/get/property',{
    contract:contract
  },function(res){
     
    var jpr=JSON.parse(res);
    //console.log(jpr.properties.length);

    list.push('<option></option>');

    for(i=0;i<jpr.properties.length;i++){
      list.push('<option value="'+jpr.properties[i].property_id+'">'+(jpr.properties[i].property_type !='Land'?( jpr.properties[i].bedrooms+' Bedroom '):'')  +jpr.properties[i].property_type+' for '+jpr.properties[i].contract_type+' at '+ jpr.properties[i].location+'</option>');
     
      }
      //console.log(list);
      for(i=0;i<list.length;i++){
        $("select[name=property]").append(list[i]);
       }
  });

})

//select leads or partners based on contribution

$('input[name=type_of_contribution]').change(function(){
  // $('.third').remove();
  // $('.search').show();
   list=[];

   $("select[name=contribution]").children().remove();

  var type=$("input[name='type_of_contribution']:checked").val();
  //alert(type);
  $.post('/get/contribution',{
    type:type
  },function(res){
    //console.log(res);

    var jpr=JSON.parse(res);

    //console.log(jpr);

    list.push('<option></option>');

  if(type=='partner'){
    for(i=0;i<jpr.contribution.length;i++){
      list.push('<option value="'+jpr.contribution[i].partner_name+'">'+jpr.contribution[i].partner_name+'</option>');
     
      }
    }else{
      for(i=0;i<jpr.contribution.length;i++){
        list.push('<option value="'+jpr.contribution[i].name+'">'+jpr.contribution[i].name+'</option>');
       
        }

    }


      console.log(list);
      for(i=0;i<list.length;i++){
        $("select[name=contribution]").append(list[i]);
       }
  });

})

$("select[name=type_of_partner]").change(function () {
  $type=$(this).val()
  //console.log($type);
  if($type=='Agency'){
    
    //$("input[name=commission_value]").attr('required');
     $("div.agent").removeAttr("hidden");
  }else{
    $("div.agent").remove();
  }
 
});




$('#logout').click(function(){
  localStorage.setItem('logout_item','expired')
})

