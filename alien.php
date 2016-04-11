<?php

$input=fgets(STDIN);
$input_array=explode(" ", $input);

$l=$input_array[0]; //There are L letters per word
$d=$input_array[1]; //There are D words in the dic
$m=$input_array[2]; //There are M tests we want to make

$dictionary=[];
//create a dictionary where the exisiting word are stored
for ($i=0; $i<$d; $i++){
    $temp=fgets(STDIN);
    $temp[strlen($temp)-1]="";
    array_push($dictionary, $temp);
}

$tests=[];
//store the words we wanna test
for ($i=0; $i<$m; $i++){
    $temp=fgets(STDIN);
    $temp[strlen($temp)-1]='';
    array_push($tests, $temp);
}

//var_dump($tests);

//get the m words
for ($i=0; $i<$m; $i++){
    $word=$tests[$i];
    $parenthese=false;
    $nbpar=0;
    $letters_possible=[];
    $words_possible=$dictionary;
    $decalage=0;
    
    
    for ($x=0; $x<strlen($word)-1; $x++){//strlen car avec  les () moins char final
        
    //    var_dump ($words_possible);
        if($word[$x]=="("){
            $parenthese=true;
            $decalage++;
            $nbpar++;
           
       //   echo"parenthesis ON \n";
        }
        
        else if($word[$x]==")"){
            $parenthese=false;
            $to_remove=[];
         //   echo "Parenthesis OFF \n";
            //on enleve le(s) mots pour lesques aucune lettre ne marche
            for($temp=0; $temp<count($words_possible); $temp++){
            //    echo $words_possible[$temp]."\n";
                if(!in_array($words_possible[$temp][$x-$decalage], $letters_possible)){
                    array_push($to_remove, $temp);
                }
           //      echo $words_possible[$temp][$x-$decalage]."\n";
                }
            foreach($to_remove as $remove_index){
                    unset($words_possible[$remove_index]);
               
                }
            
            
                $words_possible = array_values($words_possible);//reorder 
            $decalage;
            if($nbpar > 1){
               // $decalage ++;
            }
            
            
            $letters_possible=[];
          //   var_dump ($words_possible);
        }
        
        
        
        else{
            if($parenthese){ //si il y a un doute
                array_push($letters_possible, $word[$x]);
                $decalage++;
          //     echo $word[$x]." was added to letters_possible\n ";
                
            }else{
                
                $to_remove=[];
                
                for($ze=0; $ze<count($words_possible); $ze++){
               //    echo $words_possible[$ze][$x-$decalage]."<->".$word[$x];
                    if($words_possible[$ze][$x-$decalage]!=$word[$x]){
                    //    echo $words_possible[$ze][$x-$decalage]."!=".$word[$x];
                        array_push($to_remove, $ze);
                    }
                 //   echo"\n";
                }
                
                foreach($to_remove as $remove_index){
                    unset($words_possible[$remove_index]);
                }
                
                $words_possible = array_values($words_possible);//reorder
              //var_dump($words_possible);
            }
        }
        

        //echo $decalage.'   -';
      
    }
         
    echo 'Case #'.($i+1).': '.count($words_possible)."\n";

    
}


?>