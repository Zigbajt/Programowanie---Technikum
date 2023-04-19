            function liczenie(){
                var wynik = document.getElementById("zegar");
                var data = new Date();
                var dzien= data.getDate();
                var miesiac = data.getMonth();
                var rok = data.getFullYear();
                var mon = Array("Styczeń","Luty","Marzec","Kwiecień","Maj","Czerwiec","Lipiec","Sierpień","Wrzesień","Październik","Listopad","Grudzień");
		
		
                var godzina = data.getHours();
                var minuta = data.getMinutes();
                var sekunda = data.getSeconds();
                
                if(sekunda<10){
                    
                    sekunda="0"+sekunda;
                }
                if(minuta<10){
                    
                    minuta="0"+minuta;
                }
                
                wynik.innerHTML ="<h1>"+dzien+" "+mon[data.getMonth()]+" "+rok+" || "+godzina+":"+minuta+":"+sekunda+"</h1>";
                
                setTimeout("liczenie()",1000)
                
            }             