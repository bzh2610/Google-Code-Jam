<?php

//get input

$cases=fgets(STDIN);
$exising_and_create=[];//[case][0]=> exisiting (int)
                       //[case][1]=> not existing (int)
$path=[]; //[case][input]=>string with path

for($i=0; $i<$cases; $i++){
    $exising_and_create[$i]=explode(" ", fgets(STDIN));//get the input and split over space
    $total_inputs=$exising_and_create[$i][0]+$exising_and_create[$i][1];

    
    $path[$i]=[];
    for($j=0; $j<$total_inputs; $j++){
        $path[$i][$j]=substr(substr(fgets(STDIN), 1), 0,-1);
    }
}

//var_dump($exising_and_create); OK
//var_dump($path); OK
//Getting just fine !

//treat the data

$path_as_array=[];

//treat the existing paths
for($i=0; $i<$cases; $i++){
    $path_as_array[$i]=[];

    $existing_directories=$exising_and_create[$i][0];
    echo $existing_directories."-\n";
    
    if($existing_directories>=1){
        for($j=0; $j<$existing_directories; $j++){
            echo $path[$i][$j];
            $temp_array=explode("/", $path[$i][$j]);
            
            //var_dump($temp_array);
            var_dump( $temp_array);
            
            if(!isset($path_as_array[$i][$temp_array[0]])){
                $path_as_array[$i][$temp_array[0]]=[];
            }
        }
    }
}

var_dump($path_as_array);
echo '-------';
//var_dump($path);

?>