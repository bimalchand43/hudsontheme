<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <?php wp_head();?>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
    
  .carousel-inner img {
      width: 100%; /* Set width to 100% */
      margin: auto;
      min-height:200px;
  }

  /* Hide the carousel text when the screen is less than 600 pixels wide */
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; 
    }
  }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <?php if ( is_user_logged_in() ) {
      global $current_user;
      //get_currentuserinfo();
      //$current_user = wp_get_current_user();
      ?>
    <li><a href="#"><a href="#">Hi <?php echo $current_user->user_firstname; ?></a></li>
    <li><a href="<?php echo wp_logout_url(); ?>"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li> 
    <li><a href="<?php bloginfo('url'); ?>/update-user/"><span class="glyphicon glyphicon-log-in"></span> Change Password</a></li> 
    <li><a href="<?php bloginfo('url'); ?>/handle-user-form/"><span class="glyphicon glyphicon-log-in"></span> Submit Query</a></li>
     <li><a href="<?php bloginfo('url'); ?>/show-all-query/"><span class="glyphicon glyphicon-log-in"></span> Show All Query</a></li>
          <?php }else{ ?>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
         <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>Sign up</a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>