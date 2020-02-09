<?php
include_once "dbcon.php";
class User
{
    public function register($name , $gender , $email , $tel , $country , $pass)
	   {
            $sql = "INSERT INTO utb VALUES (default , '$name' , '$gender' , '$email' , '$tel' , '$country' , '$pass')";
            $Object = new DBcon($sql);
            if ($Object->executed == true)
                echo "Congratulations ! New account created !";
            else echo "Sorry could not create account";
        }
    
    public function verifyuser($email , $pass)
	   {
            $sql = "select * from utb where Email = '$email' and Password = '$pass'";
            $Object = new DBcon($sql);
            if (mysqli_num_rows ($Object->query) == 1)
        		{
		            $_SESSION['logon'] = true;
		            $_SESSION['user'] = $email;
                    header ("location:show.php");
                }
		    else echo "Sorry wrong username or password";
       }
    
    public function welcome()
    {
        $email = $_SESSION['user'];
        $sql = "select * from utb where Email = '$email'";
        $Object = new DBcon($sql);
        if ($Object->executed == false)
            die ("Sorry could not fetch data");
        while ($column = mysqli_fetch_array($Object->query , MYSQLI_NUM))
        {
            echo "<tr><td>".$column[1]."</td>
                            <td>".$column[2]."</td>
                            <td>".$column[3]."</td>
                            <td>".$column[4]."</td>
                            <td>".$column[5]."</td></tr>";
        }
        echo "Welcome ".$email.
            "<br><br><a href='edit.php?email=".$email."'><b>Edit Your Profile</b></a>
            <br><br><a onclick=\"return confirm('Are you sure you want to delete your account?')\" href='delete.php?email=".$email."'><b>Delete Your Account</b></a>";
    }
    
    public function update ($email)
        {
            $name=$_POST['name'];
            $gender=$_POST['gender'];
            $em=$_POST['email'];
            $telephone=$_POST['telephone'];
            $country=$_POST['country'];
            $sql = "UPDATE utb SET Name = '$name' , Gender = '$gender' , Email = '$em' , Telephone = '$telephone' , Country = '$country' WHERE Email = '$email'";
            
            $Object = new DBcon($sql);
            if ($Object->executed == true)
                {
                    $_SESSION['user'] = $email;
                    echo "Profile Successfully Updated";
                }
            else die ("Sorry could not update data");
        }
}
?>