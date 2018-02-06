<?php
              $fnd=array(';','=','|','+','<','>','@','#','$','%','^','&','*',',','/','[',']',' ','\\','|','+','?',':',',','/','*',"'",'"','---','--','--','%');
              //$fnd=array('=','|','+','<','>','!','@','#','$','%','^','&','*',',','/','[',']','&quot;',' ','.','\\','|','+','?',':',',','/','*','(',')',"'",'"','---','--','--','%');
              $rpl="-";

function cleartitle($title)
{
  global $fnd,$rpl;

 $ret = str_replace($fnd,$rpl,$title);
 if(substr($ret,0,1) == "-")
 {
   $ret = substr($ret,1,(strlen($ret) - 1));
 }

 if(substr($ret,(strlen($ret) - 1),1) == "-")
 {
   $ret = substr($ret,0,(strlen($ret) - 1));
 }

 return $ret;
}

              function random_string($length="8")
              {
                      $set = array('a','b','c','d','e','f','g','h','i','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','1','2','3','4','5','6','7','8','9');
                      $str = '';
                      $i=1;
                      while($i <= $length)
                      {
                            $i++;
                              $ch = rand(0, count($set)-1);
                              $str .= $set[$ch];
                      }
                      return $str;
              }

              function cleantext($text)
              {
                 return htmlspecialchars(strip_tags(addslashes($text)));
              }



              function redirect($message,$link,$titleetc="")
              {
              GLOBAL $TP;
                     $ppp=$TP->GetTemp("redirection");
                     $ppp=str_replace('{message}',$message,$ppp);
                     $ppp=str_replace('{url}',$link,$ppp);
                     $ppp=str_replace('{titleetc}',$titleetc,$ppp);

                      Echo $ppp;
                      exit;
              }

                  function sendmail($to_email, $subject, $message, $from = '', $username = '')
                  {

                      $to_email = trim($to_email);

                      if ($to_email != '')
                      {
                              $subject = trim($subject);
                              $message = preg_replace("/(\r\n|\r|\n)/s", "\r\n", trim($message));
                              $from = trim($from);
                              $username = trim($username);

                             $headers = 'From: "' . "$username @ LawCollage". "\" <$from>\r\n" . $headers;


                              $headers.='Date: '.date('r')."\r\n"
                                        .'MIME-Version: 1.0'."\r\n"
                                        .'Content-transfer-encoding: 8bit'."\r\n"
                                        .'Content-type: text/plain; charset=iso-8859-1'."\r\n"
                                        .'X-Mailer: Noter Mailer Via PHP';
                              mail($to_email, $subject, $message, trim($headers));
                              return true;

                      }
                      else
                      {
                              return false;
                      }

                  }

              function error_message($error,$tpl='page')
              {
                GLOBAL $TP;

                if(is_array($error))
                {
                        $message=implode('<br />',$error);
                }
                else
                {
                        $message=$error;
                }

                $TP->ass('message',$message);
                $TP->ass('title','Error Message - Noter.ml');

                   $TP->WebTemp('error');
                   $TP->print_page($tpl);

                exit;
              }


              function get_extension($file)
              {
                return strtolower(substr(strrchr($file, '.'), 1));
              }



              function mydate($timestring='now',$type='normal')
              {
              if($timestring=='now')
              {
                 $timestring=time();
              }

              $date=@getdate($timestring);

              if($type=='normal')
              {
                  $datee = $date;
                      }
                      elseif($type=='last')
                      {

                          $date2=getdate(time());
                          $datee='';
                          if(($date['year']==$date2['year'])&&($date['month']==$date2['month']))
                          {
                              if($date['mday']==$date2['mday'])
                              {
                                  $datee='Today';
                                      }
                                      elseif($date2['mday']==$date['mday']+1)
                                      {
                                          $datee='Yesterday';
                                              }
                                              else
                                              {
                                                  $datee=$date['mday'].'-'.$date['mon'].'-'.$date['year'];
                                                      }

                                  }
                                  else
                                  {
                                      $datee=$date['mday'].'-'.$date['mon'].'-'.$date['year'];
                                          }
                                           $pmam=$lang['am'];

                                          if($date['hours']==12)
                                          {
                                               $pmam=$lang['pm'];
                                          }
                                          elseif($date['hours']==24)
                                          {
                                           $pmam=$lang['am'];
                                           $date['hours']='00';
                                          }
                                          elseif($date['hours']>12)
                                          {
                                           $date['hours']=$date['hours']-12;
                                           $pmam=$lang['pm'];
                                          }
                                      $datee.= ' ,'.$lang['at'].'&nbsp;'.$date['hours'].':'.$date['minutes'].'&nbsp;'.$pmam;

                              }
                              elseif($type=='time')
                              {
                                   $datee = time();
                                      }
                                      elseif($type=='hour')
                                      {
                                      $pmam=$lang['am'];

                                          if($date['hours']==12)
                                          {
                                               $pmam=$lang['pm'];
                                          }
                                          elseif($date['hours']==24)
                                          {
                                           $pmam=$lang['am'];
                                           $date['hours']='00';
                                          }
                                          elseif($date['hours']>12)
                                          {
                                           $date['hours']=$date['hours']-12;
                                           $pmam=$lang['pm'];
                                          }
                                      $datee= $date['hours'].':'.$date['minutes'].'&nbsp;'.$pmam;
                                              }
                                              elseif($type='date')
                                              {
                                                  $datee=$date['mday'].'-'.$date['mon'].'-'.$date['year'];
                                                      }
                         return $datee;
              }
                  function check_email_address($email) {
                     // First, we check that there's one @ symbol, and that the lengths are right
                     if (!preg_match("/^[^@]{1,64}@[^@]{1,255}$/", $email)) {
                         // Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
                         return false;
                     }
                     // Split it into sections to make life easier
                     $email_array = explode("@", $email);
                     $local_array = explode(".", $email_array[0]);
                     for ($i = 0; $i < sizeof($local_array); $i++) {
                         if (!preg_match("/^(([A-Za-z0-9!#$%&'*+\/=?^_`{|}~-][A-Za-z0-9!#$%&'*+\/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$/", $local_array[$i])) {
                             return false;
                         }
                     }
                     if (!preg_match("/^\[?[0-9\.]+\]?$/", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name
                         $domain_array = explode(".", $email_array[1]);
                         if (sizeof($domain_array) < 2) {
                             return false; // Not enough parts to domain
                         }
                         for ($i = 0; $i < sizeof($domain_array); $i++) {
                             if (!preg_match("/^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$/", $domain_array[$i])) {
                                 return false;
                             }
                         }
                     }

                     return true;
                 }

/** * close all open xhtml tags at the end of the string

 * * @param string $html

 * @return string

 * @author Milian <mail@mili.de>

 */
 function closetags($html) {

  #put all opened tags into an array

  preg_match_all('#<([a-z]+)(?: .*)?(?<![/|/ ])>#iU', $html, $result);

  $openedtags = $result[1];   #put all closed tags into an array

  preg_match_all('#</([a-z]+)>#iU', $html, $result);

  $closedtags = $result[1];

  $len_opened = count($openedtags);

  # all tags are closed

  if (count($closedtags) == $len_opened) {

    return $html;

  }
  $den=array('img','input','br');

  $openedtags = array_reverse($openedtags);

  # close tags

  for ($i=0; $i < $len_opened; $i++) {

    if (!in_array($openedtags[$i], $closedtags))
    {

      if(!in_array($openedtags[$i],$den))
      {
        $html .= '</'.$openedtags[$i].'>';

      }
    }
     else
    {

      unset($closedtags[array_search($openedtags[$i], $closedtags)]);    }

  }

  return $html;
}

              //
              //                Noter Functions
              //
              //               Custom Build for noter.ml
              //



              function checkcode($text)
              {
                 $arra=array('About','about','TOS','notes','note','index','Contact','user','users','Privacy');
                 if(in_array($text,$arra))
                 {
                         return false;
                 }
                 elseif(!preg_match('/[A-Za-z0-9-_]/u', $text))
                 {
                        return false;
                 }
                 elseif(strlen($text) < 3)
                 {
                        return false;
                 }
                 else
                 {
                         return true;
                 }
              }
              function hashpass($p)
              {
                       return md5(md5(md5(md5(md5(md5(md5($p)))))));

              }


              function checklogin($login,$pass)
              {
                 GLOBAL $DB;
                 $r=false;
                 $qu=$DB->query('select * from users where email=\''.addslashes($login).'\'');
                 while($q=$DB->fetch_array($qu))
                 {
                    if($pass == $q['password'])
                    {
                            $r=$q;   //echo "OK?? ";
                    }
                    else
                    {

                     //        echo "".$pass." - ". $q['password'].' -a-';
                    }
                 }
           //           echo "".$pass." - ". $q['password'].' -a-';
                 return $r;


              }

              function delete_note($id)
              {
                 GLOBAL $DB,$error,$error_message,$user;

                 $qu=$DB->query('select * from notes where id=\''.$id.'\'');
                 $n=$DB->fetch_array($qu);

                 if($n['user_id'] == $user['id'])
                 {
                         return $DB->query('delete from notes where id=\''.$id.'\'');
                 }
                 else
                 {
                         $error=1;
                         $error_message[]="Unauthorized to do this !";
                         return false;
                 }

              }

              function edit_note($id)
              {

                 GLOBAL $DB,$error,$error_message,$user;

                 $qu=$DB->query('select * from notes where id=\''.$id.'\'');
                 $n=$DB->fetch_array($qu);

                      $_POST['code']=checkcode($_POST['code']) ? $_POST['code'] : random_string(4);


                      $q=$DB->query('select id from notes where code=\''.$_POST['code'].'\'');
                      $number=$DB->num_rows($q);
                      while($number > 0)
                      {
                       $qq = $DB->fetch_array($q);
                       if($id != $qq['id'])
                       {
                           $_POST['code']=random_string(4);
                           $q=$DB->query('select id from notes where code=\''.$_POST['code'].'\'');
                           $number=$DB->num_rows($q);
                       }
                      }

                 if($n['user_id'] == $user['id'])
                 {
                         $arr=array('title','text','code','info');
                         $ear=array();

                         foreach($arr as $k => $v)
                         {
                                 $ear[$v] = $_POST[$v];
                         }

                         return $DB->update($ear,'notes','id=\''.$id.'\'');
                 }
                 else
                 {
                 //print_r($n);
                         $error=1;
                         $error_message[]="Unauthorized to do this  !";
                         return false;
                 }

              }

              function change_profile($user)
              {
                 GLOBAL $DB,$error,$error_message,$_POST,$user;

                 $error=0;
                 $ar=array('fullname','username','email');
                 $up=array();
                 if(!check_email_address($_POST['email']))
                 {
                         $error=1;
                         $error_message[]="Email not valid format !<br /> Should be name@domain.ext";
                 }
                 else
                 {

                   if (!preg_match("/^[a-zA-Z0-9 ]*$/",$_POST['username']))
                   {
                     $error=1;
                     $error_message[] = "Only letters, numbers and white space allowed";
                   }
                   else
                   {
                      foreach($ar as $key => $val)
                      {
                        if($_POST[$val] != $user[$val])
                        {
                          $up[]="`$val` = '".cleantext($_POST[$val])."'";
                          if(cleantext($_POST[$val]) == '')
                          {
                                  $error=1;
                          }
                        }
                      }

                      if($error==1)
                      {
                          $error_message[]="All fields are required .. you cant left any field blank.";
                      }
                      else
                      {
                        if(count($up) > 0)
                        {
                         $q=implode(",",$up);

                         if($_POST['email'] != $user['email'])
                         {
                                 setcookie('email',$_POST['email'],time()+36000000);
                         }

                         return $DB->query("update users set ".$q." where id='".$user['id']."'");
                        }
                        else
                        {
                                return true;
                        }
                      }
                   }
                 }


              }

              function change_password()
              {
                 GLOBAL $DB,$error,$error_message,$_POST,$user;
                 if($user['pass'] == hashpass($_POST['oldpassword']))
                 {
                    if($_POST['newpassword1'] == $_POST['newpassword2'])
                    {

                          if(strlen($_POST['newpassword1']) > 5)
                          {

                                 $DB->query('update users set password=\''.hashpass($_POST['newpassword1']).'\' where id=\''.$user['id'].'\'');
                                     $time += 3600000000;
                                  setcookie('email',$user['email'],$time);
                                  setcookie('pass',hashpass($_POST['newpassword1']),$time);

                          }
                          else
                          {
                           $error=1;
                           $error_message[]="Password is too short ..";
                          }
                    }
                    else
                    {
                     $error=1;
                     $error_message[]="New Password Don't match ..";
                    }
                 }
                 else
                 {
                     $error=1;
                     $error_message[]="Old Password is wrong ..";
                 }

              }
              function purify_class()
              {

                  require_once 'includes/htmlpurifier/library/HTMLPurifier.auto.php';

                  $config = HTMLPurifier_Config::createDefault();
                  $purifier = new HTMLPurifier($config);

                  return  $purifier;
              }

              function add_note()
              {
               GLOBAL $DB, $_POST, $error_message, $error,$user;
               $error=0;
                  $text = $_POST['content'];

                  $purifier=purify_class();
                      $string=checkcode($_POST['code']) ? $_POST['code'] : random_string(4);


                      $q=$DB->query('select id from notes where code=\''.$string.'\'');
                      while($DB->num_rows($q) > 0)
                      {
                           $string=random_string(4);
                           $q=$DB->query('select id from notes where code=\''.$string.'\'');
                      }
                      $tit=( $_POST['title'] ) ?  $_POST['title'] : substr(str_replace('  ',' ',strip_tags($text)),0,100).'...';

                  $ar=array('code' => $string,'title' => $tit,'text' => $text,'info' => $_POST['info'],'dateline' => time(), 'editcode' => random_string(6),'user_id' => intval($user['id']));



                  foreach($ar as $k => $v)
                  {
//                  $text = addslashes(closetags($purifier->purify(stripslashes(htmlspecialchars_decode($_POST['content'])))));
                          $ar[$k]=addslashes(closetags($purifier->purify(stripslashes(htmlspecialchars_decode($v)))));
                  }
                  if(strlen(strip_tags(strip_tags($text))) < 15)
                  {
                     $error=1;
                     $error_message[]="No Note !";

                  }
                  if(!$error)
                  {
                   if($ar['user_id'] > 0)
                   {
                           $DB->query("update users set posts=posts+1 where id='".$ar['user_id']."'");
                   }
                   $DB->multible_insert($ar,'notes');
                   return $string;
                  }
                  else
                  {
                         // die(" ".$error);
                  }
              }

              function getHashtags($string)
              {
                  $hashtags= FALSE;
                  preg_match_all("/(#\w+)/u", $string, $matches);
                  if ($matches) {
                      $hashtagsArray = array_count_values($matches[0]);
                      $hashtags = array_keys($hashtagsArray);
                  }
                  return $hashtags;
              }
              function hashtag ($text)
              {
                $ar=getHashtags($text);
                $find=array();
                $replace=array();

                foreach($ar as $k=>$v)
                {
                 $find[]=$v;
                 $replace[]='<a href="/tag/'.str_replace('#','',$v).'">'.$v.'</a>';
                }

                return str_replace($find,$replace,$text);

              }

?>