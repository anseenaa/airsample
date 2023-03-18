<?php
    require "../connection.php";
    require "../header.php";          
?>
<?php
 if(isset($_POST['name'])){
    $name= $_POST['name'];
$sql="SELECT * FROM airline";
$statement=$connection->prepare($sql);
$statement->execute();
$user=$statement->fetchAll(PDO::FETCH_ASSOC);
    if ($user) { // email already exists
            
        $error_message="Airline already exists";
    }
   
     else{ // email does not exist
        $sql = 'INSERT into airline (name) VALUES (:name)';
        $statement = $connection -> prepare($sql);
        if(  $statement -> execute([':name'=>$name])){
            $_SESSION['status'] = "data added sucessfullly";
            $_SESSION['status_code']="success";
            $_SESSION['message']="SUCCESS";
            $_SESSION['page']="view_airlines.php"; 
        }
    }
}
    

?>
<div class="container-fluid main m-0 p-0">
    <nav class="navbar navbar-expand-lg bg-dark ">
        <div class="container-fluid m-0 p-0">
            <a class="navbar-brand col-md-1"
                ><img src="../images/blue wing.png" class=" img-fluid logo"
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
                <form class="d-flex me-2" action="" method="POST">
                    <div class="dropdown me-2">
                        <a
                            class="btn btn-secondary dropdown-toggle"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            Airlines
                        </a>
                        <ul class="dropdown-menu">
                            <div class="mb-2">
                                <li>
                                    <input
                                        type="text"
                                        placeholder="Airlines Name"
                                        name="name"
                                    />
                                </li>
                            </div>
                            <div class="text-center">
                                <li>
                                    <button class="btn btn-success text-center" type="submit" >
                                        Submit
                                    </button>
                                </li>
                            </div>
                        </ul>
                    </div>
                    <div>
                        <a href="add_airport.php" class="btn btn-secondary me-2"
                            >Airports</a
                        >
                    </div>
                    
                    <a
                        href="../index.php"
                        class="btn btn-primary"
                        type="submit"
                    >
                        logout
                    </a>
                </form>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row mt-5 m-0 p-0">
            <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="card bg-secondary text-light">
                    <div class="card-body text-center">
                        <a  href="view_passenger.php" class="card-title text-decoration-none fw-bold">Total Passengers</a>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="card bg-primary text-light">
                    <div class="card-body text-center ">
                        <a href="" class="card-title text-decoration-none fw-bold">Amount</a>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="card bg-warning text-light">
                    <div class="card-body text-center">
                        <a href="list_flights.php" class="card-title text-decoration-none fw-bold">Flights</a>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="card bg-info text-light">
                    <div class="card-body text-center">
                        <a href="view_airlines.php" class="card-title text-decoration-none fw-bold">Available Airlines</a>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    require "../footer.php";
?>

