<!doctype html>
<html>
<head>
  <meta charset="utf-8">  
  <link rel="stylesheet" href="style.css">
  <title>Szyfr</title>
</head>
<body>
    <header>Szyfr cezara</header>
    <hr>
    <main>
        
        <p>
                Jedna z najprostszych technik szyfrowania. Jest to rodzaj szyfru podstawieniowego, w którym każda litera tekstu jawnego (niezaszyfrowanego) zastępowana jest inną, oddaloną od niej o stałą liczbę pozycji w alfabecie, literą (szyfr monoalfabetyczny), przy czym kierunek zamiany musi być zachowany. Nie rozróżnia się przy tym liter dużych i małych. Nazwa szyfru pochodzi od Juliusza Cezara, który prawdopodobnie używał tej techniki do komunikacji ze swymi przyjaciółmi. 
        </p>
        <img src="Caesar.png" alt="zdięcie">
        <hr>
        <?php
            Function SzyfrowanieCezar($plik,$kod){
                $PlikSzyfr="";

                for($i=0;$i<strlen($plik);$i++){
                    $Kint = ord($plik[$i]);
                    $szyfr=$Kint;
                    if(($Kint>="65" and $Kint<="90") or ($Kint>="97" and $Kint<="122")){
                        $szyfr= $Kint+$kod;
                        if($szyfr>"90" and $Kint<="90"){
                            $r=$szyfr-90;
                            
                            $szyfr=64+$r;
                        }
                        if($szyfr>"122" and $Kint<="122"){
                            $r=$szyfr-122;
                            $szyfr=96+$r;
                        }
                    }
                    $Zszyfr=chr($szyfr);
                    $PlikSzyfr=$PlikSzyfr.$Zszyfr;
                }
                return $PlikSzyfr;
            }
            Function OdszyfrowywanieCezar($plik,$kod){
                $PlikSzyfr="";

                for($i=0;$i<strlen($plik);$i++){
                    $Kint = ord($plik[$i]);
                    $szyfr=$Kint;
                    if(($Kint>="65" and $Kint<="90") or ($Kint>="97" and $Kint<="122")){
                        $szyfr= $Kint-$kod;
                         if($szyfr<"65" and $Kint<="90"){
                            $r=65-$szyfr;
                            $szyfr=91-$r;
                        }
                        if($szyfr<"97" and $Kint>="97"){
                            $r=97-$szyfr;
                            $szyfr=123-$r;
                            
                        }
                    }
                    $Zszyfr=chr($szyfr);
                    $PlikSzyfr=$PlikSzyfr.$Zszyfr;
                }
                return $PlikSzyfr;
            }
            
        ?>
        <form action="index.php" method="post" enctype="multipart/form-data">
			Podaj liczbę przesunięcia(szyfrowania): 
			<input style="width:40px;" type="number" value="1" min="1" max="25" name="kod">
            <br>
			<input type="file" required name="plik">
			<br>
            <input type="submit" name="submit" value="Wykonaj">
			
        </form>
		<form action="index.php" method="post">
			<input type="text" name="zaszyfr" required>
			<input style="width:40px;" type="number" value="1" min="1" max="25" name="kod">
			<input type="submit" name="submit1" value="Wyswietl">
		</form>
        <?php
            if (isset($_POST['submit'])){
				$plik_nazwa = $_FILES['plik']['name'];
                $plik_tmp = $_FILES['plik']['tmp_name'];
				$kod=$_POST['kod'];
				
				if(is_uploaded_file($plik_tmp)) {
				move_uploaded_file($plik_tmp, "$plik_nazwa");
				    $plik1=fread(fopen("$plik_nazwa", "r"), filesize("$plik_nazwa"));
				}
                $x = SzyfrowanieCezar($plik1,$kod);
				fclose(fopen("$plik_nazwa", "r"));
                unlink("$plik_nazwa");
                $fp = fopen("Szyfr/$plik_nazwa", "w");
                fputs($fp, $x);
                fclose($fp);
                echo '<a href="Szyfr/'.$plik_nazwa.'" target="_blank">Pobierz: Zaszyfrowany plik</a>';
			}   
			if (isset($_POST['submit1'])){
				$plik=$_POST['zaszyfr'];
				$kod=$_POST['kod'];
				$fp = "Szyfr/$plik";
				readfile($fp);
				$plik1=fread(fopen("$fp", "r"), filesize("$fp"));
				$y = OdszyfrowywanieCezar($plik1,$kod); 
				echo "<br/>".$y;
				
			}
            
        ?>
    </main>
    
    <hr>
    <div class="info">
        Wszelkie prawa zastrzeżone &copy; !
    </div>
</body>
</html>