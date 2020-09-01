<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <!-- Latest bootstrap 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <!-- our custom CSS -->
    <link rel="stylesheet" href="libs/css/custom.css" />

    <style>
    th {width: 150px;} 
	
	.left-margin {margin:0 .5em 0 0;}
  
	.right-button-margin {
      margin: 0 0 1em 0;
      overflow: hidden;
	}
  
	/* some changes in bootstrap modal */
	.modal-body {
	  padding: 20px 20px 0px 20px !important;
      text-align: center !important;
	}
  
	.modal-footer {text-align: center !important;}
   </style>
</head>
<body>
     <!-- container -->
    <div class="container">
 
        <?php
        // show page header
        echo "<div class='page-header'>
                <h1>{$page_title}</h1>
            </div>";
        ?>
