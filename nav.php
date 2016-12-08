<?php

?>

<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" style="padding-top:5px;" href="#page-top">
              <img src="img/logo3.png" id="tinylogo" alt="Relationship Repo"/>
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

//$( window ).scroll(function() {
     //if($(this).scrollTop() > 100){
       //$('#pagelogo').fadeOut("fast", function(){
        // $('#pagelogo').attr("src","img/logo3.png").fadeIn('fast');
      // });
     //}
       //$('#pagelogo').attr("src","img/logo2.png");
      //else {
       //$('#pagelogo').fadeOut("fast").attr("src","img/logo3.png").fadeIn('fast').stop(true);
     //}

//});


$(function(){
    $(window).scroll(function(){
        if($(this).scrollTop() > 120) {
            $('#pagelogo')
              .animate({
                opacity: 0.1,
                height: 0
              }, 200);
              $('#tinylogo')
                .fadeIn(600);
        }
    });
});

</script>
