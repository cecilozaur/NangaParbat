<?php

$handle = fopen ("php://stdin","r");
fscanf($handle,"%d",$n);
$scores_temp = fgets($handle);
$scores = explode(" ",$scores_temp);
$scores = array_map('intval', $scores);
fscanf($handle,"%d",$m);
$alice_temp = fgets($handle);
$alice = explode(" ",$alice_temp);
array_walk($alice,'intval');
// your code goes here

$rank = 1;
$last = $scores[0];
$as = array();
$greatA = array_pop($alice);
foreach($scores as $k=>$s)
{
    $next = false;
    
    if($s < $last)
    {
        $rank++;
    }
    
    if($greatA == $s) 
    {
        $as[] = $rank;
        $next = true;
    }
    elseif($greatA > $s) 
    {
        $as[] = $rank;
        $next = true;
    }
    if($greatA < $s && $k == $n-1)
    {
        $rank++;
        $as[] = $rank;
        $next = true;
    }
    
    while($next)
    {
        $next = false;
        $greatA = array_pop($alice);
        
        if(!is_null($greatA) && ($greatA >= $s || ($greatA < $s && $k == $n-1)))
        {
            $next = true;
            $as[] = $rank;
        }
    }
    
    $last = $s;
}

for($i = $m-1; $i >=0; $i--)
{
    echo $as[$i] . PHP_EOL;
}

?>
