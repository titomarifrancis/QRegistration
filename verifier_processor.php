<?php
include_once 'dbconn.php';

$userItem= $_POST['userItem'];
if ($_POST["Submit" ]=="Submit" )
{
    for ($i=0; $i<sizeof($userItem); $i++)
    {
        //$query="INSERT INTO employee (name) VALUES ('" .$userItem[$i]. "')";
        //mysql_query($query) or die(mysql_error());
        echo "$userItem[$i]<br/>";
    }
    echo "Record is inserted";
}
