<?php
function view($view_name,$data=null)
{   
    extract($data);
    return require("views/$view_name.php");
}