$(document).ready(function(){
    submituser("","hello",{});
});


var submituser = function (fm,task,data){
    $.cPOST(task,data,function(r){
     if(r.error){
          alert(r.error);
     }else{
         switch(r.option){
            case "hello":                           
                alert(r.hello);
            break;

         }

     }
    }
)};


var connect = function(send_obj){    
  $.ajax({
              type: 'POST',
              url: 'php/connect.php',
              data: send_obj,
              dataType: 'json',
              cache: false,
              success: function(result) {         
                    switch(result.option){  
                        case "1":break;
                        default:break;                              

                    }
             }
      }); 
}



$.cPOST = function(action,data,callback){
    $.post('php/connect.php?action='+action,data,callback,'json');
}

$.cGET = function(action,data,callback){  
	$.get('php/connect.php?action='+action,data,callback,'json');
}
