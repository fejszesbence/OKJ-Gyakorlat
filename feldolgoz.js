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
            console.log(valasz);
        },
        error:function(){
            alert("Hiba a teendő törlése során!");
        }
    });
}

$(function(){
    
});