<?php
    require "../connection.php";
    require "../header.php";          
?>
<?php
$sql="SELECT * FROM flight";
$statement=$connection->prepare($sql); $statement->execute();
$flight=$statement->fetchAll(PDO::FETCH_OBJ); // airline $sql="SELECT * FROM
$airline; $statement=$connection->prepare($sql); $statement->execute();
$airline=$statement->fetchAll(PDO::FETCH_OBJ); // flys $sql="SELECT * FROM fly";
$statement=$connection->prepare($sql); $statement->execute();
$fly=$statement->fetchAll(PDO::FETCH_OBJ); // fare $sql="SELECT * FROM fare";
$statement=$connection->prepare($sql); $statement->execute();
$fare=$statement->fetchAll(PDO::FETCH_OBJ); ?>
<div class="container-fluid main m-0 p-0">
    <nav class="navbar navbar-expand-lg bg-dark">
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
                        <a
                            class="nav-link active text-light fw-bold"
                            href="view_airport.php"
                            >List Airport</a
                        >
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link active text-light fw-bold"
                            href="add_root.php"
                            >Fly</a
                        >
                    </li>
                </ul>
                <form class="d-flex me-2">
                    <div>
                        <a
                            href="add_airport.php"
                            class="btn btn-secondary me-2 fw-bold"
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
            <h2 class="text-center">Todays Flights</h2>
            <table class="table table-dark table-striped mt-4">
                <thead>
                    <tr>
                        <th>Airline name</th>
                        <th>Flight name</th>
                        <th>Total Seats</th>
                        <th>source</th>
                        <th>Destination</th>
                        <th>Dept_date</th>
                        <th>Arr_date</th>
                        <th>Dept_time</th>
                        <th>Arr_time</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php foreach($airline as $air):?>
                        <td><?=$air->name;?></td>

                        <?php endforeach ?>
                        <?php foreach($flight as $flg):?>
                        <td><?=$flg->name;?></td>
                        <td><?=$flg->total_seat;?></td>
                        <?php endforeach ?>
                        <?php foreach($fly as $fl):?>
                        <td><?=$fl->d_airport_id;?></td>
                        <td><?=$fl->a_airport_id;?></td>
                        <td><?=$fl->d_date;?></td>
                        <td><?=$fl->a_date;?></td>
                        <td><?=$fl->d_time;?></td>
                        <td><?=$fl->d_time;?></td>
                        <?php endforeach ?>
                        <?php foreach($fare as $fr):?>
                        <td><?=$fr->economy_rate;?></td>
                        <td><?=$fr->business_rate;?></td>
                        <?php endforeach ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
    require "../footer.php";
?>
