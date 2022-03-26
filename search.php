<?php

session_start();

if(
    isset($_SESSION['username'])
    && isset($_SESSION['role'])
    && isset($_GET['search'])
    && !empty($_SESSION['username'])
    && !empty($_SESSION['role'])
    && !empty($_GET['search'])
){
    ///already logged in user
    $role = $_SESSION['role'];
    $username = $_SESSION['username'];
    $search = $_GET['search'];
    $choose = $_GET['choose'];

    ?>
       <!DOCTYPE html>
<html lang="en">
    <head>
    <title>Prebook</title>
        <meta charset="utf-8">
        <title>E Store - eCommerce HTML Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="eCommerce HTML Template Free Download" name="keywords">
        <meta content="eCommerce HTML Template Free Download" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <!-- Top bar Start -->
        <div class="top-bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <i class="fa fa-envelope"></i>
                        Agro_Tech@gmail.com
                    </div>
                    <div class="col-sm-6">
                        <i class="fa fa-phone-alt"></i>
                        01826557650
                    </div>
                </div>
            </div>
        </div>
        <!-- Top bar End -->
        
        <!-- Nav Bar Start -->
        <div class="nav">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="index.php" class="nav-item nav-link active">Home</a>

                            <?php

if($role == 'farmer'){
    ?>
    <a href="myproduct.php" class="nav-item nav-link">My Product</a>
    <a href="myprebook.php" class="nav-item nav-link">Prebook</a>
    <?php
}
else{
    ?>
    <a href="cart.php" class="nav-item nav-link">Cart</a>
    <a href="wishlist.php" class="nav-item nav-link">Wishlist</a>
    <a href="pre_book.php" class="nav-item nav-link">Prebook</a>
<?php
}
?>
                        
                            <a href="bid_room.php" class="nav-item nav-link">Bid Room</a>


                            <a href="notification.php" class="nav-item nav-link">Inbox</a>
                        </div>
                        <div class="navbar-nav ml-auto">
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">User Account</a>
                                <div class="dropdown-menu">
                    
                                    <a href="orderhistory.php" class="dropdown-item">Order History</a>
                                    <a href="profile.php" class="dropdown-item">My Profile</a>
                                    <a href="logout.php" class="dropdown-item">Logout</a> 
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->      
        
        <!-- Bottom Bar Start -->
        <div class="bottom-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="index.html">
                            <img src="img/agro_logo.png" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="search">
                            <input type="text" placeholder="Search">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <?php

if($role == 'farmer'){
    ?>

    <?php
}
else{
    ?>
<div class="col-md-3">
                        <div class="user">
                            <a href="wishlist.php" class="btn wishlist">
                                <i class="fa fa-heart"></i>
                                <span>(0)</span>
                            </a>
                            <a href="cart.php" class="btn cart">
                                <i class="fa fa-shopping-cart"></i>
                                <span>(0)</span>
                            </a>
                        </div>
                    </div>
<?php
}
?>
                </div>
            </div>
        </div>


                <style>

                body {
                        background-color: lightblue;
                    }

                .text{

                            height: 25px;
                            border-radius: 5px;
                            padding: 2px;
                            border: solid thin #aaa;
                            width: 90%;
                        }


                        #button{

                            padding: 10px;
                            width: 120px;
                            color: white;
                            background-color: FireBrick;
                            border: none;
                        }

                        #box{

                            background-color: AliceBlue;
                            margin: auto;
                            width: 300px;
                            padding: 20px;
                        }


                    #ptable{
                        width: 100%;
                        border: 1px solid blue;
                        border-collapse: collapse;
                    }

                    #ptable th, #ptable td{
                        border: 1px solid blue;
                        border-collapse: collapse;
                        text-align: center;
                    }

                    #ptable tr:hover{
                        background-color: bisque;
                    }
                </style>

            </head>

            <body>

                

                <form id="box" action="search.php" method="GET">

                <div style="font-size: 20px;margin: 10px;">Welcome
                <?php
                try{
                    // PHP Data Object
                    $conn=new PDO("mysql:host=localhost:3306;dbname=eMarket;","root","");
                    ///setting 1 environment variable
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    ///executing mysql query
                    $signupquery="SELECT * FROM ".$role." WHERE ".$role[0]."_username = '".$username."'";


                    $returnobj = $conn->query($signupquery);
                    $returntable = $returnobj->fetchAll();

                    if($returnobj->rowCount() == 1)
                    {
                        foreach($returntable as $row){
                        ?><br><?php
                        echo $row['Name'];
                    }
                    }
                }
                catch(PDOException $ex){
                    ?>
                        <script>location.assign("login.php");</script>
                    <?php
                }
                ?></div>

                    <input class="text" type="search" id="search" name="search" placeholder="Product/Farmer">
                    <br><br>
                    <select class="text" id="choose" name="choose">
                    <option value="product">Product</option>
                    <option value="farmer">Farmer</option>
                    </select>
                    <br><br>
                    <input id="button" type="submit" value="Search">

                </form>

                <br>
                <br>

                <?php
                if($choose == 'farmer')
                {?>

                <div>
                <div style="font-size: 20px;margin: 10px;">All Farmers List</div>

                    <table id="ptable">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Full Name</th>
                                <th>Address</th>
                                <th>District</th>
                                <th>City</th>
                                <th>Phone Number</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            try{
                                ///PDO = PHP Data Object
                                $conn=new PDO("mysql:host=localhost:3306;dbname=eMarket;","root","");
                                ///setting 1 environment variable
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                ///mysql query string
                                $mysqlquery="SELECT * FROM farmer WHERE name LIKE '%".$search."%'";


                                $returnobj=$conn->query($mysqlquery);
                                $returntable=$returnobj->fetchAll();


                                if($returnobj->rowCount()==0){
                                    ?>
                                        <tr>
                                            <td colspan="5">No values found</td>
                                        <tr>
                                    <?php
                                }
                                else{
                                    foreach($returntable as $row){
                                        ?>

                                        <tr>
                                            <td><?php echo $row['f_username'] ?></td>
                                            <td><?php echo $row['Name'] ?></td>
                                            <td><?php echo $row['Address'] ?></td>
                                            <td><?php echo $row['District'] ?></td>
                                            <td><?php echo $row['City'] ?></td>
                                            <td><?php echo "+880".$row['Contact_no'] ?></td>
                                        </tr>

                                        <?php
                                    }
                                }
                            }
                            catch(PDOException $ex){
                                ?>
                                    <tr>
                                        <td colspan="5">No values found</td>
                                    <tr>
                                <?php
                            }


                            ?>

                        </tbody>
                    </table>
                </div>

                <?php
                }
                else
                {
                ?>

                <div>
                <div style="font-size: 20px;margin: 10px;">All Product List</div>

                    <table id="ptable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Available Quantity</th>
                                <th>Price per Unit</th>
                                <th>Unit</th>
                                <th>Added Time</th>
                                <th>Farmer Name</th>
                                <th>Action</th>


                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            try{
                                ///PDO = PHP Data Object
                                $conn=new PDO("mysql:host=localhost:3306;dbname=eMarket;","root","");
                                ///setting 1 environment variable
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                ///mysql query string
                                $mysqlquery="SELECT * FROM product WHERE productName LIKE '%".$search."%'";

                                $returnobj=$conn->query($mysqlquery);
                                $returntable=$returnobj->fetchAll();




                                if($returnobj->rowCount()==0){
                                    ?>
                                        <tr>
                                            <td colspan="8">No values found</td>
                                        <tr>
                                    <?php
                                }


                                else{
                                    foreach($returntable as $row){
                                        ?>

                                        <tr>
                                            <td><?php echo $row['p_id'] ?></td>
                                            <td><?php echo $row['productName'] ?></td>
                                            <td>
                                                <img src="<?php echo $row['productImage'] ?>" width="150" height="150">
                                            </td>
                                            <td><?php echo $row['AvailableQuantity'] ?></td>
                                            <td><?php echo $row['Price_perUnit']." taka" ?></td>
                                            <td><?php echo $row['Unit'] ?></td>
                                            <td><?php echo $row['Added_date'] ?></td>
                                            <td><?php echo $row['f_username'] ?></td>

                                            <td>

                                                <?php if($role != 'farmer'){
                                                    ?>
                                                    <input id="button" type="button" value="Add to Cart" onclick="gotocart(<?php echo $row['p_id']?>, <?php echo $row['AvailableQuantity']?>);">
                                                    <?php
                                                }
                                                else if($row['f_username'] == $username){
                                                    ?>
                                                    <input id="button" type="button" value="My Products" onclick="myproduct();">
                                                    <?php
                                                }
                                                ?>


                                            </td>
                                        </tr>

                                        <?php
                                    }
                                }
                            }
                            catch(PDOException $ex){
                                ?>
                                    <tr>
                                        <td colspan="6">No values found</td>
                                    <tr>
                                <?php
                            }


                            ?>

                        </tbody>
                    </table>
                </div>

                <?php
                }
                ?>

               <br>




                <script>
                    function home(){
                        location.assign('home.php');   ///default GET method
                    }
                    function logoutfn(){
                        location.assign('logout.php');   ///default GET method
                    }

                    function profile(){
                        location.assign('profile.php');   ///default GET method
                    }

                    function uploadfn(){
                        location.assign('upload.php');
                    }

                    function cart(){
                        location.assign('cart.php');
                    }

                    function deletefn(pid){

                        location.assign('delete.php?prodid='+pid);
                    }

                    function gotocart(pid, high){
                        var amount = prompt("Enter the amount: ");
                        if (amount != "" && amount <= high){
                            location.assign('gotoCart.php?prodid='+pid+'&amount='+amount+'&high='+high);
                        }
                        else{
                            alert("Please enter a value less than "+high);
                        }
                    }

                    function notification(){
                        location.assign('notification.php');
                    }

                    function payhistory(){
                        location.assign('payhistory.php');
                    }

                    function myproduct()
                    {
                        location.assign('myproduct.php');
                    }

                    function product_entry(){
                location.assign('product_entry.php');
              }

              function allBid(){
                location.assign('b_bidRoom_All.php');
              }
                </script>


