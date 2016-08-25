<?php 
session_start();
if(isset($_SESSION['sid']) ){
	if($_SESSION['sid']==session_id())
	header('Location: employeeList.php');
}
include 'header.php';

?>
  <body>
  <section id="content" class="m-t-lg wrapper-md animated fadeInUp">    
    <div class="container aside-xxl">
      <a class="navbar-brand block" href="index.html">Notebook</a>
      <section class="panel panel-default bg-white m-t-lg">
        <header class="panel-heading text-center">
          <strong>Sign in</strong>
        </header>
        <?php if(isset($_REQUEST['error']) && $_REQUEST['error']==1){ echo '<span class="error">Either Email Or password is wrong!</span>';}?>
        <form action="login.php" class="panel-body wrapper-lg" method="post">
          <div class="form-group">
            <label class="control-label">Email</label>
            <input type="email" name="email" placeholder="test@example.com" class="form-control input-lg">
          </div>
          <div class="form-group">
            <label class="control-label">Password</label>
            <input type="password" name="password" id="inputPassword" placeholder="Password" class="form-control input-lg">
          </div>
          <a href="#" class="pull-right m-t-xs" id="forgotPass"><small>Forgot password?</small></a>
          <button type="submit" class="btn btn-primary">Sign in</button>
        </form>
      </section>
    </div>
  </section>
  <!-- footer -->
  <?php include 'footer.php';?>