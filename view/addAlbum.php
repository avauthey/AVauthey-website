<div class="row">
  <div class="col-lg-12">
    <h2 class="text-center"> Add an Album </h2>
    <div class="col-lg-8 col-lg-offset-3">
      <div class="alert alert-danger hidden" id="alertFieldsEmpty" role="alert"> All the fields have to be input.</div>
      <form class="form-horizontal" method="post"  enctype="multipart/form-data">
        <div class="form-group">
          <label for="author" class="col-sm-3 control-label">Title <font color="red">*</font></label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="title" placeholder="">
          </div>
        </div>
        <div class="form-group">
          <label for="author" class="col-sm-3 control-label">Date <font color="red">*</font></label>
          <div class="col-sm-6">
            <input type="date" class="form-control" name="date" placeholder="">
          </div>
        </div>
        <div class="form-group">
          <label for="url" class="col-sm-3 control-label">Baniere<font color="red">*</font></label>
          <div class="col-sm-6">
            <input type="file" class="form-control" name="url" placeholder="">
          </div>
        </div>
        <div class="form-group">
          <label for="author" class="col-sm-3 control-label">Title baniere <font color="red">*</font></label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="titleBan" placeholder="">
          </div>
        </div>
        <div class="form-group">
          <label for="author" class="col-sm-3 control-label">Date photo<font color="red">*</font></label>
          <div class="col-sm-6">
            <input type="date" class="form-control" name="datePhoto" placeholder="">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-6 col-sm-10">
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
if(isset($_POST['title'])&&isset($_POST['date'])&&isset($_FILES['url'])&&isset($_POST['titleBan'])&&isset($_POST['datePhoto'])){
  if($_POST['title'] != '' && $_POST['date'] != '' && $_FILES['url']['name'] != '' && $_POST['titleBan'] !='' && $_POST['datePhoto'] !=''){
    $url = htmlspecialchars($_FILES['url']['name']);
    $title = htmlspecialchars($_POST['title']);
    $date = htmlspecialchars($_POST['date']);
    $titleBan = htmlspecialchars($_POST['titleBan']);
    $datePhoto = htmlspecialchars($_POST['datePhoto']);
    move_uploaded_file($_FILES['url']['tmp_name'], 'image/' . basename($url));
    $file = 'image/' . basename($url);
    include('connectionDB.php');
    global $bdd;
    //INSERT ALBUM
    $query = $bdd -> prepare('INSERT INTO Album(title,date,baniere) VALUES (:title,:date,:url)');
    $query -> bindValue(':url',$file);
    $query -> bindValue(':date',$date);
    $query -> bindValue(':title',$title);
    $query -> execute();
    //GET ALBUM
    $idAlbum = $bdd -> lastInsertId();
    //INSERT PHOTO
    $query = $bdd -> prepare('INSERT INTO Photo(title,url,date,idAlbum) VALUES (:title,:url,:date,:album)');
    $query -> bindValue(':url',$file);
    $query -> bindValue(':date',$datePhoto);
    $query -> bindValue(':title',$titleBan);
    $query -> bindValue(':album',$idAlbum);
    $query -> execute();
    //INSERT NEWS
    $text = 'Antoine Vauthey adds a new <a href="index.php?page=album&nb='.$idAlbum.'#menu">picture</a>.';
    $query = $bdd -> prepare('INSERT INTO News(text) VALUES (:text)');
    $query -> bindValue(':text',$text);
    $query -> execute();
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