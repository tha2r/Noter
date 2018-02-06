<?php

if((@ini_get('register_globals') || !@ini_get('gpc_order')) && (isset($_POST) || isset($_GET) || isset($_COOKIE)))
{
        foreach(array_keys($_POST+$_GET+$_COOKIE+$_SERVER+$_FILES) as $key)
        {
                $$key='';
                unset($$key);
                $$key='';
        }
}
if(isset($_POST['GLOBALS'])||isset($_GET['GLOBALS'])||isset($_FILES['GLOBALS'])||isset($_COOKIE['GLOBALS'])||isset($_REQUEST['GLOBALS'])||isset($_ENV['GLOBALS']))
{
    die('Hacking attempt !!<br>you cant make your own global variables :)');
}
DEFINE("_PREFIX_",'',1);
require('./includes/functions.php');
require('./includes/class_db.php');
require('./includes/class_templates.php');
require('./includes/config.php');

$TP = new templates;
$DB = new dbclass;

$dbconnect = $DB->connect($server,$username,$password);
if(!$dbconnect)
{
 Die('U OR P To DB');
}
$dbselect  = $DB->selectdb($dbname,$dbconnect);
if(!$dbselect)
{
 Die('DB');
}


$tmps='page,redirection,closed,error,nav_user,nav_login';//,main,right_side,right_side_bit,left_side,left_side_bit';
$usedtemplates=($usedtemplates)?$usedtemplates.','.$tmps:$tmps;
$TP->templatesused($usedtemplates);
$menublocks='';
$linksblocks='';
    $right_first='';
    $right_second='';
$query=$DB->query("select * from setting");
while($r=$DB->fetch_array($query))
{
 $setting[$r[title]]=$r[value];
}
$TP->ass('setting',$setting);

if($setting['onoff']==1)
{
$TP->ass('message',$setting['message']);
die($TP->GetTemp('closed'));
}



$user=checklogin($_COOKIE['email'],$_COOKIE['pass']);

$tab='';
if($user['id'] > 0)
{

                     $user['date']=mydate($user['joindate'],'last');
   $TP->ass('user',$user);
        $tab=$TP->gettemp('nav_user');
}
else
{
        $user['id']=0;
        $tab=$TP->gettemp('nav_login');
}
//print_r($user);
//die($tab);
$TP->ass('nav_tab',$tab);
?>