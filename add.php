<?php
session_start();
include 'header.php';
$sql = "select * from employee";
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
              <a href="logout.php" data-toggle="ajaxModal" >Logout</a>
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
                <small>Welcome back, <?php echo $_SESSION['email'];?></small>
              </div>
              <div class="row">
                <div class="col-sm-10">
                  <form data-validate="parsley" action="addemployee.php" method="POST">
                    <section class="panel panel-default">
                      <header class="panel-heading">
                        <span class="h4">Add an employee</span>
                      </header>
                      <div class="panel-body">
                        <p class="text-muted">Please fill the information to continue</p>
                        <div class="form-group">
                          <label>Employee First Name</label>
                          <input type="text" name="emp_first_name" class="form-control" placeholder="First Name" data-required="true">                        
                        </div>
                        <div class="form-group">
                          <label>Employee Last Name</label>
                          <input type="text" name="emp_last_name" class="form-control" placeholder="Last Name" data-required="true">                        
                        </div>
                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" name="emp_email" class="form-control" data-type="email" placeholder="email" data-required="true">                        
                        </div>
                        <div class="form-group">
                          <label>Date of birth</label>
                          <input type="text" name="emp_dob" class="input-sm input-s datepicker-input form-control" data-date-format="yyyy-mm-dd" data-type="phone" placeholder="Date" data-required="true">
                        </div>
                        <div class="form-group">
                          <label>Job Title</label>
                          <input type="text" name="emp_job_title" class="form-control" data-type="phone" placeholder="Job Title" data-required="true">
                        </div>
                        <div class="form-group">
                          <label>Salary</label>
                          <input type="text" name="emp_salary" class="form-control" data-type="phone" placeholder="Salary" data-required="true">
                        </div>
                      </div>
                      <footer class="panel-footer text-right bg-light lter">
                        <button type="submit" class="btn btn-success btn-s-xs">Add This Employee</button>
                      </footer>
                    </section>
                  </form>
                </div>
              </div>
            </section>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
      </section>
    </section>
  </section>
  <?php include 'footer.php';?>