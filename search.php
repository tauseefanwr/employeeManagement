<?php
session_start();
include 'checkLogin.php';
include 'header.php';
$condition = "";
if(isset($_POST['search'])){
	if(isset($_POST['emp_first_name']) && $_POST['emp_first_name']!=""){
		$name = $_POST['emp_first_name'];
		$condition .= " emp_first_name = '".$name."' ";
	}if(isset($_POST['emp_id']) && $_POST['emp_id']!=""){
		$emp_id = $_POST['emp_id'];
		
		if(isset($_POST['emp_first_name']) && $_POST['emp_first_name']!=""){
			$condition .= "AND emp_id = '".$emp_id."' ";
		}else{
			$condition .= "emp_id = '".$emp_id."' ";
		}
	}
$sql = "select * from employee where ".$condition." ";
}else{
	$sql = "select * from employee ";	
}
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
                <h3 class="m-b-none">Workset</h3>
                <small>Welcome back, <?php echo $_SESSION['email'];?></small>
              </div>
              <div style="margin-top:1%;color:green">
<?php if(isset($_REQUEST['msg'])){?>
	<span class="errorSuccess" style="display: block;"><?php echo $_REQUEST['msg'];?></span>
<?php }?>
</div>
              <div class="row">
                <div class="col-sm-12">
                  <form data-validate="parsley" action="search.php" method="POST">
                    <section class="panel panel-default">
                    <div style="margin-left:5%;">
	                    Fill any one of these search field
                    </div>
	                    <span style="margin-left:5%;" class="error" id="searchValidation"></span>
                      <div class="panel-body">
                        <div class="form-group col-sm-3">
                          <label>Employee Name</label>
                          <input type="text" name="emp_first_name" id="firstName"class="form-control" placeholder="First Name" data-required="true">                        
                        	<span class="error" id="firstName_error"></span>
                        </div>
                        <div class="form-group col-sm-3">
                          <label>Employee Id</label>
                          <input type="text" name="emp_id" id="idEmp" class="form-control" placeholder="Employee Id" data-required="true">                        
                          <span class="error" id="idEmp_error"></span>
                        </div>
                        <div class="form-group col-sm-3">
                          <button type="submit" id="searchEmployee"name="search" class="btn btn-success btn-s-xs" style="margin-top:9%">Search Employee</button>
                        </div>
                      </div>
                      
                    </section>
                  </form>
                </div>
              </div>
              <section class="panel panel-default">
                <header class="panel-heading">
                  Employees
                  <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                </header>
                <div class="table-responsive">
                  <table class="table table-striped m-b-none" data-ride="datatables">
                    <thead>
                      <tr>
                        <th width="20%">Employee Id</th>
                        <th width="25%">Employee Name</th>
                        <th width="25%">Employee Email</th>
                        <th width="10%">Job Title</th>
                        <th width="10%">Salary</th>
                        <th width="10%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    	if ($result->num_rows > 0) {
    					while($row = $result->fetch_assoc()) {?>
                    <tr>
                        <td width="20%"><?php echo $row['emp_id'];?></td>
                        <td width="25%">
                       		<a href="profile.php?emp_id=<?php echo $row['emp_id'];?>"><?php echo $row['emp_first_name'].' '.$row['emp_last_name'];?></a>
                        </td>
                        <td width="25%"><?php echo $row['emp_email'];?></td>
                        <td width="10%"><?php echo $row['job_title'];?></td>
                        <td width="10%"><?php echo $row['salary'];?></td>
                        <td width="10%">
                        	<a href="profile.php?emp_id=<?php echo $row['emp_id'];?>" data-toggle="tooltip" title="" style="" data-original-title="View Profile"><i class="fa fa-search pull-left text"></i></a>|
	                        <a href="edit.php?emp_id=<?php echo $row['emp_id'];?>" data-toggle="tooltip" title="" style="" data-original-title="Edit"><i class="fa fa-pencil  text"></i></a>|
	                        <a href="delete.php?emp_id=<?php echo $row['emp_id'];?>" data-toggle="tooltip" class="delete" title="" style="" data-original-title="Delete"><i class="  pull-right fa fa-times text-danger text"></i></a>
                        </td>
                      </tr>
                      <?php }}?>
                    </tbody>
                  </table>
                    <?php if(!$result->num_rows > 0){echo"No employees found in the database";}?>
                </div>
              </section>
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
	  $("#searchEmployee").click(function(){
		  var empName = $("#firstName").val();
		  var empId = $("#idEmp").val();
		  if(empName == "" && empId == ""){
			  $("#searchValidation").text("Please provide atleast employee name or employee id");
			  return false;
		  }else{
			  $("#searchValidation").text();
		  }
		  if(isNaN(empId)){
			  $("#idEmp_error").text("Please provide number only");
			  return false;
			}
		  if(!isNaN(empName) && empName!=""){
			  $("#firstName_error").text("Please provide text only");
			  return false;
		}
	  });
  </script>