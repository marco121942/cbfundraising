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
let clickCatroce = false;
let clickQuince = false;
let clickDieciseis = false;
let clickDiecisiete = false;
let clickDieciocho = false;
let clickDiecinueve = false;
let clickVeinte = false;
let clickVeintiuno = false;
let clickVeintidos = false;
let clickVeintitres = false;
let clickVeinticuatro = false;
let clickVeinticinco = false;
let clickVeintiseis = false;
let clickVeintisiete = false;
let clickVeintiocho = false;
let clickVeintinueve = false;
let clickTreinta = false;

let alertar = true;

const prevenir = function(e) {
    e.preventDefault();
};
let cargado = false;
let objeto = null;

function preload() {
    img = loadImage('assets/game/boletos/Cuadro_Boleto_6$.png');
}

function setup(){
    myCanvas = createCanvas(170, 314);
    myCanvas.parent("Scrach");
    background(img);
    if (img) {
        cargador();
    }
};

function draw(){
    cargado = true;
    stroke(225);
    strokeWeight(8);
    if (mouseIsPressed === true){
        objeto = erase();
        line(mouseX, mouseY, pmouseX, pmouseY);
        if(pmouseX > 5 && pmouseX < 37 && pmouseY > 5 && pmouseY < 34){
            clickUno = true;
            console.log('clickUno');
        };
        if(pmouseX > 37 && pmouseX < 69 && pmouseY > 5 && pmouseY < 34){
            clickDos = true;
            console.log('clickDos');
        };
        if(pmouseX > 69 && pmouseX < 100 && pmouseY > 5 && pmouseY < 34){
            clickTres = true;
            console.log('clickTres');
        };
        if(pmouseX > 5 && pmouseX < 37 && pmouseY > 34 && pmouseY <  64){
            clickCuatro = true;
            console.log('clickCuatro');
        };
        if(pmouseX > 37 && pmouseX < 69 && pmouseY > 34 && pmouseY <  64){
            clickCinco = true;
            console.log('clickCinco');
        };
        if(pmouseX > 69 && pmouseX < 100 && pmouseY > 34 && pmouseY <  64){
            clickSeis = true;
            console.log('clickSeis');
        };
        if(pmouseX > 5 && pmouseX < 37 && pmouseY > 64 && pmouseY < 94){
            clickSiete = true;
            console.log('clickSiete');
        };
        if(pmouseX > 37 && pmouseX < 69 && pmouseY > 64 && pmouseY < 94){
            clickOcho = true;
            console.log('clickOcho');
        };
        if(pmouseX > 69 && pmouseX < 100 && pmouseY > 64 && pmouseY < 94){
            clickNueve = true;
            console.log('clickNueve');
        };
        //-----------------------------
        if(pmouseX > 5 && pmouseX < 37 && pmouseY > 94 && pmouseY < 119){
            clickDiez = true;
            console.log('clickDiez');
        };
        if(pmouseX > 37 && pmouseX < 69 && pmouseY > 94 && pmouseY < 119){
            clickOnce = true;
            console.log('clickOnce');
        };
        if(pmouseX > 69 && pmouseX < 100 && pmouseY > 94 && pmouseY < 119){
            clickDoce = true;
            console.log('clickDoce');
        };

        if(pmouseX > 5 && pmouseX < 37 && pmouseY > 119 && pmouseY < 149){
            clickTrece = true;
            console.log('clickTrece');
        };
        if(pmouseX > 37 && pmouseX < 69 && pmouseY > 119 && pmouseY < 149){
            clickCatroce = true;
            console.log('clickCatroce');
        };
        if(pmouseX > 69 && pmouseX < 100 && pmouseY > 119 && pmouseY < 149){
            clickQuince = true;
            console.log('clickQuince');
        };

        if(pmouseX > 5 && pmouseX < 37 && pmouseY > 149 && pmouseY < 183){
            clickDieciseis = true;
            console.log('clickDieciseis');
        };
        if(pmouseX > 37 && pmouseX < 69 && pmouseY > 149 && pmouseY < 183){
            clickDiecisiete = true;
            console.log('clickDiecisiete');
        };
        if(pmouseX > 69 && pmouseX < 100 && pmouseY > 149 && pmouseY < 183){
            clickDieciocho = true;
            console.log('clickDieciocho');
        };

        if(pmouseX > 5 && pmouseX < 37 && pmouseY > 183 && pmouseY < 215){
            clickDiecinueve = true;
            console.log('clickDiecinueve');
        };
        if(pmouseX > 37 && pmouseX < 69 && pmouseY > 183 && pmouseY < 215){
            clickVeinte = true;
            console.log('clickVeinte');
        };
        if(pmouseX > 69 && pmouseX < 100 && pmouseY > 183 && pmouseY < 215){
            clickVeintiuno = true;
            console.log('clickVeintiuno');
        };

        if(pmouseX > 5 && pmouseX < 37 && pmouseY > 215 && pmouseY < 245){
            clickVeintidos = true;
            console.log('clickVeintidos');
        };
        if(pmouseX > 37 && pmouseX < 69 && pmouseY > 215 && pmouseY < 245){
            clickVeintitres = true;
            console.log('clickVeintitres');
        };
        if(pmouseX > 69 && pmouseX < 100 && pmouseY > 215 && pmouseY < 245){
            clickVeinticuatro = true;
            console.log('clickVeinticuatro');
        };

        if(pmouseX > 5 && pmouseX < 37 && pmouseY > 245 && pmouseY < 275){
            clickVeinticinco = true;
            console.log('clickVeinticinco');
        };
        if(pmouseX > 37 && pmouseX < 69 && pmouseY > 245 && pmouseY < 275){
            clickVeintiseis = true;
            console.log('clickVeintiseis');
        };
        if(pmouseX > 69 && pmouseX < 100 && pmouseY > 245 && pmouseY < 275){
            clickVeintisiete = true;
            console.log('clickVeintisiete');
        };

        if(pmouseX > 5 && pmouseX < 37 && pmouseY > 275 && pmouseY < 305){
            clickVeintiocho = true;
            console.log('clickVeintiocho');
        };
        if(pmouseX > 37 && pmouseX < 69 && pmouseY > 275 && pmouseY < 305){
            clickVeintinueve = true;
            console.log('clickVeintinueve');
        };
        if(pmouseX > 69 && pmouseX < 100 && pmouseY > 275 && pmouseY < 305){
            clickTreinta = true;
            console.log('clickTreinta');
        };

        if(clickUno && clickDos && clickTres && clickCuatro && clickCinco && clickSeis && clickSiete && clickOcho && clickNueve && clickDiez && clickOnce && clickDoce && clickTrece && clickCatroce && clickQuince && clickDieciseis && clickDiecisiete && clickDieciocho && clickDiecinueve && clickVeinte && clickVeintiuno && clickVeintidos && clickVeintitres && clickVeinticuatro && clickVeinticinco && clickVeintiseis && clickVeintisiete && clickVeintiocho && clickVeintinueve && clickTreinta && alertar){
            raspado();
            alertar = false;
        };
    };

};

function mousePressed() {
    if(pmouseX > 0 && pmouseX < 170 && pmouseY > 0 && pmouseY < 314){
        disableScroll();
        console.log(pmouseX, pmouseY);
    };
}

function mouseReleased() {
    enableScroll();
    if(pmouseX > 0 && pmouseX < 170 && pmouseY > 0 && pmouseY < 314 && alertar === false){
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