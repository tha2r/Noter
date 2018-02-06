<?php
Class templates{

// Start Variables Which will be used here

var $returned    = '';
var $Row         = array();
var $template    = array();
var $cache       = array();
var $assvars     = array();
var $find        = array();
var $replace     = array();
var $webcontents = "";

// End Variables Which will be used here :)


/****************************************************/


              function GetTemp($TempName)
              {

                  extract($GLOBALS);
                         $temp = $this->cache[$TempName];

                  if($this->cache[$TempName][exists]==1)
                  {

                     $temp = $this->cache[$TempName]['template'];
                    }
                    else
                    {


              /*
                   Echo $TempName;
                           $dbquery=$DB->query("Select template From "._PREFIX_."templates Where title='$TempName' And styleid='$st[styleid]'");
                           while($Row=$DB->fetch_array($dbquery))
                           {
                             $temp = $Row['template'];
                             $this->cache[$TempName]=$row;
                             $this->cache[$TempName]['exists']=1;
                                  }
                                  */
                              Echo $TempName;
                             $temp = file_get_contents('templates/'.$TempName.'.tpl');
                             $this->cache[$TempName]['exists']=1;
                             $this->cache[$TempName]['template']=$temp;

                            }

                   return $this->reass($temp);
              }

              function ass($varname,$value)
              {
                  $this->assvars[$varname]=$value;
              }

              function reass($temp)
              {
                 $this->find=array();
                 $this->replace=array();
                  foreach($this->assvars as $key => $val)
                  {

                    if(!is_array($val))
                    {
                      $this->find[]='{'.$key.'}';
                      $this->replace[]=$val;
                    }
                    else
                    {
                     foreach($val as $k => $v)
                     {
                         $this->find[]='{'.$key.'.'.$k.'}';
                         $this->replace[]=$v;
                     }
                    }
                  }

                  return str_replace($this->find,$this->replace,$temp);

              }




              function templatesused($templates)
              {
               GLOBAL $DB,$st;
               $sql="";
                $tempnames = explode(",", $templates);
                foreach($tempnames as $arrayid => $title)
                {
                         $title=trim($title);
                        $this->cache[$title]['template'] = file_get_contents("templates/".$title.".tpl");
                        $this->cache[$title]['exists']=1;
                }


                /*
                foreach($tempnames as $arrayid => $title)
                {
                        $sql .= ",'".trim($title)."'";
                }

                $query = $DB->query("SELECT title,template FROM ". _PREFIX_ ."templates WHERE title IN (''$sql) And styleid='$st[styleid]'");
                while($template = $DB->fetch_array($query))
                {
                        $this->cache[$template[title]] = $template;
                        $this->cache[$template[title]]['exists']=1;
                } */


              }

              function webtemp($tempname)
              {
                $this->webcontents.=$this->GetTemp($tempname);

              }

              function print_page($page="page")
              {
                 if(!$this->webcontents)
                 {
                 $this->webcontents = '  <br />     <br />    <br />     <br />  <br />     <br />         <br />     <br />
                 <center><h1> Error .. Page Not Found</h1></center>
                  <br />     <br />     <br />     <br />     <br />     <br />     <br />     <br />       <br />    ';
                 }
               die(str_replace('{webcontents}',$this->webcontents,$this->GetTemp($page)));
              }
         

              }

//# All Done .. Templates (class) Finished
?>