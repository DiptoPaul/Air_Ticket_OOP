<?php
class DBcon
{
    public $query , $executed;
    public function __construct ($sql)
    {
        $link = mysqli_connect("localhost", "root", "", "adb");
		if (!$link) die ("Sorry could not connect to database");
		$this->query = mysqli_query( $link , $sql );
		if ($this->query)
            $this->executed = true;
		else $this->executed = false;
	}
}
?>