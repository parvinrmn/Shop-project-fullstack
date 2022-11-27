<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Login</title>
    <style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    }
    body{
    background: #202120;
    }
    #myModal {
    margin: 100px auto;

    }
    .modal-content{
    background-image: linear-gradient(60deg, gray 45% , #4a3d3b);
    border-radius: 10px/8px;
    }
    .input-group-text{
    color: rgba(78,78,101,0.99);
    font-size: 14px;
    }
    .btn{
    width: 90px;
    height: 35px;
    display: flex;
    justify-content: center;
    align-items: center;
     outline: 1px solid white;
    transition: .7s;

    }
    .btn:hover{
    background: #d7d8d7;
    }
    .modal-title{
    color: #cbc1bc;
    font-size: 23px;
    }
    </style>
</head>
<body>
{content}
<script>
    $(function (){
        $('#myModal').show();
    })
</script>
</body>
</html>