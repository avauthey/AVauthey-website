<?php
	if(file_exists('connectionDB.php'))
	    include 'connectionDB.php';
	else if(file_exists('../connectionDB.php'))
		include '../connectionDB.php';

	class Album{
		private $id;
		private $email;
		private $password;
		private $name;

		function __construct($idParam){
			global $bdd;
			$query = $bdd -> prepare('SELECT * FROM User WHERE id = :id');
		    $query -> bindValue(':id',$idParam, PDO::PARAM_INT);
		    $query -> execute();
		    $data = $query -> fetch();
		    $this -> id = $data['id'];
		    $this -> email = $data['email'];
		    $this -> password = $data['password'];
		    $this -> name = $data['name'];
		}
		function getId(){
			return $this -> id;
		}
		function getEmail(){
			return $this -> email;
		}
		function getPassword(){
			return $this -> password;
		}
		function getName(){
			return $this -> name;
		}
	}
?>