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
let alertar = true;

const prevenir = function(e) {
    e.preventDefault();
};
let cargado = false;
let objeto = null;

function preload() {
    img = loadImage('assets/game/boletos/Cuadro_Boleto_2$.png');
}

function setup(){
    myCanvas = createCanvas(150, 150);
    myCanvas.parent("Scrach");
    background(img);
    if (img) {
        cargador();
    }
};

function draw(){
    cargado = true;
    stroke(225);
    strokeWeight(17);
    if (mouseIsPressed === true){
        objeto = erase();
        line(mouseX, mouseY, pmouseX, pmouseY);
        if(pmouseX > 5 && pmouseX < 55 && pmouseY > 5 && pmouseY < 55){
            clickUno = true;
            console.log('clickUno');
        };
        if(pmouseX > 55 && pmouseX < 100 && pmouseY > 5 && pmouseY < 55){
            clickDos = true;
            console.log('clickDos');
        };
        if(pmouseX > 100 && pmouseX < 145 && pmouseY > 5 && pmouseY < 55){
            clickTres = true;
            console.log('clickTres');
        };
        if(pmouseX > 5 && pmouseX < 55 && pmouseY > 55 && pmouseY <  100){
            clickCuatro = true;
            console.log('clickCuatro');
        };
        if(pmouseX > 55 && pmouseX < 100 && pmouseY > 55 && pmouseY <  100){
            clickCinco = true;
            console.log('clickCinco');
        };
        if(pmouseX > 100 && pmouseX < 145 && pmouseY > 55 && pmouseY <  100){
            clickSeis = true;
            console.log('clickSeis');
        };
        if(pmouseX > 5 && pmouseX < 55 && pmouseY > 100 && pmouseY < 145){
            clickSiete = true;
            console.log('clickSiete');
        };
        if(pmouseX > 55 && pmouseX < 100 && pmouseY > 100 && pmouseY < 145){
            clickOcho = true;
            console.log('clickOcho');
        };
        if(pmouseX > 100 && pmouseX < 145 && pmouseY > 100 && pmouseY < 145){
            clickNueve = true;
            console.log('clickNueve');
        };
        if(clickUno && clickDos && clickTres && clickCuatro && clickCinco && clickSeis && clickSiete && clickOcho && clickNueve && alertar){
            raspado();
            alertar = false;
        };
    };

};

function mousePressed() {
    if(pmouseX > 0 && pmouseX < 150 && pmouseY > 0 && pmouseY < 150 ){
        disableScroll();
        console.log(pmouseX, pmouseY);
    };
}

function mouseReleased() {
    enableScroll();
    if(pmouseX > 0 && pmouseX < 150 && pmouseY > 0 && pmouseY < 150 && alertar === false){
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