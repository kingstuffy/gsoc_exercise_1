<?php

require_once './lib/permutation.php';

//sets the default value to be used
$default_values = "a,b,c,d,e";

//sets the custom values where applicable
if(isset($_POST['letters']))
{
    $default_values = htmlentities(stripslashes($_POST['letters']));
}

//Instantiates the Permutation class
$permutation = new Permutation($default_values);
//gets the number of possible arrangements
$no_of_arrangements = $permutation->calcPossibleArrangements();

?>

<div style="color: #238BD2">
    <h2>Exercise 1</h2>
    <h4>Question: </h4>
    <p>Write a program to determine how many different arrangements there are for the letters a, b, c, d, e, if letters can be repeated.</p>
</div>
<div style="color: #009900">
    <h4>Answer: </h4>
    <p><?php echo "The number of different arrangements for the letters ".$default_values . " is ".$no_of_arrangements; ?></p>
</div>
<div style="color: #238BD2">
    <br/>
    <h4>Use other distinguishable letters separated by commas</h4>
    <form action="" method="POST">
        <input type="text" name="letters" placeholder="Letters separated by commas">
        <input type="submit" value="submit">
    </form>
</div>