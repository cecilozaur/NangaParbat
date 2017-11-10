<?php

$_fp = fopen("php://stdin", "r");
/* Enter your code here. Read input from STDIN. Print output to STDOUT */
fscanf($_fp,"%d",$s);

while($s--)
{
    fscanf($_fp, "%d", $m);
    fscanf($_fp, "%d", $n);
    $p = fgets($_fp);
    $p = explode(' ', trim($p));
    array_walk($p, 'intval');

    for($i = 0; $i < $n; $i++)
    {
        $a = $m - $p[$i];
        for($j = $i+1; $j < $n; $j++)
        {
            if($a-$p[$j] == 0)
            {
                echo ($i+1), ' ', ($j+1);
                break 2;
            }
        }
    }

    echo PHP_EOL;
}