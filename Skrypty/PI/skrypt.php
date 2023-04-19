<?php
    function mc($N){
    $n=0;
    for ($i=0 ; $i<$N; $i++) {
        $x=rand(0,500)/500;
        $y=rand(0,500)/500;
    
        if ($x*$x + $y*$y <= 1 ){
            $n++;
        }   
    }
        $pi=4*($n/$N);
        return $pi;
    }

    if(isset($_POST['submit'])){echo "Wynik = ".mc($_POST['liczba']);} 
    
    function lei($p){
        $pi=0;

       for($i=1;$i<=$p;$i++){
            $pi += ($p % 2 ? -1:1) / (2 * $p - 1);
        }
		return 4*$pi;
        
    }
    if(isset($_POST['submit1'])){echo "Wynik = ".lei($_POST['Liczba1']);} 
?>