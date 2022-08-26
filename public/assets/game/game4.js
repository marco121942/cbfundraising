let img;
let imagenesACargar = document.querySelectorAll("img[data-src]");

let clickUno = false;
let clickDos = false;
let clickTres = false;
let clickCuatro = false;
let clickCinco = false;
let clickSeis = false;
let clickSiete = false;
let clickOcho = false;
let clickNueve = false;
let clickDiez = false;
let clickOnce = false;
let clickDoce = false;
let clickTrece = false;
let clickCatorce = false;
let clickQuince = false;
let clickSeisB = false;
let clickSieteB = false;
let clickOchoB = false;
let clickNueveB = false;
let clickDiezB = false;
let clickOnceB = false;
let clickDoceB = false;
let clickTreceB = false;
let clickCatorceB = false;
let clickQuinceB = false;
let alertar = true;

const prevenir = function(e) {
    e.preventDefault();
};

let cargado = false;
let objeto = null;

function preload() {
    img = loadImage('assets/game/boletos/Cuadro_Boleto_4$.png');
}

function setup(){
    myCanvas = createCanvas(318, 188);
    myCanvas.parent("Scrach");
    background(img);
    if (img) {
        cargador();
    }
};

function draw(){
    cargado = true;
    stroke(225);
    strokeWeight(14);
    if (mouseIsPressed === true){
        objeto = erase();
        line(mouseX, mouseY, pmouseX, pmouseY);
        if(pmouseX > 10 && pmouseX < 70 && pmouseY > 10 && pmouseY < 50){
            clickUno = true;
            console.log('clickUno');
        };
        if(pmouseX > 70 && pmouseX < 130 && pmouseY > 10 && pmouseY < 50){
            clickDos = true;
            console.log('clickDos');
        };
        if(pmouseX > 130 && pmouseX < 190 && pmouseY > 10 && pmouseY < 50){
            clickTres = true;
            console.log('clickTres');
        };
        if(pmouseX > 190 && pmouseX < 250 && pmouseY > 10 && pmouseY < 50){
            clickCuatro = true;
            console.log('clickCuatro');
        };
        if(pmouseX > 250 && pmouseX < 310 && pmouseY > 10 && pmouseY < 50){
            clickCinco = true;
            console.log('clickCinco');
        };
        //---------------
        if(pmouseX > 25 && pmouseX < 80 && pmouseY > 50 && pmouseY < 85){
            clickSeis = true;
            console.log('clickSeis');
        };
        if(pmouseX > 80 && pmouseX < 135 && pmouseY > 50 && pmouseY < 85){
            clickSiete = true;
            console.log('clickSiete');
        };
        if(pmouseX > 135 && pmouseX < 185 && pmouseY > 50 && pmouseY < 85){
            clickOcho = true;
            console.log('clickOcho');
        };
        if(pmouseX > 185 && pmouseX < 235 && pmouseY > 50 && pmouseY < 85){
            clickNueve = true;
            console.log('clickNueve');
        };
        if(pmouseX > 235 && pmouseX < 300 && pmouseY > 50 && pmouseY < 85){
            clickDiez = true;
            console.log('clickDiez');
        };
        //---------------
        if(pmouseX > 25 && pmouseX < 80 && pmouseY > 85 && pmouseY < 120){
            clickSeisB = true;
            console.log('clickSeisB');
        };
        if(pmouseX > 80 && pmouseX < 135 && pmouseY > 85 && pmouseY < 120){
            clickSieteB = true;
            console.log('clickSieteB');
        };
        if(pmouseX > 135 && pmouseX < 185 && pmouseY > 85 && pmouseY < 120){
            clickOchoB = true;
            console.log('clickOchoB');
        };
        if(pmouseX > 185 && pmouseX < 235 && pmouseY > 85 && pmouseY < 120){
            clickNueveB = true;
            console.log('clickNueveB');
        };
        if(pmouseX > 235 && pmouseX < 300 && pmouseY > 85 && pmouseY < 120){
            clickDiezB = true;
            console.log('clickDiezB');
        };
        //----------------
        if(pmouseX > 25 && pmouseX < 80 && pmouseY > 120 && pmouseY < 150){
            clickOnce = true;
            console.log('clickOnce');
        };
        if(pmouseX > 80 && pmouseX < 135 && pmouseY > 120 && pmouseY < 150){
            clickDoce = true;
            console.log('clickDoce');
        };
        if(pmouseX > 135 && pmouseX < 185 && pmouseY > 120 && pmouseY < 150){
            clickTrece = true;
            console.log('clickTrece');
        };
        if(pmouseX > 185 && pmouseX < 235 && pmouseY > 120 && pmouseY < 150){
            clickCatorce = true;
            console.log('clickCatorce');
        };
        if(pmouseX > 235 && pmouseX < 300 && pmouseY > 120 && pmouseY < 150){
            clickQuince = true;
            console.log('clickQuince');
        };
        //----------------
        if(pmouseX > 25 && pmouseX < 80 && pmouseY > 150 && pmouseY < 180){
            clickOnceB = true;
            console.log('clickOnceB');
        };
        if(pmouseX > 80 && pmouseX < 135 && pmouseY > 150 && pmouseY < 180){
            clickDoceB = true;
            console.log('clickDoceB');
        };
        if(pmouseX > 135 && pmouseX < 185 && pmouseY > 150 && pmouseY < 180){
            clickTreceB = true;
            console.log('clickTreceB');
        };
        if(pmouseX > 185 && pmouseX < 235 && pmouseY > 150 && pmouseY < 180){
            clickCatorceB = true;
            console.log('clickCatorceB');
        };
        if(pmouseX > 235 && pmouseX < 300 && pmouseY > 150 && pmouseY < 180){
            clickQuinceB = true;
            console.log('clickQuinceB');
        };
        //----------------


        if( clickUno && clickDos && clickTres && clickCuatro && clickCinco && clickSeis
        && clickSiete && clickOcho && clickNueve && clickDiez && clickOnce && clickDoce
        && clickTrece && clickCatorce && clickQuince && clickSeisB && clickSieteB
        && clickOchoB && clickNueveB && clickDiezB && clickOnceB && clickDoceB
        && clickTreceB && clickCatorceB && clickQuinceB && alertar ){
            raspado();
            alertar = false;
        };
    };

};

function mousePressed() {
    if(pmouseX > 0 && pmouseX < 318 && pmouseY > 0 && pmouseY < 188){
        disableScroll();
        console.log(pmouseX, pmouseY);
    };
}

function mouseReleased() {
    enableScroll();
    if(pmouseX > 0 && pmouseX < 318 && pmouseY > 0 && pmouseY < 188 && alertar === false){
        otraCelebrada();
    };
}

function disableScroll(){
    let x = window.scrollX;
    let y = window.scrollY;
    console.log('detenido');
    $('body').css({'overflow':'hidden'});
    $(document).bind('scroll',function () { 
       window.scrollTo(x,y); 
    });
    document.body.addEventListener('touchmove',
        prevenir, { passive: false });
}

function enableScroll(){
    console.log('andando');
    $(document).unbind('scroll'); 
    $('body').css({'overflow':'visible'});
    document.body.removeEventListener('touchmove',
        prevenir);
}

function cargador(){
    imagenesACargar[0].src = imagenesACargar[0].dataset.src;
    console.log(imagenesACargar[0].dataset.src);
}