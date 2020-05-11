/*$('input[name=rate]').mouseout(function(){
    var rate=$('input[name=rate]').val();
    var property_id=$('select[name=property_id]').val();
    $.post('/calculate/commission',{
       rate:rate,
       property_id:property_id
    },
    function(res){
        $('input[name=expected_amount]').val(res);
     //console.log(res);
    })
    

});

$('input[name=listed_value]').mouseout(function(){
    var currency=$('select[name=currency]').val();
    var price=$('input[name=listed_value]').val();
    var rate=$('input[name=rate]').val();
     //alert(rate);
    if(currency == 'usd'){
       var newprice=(rate*price);
       
    }else{
       var newprice=price;
    }
    $('input[name=property_value]').val(Math.round(newprice));

});


$('input[name=rate2]').mouseout(function(){
   
   var price=$('input[name=closed_value1]').val();
   var rate=$('input[name=rate2]').val();
    var newprice=(rate/100)*price
    //alert(rate);
  

   $('input[name=expected_amount1]').val(Math.round(newprice));

});

$('input[name=listed_value1]').mouseout(function(){
   var currency=$('select[name=currency]').val();
   var price=$('input[name=listed_value1]').val();
   var rate=$('input[name=rate1]').val();
    //alert(rate);
   if(currency == 'usd'){
      var newprice=(rate*price);
      
   }else{
      var newprice=price;
   }
   $('input[name=property_value]').val(Math.round(newprice));

});*/

$('select[name=lead_name]').change(function(){
   var name=$('select[name=lead_name]').val();
    list=[];
   $.post('/property/interest',{
      name:name,
      
   },
   function(res){
       //$('input[name=expected_amount]').val(res);
       var jpr=JSON.parse(res);
    console.log(jpr.properties.length);

    for(i=0;i<jpr.properties.length;i++){
      list.push('<option value="'+jpr.properties[i].property_id+'">'+(jpr.properties[i].property_type !='Land'?( jpr.properties[i].bedrooms+' Bedroom '):'')  +jpr.properties[i].property_type+' for '+jpr.properties[i].contract_type+' at '+ jpr.properties[i].location+'</option>');
     //console.log(jpr.properties[i].property_type)
      }

      console.log(list);
    for(i=0;i<list.length;i++){
      $("select[name=property]").append(list[i]);
     }

   })


})


var templid;
var status
$('td.actions .dropdown-menu a').click(function(){
	 templid=this.id.substring(4);
	 status=this.id.substring(0,4);
   //  alert(templid);
   //  alert(status);
	
		$.post('/status/change',{
			'lid':templid,
			'status':status
		},function(res,stat){
         console.log(JSON.parse(res));
         console.log(status);
         console.log(templid);
			 rgalter1(status,templid,JSON.parse(res));
			 $('#'+status+templid).parent().hide();
			
		});
	
});

function rgalter1(stat,tid,jpr){
   $('#'+stat+tid).parents('tr').children('.state').text(jpr.status);
  
	 //$('#'+stat+tid).parent().hide();
	$('#'+jpr.templid+tid).parent().show();
}

//changing status of lead
var tid;
var state
$('td.status .dropdown-menu a').click(function(){
	 tid=this.id.substring(4);
	 state=this.id.substring(0,4);
   //  alert(templid);
   //  alert(status);
	
		$.post('/state/change',{
			'lid':tid,
			'status':state
		},function(res,stat){
			console.log(JSON.parse(res));
			 rgalter(state,tid,JSON.parse(res));
			 $('#'+state+tid).parent().hide();
			
		});
	
});

function rgalter(stat,tid,jpr){
	$('#'+stat+tid).parents('tr').children().first().next().next().next().next().next().next().next().text(jpr.status);
	 //$('#'+stat+tid).parent().hide();
	$('#'+jpr.templid+tid).parent().show();
}

