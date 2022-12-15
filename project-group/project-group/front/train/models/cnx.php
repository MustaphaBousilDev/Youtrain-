<?php

  class DataProvider
{
      public function cnx()
    {
        try
        {
            return new PDO("mysql:host=localhost;dbname=train","root","");
        
        }catch(PDOException $e)
        {
            print 'error'. $e->getMessage();
        }
    }

       public function getVilles()
    {
        $db=$this->cnx();
       $req=$db->query("select * from ville");
       return $req;
    
       
    }


}





