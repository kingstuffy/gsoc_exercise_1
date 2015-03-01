<?php

//an interface for key finder's class
interface KeyFinder
{
    public function findKey($array,$search_term, $min_index, $max_index);
}

class BinarySearch
{
    protected $sorted_array;
    protected $max_index;
    protected $min_index;
    protected $key_finder;
    protected $search_term;

    //initializes all the required parameters
    public function __construct(KeyFinder $keyfinder, $array_of_nos, $search_term) {
        //makes use of dependency injection and takes an object of class that implements the key finder interface
        $this->key_finder = $keyfinder;
        //sorts the array as binary search routine is performed on sorted collections
        sort($array_of_nos);
        $this->sorted_array = $array_of_nos;
        $this->search_term = $search_term;
        $this->min_index = 0;
        $this->max_index = count($array_of_nos) -1;
    }
    
    public function getKey()
    {
        //calls the find key function from the object of class that implements the key finder interface
        $key = $this->key_finder->findKey($this->sorted_array, $this->search_term, $this->min_index, $this->max_index);
        return $key;
    }
}


//finds the key using recursion
class RecursiveKeyFinder implements KeyFinder
{
    protected $return;


    public function findKey($array, $search_term, $min_index, $max_index) {
        
        //gets the midpoint and rounds it up to the nearest whole number
        $mid_point = ceil(($max_index + $min_index) / 2);
        
        /*the minimum index becomes greater than the maximum when all the available exhausted are exhausted
         * at that point, it is certain that the search key isn't part of the collection
        */
        if(!($min_index > $max_index))
        {
            
            /*note the a variable is used to store the returned key
             * since the function uses recursion, the key found needs to be returned to the previous calling functions
             */
            
            
            /*if the search term is less than the value at the midpoint,
             * then the search term is in the lower half of the collection
             * hence the new range is between the minimum index and the midpoint
             */ 
            if($search_term < $array[$mid_point])
            {
                $return = $this->findKey($array, $search_term, $min_index, $mid_point - 1);
            }
            
            /*if the search term is greater than the value at the midpoint,
             * then the search term is in the upper half of the collection
             * hence the new range is between the midpoint and the maximum index
             */ 
            elseif($search_term > $array[$mid_point])
            {
                $return = $this->findKey($array, $search_term, $mid_point + 1, $max_index);
            }
            //the search term is equal to the value at the midpoint, hence the key is found and returned
            else{
                return $mid_point;
            }
        }
        else{
            return -1;
        }
        return $return;
    }

}

//finds the key using iteration
class IterativeKeyFinder implements KeyFinder
{
    public function findKey($array, $search_term, $min_index, $max_index) 
    {
        //runs a continous loop until the key is found or the indices are exhausted
        while(1)
        {
            $mid_point = ceil(($max_index + $min_index) / 2);
            
            /*the minimum index becomes greater than the maximum when all the available exhausted are exhausted
            * at that point, it is certain that the search key isn't part of the collection
             * and the loop is broken
           */
            if($mid_point > $max_index)
            {
                return -1;
            }
            
            /*if the search term is less than the value at the midpoint,
             * then the search term is in the lower half of the collection
             * hence the new range is between the minimum index and the midpoint
             */ 
            elseif($search_term < $array[$mid_point])
            {
                $max_index = $mid_point - 1;
            }
            
            /*if the search term is greater than the value at the midpoint,
             * then the search term is in the upper half of the collection
             * hence the new range is between the midpoint and the maximum index
             */ 
            elseif($search_term > $array[$mid_point])
            {
                $min_index = $mid_point + 1;
            }
            
            //the search term is equal to the value at the midpoint, hence the key is found and the loop is broken
            else{
                return $mid_point;
            }

        }
    }

}
