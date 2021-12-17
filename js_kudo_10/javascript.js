    // コンピュータの手の画像ファイル名を配列に保存
    let pcJankens = ['01.png', '02.png', '03.png'];
 
    // ユーザの手の画像ファイル名を配列に保存
    let userJankens = ['01.png', '02.png', '03.png'];


    
function janken(user) {

 
    // コンピュータの手を乱数(0～2）で作成
    let pc = Math.floor(Math.random() * 3);
 
    // ユーザの手の画像を表示する
    let userImg = document.getElementById("userImg");
    // 検索したimgを設定
    userImg.src = "img/" + userJankens[user];
 
    // コンピュータの手の画像を表示する
    let pcImg = document.getElementById("pcImg");
    // 検索したimgを設定
    pcImg.src = "img/" + pcJankens[pc];
 
    // ユーザから見た勝敗結果
    let judge = [['DRAW', 'YOU WIN', 'YOU LOSE'],
                  ['YOU LOSE', 'DRAW', 'YOU WIN'],
                  ['YOU WIN', 'YOU LOSE', 'DRAW']];
 
    // 勝敗結果
    document.getElementById("judge").textContent = judge[user][pc];


}



