<?php include ("topbit.php");

// if find button pushed
if(isset($_POST['find_genre']))

{

$genre=test_input(mysqli_real_escape_string($dbconnect, $_POST['genre']));

$genresearch_sql="SELECT * FROM `book_reviews` WHERE `Genre` LIKE '%$genre%' ORDER BY `Genre` ASC ";
$genresearch_query=mysqli_query($dbconnect, $genresearch_sql);
$genresearch_rs=mysqli_fetch_assoc($genresearch_query);
$count=mysqli_num_rows($genresearch_query);

?>

        <div class="box main"> 
            <h2>Genre Search</h2>

            <?php

            // check for any results
            
            if ($count<1)

            {

            ?>

            <div class="error">
                Sorry! There are no results that match your search.
                Please use the search box in the sidebar to try again.
            </div> <!-- error -->

            <?php

            } // end count 'if'

            // if there are no results, output an error
            else {

                do {

                ?>

                <!-- Results go here -->
                <div class="results">
                
                <p>Title: <span class="sub_heading"><?php echo $genresearch_rs['Title']; ?></span></p>
                
                <p>Author: <span class="sub_heading"><?php echo $genresearch_rs['Author']; ?></span></p>

                <p>Genre: <span class="sub_heading"><?php echo $genresearch_rs['Genre']; ?></span></p>

                <p>Rating: <span class="sub_heading">
                
                <?php
                for ($x=0; $x < $genresearch_rs['Rating']; $x++)
                
                {
                    echo "&#9733;";
                }
                
                ?>
                
                </span></p>

                <p><span class="sub_heading">Review / Response</span></p>

                <p>
                <?php echo $genresearch_rs['Review']; ?>
                </p>
                
                </div> <!-- results -->
                <br />

            <?php

                } // end of 'do'

                while($genresearch_rs=mysqli_fetch_assoc($genresearch_query));

            } // end 'else'

            // if there are results, display them

            } // end isset

            ?>

        </div>    <!-- main -->
        
<?php include ("bottombit.php"); ?>