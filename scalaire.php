<?php
$handle = fopen("/Users/Evan/Desktop/A-small-practice.in", "r");

$cases=fgets($handle, 4096);

$vecteurs=[];

for($i=0; $i<$cases; $i++){
    $coordinates=fgets($handle);
    $xa=explode(" ", fgets($handle));
    $ya=explode(" ", fgets($handle));
    $vecteur[$i]=[];
   // sort($xa);
   // rsort($ya);
    array_multisort($xa, SORT_NUMERIC, SORT_ASC);
    array_multisort($ya, SORT_NUMERIC, SORT_DESC);
    $vecteur[$i][0]=$xa;
    $vecteur[$i][1]=$ya;
    
    var_dump($xa);
var_dump($ya);
}



for($i=0; $i<count($vecteur); $i++){
    $y=0;
    for($x=0; $x<count($vecteur[$i][0]); $x++){
    
        
    $y=$y+$vecteur[$i][0][$x]*$vecteur[$i][1][$x];
    }
    echo "Case #".($i+1).": ".$y."\n";
}
?>


