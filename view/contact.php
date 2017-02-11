<div class="row">
	<div class="col-md-12">
		<h2 class="text-center"> Contact form </h2>
		<div class="col-md-6 col-md-offset-3">
			<div class="alert alert-danger hidden" id="alertFieldsEmpty" role="alert"> All the fields have to be input.</div>
			<div class="alert alert-danger hidden" id="alertWrong" role="alert"> Something went wrong, go back and try again!</div>
			<form method="post"  enctype="multipart/form-data">
			 	<div class="form-group">     
				    <label>Name </label><font color="red">*</font>
				    <input type="text" name="name" id="name" class="form-control" placeholder="name">
				</div>
			    <div class="form-group">
				    <label>Mail </label><font color="red">*</font>
				    <input name="mail" id="mail" type="email" class="form-control" placeholder="email@ex.com">
				    <input name="email2" id="test" type="email" class="form-control hidden" placeholder="email@ex.com">
				</div>
			    <div class="from-group">
				    <label>Message</label><font color="red">*</font>
				    <textarea name="message" id="message" class="form-control" placeholder="Type Here"></textarea>
				</div>
				<div class="from-group">
					<label>What is <?php echo $val1; ?> + <?php echo $val2; ?> ? (Anti-spam)</label><font color="red">*</font>
					<div class="alert alert-danger hidden" id="alertValueWrong" role="alert"> You answered the anti-spam question incorrectly!</div>
					<input type="number" name="human" class="form-control" placeholder="Type Here">
				</div>
				</br>
			    <div class="col-md-2 col-md-offset-9">
			    	<button id="submit" class="btn btn-success" type="submit">Submit</button></br> 
			    </div>
			</form>
		</div>
	</div>
</div></br>

<div class="modal fade" id="modalConfirm" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Album created and photo added</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6 col-md-offset-5">
            <img src="image/iconTick.png">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a href="indexUser.php?page=homeUser#menu" role="button" class="btn btn-success" id="btnConfirm">Ok</a>
      </div>
    </div>
  </div>
</div>
<?php
	$i = '';
	if(isset($_POST['name']) && isset($_POST['mail']) && isset($_POST['message']) && isset($_POST['human'])){
		$human = $_POST['human'];
		if($_POST['name'] != '' && $_POST['mail'] != '' && $_POST['message'] != '' && $human == $_SESSION['result']){
			$name = $_POST['name'];
		    $email = $_POST['mail'];
		    $message = $_POST['message'];
		    $from = 'From: Antoine Vauthey Website'; 
		    $to = 'vauthey.antoine@gmail.com'; 
		    $subject = 'Hello';
		    $body = "From: $name\n E-Mail: $email\n Message:\n $message";
		    if (mail ($to, $subject, $body, $from)) { 
		        $i = 0;
		    } else { 
		        $i = 3; 
		    }
		}
		else if ($_POST['name'] != '' && $_POST['mail'] != '' && $_POST['message'] != '' && $human != $result) {
    		$i = 2;
		}
		else{
			$i = 1;
		}
	}
?>
<script type="text/javascript">
	
  var a = '<?php echo $i;?>';
  console.log(a);
  if(a == '0'){
   $("#modalConfirm").modal('show');
   <?php $i='';?>
  }
  else if(a == 1 ){
    $('#alertFieldsEmpty').removeClass('hidden');
  }
  else if(a == 2){
  	$('#alertValueWrong').removeClass('hidden');
  }
  else if (a == 3){
  	$('#alertWrong').removeClass('hidden');
  }
</script>
<script type="text/javascript">
	$('#li1').removeClass('active');
	$('#li2').removeClass('active');
	$('#li3').removeClass('active');
	$('#li4').removeClass('active');
</script>