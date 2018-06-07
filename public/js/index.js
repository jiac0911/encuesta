function habilitar(value)
{
    if(value=="1")
    {
        // habilitamos
        document.getElementById("beca").disabled=false;
    }else if(value=="2"){
        // deshabilitamos
        document.getElementById("beca").disabled=true;
    }
    if(value=="3")
    {
        // habilitamos
        document.getElementById("rep1").disabled=false;
        document.getElementById("cantRep1").disabled=false;
        document.getElementById("cantMat").disabled=false;
    }else if(value=="4"){
        // deshabilitamos
        for (i=1; i <= 7; i++) {
            document.getElementById("cantRep"+i).disabled=true;
            document.getElementById("rep"+i).disabled=true;
        }
        document.getElementById("cantMat").disabled=true;
    }else if(document.getElementById("otro").checked){
        // deshabilitamos
        document.getElementById("otroV").disabled=false;
    }else if(!document.getElementById("otro").checked){
        // deshabilitamos
        document.getElementById("otroV").disabled=true;
    }
}

function crearInputs()
{
    var cantM=document.getElementById("cantMat");
    var j=cantM.options[cantM.selectedIndex].value;
    for (i=1; i <= 7; i++) {
        if (i <= j) {
            document.getElementById("rep"+i).disabled=false;
            document.getElementById("cantRep"+i).disabled=false;
        }
        else{
            document.getElementById("cantRep"+i).disabled=true;
            document.getElementById("rep"+i).disabled=true;
        }
    }
}