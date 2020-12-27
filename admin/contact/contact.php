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
                        <div class="breadcrumb-item">Post</div>
                    </div>
                   
                </div>
                <div>
                </div>
                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                <h4>All Conatact</h4>
                                </div>
                                <p style="margin-left: 10px;">If you contact message delete then your reply message has delete</p>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped v_center" id="table-1">
                                            <thead>
                                                <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Date</th>
                                                <th>subject</th>
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
                                                            if($result['status'] == 0){

                                                            
                                                           
                                                ?>
                                            <tr>
                                                <td style="font-weight: bold;"><?php echo $i; ?></td>
                                                <td style="font-weight: bold;"><?php echo $result['cname']  ?></td>
                                                <td style="font-weight: bold;"><?php echo $result['email']  ?></td>
                                                <td style="font-weight: bold;"><?php echo $result['csubject']  ?></td>
                                                <td style="font-weight: bold;"><?php echo $fm->formatDate($result['date'])  ?></td>
                                                <td>
                                                     <a href="view.php?contactid=<?php echo $result['id'] ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                     <a href="reply.php?contactid=<?php echo $result['id'] ?>" class="btn btn-success"><i class="fas fa-reply"></i></a>
                                                     <a href="deletecn.php?contactid=<?php echo $result['id'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                </td>
                                                  
                                            </tr>
                                            <?php
                                                            }else{
                                                                ?>

                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $result['cname']  ?></td>
                                                <td><?php echo $result['email']  ?></td>
                                                <td><?php echo $result['csubject']  ?></td>
                                                <td><?php echo $fm->formatDate($result['date'])  ?></td>
                                                <td>
                                                     <a href="view.php?contactid=<?php echo $result['id'] ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                     <a href="reply.php?contactid=<?php echo $result['id'] ?>" class="btn btn-success"><i class="fas fa-reply"></i></a>
                                                     <a href="deletecn.php?contactid=<?php echo $result['id'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                </td>
                                                  
                                            </tr>


                                                            <?php


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