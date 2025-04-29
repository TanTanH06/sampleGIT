<?php 
    require_once("includes/dbconnect.php");
    $selID=0;
    $title=NULL;
    $author=NULL;
    $date_posted=NULL;
    $laman=NULL;
    if(isset($_GET['editid'])){
        try {
            $selID=$_GET['editid'];
            $selSQL="SELECT * FROM news WHERE md5(newsID)=?";
            $selData=array($selID);
            $stmtSel=$con->prepare($selSQL);
            $stmtSel->execute($selData);
            if($stmtSel->rowCount()!=0){
                $rowSel=$stmtSel->fetch();
                $regularID=$rowSel[0];
                $title=$rowSel[1];
                $date_posted=$rowSel[2];
                $author=$rowSel[3];
                $laman=$rowSel[4];
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
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <!-- Start of Header  -->
        <?php require_once("includes/header.php")?>
        <!-- End of Header -->
        <div id="layoutSidenav">
            <!-- Start of Menu  -->
            <?php require_once("includes/menu.php");?>
             <!-- End of Menu  -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">News</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">News</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <p>This page allows end-user to facilitate adding, modifying, updating, and deleting NEWS record.</p>
                                <button class="btn btn-primary">Add New Record</button>
                            </div>
                        </div>
<!-- Nav tabs -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Records</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Data Entry</button>
  </li>
  
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
  <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                About Us - Records
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" style="table-layout: auto !important">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Date Posted</th>
                                            <th>Content</th>
                                            <th>Picture</th>
                                            <th style='max-width:100%;white-space:nowrap !important'>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Date Posted</th>
                                            <th>Content</th>
                                            <th>Picture</th>
                                            <th style='max-width:100%;white-space:nowrap !important'>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $sqlAbout="SELECT newsID,title,date_posted,author,content,image,md5(newsID) FROM news";
                                            $stmtAbout=$con->prepare($sqlAbout);
                                            $stmtAbout->execute();
                                            $strTable="";
                                            while($row=$stmtAbout->fetch()){
                                                $strTable.="<tr>";
                                                $strTable.="<td>{$row[0]}</td>";//id
                                                $strTable.="<td>{$row[1]}</td>";//title
                                                $strTable.="<td>{$row[3]}</td>";//author
                                                $strTable.="<td>{$row[2]}</td>";//datePosted
                                                #$content=substr($row[2],0,300);
                                                $content=substr(nl2br($row[4]),0,500);
                                                $strTable.="<td>{$content}...</td>";
                                                //  if(strlen($row[5])==0){
                                                //      $pic="nopic.jpg";
                                                //  }else{
                                                //      $pic=$row[5];
                                                //  }
                                                $pic=strlen($row[5])==0?"nopic.jpg":$row[5];
                                                $strTable.="<td><img src='uploads/news/{$pic}' width='100px'></td>";//image
                                                $strDelButton="<button class='btn btn-warning' title='Delete Record'>
                                                                <a href='savenews.php?delid={$row[6]}'>
                                                                    <i class='bx bxs-trash-alt'></i>
                                                                </a>
                                                                </button>";
                                                $strEditButton="<button class='btn btn-info' title='Edit Record'>
                                                                <a href='news.php?editid={$row[6]}'>
                                                                    <i class='bx bxs-message-square-edit'></i>
                                                                </a>
                                                                </button>";
                                                $strTable.="<td><div style='white-space:nowrap'>{$strDelButton} {$strEditButton}</div></td>";
                                                //$strTable.="</td>";
                                            }
                                            echo $strTable;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
  </div>
<div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
        <div class="row">
            <div class="col col-12 m-5">
                <h3>Data Entry : </h3>
                    <form action="savenews.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            
                            <input type="hidden" name="txtid" value="<?=$selID?>">
                            <label for="txtTitle" class="form-label">Title : </label>
                            <input type="text" class="form-control" name="txtTitle" required value='<?=$title; ?>'/>
                        </div>
                        <div class="row">
                            <div class="col col-lg-6">
                                <div class="mb-3">
                                    <label for="txtAuthor" class="form-label">Author : </label>
                                    <input type="text" class="form-control" name="txtAuthor" required value='<?=$author; ?>'/>
                                </div>
                            </div>
                            <div class="col col-lg-6">
                                <div class="mb-3">
                                    <label for="txtAuthor" class="form-label">Date Posted : </label>
                                    <input type="date" class="form-control" name="dtDate" required value='<?=$date_posted; ?>'/>
                                </div>
                            </div>

                        </div>
                        <div class="mb-3">
                            <label for="txtStory" class="form-label">Story :</label>       
                            <textarea class="form-control" name="txtStory" rows="5" required><?=$laman;?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="txtStory" class="form-label">Image : </label>       
                            <input type="file" name="picture" accept="image/*">                        
                        </div>
                        <input type="submit" value="Submit">
                    </form>
            </div>
            
        </div>
        

</div>
  
  
</div>



                        
                    </div>
                </main>
                <!-- Start of Footer  -->
                <?php require_once("includes/footer.php");?>
                <!-- End of Footer -->
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
