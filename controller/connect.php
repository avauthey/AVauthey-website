<?php
	$id=(isset($_SESSION['id']))?(int) $_SESSION['id']:0;
	include('model/user.php');
	include('view/connect.html');
	if(isset($_POST['emailSignIn']) && isset($_POST['passwordSignIn'])){
		$array[0]=$_POST['emailSignIn'];
		$array[1]=$_POST['passwordSignIn'];
		$array[2]=1;
		//var_dump($array);
		$message='';
		if ((empty($array[0]) || empty($array[1])) && $array[2]==1)
		{
		    $message = '<div class="alert alert-danger" role="alert">Error you have to input all the fields.</div>';
		}
		else //check user
		{
		    $query=$bdd->prepare('SELECT password, email,id
		    FROM User WHERE email = :email');
		    $query->bindValue(':email',$array[0], PDO::PARAM_STR);
		    $query->execute();
		    $data=$query->fetch();
			if ($data['password'] == md5($array[1])) // check password
			{
			    $_SESSION['email'] = $data['email'];
			    $_SESSION['id'] = $data['id'];
			    header('Location: indexUser.php');
  				//exit();
			}
			else 
			{
			  	$message = '<div class="alert alert-danger" role="alert"> Incorrect email or password</div>';
			}
			$query->CloseCursor();
		}
		//var_dump($monUrl);
		echo $message;
	} 
?>
<script type="text/javascript">
	$('#li1').removeClass('active');
	$('#li2').removeClass('active');
	$('#li3').removeClass('active');
	$('#li4').removeClass('active');
</script>