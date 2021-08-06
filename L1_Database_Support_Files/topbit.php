<!DOCTYPE HTML>

<html lang="en">

<?php

        session_start();
        include("config.php");
        include("functions.php");

        // Connect to database

        $dbconnect=mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

        if (mysqli_connect_errno())

        {
            echo "Connection failed:".mysqli_connect_error();
            exit;
        }
?>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Book Review Database">
    <meta name="keywords" content="books, reading, fiction, non-fiction, genre, reviews">
    <meta name="author" content="Harish Peddi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Book Review Database</title>
    
    <!-- Edit the link below / replace with your chosen google font -->
    <link href="https://fonts.googleapis.com/css?family=Lato%7cUbuntu" rel="stylesheet"> 
    
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="book_style.css"> 
    
</head>
    
<body>
    
    <div class="wrapper">
    
        <div class="box banner">
            
        <!-- logo image linking to home page goes here -->
        <a href="index.php">
            <div class="box logo"  title="Logo - Click here to go to the Home Page">
        </div>    <!-- / logo -->
        </a>
            
            <h1>Orchid Reading</h1>
        </div>    <!-- / banner -->

        <div class="box nav">
        <a href="index.php">Home</a>
        </div> <!-- / nav -->
        
        <div class="box side">
        
        <h2>Search | <a class="side" href="show_all.php">Show All</a></h2>
        
        <i>Type part of the title / author name if desired</i>

        <hr />

        <!-- Start of Title Search -->
        
        <form method="post" action="title_search.php" enctype="multipart/form-data">
        
            <input class="search" type="text" name="title" size="40" value="" required placeholder="Title..." />

            <input class="submit input" type="submit" name="find_title" value = "&#xf002;" />

        </form>

        <!-- End of Title Search -->

        <!-- Start of Author Search -->
        
        <form method="post" action="author_search.php" enctype="multipart/form-data">
        
            <input class="search" type="text" name="author" size="40" value="" required placeholder="Author..." />

            <input class="submit input" type="submit" name="find_author" value = "&#xf002;" />

        </form>

        <!-- End of Author Search -->
        <hr />

        <i>Use the dropdown menus to search by genre or rating</i>
        <hr />
        <!-- Start of Genre Search -->
        
        <form method="post" action="genre_search.php" enctype="multipart/form-data">
        
            <select name="genre" required>
            <option value="" disabled selected>Genre...</option>
            <?php
            // retrieve unique values in genre column
            $genre_sql="SELECT DISTINCT `Genre` FROM `book_reviews` ORDER BY `book_reviews`.`Genre` ASC";
            $genre_query=mysqli_query($dbconnect, $genre_sql);
            $genre_rs=mysqli_fetch_assoc($genre_query);
            
            do {

                ?>

            <option value="<?php echo $genre_rs['Genre']; ?>"><?php echo $genre_rs['Genre']; ?></option>

            <?php

            } // end of genre option retrieval

            while($genre_rs=mysqli_fetch_assoc($genre_query));

            ?>

                
                

            </select>

            <input class="submit input" type="submit" name="find_genre" value = "&#xf002;" />

        </form>

        <!-- End of Genre Search -->
        
        <!-- Start of Rating Search -->
        
        <form method="post" action="rating_search.php" enctype="multipart/form-data">
        
            <select class="half_width" name="amount">
            <option value="exactly">Exactly...</option>
                <option value="more" selected>At least...</option>
                <option value="less">At most...</option>
            </select>

            <select class="half_width" name="stars">
                <option value="1">&#9733;</option>
                <option value="2">&#9733;&#9733;</option>
                <option value="3" selected>&#9733;&#9733;&#9733;</option>
                <option value="4">&#9733;&#9733;&#9733;&#9733;</option>
                <option value="5">&#9733;&#9733;&#9733;&#9733;&#9733;</option>

            </select>

            <input class="submit input" type="submit" name="find_rating" value = "&#xf002;" />

        </form>

<!-- End of Rating Search -->
        
        </div> <!-- / side bar -->