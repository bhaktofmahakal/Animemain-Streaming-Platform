<?php require "../layouts/header.php"; ?>  
<?php require "../../config/config.php"; ?>
<?php 



  if(!isset($_SESSION['adminname'])) {
    header("location: ".ADMINURL."/admins/login-admins.php");
  }

  $shows = $conn->query("SELECT * FROM shows");
  $shows->execute();

  $allShows = $shows->fetchAll(PDO::FETCH_OBJ);

  if(isset($_POST['submit'])) {

    if(empty($_POST['name']) OR empty($_POST['show_id'])) {
        echo "<script>alert('one or more inputs are empty')</script>";
    } else {

        $name = $_POST['name'];
        $show_id = $_POST['show_id'];
       
        $thumbnail = $_FILES['thumbnail']['name'];
        $video = $_FILES['video']['name'];

        $dir_thumbnail = "videos/" . basename($thumbnail);
        $dir_video = "videos/" . basename($video);

        $insert = $conn->prepare("INSERT INTO episodes (name, show_id, thumbnail, video) 
        VALUES (:name, :show_id, :thumbnail, :video)");

        $insert->execute([
            ":name" => $name,
            ":show_id" => $show_id,
            ":thumbnail" => $thumbnail,
            ":video" => $video,
         
        ]);

        if(move_uploaded_file($_FILES['thumbnail']['tmp_name'], $dir_thumbnail) AND move_uploaded_file($_FILES['video']['tmp_name'], $dir_video)) {
          header("location: show-episodes.php");

        }

    }
  }


?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Episodes</h5>
          <form method="POST" action="create-episodes.php" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <label>name</label>
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                 
                </div>
                <div class="form-outline mb-4 mt-4">
                    <label>thumbnail</label>
                    <input type="file" name="thumbnail" id="form2Example1" class="form-control"/>
                   
                </div>
                <div class="form-outline mb-4 mt-4">
                    <label>video</label>
                    <input type="file" name="video" id="form2Example1" class="form-control">
                   
                </div>
                <div class="form-outline mb-4 mt-4">
                    <label>Shows</label>
                    <select name="show_id" class="form-select  form-control" aria-label="Default select example">
                      <option selected>Choose Shows</option>
                      <?php foreach($allShows as $show) : ?>
                        <option value="<?php echo $show->id; ?>"><?php echo $show->title; ?></option>
                      <?php endforeach; ?>
                    </select>
                </div>
              
              

      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
              </form>

            </div>
          </div>
        </div>
<?php require "../layouts/footer.php"; ?>  
