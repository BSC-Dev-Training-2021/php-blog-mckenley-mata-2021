<?php
    class model {
        public $title;
        public $conn;
        function __construct($tableName){
            $this->conn = mysqli_connect("localhost", "mckenley", "mckenley", "db_blogpost");  
               if(!$this->conn)  
               {  
                    echo 'Database Connection Error ' . mysqli_connect_error($this->con);  
               }
            $this->tableName = $tableName;
        }





        /*private function connect(){
            $hostName = "localhost";
            $userName = "mckenley";
            $password = "mckenley";
            $db ="my_db";
            // Create connection
                $conn = mysqli_connect($hostName, $userName, $password,$db);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }else{  
                return $conn;
            }  
        }*/

        function findAll(){
            $results = "SElect * from $this->tablename";


        }

        function findById($id){


        }


        function insert($data){


            $dataColumnKeys = [];
            $dataColumnValues = [];


            foreach($data as $dataColumnKey => $dataColumnValue){
                $dataColumnKeys[] =$dataColumnKey; // Columns names that will be inserted into
                $dataColumnValues[] =$dataColumnValue; // Values to insert into db
            }


            $sql=mysqli_query($this->conn,"INSERT INTO ".$this->tableName." (".implode(",",$dataColumnKeys).") VALUES ('".implode("','",$dataColumnValues)."')");


            var_dump("INSERT INTO ".$this->tableName." (".implode(",",$dataColumnKeys).") VALUES ('".implode("','",$dataColumnValues)."')");



            if($sql===true){
                print_r("true");
            }
            else{
                print_r("false");
            }

            


            

        }


        function update($id, $fields){
              /*
                put your generic UPDATE query here
            */
        }


        function delete(){

        }
}