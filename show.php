<!DOCTYPE html>
<html>
    <head>
        <title>Show</title>
        <link rel="stylesheet" href="Sieses.css">
    </head>
    <body>
        <h1>Your Profile</h1>
        <hr>
        <table>
            <tr>
                <th>Name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Telephone</th>
                <th>Country</th>
            </tr>

<?php
include_once "user.php";
class Show
{
    public function __construct()
    {
        session_start();
        if (!$_SESSION['logon'])
        { 
            header ("location:sign.html");
            die();
        }
        else
        {
            $Object = new User();
            $Object -> welcome();
        }
    }
}
$LocalObject = new Show();
?>
        </table>
        <br><a href='logout.php'><b>Log Out</b></a>
    </body>
</html>