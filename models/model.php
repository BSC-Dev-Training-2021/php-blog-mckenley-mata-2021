<?php
    class model {
        public $title;
        public $conn;
        public $id;
        function __construct($tableName){
            $this->conn = mysqli_connect("localhost", "mckenley", "mckenley", "db_blogpost");  
               if(!$this->conn)  
               {  
                    echo 'Database Connection Error ' . mysqli_connect_error($this->conn);  
               }
            $this->tableName = $tableName;
            $this->id=0;
        }

        function findAll(){
                        /*
                put your generic SELECT query here
            */
                $res=0;
            $sql = "SELECT * FROM $this->tableName";
            $rows = $this->conn->query($sql);
            $result = [];
            if ($rows->num_rows > 0) {
                // display data from the query
                while($row = $rows->fetch_assoc()) {
                $result[] = $row;
                }
            } 
            return $result;
        }

        function findById($id){

            $sql = "SELECT * FROM $this->tableName where id=$id";
            $rows = $this->conn->query($sql);
            $find_id_result = [];
            if ($rows->num_rows > 0) {
                // display data from the query
                while($row = $rows->fetch_assoc()) {
                $find_id_result[] = $row; 

                }
            } 
            return $find_id_result;
            return $find_id_result['id'];




        }


        function insert($data){


            $dataColumnKeys = [];
            $dataColumnValues = [];
            
            foreach($data as $dataColumnKey => $dataColumnValue){
                $dataColumnKeys[] =$dataColumnKey; // Columns names that will be inserted into
                $dataColumnValues[] =$dataColumnValue; // Values to insert into db
            }

            

            $sql=mysqli_query($this->conn,"INSERT INTO ".$this->tableName." (".implode(",",$dataColumnKeys).") VALUES ('".implode("','",$dataColumnValues)."')");
            
            if ($sql) {
                 $this->id = mysqli_insert_id($this->conn);

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