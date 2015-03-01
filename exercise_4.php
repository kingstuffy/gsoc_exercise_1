<?php

require_once './lib/binary_search.php';

//sets the default values
$default_values = "2,6,11,78,101,150,1000,3700";

//sets the custom values where applicable
if(isset($_POST['numbers']))
{
    $default_values = htmlentities(stripslashes($_POST['numbers']));
}

//checks if the search key is provided and performs the search if true
if(isset($_POST['search_key']))
{
    $key = intval(stripslashes(htmlentities($_POST['search_key'])));
    //coverts the comma separated values to an array
    $array_of_nos = explode(",", $default_values);
    
    //instantiates the IterativeKeyFinder Class
    $iterative_finder = new IterativeKeyFinder();
    //instantiates the BinarySearch Class and passes the IterativeKeyFinder Object to its constructor
    $binary_search = new BinarySearch($iterative_finder, $array_of_nos, $key);
    $position = $binary_search->getKey();
}

?>

<div style="color: #238BD2">
    <h2>Exercise 4 (Iterative)</h2>
    <h4>Question: </h4>
    <p> Write a binary search routine that returns the first occurrence of the search key.</p>
    <p> Using the default values <?php echo $default_values; ?>.</p>
    <form action="" method="POST">
        <p>
            Please enter a search key
            <input type="text" name="search_key" placeholder="search key">
        </p>
        <input type="submit" value="Search">
    </form>
</div>
<div style="color: #ff0000">
    <form action="" method="POST">
        <p>
            OR Please enter a series of numbers separated by comma's and arranged in ascending order
            <input type="text" name="numbers" placeholder="search key">
        </p>
        <p>
            Please enter a search key
            <input type="text" name="search_key" placeholder="numbers separated by commas">
        </p>
        <input type="submit" value="Search">
    </form>
</div>
<div style="color: #009900">
    <h4>Answer: </h4>
    <p>
        <?php
            if(isset($_POST['search_key']))
            {
                //the position '-1' is returned if the key was found
                if($position !== -1)
                {
                    echo "The search key " .$key . " was found at position ".($position + 1) ." in the sequence " .$default_values;
                }
                else{
                    echo "The search key ".$key." was not found";
                }
            }
        ?>
    </p>
</div>