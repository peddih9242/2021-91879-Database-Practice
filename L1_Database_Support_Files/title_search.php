<?php include ("topbit.php");

// if find button pushed
if(isset($_POST['find_title']))

{

$title = $_POST['title'];

$titlesearch_sql="SELECT * FROM `book_reviews` WHERE `Title` LIKE '%$title%' ORDER BY `Title` ASC ";
$titlesearch_query=mysqli_query($dbconnect, $titlesearch_sql);
$titlesearch_rs=mysqli_fetch_assoc($titlesearch_query);
$count=mysqli_num_rows($titlesearch_query);

?>

        <div class="box main"> 
            <h2>Title Search</h2>

            <?php

            // check for any results
            
            if ($count<1)

            {

            ?>

            <div class="error">
                Sorry! There are no results that match your search.
                Please use the search box in the sidebar to try again.

            <?php

            } // end count 'if'

            // if there are no results, output an error
            else {

                do {

                ?>

                <!-- Results go here -->
                <div class="results">
                
                <p>Title: <span class="sub_heading"><?php echo $titlesearch_rs['Title']; ?></span></p>
                
                <p>Author: <span class="sub_heading"><?php echo $titlesearch_rs['Author']; ?></span></p>

                <p>Genre: <span class="sub_heading"><?php echo $titlesearch_rs['Genre']; ?></span></p>

                <p>Rating: <span class="sub_heading">
                
                <?php
                for ($x=0; $x < $titlesearch_rs['Rating']; $x++)
                
                {
                    echo "&#9733;";
                }
                
                ?>
                
                </span></p>

                <p><span class="sub_heading">Review / Response</span></p>

                <p>
                <?php echo $titlesearch_rs['Review']; ?>
                </p>
                
                </div> <!-- results -->
                <br />

            <?php

                } // end of 'do'

                while($titlesearch_rs=mysqli_fetch_assoc($titlesearch_query));

            } // end 'else'

            // if there are results, display them

            } // end isset

            ?>

        </div>    <!-- main -->
        
<?php include ("bottombit.php"); ?>