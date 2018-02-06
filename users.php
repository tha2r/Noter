<?php
$usedtemplates="index,page,login,cp,cp_add,notes_add,user_register,cp_home,cp_password,cp_help,cp_manage,cp_manage_note,cp_profile";
include "global.php";
$title='User section';

if($_GET['do'] == 'login')
{

  if(($user['id'] > 0) && ($user['password'] == $_COOKIE['pass']) && ($user['email'] == $_COOKIE['email']))
  {

     redirect("Already logged in member.","/user/cp");
  }
  else
  {

    $title='Login - User section';
    $login=checklogin($_POST['email'],hashpass($_POST['password']));
    if($login)
    {

     $time=time()+36000;
     if($_POST['remember']==1)
     {
             $time += 36000000;
     }

          setcookie('email',$login['email'],$time,'/');
          setcookie('pass',$login['password'],$time,'/');

       redirect("Logged in successfully","/user/cp");
    }
    else
    {
    //$DB->query('update users set password=\''.hashpass($_POST['password']).'\'');
          setcookie('email','',time()+36000000,'/');
          setcookie('pass','',time()+36000000,'/');
       //   print_r($_COOKIE);
        $TP->webtemp('login');
    }


  }

}
elseif($_GET['do'] == 'register')
{

  $title='Register - User section';

  if(($user['id'] > 0) && ($user['password'] == $_COOKIE['pass']) && ($user['email'] == $_COOKIE['email']))
  {

     redirect("Already logged in member.","/user/cp");
  }
  else
  {
   if($_POST['register'] == 0)
   {
      $TP->webtemp('user_register');
   }
   else
   {
     $error=0;
     $error_message=array();


      if(!checkcode($_POST['username']))
      {
              $error=1;
              $error_message[]='Username not valid.';
      }

      if(!check_email_address($_POST['email']))
      {
              $error=1;
              $error_message[]='Email not valid.';
      }


      if(strlen($_POST['fullname']) < 5)
      {
              $error=1;
              $error_message[]='Please enter a valid name.';
      }



      if(strlen($_POST['passwordr']) < 5)
      {
              $error=1;
              $error_message[]='Password Too short.';
      }

      if($_POST['password'] != $_POST['passwordr'])
      {
              $error=1;
              $error_message[]='Password not match.';
      }

      if($error==0)
      {
         $arr=array('fullname' => cleantext($_POST['fullname']),'username' => cleantext($_POST['username']),'email' => cleantext($_POST['email']),'password' => hashpass($_POST['password']),'joindate' => time());
         $DB->multible_insert($arr,'users');

              $time=time()+ 36000000;


        setcookie('email',$arr['email'],$time,'/');
        setcookie('pass',$arr['password'],$time,'/');
      }

    ($error == 1)? error_message($error_message):redirect('Thanks for Registration <br /> You will be redirected to the user panel.','/user/cp',$titleetc='User Registered');





   }
  }

}
elseif($_GET['do'] == 'logout')
{
          $time=(time()+36000+36000000);
        setcookie('email','',$time,'/');
        setcookie('pass','',$time,'/');
        redirect("Logged out successfully","/","");
}
elseif($_GET['do']=='contact')
{


                // change_password();
    $error=0;
    $error_message=array();

    $inser=array('name' => $_POST['name'],'email' => $_POST['email'],'message' => $_POST['message']);

    $purifier=purify_class();

    foreach($inser as $key => $value)
    {
            $inser[$key]=addslashes(closetags($purifier->purify(stripslashes(htmlspecialchars_decode($value)))));
    }

    if(!check_email_address($inser['email']))
    {
            $error=1;
            $error_message[]='Please enter your email in the currect format.';
    }
    if(strlen(htmlspecialchars(strip_tags($inser['name']))) < 3)
    {
            $error=1;
            $error_message[]='Please enter your name.';
    }
    if(strlen(htmlspecialchars(strip_tags($inser['message']))) < 3)
    {
            $error=1;
            $error_message[]='Please enter your Message.';
    }

    if($error == 0)
    {
            $DB->multible_insert($inser,'messages');
    }
    else
    {
   //    echo ('insert into `messages` (\'name\',\'email\',\'message\') values (\''.$name.'\',\''.$email.'\',\''.$message.'\')');
    }


    ($error == 1)? error_message($error_message):redirect('Thanks for contacting us <br /> You will receive our response as soon as possible.','/',$titleetc='Message Was Sent ');

}

