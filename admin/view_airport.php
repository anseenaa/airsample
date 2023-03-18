<?php
    require "../connection.php";
    require "../header.php";          
?>
<?php
$sql="SELECT  * FROM airport";
$statement=$connection->prepare($sql);
$statement->execute();
$airport=$statement->fetchAll(PDO::FETCH_OBJ);
?>
<div class="container-fluid main m-0 p-0">
<nav class="navbar navbar-expand-lg bg-dark ">
        <div class="container-fluid m-0 p-0">
            <a class="navbar-brand col-md-1"
                ><img src="../images/blue wing.png" class="logo"
            /></a>
            <button
                class="navbar-toggler bg-light"
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

    <div class="container">
        <div class="mt-5">
            <h2 class="text-center">Airports</h2>
            <table class="table table-dark table-striped mt-4">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Abbreviations</th>
                        <th>State</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($airport as $air):?>
                <tr>
                   <td><?=$air->name;?></td> 
                   <td><?=$air->abbr;?></td> 
                   <td><?=$air->state_id;?></td> 
                </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
    require "../footer.php";
?>