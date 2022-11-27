<?php
//session_start();

$content = "
<!-- The Modal -->

<div class='modal' id='myModal'>
    <div class='modal-dialog'>
        <div class='modal-content'>

            <!-- Modal Header -->
            <div class='modal-header'>
                <h4 class='modal-title'>Login</h4>
            </div>

            <!-- Modal body -->
            <form action='http://127.0.0.1:82/dev/public/login/login' method='post'>
            <div class='modal-body'>
                <div class='form-group'>
                    <label for='usr'>UserName:</label>
                    <input type='text' class='form-control' name='username' id='usr'>
                </div>
                <div class='form-group'>
                    <label for='pwd'>Password:</label>
                    <input type='password' class='form-control' name='password' id='pwd'>
                </div>
            </div>

            <!-- Modal footer -->
            <div class='modal-footer'>
            
                ";

                if(isset($_SESSION['mustFill'])){
                    $content .=" <p style='color:red'>{$_SESSION['mustFill']}</p>";

                }

                if(isset($_SESSION['wrong'])){

                    $content .=" <p style='color:red'>{$_SESSION['wrong']}</p>";

                }
                session_destroy();
                session_unset();
$content .=" <input type='submit' value='Login' class='btn btn-default'>
            </form>
            </div>
        </div>
    </div>
</div>
";



$this->layout(\App\Http\Config::LOGINLAYPUT_PATH,$content);
