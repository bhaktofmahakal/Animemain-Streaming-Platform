<?php require "../layouts/header.php"; ?>  
<?php require "../../config/config.php"; ?>  
<?php 


  if(!isset($_SESSION['adminname'])) {
    header("location: ".ADMINURL."/admins/login-admins.php");
  }


  $shows = $conn->query("SELECT * FROM shows");
  $shows->execute();

  $allShows = $shows->fetchAll(PDO::FETCH_OBJ);


?>
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Shows</h5>
              <a  href="create-shows.php" class="btn btn-primary mb-4 text-center float-right">Create Shows</a>

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">title</th>
                    <th scope="col">image</th>
                    <th scope="col">type</th>
                    <th scope="col">date_aired</th>
                    <th scope="col">status</th>
                    <th scope="col">genre</th>
                    <th scope="col">num_available</th>
                    <th scope="col">num_total</th>
                    <th scope="col">created_at</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($allShows as $show) : ?>
                    <tr>
                      <th scope="row"><?php echo $show->id; ?></th>
                      <td><?php echo $show->title; ?></td>
                      <td><img style="width: 70px; height:70px" src="img/<?php echo $show->image; ?>"></td>
                      <td><?php echo $show->type; ?> </td>
                      <td><?php echo $show->date_aired; ?> </td>
                      <td><?php echo $show->status; ?> </td>
                      <td><?php echo $show->genre; ?> </td>
                      <td><?php echo $show->num_available; ?> </td>
                      <td><?php echo $show->num_total; ?> </td>
                      <td><?php echo $show->created_at; ?> </td>
                      <td><a href="delete-shows.php?id=<?php echo $show->id; ?> " class="btn btn-danger  text-center ">delete</a></td>
                    </tr>
                  <?php endforeach; ?>
                 
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>
<?php require "../layouts/footer.php"; ?>  
