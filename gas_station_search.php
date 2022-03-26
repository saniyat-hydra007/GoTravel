<?php
include 'db_connect.php';
$searchErr = '';
$gas_station_details = '';

if (isset($_POST['save'])) {
    if (!empty($_POST['search'])) {
        $search = $_POST['search'];
        $stmt = $con->prepare("select * from gas_station where city like '%$search%' or district like '%$search%'");
        $stmt->execute();
        $gas_station_details = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } else {
        $searchErr = "Please enter the information";
    }
}

?>
<html>

<head>
    <title>Gas Stations</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="bootstrap/js/bootstrap-theme.css" crossorigin="anonymous">
    <style>
        .container {
            width: 70%;
            height: 30%;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3><u>Gas Stations</u></h3>
        <br /><br />
        <form class="form-horizontal" action="#" method="post">
            <div class="row">
                <div class="form-group">
                    <label class="control-label col-sm-4" for="email"><b>Search Gas Stations</b>:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="search" placeholder="city/district name">
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" name="save" class="btn btn-success btn-sm">Submit</button>
                    </div>
                </div>
                <div class="form-group">
                    <span class="error" style="color:red;">* <?php echo $searchErr; ?></span>
                </div>

            </div>
        </form>
        <br /><br />
        <h3><u>Search Result</u></h3><br />
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Station Name</th>
                        <th>Road No.</th>
                        <th>City</th>
                        <th>District</th>
                        <th>Division</th>
                        <th>Country</th>
                        <th>Phone Number</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!$gas_station_details) {
                        echo '<tr>No data found</tr>';
                    } else {
                        foreach ($gas_station_details as $key => $value) {
                    ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $value['name']; ?></td>
                                <td><?php echo $value['road']; ?></td>
                                <td><?php echo $value['city']; ?></td>
                                <td><?php echo $value['district']; ?></td>
                                <td><?php echo $value['district']; ?></td>
                                <td><?php echo $value['country']; ?></td>
                                <td><?php echo $value['phone_number']; ?></td>

                            </tr>

                    <?php
                        }
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
    <script src="jquery-3.2.1.min.js"></script>
    <script src="bootstrap.min.js"></script>
</body>

</html>