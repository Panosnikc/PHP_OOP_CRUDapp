<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>

    <!-- Latest bootstrap 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Custom css -->
    <link rel="stylesheet" href="libs/css/custom.css" />

</head>
<body>
     <!-- container 
    <div class="container">  -->
        <!-- Header & nav bar -->
<header class="header">
  <div class="header-inner">
    <div class="header-logo">
      <a href="#" style="width:200px;">Company Logo</a>
    </div>
        
    <div class="header-right">
    	<a href="#Log in" class="" >Log in</a>
        <a href="#Sign up" class="">Sign up</a>
    </div>
  </div>
  
  <!-- nav-bar -->
  <nav class="header-nav" style="">
   <div class="header-nav-nav" style="">
    <a href="index.php">Home</a>
    <a href="#rent">For Rent</a>
    <!-- <a href="#sell">Sell</a> -->
    <a href="#about" class="rigtc" style="">About us</a>
	
    <!-- Create a button that create product and send us to create-ad.php -->
    <?php
      echo "<a href='create-ad.php' style='border-style:none;float:right;' class='btn btn-outline-primary'>+ Create AD</a>";
    ?>
   

    </div>
  </nav>
</header>


        <?php
        // show page header
        echo "<div class='page-header' style='margin:auto;width:72%;'>
                <h1>{$page_title}</h1>
            </div>";
        ?>

<!-- main -->
<main class="">

 