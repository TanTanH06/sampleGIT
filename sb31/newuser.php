<?php 
   session_start();
   require_once("includes/dbconnect.php");
   if(!(isset($_COOKIE['UID']))){
       header("location:login.php");
   }
$uid=0;
$uname="";
$isActive="";
if(isset($_GET['editid'])){
    try {
        $id=$_GET['editid'];
        $sql="SELECT * FROM users WHERE md5(userID)=?";
        $data=array($id);
        $result=$con->prepare($sql);
        $result->execute($data);
        if($result->rowCoUnt()!=0){
             $row=$result->fetch();
             $uid=$row['userID'];
             $uname=$row['userName'];
             $isActive=$row['isActive'];
        }
    } catch (PDOException $th) {
        echo $th->getMessage();
    }
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>User - Add New</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php require_once("includes/header.php");?>
        <div id="layoutSidenav">
        <?php require_once("includes/sidenav.php");?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">User Accounts</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="users.php">User Accounts</a></li>
                            <li class="breadcrumb-item active">New User</li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Please enter all necessary information
                            </div>
                            <div class="card-body">
                                <form action="saveuser.php" method="post">
                                    <div class="mb-3">
                                        <input type="hidden" name="txtID" value="<?=$uid?>">
                                        <label for="txtUname" class="form-label">Username</label>
                                        <input type="text" class="form-control" name="txtUname" placeholder="Enter Username" required value="<?=$uname; ?>" require>
                                    </div>
                                    <div class="mb-3">
                
                                        <label for="txtpw" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="txtpw" placeholder="Enter Password"   require>
                                    </div>
                                    <div class="mb-3">
                                       
                                        <input class="form-check-input" type="checkbox"  name="chkActive" checker>
                                        <label class="form-check-label" for="flexCheckChecked">
                                            isActive
                                        </label>
                                    </div>
                                    <div class="mb-3">
                                        <button type="reset" class="btn btn-warning">Reset</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
                <?php require_once("includes/footer.php") ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