<div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Get in Touch</h2>
                            <div class="contact-info">
                            <p><i class="fa fa-map-marker"></i>21/D,100 Feet Road,Notun Bazar,Badda,Dhaka</p>
                                <p><i class="fa fa-envelope"></i>Agro_Tech@gmail.com</p>
                                <p><i class="fa fa-phone"></i>01826557650</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Follow Us</h2>
                            <div class="contact-info">
                                <div class="social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Company Info</h2>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms & Condition</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Purchase Info</h2>
                            <ul>
                                <li><a href="#">Payment Policy</a></li>
                                <li><a href="#">Shipping Policy</a></li>
                                <li><a href="#">Return Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="row payment align-items-center">
                    <div class="col-md-6">
                        <div class="payment-method">
                            <h2>We Accept:</h2>
                            <img src="img/bkash.png" alt="Payment Method" />
                        </div>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
        
        <!-- Footer Bottom Start -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 copyright">
                        <p>Copyright &copy; <a href="https://htmlcodex.com">HTML Codex</a>. All Rights Reserved</p>
                    </div>

                    <div class="col-md-6 template-by">
                        <p>Template By <a href="https://htmlcodex.com">HTML Codex</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->       
        
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>
        
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>

    <?php
}
else{
     ?>
        <script>alert("Search box is empty!");</script>
        <script>location.assign("home.php");</script>
    <?php
}


?>