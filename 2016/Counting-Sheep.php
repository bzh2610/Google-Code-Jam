<?php
$handle = fopen("/Users/Evan/Desktop/A-large.in", "r");

$cases=fgets($handle, 4096);
$numbers_start=[];

for($i=0; $i<$cases; $i++){
    $numbers_start[$i]=substr(fgets($handle), 0, -1);

}

//INPUT OK


//TREATMENT

for($i=0; $i<$cases; $i++){
 
    $used_figures=[];
    
   if( $numbers_start[$i]==0){
       
       echo 'Case #'.($i+1).': INSOMNIA';
   
   }else{
   
       for($temp=0; $temp<strlen($numbers_start[$i]); $temp++){
            if(!in_array($numbers_start[$i][$temp], $used_figures))
                array_push($used_figures, $numbers_start[$i][$temp]);
       }
       
       $a=1;
       while(count($used_figures)<10){
           $a++;
           $multiplied_number=strval($numbers_start[$i]*$a);
           
           for($temp=0; $temp<strlen($multiplied_number); $temp++){
            if(!in_array($multiplied_number[$temp], $used_figures))
                array_push($used_figures,$multiplied_number[$temp]);
            }
           
       } 
       echo 'Case #'.($i+1).': '.$multiplied_number;
        
    }
        
       
    echo "\n";
   }
?>
