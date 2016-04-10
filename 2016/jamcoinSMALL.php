<?php
function isPrime($num) {
    //1 is not prime. See: http://en.wikipedia.org/wiki/Prime_number#Primality_of_one
    if($num == 1)
        return false;

    //2 is prime (the only even number that is prime)
    if($num == 2)
        return true;

    /**
     * if the number is divisible by two, then it's not prime and it's no longer
     * needed to check other even numbers
     */
    if($num % 2 == 0) {
        return false;
    }

    /**
     * Checks the odd numbers. If any of them is a factor, then it returns false.
     * The sqrt can be an aproximation, hence just for the sake of
     * security, one rounds it to the next highest integer value.
     */
    for($i = 3; $i <= ceil(sqrt($num)); $i = $i + 2) {
        if($num % $i == 0)
            return false;
    }

    return true;
}


function findFactor($num) {


    //2 is prime (the only even number that is prime)
    if($num == 2)
        return 2;

    for($i = 3; $i <= ceil(sqrt($num)); $i = $i + 2) {
        if($num % $i == 0)
            return $i;
    }

}



$cases=fgets(STDIN);


$entries=[];
for($i=0; $i<$cases; $i++){
$entries[$i]=explode(" ", fgets(STDIN));
/* the first integer is the lenght of the binary number we are going to use
the second integer is the number of results we are going to output
*/
}

//var_dump($entries);
//treatment
$numbers_bin_and_dec=[];

/// 100001 -> bases 
for($i=0; $i<$cases; $i++){
    
    $top=pow(2, $entries[$i][0]);
    $btm=pow(2, $entries[$i][0]-1);
    
    for($i=$btm+1; $i<$top; $i++){
    $binary_number=decbin($i);
    if($binary_number[strlen($binary_number)-1]==1 and $binary_number[0]=1){
        $remove=false;
        $numbers_bin_and_dec[$binary_number]=[];
        for($base=2; $base<=10; $base++){
        
            $total_base_x=0;
            for($k=0; $k<strlen($binary_number); $k++){
                $total_base_x=$total_base_x+$binary_number[strlen($binary_number)-1-$k]*pow($base, $k);
            }
            
            
            $numbers_bin_and_dec[$binary_number][$base]=$total_base_x;
            
            if(isPrime($total_base_x)){
                $remove=true;
            }
        }
        
        if($remove){
        unset($numbers_bin_and_dec[$binary_number]);
        }
        
    }
    }
        
}

//var_dump($numbers_bin_and_dec);


for($i=0; $i<$cases; $i++){
    $temp=0;
    echo "Case #".($i+1)." :\n";
    foreach($numbers_bin_and_dec as $key => $value){
        $return_bool=true;
        
        if($temp<$entries[$i][1]){
        
        $return=$key." ";

        for($base=2; $base<=10; $base++){
            
            $return=$return.findFactor($numbers_bin_and_dec[$key][$base])." ";
            if(findFactor($numbers_bin_and_dec[$key][$base])==NULL)
                $return_bool=false;
        }
        $return=$return."\n";
            if($return_bool){
                echo $return;
                $temp++;
            }
            
        }
                
    }
        
}
?>