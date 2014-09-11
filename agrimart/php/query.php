<?php

 class Queries{

         public static function doInsertQuery($q){ 
            return  DB::query("INSERT INTO ".$q);           
         }

         public static function doUpdateQuery($q){
            return  DB::query("UPDATE ".$q);
         }

         public static function doDeleteQuery($q){
             return  DB::query("Delete from ".$q);
         }

         public static function doSelectAllQuery($q){
               $result =  DB::query("Select * from ".$q);
               $row_array=array();
                while($row=mysqli_fetch_array($result))
                {    
                    $col_array=array();                    
                    for($i=0; $i < (count($row)/2); $i++){
                       $col_array[] = $row[$i];
                    } 
                    $row_array[]= $col_array;
                } 
                return $row_array;
         }
     
         public static function doSelectQuery($q){
             $result =  DB::query("Select ".$q);
             
             $row_array=array();
            while($row=mysqli_fetch_array($result))
            {    
                $col_array=array();                    
                for($i=0; $i < (count($row)/2); $i++){
                   $col_array[] = $row[$i];
                } 
                $row_array[]= $col_array;
            } 
            return $row_array;
         }
    }


?>