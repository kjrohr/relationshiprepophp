<?php
  session_start();
?>

<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" style="padding-top:5px;" href="/index.php">
              <img src="img/logo2.png" id="pagelogo" alt="Relationship Repo"/>
              </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li>
                  <a href="/index.php">Home</a>
              </li>
              <li>
                  <a href="/aboutus.php">About Us</a>
              </li>
                <li>
                    <a href="/agents.php">Agents</a>
                </li>
                  <?php
                    if (isset($_SESSION['user'])){
                      // is logged in
                      ?>
                    <li>
                      <a href="/dashboard.php">My Account</a>
                    </li>
                      <?php
                    }
                  ?>

                <li>
                  <?php
                    if (isset($_SESSION['user'])){
                      // is logged in
                      ?>
                      <a href="logout.php?logout"><strong>Logout</strong></a>
                      <?php
                    }
                    else {
                      // is not logged in
                      ?>
                      <a href="/login.php"><strong>Login</strong></a>
                      <?php
                    }
                  ?>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<script>
// jQuery for Logo swap
var logoChanged = false;
$( window ).scroll(function() {
     if($(this).scrollTop() > 10 && !logoChanged){
     logoChanged = true;
      $('#pagelogo').fadeOut("fast", function(){
        $('#pagelogo').attr("src","img/logo3.png").fadeIn('fast');
      });
    } else if ($(this).scrollTop() == 0 && logoChanged) {
      logoChanged=false;
      $('#pagelogo').fadeOut("fast", function(){
        $('#pagelogo').attr("src","img/logo2.png").fadeIn('fast');
      });
    }
      //  $('#pagelogo').attr("src","img/logo2.png");
    //   else {
    //    $('#pagelogo').fadeOut("fast").attr("src","img/logo3.png").fadeIn('fast').stop(true);
    //  }

});

</script>
