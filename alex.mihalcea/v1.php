<?php

$handle = fopen ("php://stdin", "r");
fscanf($handle, "%i",$n);
$scores_temp = fgets($handle);
$scores = explode(" ",$scores_temp);
$scores = array_map('intval', $scores);
fscanf($handle, "%i",$m);
$alice_temp = fgets($handle);
$alice = explode(" ",$alice_temp);
$alice = array_map('intval', $alice);
// Write Your Code Here

$scores = array_unique($scores, SORT_NUMERIC); // remove duplicate
$scores = array_values($scores); // reset keys so that indexes are the actual positions on the leaderboard

$lastScore  = end($scores);
$firstScore = reset($scores);

foreach ($alice as $a)
{
    $start = 0;
    $end   = count($scores) - 1;

    $found = false;

    while ($start <= $end)
    {
        $mid = floor(($start + $end) / 2);

        if ($scores[$mid] > $a)
        {
            $start = $mid + 1;
        }
        elseif($scores[$mid] < $a)
        {
            $end = $mid - 1;
        }
        else
        {
            echo $mid + 1, PHP_EOL;
            $found = true;
            break;
        }
    }

    if ( ! $found) echo $start + 1, PHP_EOL;
}
