<?php
session_start();
include 'checkLogin.php';
include 'header.php';
if(isset($_REQUEST['emp_id'])){
	$emp_id = $_REQUEST['emp_id'];
}
$sql = "select * from employee where emp_id = ".$emp_id." ";
$result = $conn->query($sql);
?>
<section class="vbox">
    <header class="bg-dark dk header navbar navbar-fixed-top-xs">
      <div class="navbar-header aside-md">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
          <i class="fa fa-bars"></i>
        </a>
        <a href="#" class="navbar-brand" data-toggle="fullscreen">Employee </a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user">
          <i class="fa fa-cog"></i>
        </a>
      </div>
      <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="thumb-sm avatar pull-left">
              <img src="images/avatar.jpg">
            </span>
            <?php echo $_SESSION['email'];?> <b class="caret"></b>
          </a>
          <ul class="dropdown-menu animated fadeInRight">
            <li>
              <a href="logout.php">Logout</a>
            </li>
          </ul>
        </li>
      </ul>      
    </header>
    <section>
      <section class="hbox stretch">
        <!-- .aside -->
        <?php include 'left_bar.php';?>
        <!-- /.aside -->
        <section id="content">
          <section class="vbox">          
            <section class="scrollable padder">
              <div class="m-b-md">
                <h3 class="m-b-none">Workset</h3>
                <small>Welcome back, <?php echo $_SESSION['email'];?></small>
              </div>
              <div style="margin-top:10%;">
<?php if(isset($_REQUEST['msg'])){
	echo $_REQUEST['msg'];
}?>
</div>
              <?php  if ($result->num_rows > 0) {
    					while($row = $result->fetch_assoc()) {?>
              <section class="panel panel-default">
                <header class="panel-heading">
                  <?php echo ucfirst($row['emp_first_name'].' '.$row['emp_last_name']);?>
                  <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                </header>
                <div class="table-responsive">
                  <div class="row">
                <div class="col-lg-8">
                  <div class="row">
                    <div class="col-sm-6">
                      <section class="panel panel-default">
                        <header class="panel-heading bg-danger lt no-border">
                          <div class="clearfix">
                            <a href="#" class="pull-left thumb avatar b-3x m-r">
                              <img src="images/avatar.jpg" class="img-circle">
                            </a>
                            <div class="clear">
                              <div class="h3 m-t-xs m-b-xs text-white">
                               <?php echo ucfirst($row['emp_first_name'].' '.$row['emp_last_name']);?>
                               <a href="edit.php?emp_id=<?php echo $row['emp_id'];?>" >
                                <i class="fa fa-pencil text-white pull-right text-xs m-t-sm" data-toggle="tooltip" title="" style="" data-original-title="Edit Profile"></i>
                               </a>
                              </div>
                              <small class="text-muted"><?php echo ucfirst($row['job_title']);?></small>
                            </div>                
                          </div>
                        </header>
                        <div class="list-group no-radius alt">
                          <a class="list-group-item" href="#">
                            <span class="badge bg-success">
<?php 
	$from = new DateTime($row['emp_dob']);
	$to   = new DateTime('today');
	echo $from->diff($to)->y." Years";
?>
</span>
                            <i class="fa fa-comment icon-muted"></i> 
                            Age
                          </a>
                          <a class="list-group-item" href="#">
                            <span class="badge bg-info"><?php echo $row['emp_email'];?></span>
                            <i class="fa fa-envelope icon-muted"></i> 
                            Email
                          </a>
                          <a class="list-group-item" href="#">
                            <span class="badge bg-light"><?php echo ucfirst($row['job_title']);?></span>
                            <i class="fa fa-eye icon-muted"></i> 
                            Job Title
                          </a>
                        </div>
                      </section>
                    </div>
                  </div>
                </div>
              </div>
                </div>
              </section>
              <?php }}?>
            </section>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
      </section>
    </section>
  </section>
   <?php include 'footer.php';?>
