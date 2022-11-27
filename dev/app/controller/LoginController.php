<?php
session_start();

use App\Http\BaseController;
use App\Http\Request;
use App\Model\DB;
use App\Http\Redirect;
use App\Http\Session;
class LoginController extends BaseController
{
    public $username = null;
    public $password = null;

    public function auth()
    {
        $this->view("Login/auth", ['']);

    }

    public function login()
    {
        $this->username = Request::getparam('username');
        $this->password = Request::getparam('password');
        if (isset($this->username)){
            if (isset($this->password)){

                if($this->username != null && $this->password != null){
                    $person =  json_decode(DB::table("employees")->get());


                    foreach ($person as $employee =>$info){

                        if ($this->username === $info->fullname ){
                            if($this->password === $info->password){
                                Session::set('user',$info->fullname);
                                Redirect::C_redirect("shop",'shop','');
                            }else{
                                $_SESSION['wrong'] = "Wrong password";
                                Redirect::redirect('auth');
                            }
                        }else{
                            $_SESSION['wrong'] = "Wrong username";
                            Redirect::redirect('auth');

                        }
                    }
                }else{
                    $_SESSION['mustFill'] =  "you must fill the forms" ;
                    Redirect::redirect('auth');
                }
            }
        }

    }



}