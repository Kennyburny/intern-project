<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{
   
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UCU Phone System</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
       <?php include_once('includes/sidebar.php');?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->

                    <!-- Topbar Navbar -->
  <?php include_once('includes/topbar.php');?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
 <h1 class="h3 mb-0 text-gray-800"><?php echo ucwords($_SESSION['username']);?>'s Phone extension and other phone extensions</h1>
                    </div>

                    <div class="row">

                        <div class="col-lg-12">




                            <!-- Default Card Example -->
                         

             <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                 
                 <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Username</th>
                                            <th>Office_Name</th>
                                             <th>Email</th>
                                              <th>Phone Extension</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                               <?php  
                                                                            
$con->next_result();  
$sql=mysqli_query($con,"call sp_allregisteredusers()") ;
$cnt=1; 
while($result=mysqli_fetch_array($sql) )
{ ?>
        
                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo $result['Username'];?></td>
                                            <td><?php echo $result['Office_Name'];?></td>
                                            <td><?php echo $result['Email'];?></td>
                                            <td><?php echo $result['Phone'];?></td>

                                           

        
    </td>
                                           
                                        </tr>
 <?php $cnt++;
                            } ?>
                                     </tbody>
                                </table>
                            </div>
                        </div>
<?php } ?>
                    </div>
                </div>
            </div>
        </div>


                         
            <!-- End of Main Content -->

            <!-- Footer -->
     <?php include_once('includes/footer.php');?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
     <?php include_once('includes/logout-modal.php');?>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>
<?php  ?>