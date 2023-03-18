<?php
    require "../connection.php";
    require "../header.php";          
?>
<?php   

$sql="SELECT * FROM state";
$statement=$connection->prepare($sql);
$statement->execute();
$states=$statement->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_POST['submit'])){
    $name= $_POST['name'];
    $abbr= $_POST['abbr'];
    $state=$_POST['states'];
        $sql="SELECT id FROM state WHERE state=:state";
        $statement=$connection->prepare($sql);
        $statement->execute([':state'=>$state]);
        $states=$statement->fetch(PDO::FETCH_ASSOC);
        $id=$states['id'];
            $sql='SELECT * FROM airport WHERE name =:name LIMIT 1';
            $stmt = $connection->prepare($sql);
            $stmt->execute(['name' => $name]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
         if ($user) { // email already exists
            
            $error_message="airport already exists";
        }
       
         else{ // email does not exist
            $sql = 'INSERT into airport (name,abbr,state_id) VALUES (:name,:abbr,:state_id)';
            $statement = $connection -> prepare($sql);
            if(  $statement -> execute([':name'=>$name,':abbr'=>$abbr,':state_id'=>$id])){
                echo "Login success";
                session_start();
               
                header("location:profile.php");
            }
        }  
    }          
      ?>
<div class="container-fluid main m-0 p-0 vh-100">
<nav class="navbar navbar-expand-lg bg-dark ">
        <div class="container-fluid m-0 p-0">
            <a class="navbar-brand col-md-1"
                ><img src="../images/blue wing.png" class="logo"
            /></a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a
                            class="nav-link active text-light fw-bold"
                            aria-current="page"
                            href="dashboard.php"
                            >Admin</a
                        >
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-light fw-bold" href="view_airport.php"
                            >List Airport</a
                        >
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-light fw-bold" href="add_root.php"
                            >Fly</a
                        >
                    </li>
                </ul>
                <form class="d-flex me-2">
                    
                    <div>
                        <a href="add_airport.php" class="btn btn-secondary me-2 fw-bold"
                            >Airports</a
                        >
                    </div>

                    <button class="btn btn-primary fw-bold" type="submit">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container bg-light col-12 col-sm-6 align-items-center mt-5">
        <?php
          if (isset($error_message)) {
            echo '<div class="alert alert-warning alert-dismissible fade show " role="alert">
                    <strong>Airport already exist</strong> You have to re-enter
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
           }
        ?>
        <form action="" method="POST">
            <div class="mt-5">
                <div class="mb-3 row">
                    <label for="" class="col-sm-3 col-form-label"
                        >Airport Name:</label
                    >
                    <div class="col-sm-9">
                        <input
                            class="form-control"
                            type="text"
                            placeholder="Airport Name"
                            value=""
                            name="name"
                        />
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="" class="col-sm-3 col-form-label"
                        >Abbreviations:</label
                    >
                    <div class="col-sm-9">
                        <input
                            class="form-control"
                            type="text"
                            placeholder="Abbreviations"
                            value=""
                            name="abbr"
                        />
                    </div>
                </div>
                <div>
                    <select class="form-select mt-3" name="states">
                    
   <option>Select state</option>
  <?php 
  foreach ($states as $stat) {
  ?>
    <option><?php echo $stat['state']; ?> </option>
    <?php 
    }
   ?>
</select>
                </div>
               
                <div class="text-center mt-2"> <button class="btn btn-primary" name="submit" value="submit" type="submit">Add</button></div>
                
            </div>
        </form>
    </div>
</div>

<?php
    require "../footer.php";
?>