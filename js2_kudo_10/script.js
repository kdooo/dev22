


$("#save").on("click",function(){
    const key = $("#key").val();
    console.log(key,'key');
    
    const value = $("#memo").val();
    console.log(value,'value');

    const day = $("#day").val();
    console.log(day,'day');
    
    localStorage.setItem(key,value,day);

    const html =`
    <tr>
        <th>${key}</th>
        <th>${day}</th>
        <td>${value}</td>
    </tr>    
    `;

    $("#list").append(html);
});


//clear　クリックイベント
$("#clear").on("click",function(){
    localStorage.clear();
    $("#list").empty();
});


//ページ読み込み：保存データ取得表示
//dayが取得できない
for(let i =0 ; i < localStorage.length ; i++){
    const key = localStorage.key(i);
    const value = localStorage.getItem(key);
    const html =`
    <tr>
        <th>${key}</th>
        <th>${day}</th>
        <td>${value}</td>
    </tr>           
    `;

    $("#list").append(html);
}


//typewriterのアニメーション（写経）
const typewriter = (param) => {

    let el = document.querySelector(param.el);
    let speed = param.speed;
    let string = param.string.split("");
    string.forEach((char, index) => {
        setTimeout(() => {
            el.textContent += char;
        }, speed * index);
    });
};

typewriter({
    el: "#typewriter", //要素
    string: "MEMO APP", //文字列
    speed: 150 //速度
});
