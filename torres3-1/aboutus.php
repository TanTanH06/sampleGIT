<?php
    require_once "includes/dbconnect.php"; 
    $selID=0;
    $titulo=NULL;   
    $laman=NULL;
    if(isset($_GET['editid'])){
        try{
            $selID=$_GET['editid'];
            $selSQL="SELECT * FROM aboutus WHERE md5(aboutid)=?";
            $selData=array($selID);
            $stmtSel=$con->prepare($selSQL);
            $stmtSel->execute($selData);
            if($stmtSel->rowCount()!=0){
            $rowSel=$stmtSel->fetch();
            $titulo= ($rowSel[1]);
            $laman= ($rowSel[2]);
            }
        }catch(PDOException $th){
            echo $th->getMessage();
        }
            

    //     try{
    //         $sqlLoad = "SELECT * FROM aboutus WHERE aboutid=?";
    //         $dataLoad = array($_GET['editid']);
    //         $stmtLoad = $con->prepare($sqlLoad);
    //         $stmtLoad->execute($dataLoad);
    //         $rowLoad = $stmtLoad->fetch();
    //         $title = $rowLoad[1];
    //         $content = $rowLoad[2];
    //     } catch(\Throwable $th) {
    //         //throw $th;
    // }
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
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
    <!-- header -->
    <?php require_once("includes/header.php") ?>
    <!-- end of header -->
        <div id="layoutSidenav">
            <!-- sidenav -->
            <?php require_once("includes/sIdenav.php") ?>
            <!--  -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">About us</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Data Entry</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                This page allows end-user to facilitate adding, updating, and deleting ABOUT US.
                                <div class="d-grid gap-2 d-md-block">
                                    <button class="btn btn-primary"  type="button"></a>Add new Record</button>
                                </div>
                            </div>
                        </div>

                        <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Records</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Data Entry</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="card-body">
                                        <table id="datatablesSimple">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Title</th>
                                                    <th>Content</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Title</th>
                                                    <th>Content</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                            <?php
                                                $sqlAbout="SELECT aboutid,atitle,acontent,md5(aboutid) FROM aboutus";
                                                $stmtAbout=$con->prepare($sqlAbout);
                                                $stmtAbout->execute();
                                                $strTable="";
                                                while($row=$stmtAbout->fetch()){
                                                    $strTable.="<tr>";
                                                    $strTable.="<td>{$row[0]}<td>";
                                                    $strTable.="<td>{$row[1]}<td>";
                                                    $content=substr(nl2br($row[2]),0,500);
                                                    $strTable.="<td>{$content}...<td>";
                                                    
                                                    $strDelButton="<button class='btn btn-warning' title='Delete Record'>
                                                    <a href='saveabout.php?delid={$row[3]}'>
                                                    <i class= 'bx bxs-trash-alt'></i>
                                                    </a>
                                                    </button>";

                                                    $strEditButton= "<button class='btn btn-info' title=' Edit Record'> 
                                                    <a href='aboutus.php?editid={$row[3]}'>                              
                                                    <i class='bx bx-message-square-edit'></i>
                                                    </a>
                                                    </button>";
                                                    
                                                    $strTable.="<td><div style='white-space:nowrap'>{$strDelButton} {$strEditButton}</div><td>";
                                                    $strTable.="</td>";
                                                    
                                                }
                                                echo $strTable;
                                                ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="data-tab" tabindex="0">
                        <br>
                        <h3>Data Entry :</h3>
                                            
                            <form action="saveabout.php" method="POST">
                            <input type="hidden" class="form-control" name="txtid" id="txtid" required
                            value='<?php echo htmlspecialchars($rowSel[0]); ?>'>

                            <div class="mb-3">
                                <label for="txtTitle" class="form-label">Title :</label>
                                <input type="text" class="form-control" name="txtTitle" id="txtTitle" 
                                required value='<?php echo htmlspecialchars($titulo); ?>'>
                                    </div>
                    
                                    <div class="mb-3">
                                        <label for="txtContent" class="form-label">Content :</label>
                                        <textarea class="form-control" name="txtContent" id="txtContent" rows="3"
                                        required><?php echo htmlspecialchars($laman); ?></textarea>
                                    </div> 
                                    <button type="submit" class="btn btn-success">Submit</button>

                            </form>

                </main>
                <!-- footer -->
                <?php require_once "includes/footer.php" ?>
                <!--  -->
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
