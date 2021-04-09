function teendoHozzaad() {
    var todoNev = $("#TODOnev").val();
    var todoDatum = $("#TODOdatum").val();
    var teendoObj = {
        todoNev:todoNev,
        todoDatum:todoDatum
    };
    $.ajax({
        type:"POST",
        url:"feldolgoz.php",
        data:teendoObj,
        success:function(valasz){
            console.log(valasz);
            var tartalom = $("#TODOlista").html();
            $("#TODOlista").html(tartalom+valasz);
        },
        error:function(){
            alert("Hiba a teendő hozzáadása során!");
        }
    });
}

function torol(IDSzam) {
    var torolObj = {
        IDSzam:IDSzam
    };
    $.ajax({
        type:"POST",
        url:"torol.php",
        data:torolObj,
        success:function(valasz){
            $("#"+IDSzam).remove();
            console.log(valasz);
        },
        error:function(){
            alert("Hiba a teendő törlése során!");
        }
    });
}

function kesz(IDSzam) {
    var keszObj = {
        IDSzam:IDSzam
    };
    $.ajax({
        type:"POST",
        url:"modosit.php",
        data:keszObj,
        success:function(valasz){
            var szoveg = $("#"+IDSzam+" p:first-child").text();
            var athuzott = "<s>"+szoveg+"</s>";
            $("#"+IDSzam+" p:first-child").html(athuzott);
            console.log(athuzott);
        },
        error:function(){
            alert("Hiba a teendő állapotának változtatása során!");
        }
    });
}

function betolt() {
    $.ajax({
        type:"POST",
        url:"betolt.php",
        success:function(valasz){
            $("#TODOlista").html(valasz);
        },
        error:function(){
            alert("Hiba a teendők lekérdezése során!");
        }
    });
}

function rendez(oszlop) {
    var egyik, masik;
    var lista = document.getElementById("TODOlista");
    var sorok = lista.getElementsByTagName("li");
    var kellCsere = true;
    while (kellCsere) {
        kellCsere = false;
        for (var j = 0; j < sorok.length-1; j++) {
            if (oszlop === "todo") {
                egyik = sorok[j].getElementsByTagName("p")[0].innerHTML;
                masik = sorok[j+1].getElementsByTagName("p")[0].innerHTML;
                if (egyik.toLowerCase() > masik.toLowerCase()) {
                    lista.insertBefore(sorok[j+1], lista.childNodes[j]);
                    kellCsere = true;
                }
            }
            else if (oszlop === "datum") {
                egyik = sorok[j].getElementsByTagName("p")[1].innerHTML;
                masik = sorok[j+1].getElementsByTagName("p")[1].innerHTML;
                var dEgyik = new Date(egyik);
                var dMasik = new Date(masik);
                if (dEgyik > dMasik) {
                    lista.insertBefore(sorok[j+1], lista.childNodes[j]);
                    kellCsere = true;
                }
            }
        }
    }
}

$(function(){
});