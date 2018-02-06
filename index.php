<?php
$usedtemplates="index,page,about,tos,note,contact,privacy";
include "global.php";

  $title="Noter.ml - Publish Your Notes";
if(!$_GET['code'])
{
  $TP->webtemp('index');
}
else
{
$ar=array(  'About'   => 'About us',
            'TOS'     => 'Terms of service',
            'Contact' => 'Contact us',
            'Privacy' => 'Privace statement'
         );
  switch($_GET['code'])
  {
          case "About":
          case "TOS":
          case "Contact":
          case "Privacy":

            $title="Noter.ml -> ".$ar[$_GET['code']];
            $TP->webtemp(strtolower($_GET['code']));
          break;
          default:

                  $title="Noter.ml - Not found";
                  $notet=array('text' => '<h1>Not Found</h1>','views' => 0);
                  $cod=cleantext($_GET['code']);
                  $query=$DB->query('select * from notes where code=\''.$cod.'\' limit 0,1');
                  while($note=$DB->fetch_array($query))
                  {
                     $note['date']=mydate($note['dateline'],'last');

                     $note['text'] = stripslashes(htmlspecialchars_decode($note['text']));
                     $note['text'] =  hashtag(closetags($note['text']));

                     $notet=$note;

                     $title=$note['title'].' - Noter.ml';
                     $DB->query('update notes set views=\''.($note['views']+1).'\' where id=\''.$note['id'].'\'');
                  }
                     $TP->ass('note',$notet);

                  $TP->webtemp('note');

          break;
  }
}
$TP->ass('title',$title);
$TP->print_page();
?>