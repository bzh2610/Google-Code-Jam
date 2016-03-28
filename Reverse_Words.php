<?php

$lignes=fgets(STDIN);
$tableau=[];

for ($i=0; $i<$lignes; $i++){
    
    $ligne=fgets(STDIN);
    array_push($tableau, $ligne);
}

for ($i=0; $i<$lignes; $i++){
    
    $ligne_brisee=explode(" ", $tableau[$i]);
    $array=array_reverse($ligne_brisee);
   
    $array[0][strlen($array[0])-1]='';
     
    $answer='Case #'.($i+1).': ';
    
    foreach($array as $item){
        
        $answer.=$item.' ';
    }
    $answer.="\n";
    echo $answer;

}

?>