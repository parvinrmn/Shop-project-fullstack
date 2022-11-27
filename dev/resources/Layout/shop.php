<!DOCTYPE html>
<html lang="en">
<head>
    <title>Shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../public/css/fontawesome-free-6.2.0-web/css/all.min.css">

    <style>
        body{
            background: #362d2f;
            display: flex;
            flex-wrap: wrap;
            font-family: Arial;
        }
        body>*{
            min-width: 500px;
            width: 100%;
            position: relative;
        }
        
        .navbar{
            background-image: linear-gradient(60deg, #4a3d3b 45% , gray);
        }

        #collapsibleNavbar{
            /*background: palevioletred;*/
            display: flex;
            justify-content: space-between;
            padding: 0 10px;
        }
        .navbar-brand>img{
            width: 35px;
            height: 35px;
        }
        #user{
            font-size: 17px;
            font-weight: 600;
            display: flex;
            justify-content: center;
            align-content: center;
            align-items: center;
            cursor: default;
            color: #271e20 !important;
        }
        #user>*{
            margin: 0 0 0 5px !important ;
        }
        #user>strong{
            font-size: 17px;
            font-weight: 700;
            color: rgba(50,37,44,1);
        }
        .nav-item:nth-of-type(2)>a{
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        #collapsibleNavbar>a{
            color: #271e20;
            text-transform: capitalize;
            font-size: 16px;
            font-weight: 700;
            transform-origin: 0 0 ;
            transition: .5s;
        }
        #collapsibleNavbar>a:hover{
            color: #463c3c;
            transform: scale(1.03);
            transition: .5s;

        }

        .jumbotron{
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0;
            align-self: end;
            background: rgba(122,103,107,0.72);
        }
        .jumbotron>p{
            margin: 0;
        }
        .content{
            height: auto;
        }
        .invoice-content{
            width: 100%;
            min-height: 80vh;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            align-content: flex-start;
        }
        .list-group{
            height: 55px !important;
            background: rgba(122,103,107,0.72);
            display: flex;
            align-items: center;
            flex-wrap: nowrap;

        }
        .main-list{
            min-width: 400px;
            justify-content: space-between;
            padding:0 5px;
        }
        .list-group-item{
            height: 55px;
            color: #1b1e21;
            font-weight: 600;
            font-size: 16px;

        }
        .main-list-item{
            background: rgba(122,103,107,0);
            padding: 0 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: nowrap;
            border: 0px;
            cursor: pointer;
            transition: .4s;
        }

        .main-list-item:last-child:hover{
            color : rgba(67,48,48,0.93);
            transform: scale(1.05);
        }
        .active-color{
            color: #393030;
        }
        .invoices{
            margin:0;
            min-width: 300px;
            background: rgba(57,98,48,0);
            display: flex;
            justify-content: flex-start;
            align-items: center;
            flex-wrap: nowrap;
            margin: 0;
        }
        .invoices>*{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: nowrap;
            color: rgba(57,48,48,0.93);
            transition: .4s;
        }
        .invoices>*:hover{
            transform: scale(1.05);
        }
        .tbl{
            height: auto;
            margin-bottom: 1rem;
        }
        .tbl>span{
            display: flex;
            width: 100px;
            height: 30px;
            justify-content: flex-start;
            align-items: center;
            padding-left: 20px;
            color: #c0b1b5;
            font-weight: 700;
        }
        .tbl>div:last-child{
            height: 50px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 0 20px 0px 0;
        }
        .tbl>div:last-child>input{
            color: #c0b1b5;
            transition: 0.7s;
        }
        .tbl>div:last-child>input:hover{
            border: 1px solid rgba(131,93,121,0.55);
            border-radius: 10px;
        }
        #table{
            padding: 0;
        }
        .table{
            background: #3c3133;
            margin-bottom: 0 !important;
        }
        tr{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: nowrap;
        }
        .table>thead>tr>th,
        .table>tbody>tr>td{
            width: 100px;
            /*max-width: 280px;*/
            flex-grow: 2;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #120c0c;
            font-size: 17px;
            border: 0px solid red;
            font-family: Arial;
            font-style: italic;
            padding: 5px 5px;
        }
        .table>thead>tr>th:first-child,
        .table>tbody>tr>td:first-child{
            max-width: 80px;
            flex-grow: 1;
        }
        .table>thead>tr>th:nth-child(5),
        .table>tbody>tr>td:nth-child(5){
            flex-grow: 2;
            max-width: 100px;
        }
        .table>tbody>tr>td:nth-child(6){
            display: flex;
            justify-content: space-evenly;
            align-items: center;
        }
        .table>tbody>tr>td:nth-child(6)>*{
            cursor: pointer;
            transition: .7s;
        }
        .table>tbody>tr>td:nth-child(6)>*:hover{
            text-shadow: 0px 0px 15px rgba(200,153,165,0.87);
        }
        .total>#total{
            color: #c0b1b5;
            margin-bottom: 0;
        }
        .total>#sum{
            display: flex;
            justify-content: flex-end;
            padding-right: 100px;
            align-items: center;
            color: #c0b1b5;
            font-weight: 400;
            font-size: 16px;
        }
        .modal-content{
            width: 500px;
            background: #c0b1b5;
        }
        #pcode{
            width: 100px !important;
            height: 30px;
        }
        #pcode{
            width: 300px;
            height: 30px ;
        }

        #log-out-icon{
            display: none;
        }
        #userName-icon{
            display: none;
        }

        @media screen and (max-width: 793px){
            .navbar{
                flex-wrap: nowrap;
            }
            .navbar-nav{
                flex-direction: row;
                flex-wrap: nowrap;
            }
            .navbar-nav>*{
                margin: 0 2px;
            }
            #log-out-icon{
                display: flex;
                /*border: 1.5px solid #4a3d3b;*/
                box-shadow: 5px 5px 10px #4a3d3b;
                border-radius: 40%;
                padding: 8px;
                transition: .4s;
                cursor: pointer;
            }
            #log-out-icon:hover{
                box-shadow: 3px 3px 5px #4a3d3b;

            }
            #log-out{
                display: none;
            }
            #userName-icon{
                display: flex;
                width: 100%;
                height: 100%;
                align-items: center;
                padding: 0 10px;
                cursor: pointer;
                transition: .4s;
            }
            #userName-icon:hover{
                text-shadow: 2px 2px 15px #271e20;
            }
            #userName{
                display: none;
            }
            .navbar-toggler{
                display: none;
            }

        }
    </style>
</head>
<body>
{content}
</body>
</html>
