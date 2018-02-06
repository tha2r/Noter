<?php
Class templates{

// Start Variables Which will be used here

var $returned    = '';
var $Row         = array();
var $template    = array();
var $cache       = array();

// End Variables Which will be used here :)


/****************************************************/


              function GetTemp($TempName)
              {

                  Extract($GLOBALS);
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
                             $temp = addslashes(file_get_contents('templates/'.$TempName.'.tpl'));
                             $this->cache[$TempName]['exists']=1;
                             $this->cache[$TempName]['template']=$temp;

                            }

                         $temp= '$returned = "'.$temp.'";';
                    $temp = preg_replace("(\<if condition=(.+?)\>)is",'"; if($1){ $returned.="',$temp);
                    $temp = preg_replace("(\<elseif condition=(.+?)\>)is",'"; } elseif($1) { $returned.="',$temp);
                    $temp = preg_replace("(\<else\>)is",'"; } else { $returned.="',$temp);
                    $temp = preg_replace("(\</if\>)is",'"; } $returned.="',$temp);
                            $temp=str_replace('(\"','(',$temp);
                            $temp=str_replace('\")',')',$temp);
                            $temp=str_replace("\'","'",$temp);
                            $temp=str_replace("['","[",$temp);
                            $temp=str_replace("']","]",$temp);
                        eval($temp);
                        return $returned;
              }




              function templatesused($templates)
              {
               GLOBAL $DB,$st;
               $sql="";
                $tempnames = explode(",", $templates);
                foreach($tempnames as $arrayid => $title)
                {
                         $title=trim($title);
                        $this->cache[$title]['template'] = addslashes(file_get_contents("templates/".$title.".tpl"));
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
                      GLOBAL $options;
                      $options['webcontent'].=$this->GetTemp($tempname);
                      GLOBAL $options;
              }

              function print_page($page="page")
              {
               GLOBAL $options;
               die($this->GetTemp($page));
              }


              }

//# All Done .. Templates (class) Finished
?>