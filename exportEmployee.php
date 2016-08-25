<?php
session_start();
include 'header.php';

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
                <h3 class="m-b-none">Workset</h3>
                <small>Welcome back, <?php echo $_SESSION['email'];?></small>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <form data-validate="parsley" action="export.php" method="POST">
                    <section class="panel panel-default">
                    <div style="margin-left:5%;">
	                    Fill any one of these search field
                    </div>
                      <div class="panel-body">
                        <div class="form-group col-sm-3">
                          <label>Enter Salary</label>
                          <input type="number" name="salary" class="form-control" placeholder="Enter Salary" data-required="true">                        
                        </div>
                        <div class="form-group col-sm-3">
                          <button type="submit" name="export" class="btn btn-success btn-s-xs" style="margin-top:9%">Export Employees Data</button>
                        </div>
                      </div>
                      
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
  <script>
  $(".delete").click(function(delt)
			{
			var href= $(this).attr("href") ;
			if (window.confirm("Sure!! "+"you want to delete this employee?" )) {
				  window.location.href = href ; 	
				}
			return false ;
				}
		);
	  
  </script>