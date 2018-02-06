<?php
$usedtemplates="notes_add,search_result,search_result_tpl,index,search,notes_top_note,notes_top,notes_new_note,notes_new,page,notes_edit";
include "global.php";
$title="Noter.ml";

if($_GET['do'] == 'top')
{
$title="Top Notes - Noter.ml";
$topnotes='';

   $query=$DB->query('select title,code,views,dateline from notes where 1 order by views desc limit 0,20');
   while($note = $DB->fetch_array($query))
   {
   $note['date']=mydate($note['dateline'],'last');
   $TP->ass('note',$note);
        $topnotes.=$TP->gettemp('notes_top_note');
   }
   $TP->ass('topnotes',$topnotes);
   $TP->webtemp('notes_top');
}
if($_GET['do'] == 'new')
{
$title="New Notes - Notes.ml";
$newnotes='';

   $query=$DB->query('select title,code,views,dateline from notes where 1 order by id desc limit 0,20');
   while($note = $DB->fetch_array($query))
   {
   $note['date']=mydate($note['dateline'],'last');
   $TP->ass('note',$note);
        $newnotes.=$TP->gettemp('notes_new_note');
   }
   $TP->ass('newnotes',$newnotes);
   $TP->webtemp('notes_new');
}
if($_GET['do'] == 'add')
{
 if(!$_POST['content'])
 {
    $TP->webtemp("index");
 }
 else
 {
  $title="Add Notes - Notes.ml";
         $error=0;
         $errorlist=array();
               if($_POST['notbot'] != 1) { Die("GETOUT BOT !"); }
         $string=add_note();

       if(!$error)
       {
         $qu=$DB->query("select * from notes where code='$string'");
         $TP->ass('note',$DB->fetch_array($qu));
         $TP->webtemp('notes_add');
       }
       else
       {
         error_message(implode('<br />',$errorlist));
       }

 }
}
elseif($_GET['do'] == 'edit')
{

    $query=$DB->query("select * from notes where id='".intval($_GET['id'])."' and editcode='".addslashes($_GET['code'])."'");
    while($note = $DB->fetch_array($query))
    {
    $title="Editing : ".htmlspecialchars(addslashes($note['title']));
            $note['text']=htmlspecialchars($note['text']);
            $TP->ass('note',$note);
            $TP->webtemp('notes_edit');
    }

}
elseif($_GET['do'] == 'search')
{

$title='Search - Noter.ml';
$TP->webtemp('search');

}
elseif($_GET['do'] == 'dosearch')
{
$GETS=array();

        $qq=explode('?',$_SERVER['REQUEST_URI']);

        $q=explode('&',$qq['1']);

        foreach($q as $k => $v)
        {
                $ex=explode('=',$v);
                $GETS[$ex['0']]=cleantext($ex['1']);
        }
            $TP->ass('searchkey',$GETS['key']);
$query=$DB->query('select * from notes where text like \'%'.$GETS['key'].'%\' or title like \'%'.$GETS['key'].'%\' or info like \'%'.$GETS['key'].'%\'');
$count=$DB->num_rows($query);
$page=(intval($GETS['page']))?intval($GETS['page']):1;
$perpp=10;
$start=($page*$perpp)-$perpp;
$pagecount=ceil($count/$perpp);
$qu=$DB->query('select * from notes where text like \'%'.$GETS['key'].'%\' or title like \'%'.$GETS['key'].'%\' or info like \'%'.$GETS['key'].'%\' order by id desc limit '.$start.','.$perpp);
  $search_results='';
 while($note = $DB->fetch_array($qu))
 {
       $note['date']=mydate($note['dateline'],'last');
       $TP->ass('note',$note);
        $search_results.=$TP->gettemp('search_result_tpl');
 }

            $pages=array('first' => 1,'last' => $pagecount , 'current' => $page);

           $pages['next']     = ($page == $pagecount) ? $pagecount :$page+1;
           $pages['previous'] = ($page == 1) ? 1 :$page-1;

           $TP->ass('pages',$pages);

           if(!$search_results)
           {
              error_message("No results");
           }
           else
           {
             $TP->ass('search_results',$search_results);
             $TP->webtemp('search_result');
           }

}
elseif($_GET['do'] == 'doedit')
{
$error=0;
$error_message=array();

$id=intval($_POST['id']);

 edit_note($id);

 $n=$DB->fetch_array($DB->query('select * from notes where id=\''.$id.'\''));
($error == 1)? error_message($error_message):redirect('Post Updated successfully.','/'.$n['code'],$titleetc='Note updated');

}
elseif($_GET['do']=='pdf')
{
                  $cod=cleantext($_GET['code']);
                  $query=$DB->query('select * from notes where code=\''.$cod.'\' limit 0,1');
                  while($note=$DB->fetch_array($query))
                  {
                     $note['date']=mydate($note['dateline'],'last');

                     $note['text'] = stripslashes(htmlspecialchars_decode($note['text']));
                     $note['text'] =  closetags($note['text']);


                  }

}
$TP->ass('title',$title);
$TP->print_page();
?>