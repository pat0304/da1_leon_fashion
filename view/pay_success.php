<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>

        .container{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        .bi-check-circle{
            font-size: 2.5em !important; 
            color: rgb(0, 222, 0);
        }
        .back-index{
            padding: 10px;
            background-color: rgb(255, 74, 74);
            border: 0;
            font-size: 14px;
            color: white;
            cursor: pointer;
        }
        .back-index:hover{    
            background-color: rgb(252, 44, 44);
        }
        .success-box{
            text-align: center;
        }
        .success-box h1{
            padding: 0;
            font-size: 30px;
        }
        .success-box h1{
            padding: 0;
            font-size: 30px;
            color: black;

        }
        .success-box button{
            margin-top: 20px;
            
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="success-box" >
            <h1><i class="bi bi-check-circle"></i></h1>
            <h1>Thanh Toán Thành Công</h1>
            <h3>Cảm ơn vì đã tin tưởng và mua hàng của Leon Fashion </h3>
            <a href="index.php"><button class="back-index">Quay lại trang chủ</button></a>
        </div>
    </div>
</body>
</html>