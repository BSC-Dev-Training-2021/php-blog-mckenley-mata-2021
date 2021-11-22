<?php 
	require_once 'model.php';
	
	class blog_post_comments extends model{
		function __construct(){
            parent::__construct("blog_post_comments");
        }

        function findComments($blog_id) {
        	/* $options = array(
        		'params' => array(
        			'blog_id' => $blog_id
        		),
        		'returnFields' => array(
        			'comments',
        			'blog_id',
        			'id'
        			//'blog_post_categories.*'
        		),
        		'rawparams' => array(
        			'comments IS NOT NULL'
        		)
        	);
            $joinString = $this->parseJoin();
            if($joinString != "") {
                $sql .= $joinString;
            }
            if () {
                // code...
            }*/
            $sql = "SELECT * FROM $this->tableName where blog_post_id =  $blog_id";
            $rows = $this->conn->query($sql);
            $result = [];
            if ($rows->num_rows > 0) {
                // display data from the query
                while($row = $rows->fetch_assoc()) {
                $result[] = $row;
                }
            } 
            return $result;

        	$this->innerJoin("INNER JOIN blog_post_categories ON blog_post_categories.category_id = category_types.id");
        	$this->findAll($options);
        }

	}


 ?>