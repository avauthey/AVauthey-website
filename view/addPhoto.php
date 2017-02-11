<div class="row">
  <div class="col-lg-12">
    <h2 class="text-center"> Add a Photo </h2>
    <div class="col-lg-8 col-lg-offset-3">
      <div class="alert alert-danger hidden" id="alertFieldsEmpty" role="alert"> All the fields have to be input.</div>
      <form class="form-horizontal" method="post"  enctype="multipart/form-data">
        <div class="form-group">
          <label for="selectAlbum" class="col-sm-3 control-label">Chose an album <font color="red">*</font></label>
          <div class="col-sm-6">
            <select class="form-control" name="selectAlbum">
              <option value=""> </option>
              <?php 
                foreach ($data as $album){
                
                  echo '<option value="'.$album['id'].'">'.$album['title'].'</option>';
                  
                }?>
            </select>
            <a href="indexUser.php?page=addAlbum#menu"> Add an album?</a>
          </div>
        </div>
        <div class="form-group">
          <label for="title" class="col-sm-3 control-label">Title <font color="red">*</font></label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="title" placeholder="">
          </div>
        </div>
        <div class="form-group">
          <label for="url" class="col-sm-3 control-label">Photo <font color="red">*</font></label>
          <div class="col-sm-6">
            <input type="file" class="form-control" name="url" placeholder="">
          </div>
        </div>
        <div class="form-group">
          <label for="date" class="col-sm-3 control-label">Date <font color="red">*</font></label>
          <div class="col-sm-6">
            <input type="date" class="form-control" name="date" placeholder="">
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
        <h4 class="modal-title">Photo added</h4>
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
var_dump($_POST);
var_dump($_FILES);
if(isset($_POST['title'])&&isset($_POST['date'])&&isset($_FILES['url'])&&isset($_POST['selectAlbum'])){
  if($_POST['title'] != '' && $_POST['date'] != '' && $_FILES['url']['name'] != '' && $_POST['selectAlbum'] != ''){
    $monfichier = fopen('log.txt', 'r+');
    
    $url = htmlspecialchars($_FILES['url']['name']);
    $title = htmlspecialchars($_POST['title']);
    $date = htmlspecialchars($_POST['date']);
    $album = htmlspecialchars($_POST['selectAlbum']);
    move_uploaded_file($_FILES['url']['tmp_name'], 'image/' . basename($url));
    $file = 'image/' . basename($url);
    fputs($monfichier, $url);
    fputs($monfichier, $title);
    fputs($monfichier,$date);
    fputs($monfichier, $album);
    fputs($monfichier, $file);
    //INSERT PHOTO
    $query = $bdd -> prepare('INSERT INTO Photo(title,url,date,idAlbum) VALUES (:title,:url,:date,:album)');
    fputs($monfichier, $query);
    $query -> bindValue(':title',$title);
    $query -> bindValue(':url',$file);
    $query -> bindValue(':date',$date);
    $query -> bindValue(':album',$album);
    $query -> execute();
    //INSERT NEWS
    $text = 'Antoine Vauthey adds a new <a href="index.php?page=album&nb='.$album.'#menu">picture</a>.';
    $query2 = $bdd -> prepare('INSERT INTO News(text) VALUES (:text)');
    $query2 -> bindValue(':text',$text);
    $query2 -> execute();
    $i = 0;
    fclose($monfichier);
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