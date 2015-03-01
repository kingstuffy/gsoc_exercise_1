<?php

//note that this class only works for distinguishible letters
class Permutation{
    protected $table;
    protected $initial_value;
    protected $no_of_input;
    protected $count;
    
    //initializes the required class variables
    public function __construct($input)
    {
        //converts the comma seperated input into an array
        //and the result becomes the table of default values
        $this->table = explode(",", $input);
        $this->createInitialValue();
        //gets the number of letters in the inputs
        $this->no_of_input = count($this->table);
        $this->count=1;
    }
    
    //calculates all possible arrangement
    public function calcPossibleArrangements()
    {
        //since each letter can be repeated
        //Since the inputs are distinguishable,
        //the upper/lower bound is equals the no of inputs
        return pow($this->no_of_input, $this->no_of_input);
    }
    
    //creates a default value which will act as the starting point for incrementation //see showArrangements
    private function createInitialValue()
    {
        $this->initial_value = array();
        $first_index = $this->table[0];
        $array_length = count($this->table);
        for($i = 0; $i < $array_length; $i++)
        {
            $this->initial_value[] = $first_index;
        }
    }
    
    //public interface for displaying the possible arrangements
    /*the possible arrangements are found by taking a default value gotten from the createInitialValue() function
     * the letter for each position is represented by indices which serves as a key to get the actaul value from the table of values
     * the indices are incremented from LSB to get all possible arrangements
     * this function makes use of recurssion for the implementation
     */
    public function showArrangements()
    {
        //iterates through each letter position index starting from the LSB
        $index = $this->no_of_input - 1;
        while($index >= 0)
        {
            //only the lsb should be its value be started from the first index
            $start = ($index == $this->no_of_input - 1) ? 0 : 1;
            $this->incrementArray($this->initial_value, $index, $start);
            $index--;
        }

    }
    
    /*the increment array function takes in 3 parameter
     *current_value = the sequence of letter indices to be incremented
     * index = the letter index to incremented
     * start = the starting index from the table of values
     */
    private function incrementArray($current_value, $index, $start)
    {
        //loops through and increment the sequence of letters indices
        for($i = $start; $i<  $this->no_of_input; $i++)
        {
            //sets the letter position to the value gotten from the table of values
            $current_value[$index] = trim($this->table[$i]);
            echo "<hr>" .$this->count."). " .implode("", $current_value);
            $this->count++;
            //loops through and increment the remaining indices of the letters to the right where applicable
            for($c = 1; $c < $this->no_of_input - $index; $c++)
            {
                $this->incrementArray($current_value, $this->no_of_input - $c, 1);
            }
        }
    }
}