<?php
include_once("../includes/header.php");
$userRole = $_SESSION['userRole'];
if($userRole != 1){
    echo " <script> window.location = '../index.php'; </script>";
}


?>

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <!-- Start app main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Page</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="index.php">Dashboard</a></div>
                        <div class="breadcrumb-item">Reply Message</div>
                    </div>
                   
                </div>
                <div>
                </div>
                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                <h4>All Reply</h4>
                                </div>
                                <p style="margin-left: 10px;">If you  reply message  message delete then your contact has delete</p>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped v_center" id="table-1">
                                            <thead>
                                                <tr>
                                                <th>Id</th>
                                                <th>Form</th>
                                                <th>To </th>
                                                <th>subject</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>   <?php
                                                    $query = "SELECT * FROM contact ORDER BY id  DESC";
                                                    $contact = $db->selectDT($query);
                                                    if($contact){
                                                        $i = 0;
                                                        while($result = $contact->fetch_assoc()){
                                                            $i++;
                                                            if($result['rstauts'] == 3){

                                                            
                                                            
                                                ?>
                                            <tr>
                                                <td style="font-weight: bold;"><?php echo $i; ?></td>
                                                <td style="font-weight: bold;"><?php echo $result['rfrom']  ?></td>
                                                <td style="font-weight: bold;"><?php echo $result['email']  ?></td>
                                                <td style="font-weight: bold;"><?php echo $result['rsubject']  ?></td>
                                                <td style="font-weight: bold;"><?php echo $fm->formatDate($result['date'])  ?></td>
                                                <td>
                                                     <a href="rview.php?contactid=<?php echo $result['id'] ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                     <a href="deletecn.php?contactid=<?php echo $result['id'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                </td>
                                                  
                                            </tr>
                                            <?php
                                                            }else if($result['rstauts'] == 4){
                                                                ?>

                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $result['rfrom']  ?></td>
                                                <td><?php echo $result['email']  ?></td>
                                                <td><?php echo $result['rsubject']  ?></td>
                                                <td><?php echo $fm->formatDate($result['date'])  ?></td>
                                                <td>
                                                     <a href="rview.php?contactid=<?php echo $result['id'] ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                     <a href="deletecn.php?contactid=<?php echo $result['id'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                </td>
                                                  
                                            </tr>


                                                            <?php


                                                            }else{
                                                               
                                                            }
                                                        }
                                                    }
                                            
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    <?php
     include_once("../includes/footter.php");
     
     
     ?>    