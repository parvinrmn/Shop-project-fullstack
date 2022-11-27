<?php
session_start();
use App\Http\BaseController;
use App\Http\Request;
use App\Http\Session;
use App\Http\Redirect;
use App\Model\DB;
class ShopController extends BaseController
{

    public $PCode = null;
    public $PName = null;
    public function Shop()
    {
        $user = Session::get('user') ;
        $product = DB::table('products')->where('PCode', '=' , 10001)
            ->orWhere('productName' , 'LIKE', "cheese")->get();
        $employee = DB::table('employees')->get();
        $this->view("Shop/Shop",['product'=>$product,'user'=>$user,'employee'=>$employee]);
    }


    public function addInvoice($Num)
    {
        DB::creatTable($Num);
    }

    public function removeInvoice($Num)
    {
        DB::dropTable($Num);
        echo $Num;
    }
    public function AddToInvoice($inputs)
    {

        $items = explode(',',$inputs);
        $PCode = $items[0];
        $PName = $items[1];
        $Num = $items[2];

            $this->PCode = $PCode;
            $this->PName = $PName;
            $product = DB::table('products')->where('PCode', '=' , $this->PCode)
                ->orWhere('productName' , 'LIKE', $this->PName)->get();

            $code = json_decode($product)[0]->PCode;
            $name = json_decode($product)[0]->productName;
            $price = json_decode($product)[0]->price;
            $nb = DB::table($Num)->add(
                ["InvoiceID","PCode","productName","price"],
                [$Num,$code,$name,$price]
            );
            echo $code.','.$name.','.$price;


    }

    public function instanceRemove($item)
    {
        $item = explode(",",$item);
        DB::delete($item[1] , $item[0]);
        var_dump($item);
//        echo $tblNum;
    }
    public function addUser()
    {
        $username = Request::getparam('username');
        $password = Request::getparam('password');
        $authCode = Request::getparam('authCode');
        if($authCode != null && $username != null && $password != null){
            if($authCode === '123'){
                DB::table('employees')->add(
                    ['id','fullname','password'],
                    [null,$username,$password]
                );
                Session::set('addUser','User Added');
                return Redirect::redirect('shop');

            }else{
                setcookie("authCode","Wrong AuthCode");
                Redirect::redirect('shop');

            }
        }else{
            Session::set('fill','You must fill the forms');
            Redirect::redirect('shop');


        }
    }


    public function logOut()
    {

        Session::remove();
        Redirect::C_redirect('login','auth','');
    }
}