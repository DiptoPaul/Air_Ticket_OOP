<?php
include_once "dbcon.php";
include_once "user.php";
class Create
{
    public function __construct()
    {
        $name=$_POST['name'];
		$gender=$_POST['gender'];
		$email=$_POST['email'];
		$tel=$_POST['telephone'];
		$country=$_POST['country'];
		$pass=$_POST['password'];
        
        $sql = "select * from utb where Email = '$email'";
        $ObjectD = new DBcon($sql);
        if (mysqli_num_rows ($ObjectD->query) > 0)
            echo "Sorry This Email Already Belongs To Someone Try Your Own Email";
		else
        {
            $ObjectU = new User();
            $ObjectU->register($name , $gender , $email , $tel , $country , $pass);
        }
    }
}
$LocalObject = new Create();
?>