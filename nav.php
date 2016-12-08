<?php

?>

<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" style="padding-top:5px;" href="#page-top"><img src="img/logo2.png" id="pagelogo" alt="Relationship Repo"/></a>
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
                    <a href="/packages.php">Services</a>
                </li>
                <li>
                    <a href="/login.php"><strong>Login</strong></a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<script>
// jQuery for Logo swap

$( window ).scroll(function() {
     if($(window).scrollTop() > 150){
       $('#pagelogo').fadeTo('fast', 0, function(){
         $('#pagelogo').attr("src","img/logo3.png");
       });

});

</script>
