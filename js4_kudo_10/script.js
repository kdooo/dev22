const button = document.getElementById("btn");
const image = document.getElementById('image');

async function callApi(){
    const res = await fetch("https://yesno.wtf/api");
    const users = await res.json();
    // image.src = users.image;
    let new_div = document.createElement('div');
    new_div.classList.add("wrap")
    let new_img = document.createElement('img');
    new_img.src = users.image;
    new_div.appendChild(new_img);  
    let new_p = document.createElement('p');
    new_p.textContent = users.answer;
    new_div.appendChild(new_p);

    console.log(users);

    // function getRandomInt(min, max) {
    // return Math.floor(Math.random() * (max - min + 1)) + min;
    // }

    // /* topの範囲は 0 ~ (areaの高さ - ランダム表示する画像の高さ)*/
    // top = getRandomInt(0, clientHeight - imageHeight),
    // /* leftの範囲は 0 ~ (areaの幅 - ランダム表示する画像の幅)*/
    // left = getRandomInt(0, clientWidth - imageWidth);

    let min = 5 ;
    let max = window.innerHeight ;

    let top = Math.floor( Math.random() * (max + 1 - min) ) + min ;
    let left = Math.floor( Math.random() * (max + 1 - min) ) + min ;

    new_div.style.top = top + 'px';
    new_div.style.left = left + 'px';
    image.appendChild(new_div);

}

// window.addEventListener("load",callApi);
button.addEventListener("click",callApi);




//参考記事
// class RandomImg {
//     constructor() {
//     this.area = document.getElementById('area');
//     const button = document.getElementById("btn");
//     // ランダム表示する画像の幅・高さの定義
//     this.imageHeight = 100;
//     this.imageWidth = 200;

//     this.bindEvent();
//     }

//     async callApi(){
//     const res = await fetch("https://yesno.wtf/api");
//     const users = await res.json();
//     image.src = users.image;
//     image.innerHTML = users.answer;
//     console.log(users);
//     }
    
//     bindEvent() {
//     button.addEventListener('click', () => {
//         this.displayImage();
//     });
//     }

//     getRandomInt(min, max) {
//     return Math.floor(Math.random() * (max - min + 1)) + min;
//     }

//     displayImage() {
//     const image = document.createElement('img'),
//         { clientWidth, clientHeight } = this.area,
//         { imageWidth, imageHeight } = this,
//         /* topの範囲は 0 ~ (areaの高さ - ランダム表示する画像の高さ)*/
//         top = this.getRandomInt(0, clientHeight - imageHeight),
//         /* leftの範囲は 0 ~ (areaの幅 - ランダム表示する画像の幅)*/
//         left = this.getRandomInt(0, clientWidth - imageWidth);


//     image.src = users.image;
//     image.style.position = 'absolute';
//     image.style.top = top + 'px';
//     image.style.left = left + 'px';

//     this.area.appendChild(image);
//     }
// };

// new RandomImg();



    