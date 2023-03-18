<?php
    require "../connection.php";
    require "../header.php";          
?>
    <?php
   
    // airport

  

    $sql="SELECT * FROM flight";
    $statement=$connection->prepare($sql);
    $statement->execute();
    $flights=$statement->fetchAll(PDO::FETCH_ASSOC);

    $sql="SELECT * FROM fly";
    $statement=$connection->prepare($sql);
    $statement->execute();
    $fly=$statement->fetchAll(PDO::FETCH_ASSOC);

      if(isset($_POST['submit'])){
       
        $flight_name= $_POST['flight_name'];
        $business_rate=$_POST['b_rate'];
        $economy_rate= $_POST['e_rate'];
        

        $sql="SELECT id FROM flight WHERE name=:name";
        $statement=$connection->prepare($sql);
        $statement->execute([':name'=>$flight_name]);
        $flights=$statement->fetch(PDO::FETCH_ASSOC);
        $id3=$flights['id'];

        // fly
        $sql="SELECT id FROM fly WHERE id=:id";
        $statement=$connection->prepare($sql);
        $statement->execute([':id'=>$fly]);
        $fly=$statement->fetch(PDO::FETCH_ASSOC);
        $id4=$fly['id'];
        
   
        
        $sql = 'INSERT into fare(fly_id,business_rate,economy_rate) VALUES (:fly_id,:b_rate,:a_rate)';
        $statement = $connection -> prepare($sql);
        if($statement -> execute([':fly_id'=>$id4,':b_rate'=>$business_rate,':e_rate'=>  $economy_rate])){
            echo "success";
        }
    }  



  ?>
<div class="container-fluid main m-0 p-0">
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

    <div class="container col-12 col-sm-6 align-items-center bg-light mt-5">
        <div class="mb-5 text-center">
            <h1>FLIGHT PRICE</h1>
        </div>
        <?php
          if (isset($error_message)) {
            echo '<div class="alert alert-warning alert-dismissible fade show " role="alert">
                    <strong>Airport already exist</strong> You have to re-enter
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
           }
        ?>
        <form action="" method="POST">
                    <div class="mb-3 row">
                    <label for="" class="col-sm-3 col-form-label">Flight Name</label>
                    <div class="col-sm-9">
                       
                       <select class="form-select " name="flight_name">
                        <option>Flight</option>
                            <?php 
                                foreach ($flights as $fly) {
                            ?>
                        <option>
                        <?php echo $fly['name']; ?> </option>
             <?php 
                 }
            ?>   
                       </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-3 col-form-label"
                        >Economy rate</label
                    >
                    <div class="col-sm-9">
                        <input
                            type="number" name="e_rate"
                            placeholder="Price"
                            value=""
                            class="form-control"
                        />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-3 col-form-label"
                        >Business rate</label
                    >
                    <div class="col-sm-9">
                        <input
                            type="next" name="b_rate"
                            placeholder="Price"
                            value=""
                            class="form-control"
                        />
                    </div>
                </div>
                <div class="text-center p-2">
                    <button class="btn btn-primary" name="submit" type="submit" name="submit">Add price</button>
                </div>
            </div>
        </form>
    </div>

</div>

<?php
    require "../footer.php";
?>

