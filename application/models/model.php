<?php
    class model {
        public $title;
        public $conn;
        public $id;
        public $joins;

        function __construct($tableName){
            $this->conn = mysqli_connect("localhost", "mckenley", "mckenley", "db_blogpost");  
               if(!$this->conn)  
               {  
                    echo 'Database Connection Error ' . mysqli_connect_error($this->conn);  
               }
            $this->tableName = $tableName;
            $this->id = 0;
        }

       

        function findAll($options = array()){
            $sql = "SELECT * FROM $this->tableName";

            /*$joinString = $this->parseJoin();*/
            
            /*if($joinString != "") {
                $sql .= $joinString;
            }*/
            $whereClauseConditions = [];

            if (isset($options['params'])) {
                foreach ($options['params'] as $columnName => $data) {
                    $whereClauseConditions[] = "$columnName = $data";
                }                    
            }
            
            if(isset($options['rawparams']) && count($options['rawparams']) > 0) {
                $whereClauseConditions = array_merge($whereClauseConditions, $options['rawparams']);    
            }

            if(count($whereClauseConditions) > 0) {
                $sql .=" WHERE ".implode(" AND ",$whereClauseConditions);
            }

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

            $row = $this->conn->query($sql);

            $result = $row->fetch_assoc();

            return $result;
        }

        function insert($data){
            $dataColumnKeys = [];
            $dataColumnValues = [];
            
            foreach($data as $dataColumnKey => $dataColumnValue){
                $dataColumnKeys[] = $dataColumnKey; // Columns names that will be inserted into
                $dataColumnValues[] = $dataColumnValue; // Values to insert into db
            }
            $sql = mysqli_query($this->conn,"INSERT INTO ".$this->tableName." (".implode(",",$dataColumnKeys).") VALUES ('".implode("','",$dataColumnValues)."')");
            
            if ($sql) {
                 $this->id = mysqli_insert_id($this->conn);
            }
        }

     /*  private function parseJoin() {
            return implode(' ', $this->joins);

        }*/

        function innerJoin($blog_id){
            $sql = "    SELECT $this->tableName.name
                        FROM $this->tableName
                        INNER JOIN blog_post_categories
                        ON  blog_post_categories.category_id = category_types.id
                        where blog_post_categories.blog_post_id = '$blog_id'";

            $rows = $this->conn->query($sql);

            return $rows;
        }


        function filtering_innerJoin($filter_id){
            $sql="  SELECT * FROM $this->tableName
                    INNER JOIN blog_post_categories
                    ON blog_post_categories.blog_post_id = blog_post.id
                    INNER JOIN category_types
                    ON category_types.id = blog_post_categories.category_id
                    where category_types.name = '$filter_id'
            ";

            $rows = $this->conn->query($sql);

            return $rows;
        }







        function update($id, $fields){

        }


        function delete(){


        }
}
