<?php
$_fp = fopen("php://stdin", "r");
/* Enter your code here. Read input from STDIN. Print output to STDOUT */

fscanf($_fp, "%i", $nbOfTrips);
while($nbOfTrips != 0)
{
    fscanf($_fp, "%i", $dollars);
    fscanf($_fp, "%i", $n);
    $iceCreamCost = trim(fgets($_fp));
    $iceCreamCost = explode(" ", $iceCreamCost);    
    
    foreach($iceCreamCost as $index => $cost)
    {
        $remainingCost = $dollars - $cost;
        $searchResult = array_search($remainingCost, array_slice($iceCreamCost, $index+1, $n, true));
        if($searchResult !== false)
        {
            echo ($index+1) . " " . ($searchResult + 1) . "\n";
            break;
        }
    }
    
    $nbOfTrips--;
}

?>
