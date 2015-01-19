<?php
if(!isset($isIndex))die('');
else if(User::isConnected())header('Location: /main');
else
{//functionallity is not implemented yet..
    
}