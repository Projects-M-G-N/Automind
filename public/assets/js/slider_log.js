let imgs = document.querySelectorAll(".img-slider");
let img_selecionada = document.querySelectorAll(".imagens-slide label");
let quant_img = imgs.length;
let img_atual = 0;
let time = 5000;

function proxImage(slide = img_atual, troca = false) {
    console.log(img_atual)
    imgs[img_atual].classList.remove("selected");
    img_selecionada[img_atual].classList.remove("select");

    img_atual ++;
    if(troca) {
        img_atual = slide
    }
    
    if(img_atual >= quant_img) {
        img_atual = 0;
    }

    imgs[img_atual].classList.add("selected");
    img_selecionada[img_atual].classList.add("select");
}

function comeco() {
    setInterval(() => {
        proxImage()
    }, time)
}

window.addEventListener('load', comeco());