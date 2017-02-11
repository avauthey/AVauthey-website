<div class="row">
  <div class="col-lg-12">
    <h2 class="text-center"> Add a project </h2>
    <div class="col-lg-8 col-lg-offset-3">
      <div class="alert alert-danger hidden" id="alertFieldsEmpty" role="alert"> All the fields have to be input.</div>
      <form class="form-horizontal" method="post"  enctype="multipart/form-data">
        <div class="form-group">
          <label for="selectTrip" class="col-sm-2 control-label">Name Project <font color="red">*</font></label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="name" placeholder="">
          </div>
        </div>
        <div class="form-group">
          <label for="url" class="col-sm-2 control-label">Type <font color="red">*</font></label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="type" placeholder="">
          </div>
        </div>
        <div class="form-group">
          <label for="url" class="col-sm-2 control-label">Employee <font color="red">*</font></label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="employee" placeholder="">
          </div>
        </div>
        <div class="form-group">
          <label for="url" class="col-sm-2 control-label">Logo employee<font color="red">*</font></label>
          <div class="col-sm-6">
            <input type="file" class="form-control" name="logo" placeholder="">
          </div>
        </div>
        <div class="form-group">
          <label for="author" class="col-sm-2 control-label">Description <font color="red">*</font></label>
          <div class="col-sm-6">
            <textarea type="text" class="form-control" name="text" placeholder=""></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="url" class="col-sm-2 control-label">Photo</label>
          <div class="col-sm-6">
            <input type="file" class="form-control" name="photo" placeholder="">
          </div>
        </div>
        <div class="form-group">
          <label for="url" class="col-sm-2 control-label">Date Start <font color="red">*</font></label>
          <div class="col-sm-6">
            <input type="date" class="form-control" name="dateS" placeholder="">
          </div>
        </div>
        <div class="form-group">
          <label for="url" class="col-sm-2 control-label">Date End <font color="red">*</font></label>
          <div class="col-sm-6">
            <input type="date" class="form-control" name="dateE" placeholder="">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-5 col-sm-10">
           <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modalConfirm" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Project added</h4>
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
if(isset($_POST['name'])&&isset($_POST['type'])&&isset($_POST['employee'])&&isset($_POST['text'])&&isset($_POST['dateS'])&&isset($_POST['dateE'])&&isset($_FILES['logo'])&&isset($_FILES['photo'])){
  if($_POST['name'] != '' && $_POST['type'] != '' && $_POST['employee'] != '' && $_POST['text'] != '' && $_POST['dateS'] != '' && $_POST['dateE'] != '' && $_FILES['logo']['name'] != ''){
    $logo = htmlspecialchars($_FILES['logo']['name']);
    if($_FILES['photo']['name'] != ''){
      $photo = htmlspecialchars($_FILES['photo']['name']);
      move_uploaded_file($_FILES['photo']['tmp_name'], 'image/' . basename($photo));
      $filePhoto = 'image/' . basename($photo);
    }
    else{
      $filePhoto = '';
    }
    $name = htmlspecialchars($_POST['name']);
    $type = htmlspecialchars($_POST['type']);
    $employee = htmlspecialchars($_POST['employee']);
    $text = htmlspecialchars($_POST['text']);
    $dateS = htmlspecialchars($_POST['dateS']);
    $dateE = htmlspecialchars($_POST['dateE']);
    move_uploaded_file($_FILES['logo']['tmp_name'], 'image/' . basename($logo));
    $fileLogo = 'image/' . basename($logo);

    //INSERT PROJECT
    $query = $bdd -> prepare('INSERT INTO Project(title,type,employee,logoEmployee,text,photo,dateDeb,dateFin) 
                              VALUES (:title,:type,:employee,:logoEmployee,:text,:photo,:dateDeb,:dateFin)');
    $query -> bindValue(':title',$name);
    $query -> bindValue(':type',$type);
    $query -> bindValue(':employee',$employee);
    $query -> bindValue(':logoEmployee',$fileLogo);
    $query -> bindValue(':text',$text);
    $query -> bindValue(':photo',$filePhoto);
    $query -> bindValue(':dateDeb',$dateS);
    $query -> bindValue(':dateFin',$dateE);
    $query -> execute();
    // GET ID
    $idProject = $bdd -> lastInsertId();
    // INSERT NEWS
    $text = 'Antoine Vauthey adds a new <a href="index.php?page=project&nb='.$idProject.'#menu">project</a>.';
    $query = $bdd -> prepare('INSERT INTO News(text) VALUES (:text)');
    $query -> bindValue(':text',$text);
    $query -> execute();
    $i = 0;
    $i = 0;
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
  else if(a == 1){
    $('#alertFieldsEmpty').removeClass('hidden');
  }
</script>