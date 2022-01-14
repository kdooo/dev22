<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reset.css">

    <style>
       body{
        background-color: #F5F5F5;
       } 

       .wrap{
           text-align: center;
           max-width: 300px;
           margin:auto;

       }

       .title{
           margin-bottom: 5px ;
       }

       .text_form{
           margin-bottom: 20px;
           padding: 5px;
           width: 300px;
       }

       .post{
            margin-top: 100px;  
           text-align:left;
       }

       .btn{
           width: 60px;
       }




    </style>

    <title>Document</title>
</head>
<body>
    <div class="wrap">
        <form action="write.php" method="post" class="post">
            <p class="title" title>お名前</p><input type="text" name="name" class="text_form">
            <p class="title">出身</p><input type="text" name="birthplace" class="text_form">
            <p class="title">誕生日</p><input type="text" name="birthday" class="text_form">
            <p><input type="submit" value="送信" class="btn"></p>
        </form>
    </div>



    
</body>
</html>