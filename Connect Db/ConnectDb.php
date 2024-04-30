
<?php

    class ConnectDb{
     public $dbConnect;
        public  function __construct($config)
        {
//            print_r($config["servername"],);
            $this->dbConnect=new mysqli($config["servername"],$config["username"],$config["password"],$config["dbname"]);
        }
        public  function  setQuery($query){
            $data=$this->dbConnect->query($query);
//            $getdata=$data->fetch_assoc();
            return $data;
        }
    }
