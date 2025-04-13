
<?php require "../layouts/header.php"; ?>  
<?php require "../../config/config.php"; ?>  
<?php 


  if(!isset($_SESSION['adminname'])) {
    header("location: ".ADMINURL."/admins/login-admins.php");
  }


  $episodes = $conn->query("SELECT * FROM episodes");
  $episodes->execute();

  $allEpisodes = $episodes->fetchAll(PDO::FETCH_OBJ);


?>
          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Episodes</h5>
              <a  href="create-episodes.php" class="btn btn-primary mb-4 text-center float-right">Create Episodes</a>

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">thumbnail</th>
                    <th scope="col">name</th>
                    <th scope="col">show id</th>
                    
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($allEpisodes as $episode) : ?>
                    <tr>
                      <th scope="row"><?php echo $episode->id; ?></th>
                      <td><img src="videos/<?php echo $episode->thumbnail; ?>" style="width:70px; height:70px"></td>
                      <td>ep <?php echo $episode->name; ?></td>
                      <td><?php echo $episode->show_id; ?></td>

                      <td><a href="delete-episodes.php?id=<?php echo $episode->id; ?>" class="btn btn-danger  text-center ">delete</a></td>
                    </tr>
                    
                  </tbody>
                <?php endforeach; ?>
              </table> 
            </div>
          </div>
        </div>
      </div>
<?php require "../layouts/footer.php"; ?>  
