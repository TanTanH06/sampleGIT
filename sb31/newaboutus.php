<?php 
    require_once("includes/dbconnect.php");
    $id="";
    $title="";
    $content="";
    if(isset($_GET['editid'])){
        try {
            $sql="SELECT * FROM aboutus WHERE id=?";
            $id=(int)$_GET['editid'];
            $stmt=$con->prepare($sql);
            $data=array($id);
            $stmt->execute($data);
            $row=$stmt->fetch();
            $id=$row['id'];
            $title=$row['atitle'];
            $content=$row['acontent'];
        } catch (PDOException $e) {
            echo $e->getMessage();
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
        <title>About Us</title>
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
                        <h1 class="mt-4">About Us Data Entry</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="aboutus.php">About Us</a></li>
                            <li class="breadcrumb-item active">New About Us Record </li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Entry :
                            </div>
                            <div class="card-body">
                                <form action="saveaboutus.php" method="post">
                                    <input type='hidden' name="txtid" value="<?=$id;?>">
                                    <div class="mb-3">
                                        <label for="txtTitle" class="form-label">Title</label>
                                        <input type="text" class="form-control" name="txtTitle" placeholder="Enter title" required value="<?=$title?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtContent" class="form-label">Content</label>
                                        <textarea class="form-control" name="txtContent" rows="5" placeholder="Enter content" required><?=$content;?></textarea>
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
