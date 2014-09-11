
<?php


    include "DB.php";
    include "query.php";
    include "function.php";


    $dbOptions = array(
        'db_host' => 'localhost',
        'db_user' => 'root',
        'db_pass' => '',
        'db_name' => 'agrimart'
    );



try{
     //DB::init($dbOptions);     //connect database dont ucommect unless database has been created   
    
     session_name('agrimart');
     session_start();
     
     $response = array();  //associative array to user     
     // $token = md5(rand(1000,9999)+(time())); 

    if(isset($_GET['action'])){      
        switch($_GET['action']){ 
                case 'hello': 
                      $response[]=array("option"=>"hello","hello"=>"hello_guys");                       
                break;   
               
                default: 
                    throw new Exception('Wrong action');
        } 
        echo json_encode($response[0]);
    }else{   
        
        if(isset($_GET['action'])){     
            switch ($_POST['menu'])
            {
                case "": 
                   $response[]=array("option"=>"",""=>"");
                break; 
                    default: 
                throw new Exception('Wrong action');

            }
            echo json_encode($response[0]);
        } 
    }
    
   
}catch(Exception $e){
	die(json_encode(array('error' => $e->getMessage())));
}

?>
