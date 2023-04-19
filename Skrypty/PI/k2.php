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
           <header><h2><i>Metoda Monte Carlo:</i></h2></header>
           <hr>
           <article>
                <p>
                    <b>Metoda Monte Carlo (MC)</b> – metoda stosowana do modelowania matematycznego procesów zbyt złożonych, aby można było przewidzieć ich wyniki za pomocą podejścia analitycznego. Istotną rolę w tej metodzie odgrywa losowanie wielkości charakteryzujących proces, przy czym losowanie dokonywane jest zgodnie z rozkładem, który musi być znany. 
                </p>
           </article>
           <article>
               <p>
                    Metodą Monte Carlo można obliczyć pole figury zdefiniowanej nierównością:
               </p>
                <p id="t">
                   <img src="img/wz.svg" alt="Wzór"> 
               </p>
                <p>

                    czyli koła o promieniu <b>R</b> i środku w punkcie (0,0).<br><br>

                    Losuje się <b>n</b> punktów z opisanego na tym kole kwadratu – dla koła o  <b>R=1</b> współrzędne wierzchołków (−1,−1), (−1,1), (1,1), (1,−1).
                    Po wylosowaniu każdego z tych punktów trzeba sprawdzić czy jego współrzędne spełniają powyższą nierówność (tj. czy punkt należy do koła).<br><br>
                    Wynikiem losowania jest informacja, że z <b>n</b> wszystkich prób <b>k</b> było trafionych, zatem pole koła wynosi:
               </p>
               <p id="t">
                    <img src="img/mc.svg" alt="Wzór">
               </p>
               <p>
                   gdzie <b>P</b> jest polem kwadratu opisanego na tym kole (<b>R=1 :P=4</b>).
               </p>
           </article>
           <hr>
           <header>
               <h2>Kalkulator:</h2>
           </header>
           <hr>
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
		   ?>
            <form action="k2.php" method="post">
                <b id="to">Podaj liczbe losowań:</b>
                <input type="text" name="liczba" value="100000">
                <input type="submit" name="submit" value="Oblicz" id="oblicz"><br>
            </form>
			<?php
				
				if(isset($_POST['submit'])){
					$x=$_POST['liczba'];
					echo "<h2>Warość obliczona π:</h2>"."<p id='t'>".mc($x)."</p>".'<br>';
					echo "<h2>Warość tablicowa π:</h2>"."<p id='t'>".(M_PI)."</p>".'<br>';
					echo "<h2>Odchylenie:</h2>"."<p id='t'>".number_format((M_PI-mc($x)),13)."</p>".'<br>';
					$w=(mc($x)-M_PI)/M_PI*100;
					$wynik=number_format(abs($w),8);
					echo "<h2>Błąd:</h2>"."<p id='t'>".$wynik.'%'."</p>";
					;}
				
			?>
        </main>
        <footer>
            
            
        </footer>
    </body>
</html>