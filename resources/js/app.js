//Obtenemos la url actual para luego verificar que codigo pertence a cada pagina para ejecutar sus propios metodos
var url = window. location. href;
// Hacemos un split para desahernos de las varibles que llegan por la url
var frg = url.split("?");
var result = frg[0];
console.log(result);


//Metodo para el boton de submit en la vista loanIndex para habilitar los inputs antes de mandarlos
if (result == 'http://localhost:8000/prestamos') {    

    document.getElementById('sendLoan1').addEventListener('click',function e() {
        // document.getElementById('title').disabled = false;
        // document.getElementById('library').disabled = false;
        // document.getElementById('id').disabled = false;   
        document.getElementById("form1").submit();
        
    })

    document.getElementById('sendLoan2').addEventListener('click',function e() {
        document.getElementById('title').disabled = false;
        document.getElementById('library').disabled = false;
        document.getElementById('id').disabled = false;   
        document.getElementById("form2").submit();
        
    }) 
}






