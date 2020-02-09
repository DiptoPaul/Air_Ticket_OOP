<?php
include_once "dbcon.php";
class Delete
{
    public function __construct()
    {
        if ($_SESSION['logon'] == true && isset($_GET['email']))
        {
            $email = $_GET['email'];
            $sql = "DELETE FROM utb WHERE Email='$email'";
            $Object = new DBcon($sql);
            if ($Object->executed == true)
            {
                echo "Your Account Has Been Deleted";
                header ('location:logout.php');
            }
        }
        else header ('location:sign.html');
    }
}
$LocalObject = new Delete();
?>