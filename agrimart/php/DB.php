

<?php

class DB {
	private static $instance;
	private $MySQLi;
	
	private function __construct(array $dbOptions){

		$this->MySQLi = mysqli_connect(	$dbOptions['db_host'],
										$dbOptions['db_user'],
										$dbOptions['db_pass'],
										$dbOptions['db_name'] );

		if (mysqli_connect_errno()) {
			throw new Exception('Database error.');
		}

		$this->MySQLi->set_charset("utf8");
	}
	
	public static function init(array $dbOptions){
		if(self::$instance instanceof self){
			return false;
		}
		
		self::$instance = new self($dbOptions);
	}
	
    
    public static function getMySQLiObject(){
		return self::$instance->MySQLi;
	}
	
	public static function query($q){
		return mysqli_query(self::$instance->MySQLi, $q);
	}
    
    public static function getid(){    
        return self::$instance->MySQLi->insert_id;
    }
    
    
}


?>