elseif($_GET['do'] == 'cp')
{

 if(($user['id'] > 0) && ($user['password'] == $_COOKIE['pass']) && ($user['email'] == $_COOKIE['email']))
 {
$title='User Panel - Noter.ml';
    $active=array('home'     => '',
                  'reports'  => '',
                  'add'      => '',
                  'manage'   => '',
                  'profile'  => '',
                  'password' => '',
                  'help'     => '',
                  'empty'    => '');

    $act=($_GET['act'] )? $_GET['act'] : 'home';
    $active[$act]=' class="active"';
   //   print_r($active);
    $TP->ass('active',$active);

           $error=0;
           $error_message=array();
    switch($act)
    {


           case 'dopassword':
                 change_password();
                 ($error == 1)? error_message($error_message,'cp'):redirect('Password Changed Successfully','/user/cp',$titleetc="");
           break;
           case 'doadd':
                 $string=add_note();
                 if(!$error)
                 {
                   $qu=$DB->query("select * from notes where code='$string'");
                   $TP->ass('note',$DB->fetch_array($qu));
                   $TP->webtemp('notes_add');
                 }
                 else
                 {
                   error_message($error_message,'cp');
                 }
           break;
           case 'doprofile':
                 change_profile();
                 ($error == 1)? error_message($error_message,'cp'):redirect('Profile Changed Successfully','/user/cp',$titleetc="");
           break;
           case 'dodelete':
                 delete_note(intval($_POST['id']));
                 ($error == 1)? error_message($error_message,'cp'):redirect('Note Deleted Successfully','/user/cp/manage',$titleetc="");
           break;

           case 'doedit':
                 edit_note(intval($_POST['id']));
                 ($error == 1)? error_message($error_message,'cp'):redirect('Note Edited Successfully','/user/cp/manage',$titleetc="");
           break;

           case 'password':
           case 'help':
           case 'profile':
           case 'add':
           $TP->webtemp('cp_'.$act);
           break;

           case 'manage':
           $page=(intval($_GET['page']))?intval($_GET['page']):1;
           $perpage=10;
           $start=($page*$perpage)-$perpage;
                 $qu=$DB->query('select * from notes where user_id=\''.$user['id'].'\' order by id desc limit '.$start.',10');
                 while($note = $DB->fetch_array($qu))
                 {
                    $note['text']=htmlspecialchars(stripslashes(htmlspecialchars_decode($note['text'])));
                    $TP->ass('note',$note);
                   $notes.=$TP->gettemp('cp_manage_note');
                 }
                 $TP->ass('notes',$notes);


           $counter=$DB->num_rows($qu=$DB->query('select * from notes where user_id=\''.$user['id'].'\''));
           $pagecount=ceil($counter/$perpage);
           $pages=array('first' => 1,'last' => $pagecount , 'current' => $page);

           $pages['next']     = ($page == $pagecount) ? $pagecount :$page+1;
           $pages['previous'] = ($page == 1) ? 1 :$page-1;

           $TP->ass('pages',$pages);
           $TP->webtemp('cp_manage');
           break;

           default:
           case 'home':
           $TP->webtemp('cp_home');
           break;
    }

$TP->ass('title',$title);
       $TP->print_page('cp');
 }
 else
 {
 //print_r($_COOKIE);
// echo checklogin($_COOKIE['email'],$_COOKIE['pass']);
        header("location:/user/login");

       die();
 }
}

$TP->ass('title',$title);

$TP->print_page();
?>