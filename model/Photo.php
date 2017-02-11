<?php
	if(file_exists('connectionDB.php'))
	    include 'connectionDB.php';
	else if(file_exists('../connectionDB.php'))
		include '../connectionDB.php';

	class Photo{
		private $id;
		private $title;
		private $url;
		private $date;
		private $idAlbum;

		function __construct($idParam){
			global $bdd;
			$query = $bdd -> prepare('SELECT * FROM Photo WHERE id = :id');
		    $query -> bindValue(':id',$idParam, PDO::PARAM_INT);
		    $query -> execute();
		    $data = $query -> fetch();
		    $this -> id = $data['id'];
		    $this -> title = $data['title'];
		    $this -> url = $data['url'];
		    $this -> date = $data['date'];
		    $this -> idAlbum = $data['idAlbum'];
		}
		function getId(){
			return $this -> id;
		}
		function getTitle(){
			return $this -> title;
		}
		function getUrl(){
			return $this -> url;
		}
		function getDate(){
			return $this -> date;
		}
		function getIdAlbum(){
			return $this -> idAlbum;
		}
	}
?>