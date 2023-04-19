var data = new Date();
var miesiac = data.getMonth();
var rok = data.getFullYear();

function kalendarz(){
	var DTygodnia = data.getDay();
	var dzien= data.getDate();
	var mon = Array("Styczeń","Luty","Marzec","Kwiecień","Maj","Czerwiec","Lipiec","Sierpień","Wrzesień","Październik","Listopad","Grudzień");
	var dni = Array(31,28,31,30,31,30,31,31,30,31,30,31)
	var nazwa = Array("Poniedziałek","Wtorek","Środa","Czwartek","Piątek","Sobota","Niedziela");
	var zawartosc="";
	document.getElementById("Nazwa").innerHTML= mon[miesiac]+"&nbsp"+rok;
	for(var j=0;j<7;j++){
		if(j==6)zawartosc=zawartosc+'<div class="kartka" style="background-color:red;">'+nazwa[j]+'</div><div style="clear:both"></div>';
		else zawartosc=zawartosc+'<div class="kartka">'+nazwa[j]+'</div>';	
	}
	var pierwszy = new Date(rok,miesiac,1);
	var D=pierwszy.getDay()-1;
	var ilosc=dni[miesiac];
	if(D==-1)D=6;
	var T=0
	if ((rok % 4 == 0) && ((rok % 100 != 0) || (rok % 400 == 0))) ilosc=29;
	for(var z=D;z>0;z--){
		T++
		zawartosc=zawartosc+'<div class="kartka"></div>';
	}	
		for(var i=1;i<=ilosc;i++){
			T++
			if(T%7==0) zawartosc=zawartosc+'<div class="kartka"id="y'+i+'" style="background-color:red;">'+i+'</div><div style="clear:both"></div>';
			else zawartosc=zawartosc+'<div class="kartka"id="y'+i+'">'+i+'</div>';
			
		}	
	
	document.getElementById("zawartosc").innerHTML= zawartosc;
	if((miesiac==data.getMonth()) && (rok==data.getFullYear())){
	var dzis = document.getElementById("y"+dzien);
	dzis.style.backgroundColor = "#546783";
	}
	
}
window.onload = kalendarz;

function cofnij(){
	if(miesiac<=0){
		rok=rok-1;
		miesiac=11;
	}else miesiac=miesiac-1;
	kalendarz()
}
function dalej(){
	if(miesiac>=11){
		rok=rok+1;
		miesiac=0;
	}else miesiac=miesiac+1;
	kalendarz()
	
}