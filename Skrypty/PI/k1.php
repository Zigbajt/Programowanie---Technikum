<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Liczba PI</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <hr>
       <header><h1>Liczba π</h1></header>
        <hr>
       <nav>
            <a href="index.html"><div class="menu">Strona Główna:</div></a>
            <a href="k1.php"><div class="menu">Metoda Leibniza:</div></a>
            <a href="k2.php"><div class="menu">Metoda Monte Carlo:</div></a>
            <div style="clear: both;"></div>
        </nav>
       <main>
           <hr>
           <header><h2><i>Metoda Leibniza:</i></h2></header>
           <hr>
           <article>
               <p id="t">
                    Wyznaczenie liczby π możliwe jest również przy użyciu wzoru Leibniz-a:
               </p>
               <p id="t">
                   <img src="img/lib.svg" alt="Wzór">
               </p>
           </article>
		   <?php
			function lei($p){
				$pi=0;
				for($i=0;$i<=$p;$i++){
					$pi += ($i % 2 ? -1 : 1) / (2 * $i + 1);
				}
				return 4*$pi;
			}
			function blad($pi){
				$wynik=($pi-M_PI)/M_PI*100;
				$wynik*=-1;
				
				return round($wynik);
			}
			?>
            <form action="k1.php" method="post">
                <b id="to">Liczba składników szeregu:</b>
                <input type="text" name="Liczba1" value="100000">
                <input type="submit" name="submit1" value="Oblicz" id="oblicz"><br>
 
				</form>
			<?php
				
				if(isset($_POST['Liczba1'])){
					$x=$_POST['Liczba1'];
					echo "<h2>Warość obliczona π:</h2>"."<p id='t'>".lei($x)."</p>".'<br>';
					echo "<h2>Warość tablicowa π:</h2>"."<p id='t'>".(M_PI)."</p>".'<br>';
					echo "<h2>Odchylenie:</h2>"."<p id='t'>".number_format((M_PI-lei($x)),13)."</p>".'<br>';
					$w=(M_PI-lei($x))/M_PI*100;
					$wynik=number_format($w,13);
					echo "<h2>Błąd:</h2>"."<p id='t'>".$wynik.'%'."</p>";
					;}
				
			?>
        </main>
        <footer>
            
            
        </footer>
    </body>
</html>