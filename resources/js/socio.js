window.addEventListener('load', ini, false);
    function ini() {                                    
        setTimeout(function () {                
            $("#mensaje").fadeOut(500);
        }, 4000);   
};

var childrenP = document.getElementById('buttDivPers').children;
var childrenC = document.getElementById('buttDivClubs').children;

for (let i = 0; i < childrenP.length; i++) {
    let element = childrenP[i].value;        
    document.getElementById('pers' + element).addEventListener('click', function e(){          
        document.getElementById('codPer').value = document.getElementById('pers' + element).value;
        document.getElementById('nombre').value = document.getElementById('nombPers' + element).textContent;
    });    
}

for (let i = 0; i < childrenC.length; i++) {
    let element = childrenC[i].value;        
    document.getElementById('club' + element).addEventListener('click', function e(){          
        document.getElementById('codClu').value = document.getElementById('club' + element).value;
        document.getElementById('club').value = document.getElementById('nombClub' + element).textContent;
    });    
}

document.getElementById('nuevoSoci').addEventListener('click',function e() {
    document.getElementById('codSoc').disabled = false;
    document.getElementById('codPer').disabled = false; 
    document.getElementById('codClu').disabled = false;     
});
