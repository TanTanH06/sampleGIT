<?php 
require_once("includes/dbconnect.php");
$aid=0;
$title="";
$content="";
if(isset($_GET['editid'])){
    try {
        $id=(int)$_GET['editid'];
        $sql="SELECT * FROM aboutus WHERE id=?";
        $data=array($id);
        $result=$con->prepare($sql);
        $result->execute($data);
        if($result->rowCoUnt()!=0){
             $row=$result->fetch();
             $aid=$row['id'];
             $title=$row['atitle'];
             $content=$row['acontent'];
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
        <title>Tables - SB Admin</title>
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
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                                .
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <form action="saveaboutus.php" method="post">
                                    <div class="mb-3">
                                        <input type="hidden" name="txtID" value="<?=$aid?>">
                                        <label for="txtTitle" class="form-label">Title</label>
                                        <input type="text" class="form-control" name="txtTitle" placeholder="Enter title" required value="<?=$title; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtContent" class="form-label">Content</label>
                                        <textarea class="form-control" name="txtContent" rows="5" placeholder="Enter content" required><?=$content; ?></textarea>
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
