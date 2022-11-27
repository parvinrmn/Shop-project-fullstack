<?php



$content = '

<!-- START OF NAVBAR -->

<nav class="navbar navbar-expand-sm bg-dark navbar-dark"">
    <a class="navbar-brand" id="logo" href="shop">
    <img src="../../public/img/logo.png">
</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav row" >
            <li class="nav-item">
                <a class="nav-link" href="#" id="user">Dear </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#addUserModal" id="userName">AddUser</a>
                <i class="fa-solid fa-user-plus" id="userName-icon"></i>
            </li> 
        </ul>
        <a class="nav-link" href="../shop/logOut" id="log-out">Log Out</a>
        <i class="fa-solid fa-right-from-bracket" id="log-out-icon"></i>
    </div>
</nav>

<!-- START OF CONTENT -->
<div class="invoice-content">
<div class="container content" style="margin-top:30px">
    <ul class="list-group list-group-horizontal main-list">
    <li class="list-group-item main-list-item">
        <ul class="list-group list-group-horizontal invoices">
            <li class="list-group-item main-list-item" id="new-invoice"  > + New </li>
        </ul>
    </li>
    </ul>
    
  <!-- The INVOICE Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title">Enter the product code or name </h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->

      <div class="modal-body">
            <div class="form-group">
                <label for="pcode">PCode:</label>
                <input type="text" class="form-control" name="Pcode" id="pcode">
                <label for="pname">PName:</label>
                <input type="search" class="form-control" name="Pname" id="pname" placeholder="Serach the product name here ..">
                <div class="container" id="table">          
  
            </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer addProduct" >
      
        <input type="submit" value="Add" class="btn btn-outline-dark" id="add" >

        <button type="button" class="btn btn-dark" data-dismiss="modal" id="close">Close</button>
      </div>

    </div>
  </div>
</div>
</div>
</div>
<!-- END OF CONTENT -->
</div>
<div class="jumbotron text-center" style="margin-bottom:0">
    <p>All &copy Rights reserved by Parvinrmn</p>
</div>
<!-- END OF FOOTER -->
<!-- The adduser Modal -->

<div class="modal" id="addUserModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add User</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>

            <!-- Modal body -->
            <form action="addUser" method="post">
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" name="username" id="usr" placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" id="pwd" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="authCode"  placeholder="Authentication Code">
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                
                <input type="submit" id="addUSer" value="Add" class="btn btn-default" >
            </form>
            <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
</body>
</html>

';




$this->layout(\App\Http\Config::SHOPLAYPUT_PATH,$content);



?>

<script>

    let sum = 0 ;
    let price = 0 ;
    let Num = 0;
    let counter = 1;


    $('#user').append("<strong><?=$data['user']?><strong>");


    document.getElementById('logo').addEventListener('click',function (e){
        e.preventDefault();
    })


    $('#new-invoice').on('click',function (e){
        Num = Math.floor(Math.random()*10000)

        $.ajax({
            url : "addInvoice/"+ Num,
            method:"post",

        }).fail(function(){
            console.log('error')
        });
        $('.content').append(`
        <div class="tbl">
        <span>Num ${Num}</span>
        <table class='table table-dark table-striped'>
        <thead>
        <tr>
        <th></th>
        <th>Code</th>
        <th>Product Name</th>
        <th>Num</th>
        <th>price</th>
        <th></th>
    </tr>
    </thead>
        <tbody id="tbody">
        <tr class="total">
            <td id="total">Total</td>
            <td id="sum"></td>
        </tr>
        </tbody>
    </table>
     <div >
          <input type="submit" value="Add" class="btn btn-default addProduct" id="addProduct"  data-toggle="modal" data-target="#myModal">
          <button type="button" class="btn btn-dark" data-id="close-tbl">Close</button>
     </div>
    </div>
        `

        )
        $(`.btn[data-id= "close-tbl"]`).on('click',function (){
            let number = $(this).parent().parent().children('span').text().substring(4,20)
            $.ajax({
                url: "removeInvoice/"+ number,
                method: "post",
                success:function (response){
                    console.log(response)
                }
            }).fail(function (){
                console.log("error")
            })
            $(this).parent().parent().remove();
        })
        counter = 1;

        $('#addProduct').on('click',function (e){

            $('#add').on('click',function (e){
                let pcode = $('#pcode').val();
                let pname = $('#pname').val();
                $('.msg').remove()
                if(pcode !== "" || pname !== ""){
                    $.ajax({
                        url : 'AddToInvoice/'+ pcode + ',' +pname + ','+ Num ,
                        method : 'post',
                        success : function (response){
                            let res = response.split(',');

                               $('.total').before('<tr class="item">' +
                                    `<td> ${counter} </td>` +
                                    `<td>  ${res[0]}</td>` +
                                    `<td>  ${res[1]}</td>` +
                                    `<td class="product-num">  1</td>` +
                                    `<td>  ${res[2]}</td>` +
                                    `<td><i class="fa-solid fa-plus add-item" ></i> <i class="fa-solid fa-trash delete-item"  id="del${counter}"></i></td>` +
                                    '</tr>');

                            /// har seri producti add mikonim be tamami table ha add mikone
                            //agar be current table dastrasi begirim moshkele instance add va instanceDelete ham hal mishe
                            sum+= parseInt(res[2]) ;
                            $('.total>#sum').text(sum);
                            counter++;

                            $('.add-item').on('click',function(e){
                                let flag = 0 ;
                                if(flag  == 0){

                                    let count = parseInt($(this).parent().parent().children('td:nth-of-type(4)').text());
                                    count+=1;
                                    $(this).parent().parent().children('td:nth-of-type(4)').text(count)
                                    let p = parseInt($(this).parent().parent().children('td:nth-of-type(5)').text())

                                    sum += p;
                                    $('.total>#sum').text(sum)
                                    flag++
                                }else{return}
                                //be tedade radif haye badesh add mikone
                            })

                            $('.delete-item').on('click',function (e){

                                $(this).parent().parent().attr("id",e.target.id.substring(3))
                                $.ajax({
                                    url: "instanceRemove/"+ e.target.id.substring(3) + "," + Num ,
                                    method: "post",
                                    success:function (response){
                                        console.log(response +"ree")
                                    }
                                }).fail(function(){
                                    console.log("error")
                                })

                                let rowId = e.target.id.substring(3)
                                price = $('#' +rowId).children("td:nth-child(5)").text();
                                let num = parseInt($('#' +rowId).children("td:nth-child(4)").text())
                                console.log($('#' +rowId).children("td:nth-child(4)").text()+"num")
                                if(num === 1){
                                    $('#'+ rowId).remove();
                                }else{
                                    $('#' +rowId).children("td:nth-child(4)").text(num-1)
                                    ////be tedad radif haye badesh kam mikone
                                }
                                sum -= price;
                                $('.total>#sum').text(sum);
                                price = 0 ;
                            })
                        }
                    }).fail(function (){
                        console.log(error);
                    })
                }else{
                    $('#add').before('<p class="msg" style="color: red">enter a valid code or product-name</p>')
                }


            })
        })



    })





/// tuye har table sakhtan tamame field haye ghabli ro ham add mikone
</script>
