<?php require "layouts/header.php"; ?>  
<?php require "../config/config.php"; ?>  
<?php 

    if(!isset($_SESSION['adminname'])) {
      header("location: ".ADMINURL."/admins/login-admins.php");
    }
    //shows
    $shows = $conn->query("SELECT COUNT(*) AS shows_count FROM shows");
    $shows->execute();

    $allShows = $shows->fetch(PDO::FETCH_OBJ);


    //shows
    $episodes = $conn->query("SELECT COUNT(*) AS episodes_count FROM episodes");
    $episodes->execute();

    $allEpisodes = $episodes->fetch(PDO::FETCH_OBJ);


    //shows
    $genres = $conn->query("SELECT COUNT(*) AS genres_count FROM genres");
    $genres->execute();

    $allGenres = $genres->fetch(PDO::FETCH_OBJ);


    //shows
    $admins = $conn->query("SELECT COUNT(*) AS admins_count FROM admins");
    $admins->execute();

    $allAdmins = $admins->fetch(PDO::FETCH_OBJ);


?>
            
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Shows</h5>
              <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
              <p class="card-text">number of shows: <?php echo $allShows->shows_count; ?></p>
             
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Episodes</h5>
              
              <p class="card-text">number of episodes: <?php echo $allEpisodes->episodes_count; ?></p>
              
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Genres</h5>
              
              <p class="card-text">number of genres: <?php echo $allGenres->genres_count; ?></p>
              
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Admins</h5>
              
              <p class="card-text">number of admins: <?php echo $allAdmins->admins_count; ?></p>
              
            </div>
          </div>
        </div>
      </div>
   
            
 <?php require "layouts/footer.php"; ?>  
