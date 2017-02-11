<?php
	if(file_exists('connectionDB.php'))
	    include 'connectionDB.php';
	else if(file_exists('../connectionDB.php'))
		include '../connectionDB.php';

	class Project{
		private $id;
		private $title;
		private $type;
		private $employee;
		private $logoEmployee;
		private $text;
		private $photo;
		private $dateDeb;
		private $dateFin;

		function __construct($idParam){
			global $bdd;
			$query = $bdd -> prepare('SELECT * FROM Project WHERE id = :id');
		    $query -> bindValue(':id',$idParam, PDO::PARAM_INT);
		    $query -> execute();
		    $data = $query -> fetch();
		    $this -> id = $data['id'];
		    $this -> title = $data['title'];
		    $this -> type = $data['type'];
		    $this -> employee = $data['employee'];
		    $this -> logoEmployee = $data['logoEmployee'];
		    $this -> text = $data['text'];
		    $this -> photo = $data['photo'];
		    $this -> dateDeb = $data['dateDeb'];
		    $this -> dateFin = $data['dateFin'];
		}

		function getId(){
			return $this -> id;
		}

		function getTitle(){
			return $this -> title;
		}
		function getType(){
			return $this -> type;
		}
		function getLogoEmployee(){
			return $this -> logoEmployee;
		}

		function getEmployee(){
			return $this -> employee;
		}

		function getText(){
			return $this -> text;
		}

		function getPhoto(){
			return $this -> photo;
		}

		function getDateDeb(){
			return $this -> dateDeb;
		}

		function getDateFin(){
			return $this -> dateFin;
		}
	}
?>