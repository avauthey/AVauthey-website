<?php
	if(file_exists('connectionDB.php'))
	    include 'connectionDB.php';
	else if(file_exists('../connectionDB.php'))
		include '../connectionDB.php';

	class Album{
		private $id;
		private $title;
		private $date;
		private $baniere;

		function __construct($idParam){
			global $bdd;
			$query = $bdd -> prepare('SELECT * FROM Album WHERE id = :id');
		    $query -> bindValue(':id',$idParam, PDO::PARAM_INT);
		    $query -> execute();
		    $data = $query -> fetch();
		    $this -> id = $data['id'];
		    $this -> title = $data['title'];
		    $this -> date = $data['date'];
		    $this -> baniere = $data['baniere'];
		}
		function getId(){
			return $this -> id;
		}
		function getTitle(){
			return $this -> title;
		}
		function getDate(){
			return $this -> date;
		}
		function getBaniere(){
			return $this -> baniere;
		}
	}
?>