<?php
$_fp = fopen("php://stdin", "r");
/* Enter your code here. Read input from STDIN. Print output to STDOUT */
fscanf($_fp,"%d",$t);
for($i=0; $i<$t; $i++)
{
    fscanf($_fp, "%d", $m);
    fscanf($_fp, "%d", $n);
    $temp = fgets($_fp);
    $arr = explode(" ", $temp);
    $arr = array_map('intval', $arr);

    asort($arr);
    $keys = array_keys($arr);
    
    $x = array_shift($keys);
    $y = array_pop($keys);
    $solution = false;
    while(!$solution && count($keys) > 0)
    {
        $s = $arr[$x] + $arr[$y];
        if($s == $m)
        {
            $solution = true;
        }
        elseif($s < $m)
        {
            $x = array_shift($keys);
        }
        elseif($s > $m)
        {
            $y = array_pop($keys);
        }
    }
    echo (min($x, $y) + 1) . ' ' . (max($x, $y) + 1) . PHP_EOL;
    
};



?>
