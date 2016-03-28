<?php
$handle = fopen("/Users/Evan/Desktop/A-large-practice.in", "r");

$lignes=fgets($handle, 4096);
$table=[];
for($i=0; $i<$lignes; $i++){
    $table[$i]=[];
    array_push($table[$i], fgets($handle));
    array_push($table[$i], fgets($handle));
    array_push($table[$i], explode(" ", fgets($handle)));
}

//var_dump($table);

for($i=0; $i<count($table); $i++){
    $value=$table[$i][0];
    
    for($j=0; $j<count($table[$i][2])-1; $j++){
        $price_a=$table[$i][2][$j];
         for($k=$j; $k<count($table[$i][2]); $k++){
            $price_b=$table[$i][2][$k];
             
             if($price_a+$price_b==$value and $j!=$k){
                 echo "Case #".($i+1).": ".($j+1)." ".($k+1)."\n";
             }
         }
    }
}

?>