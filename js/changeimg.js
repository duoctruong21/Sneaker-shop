var index = 0;
changeImage = function(){
    var imgs = ["./img/banner-sneaker-2.jpg","./img/banner-sneaker-3.jpg"];
    document.getElementById('slider__img').src = imgs[index];
    index++;
    if(index == imgs.length){
        index =0;
    }
}
setInterval(changeImage,3000);