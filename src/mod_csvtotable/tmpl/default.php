<?php
/**
* @Author  Mostafa Shahiri
*@license	GNU/GPL http://www.gnu.org/copyleft/gpl.html
**/
 defined('_JEXEC') or die();

 $document = JFactory::getDocument();
 $document->addScript('modules/mod_csvtotable/js/jquery.dataTables.min.js');

$style="
.searchtable {
    padding: 5px;
    font-size: ".$font_size.";
    border-width: 1px;
    border-color: #CCCCCC;
    border-style: outset;
    border-radius: 15px;
    box-shadow: 0px 0px 5px rgba(66,66,66,.75);
}
.searchtable {
    outline:none;
}
.csvtable{
    margin: 5px 0;
    font-family: sans-serif, Arial, Helvetica;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    text-align: ".$text_align.";
    font-size: ".$font_size.";
}
.csvtable thead tr {
    background-color: ".$header_bg.";
    font-size: ".$header_font_size.";
    font-weight: bold;
    color: ".$header_text_color.";
  }
.csvtable th,
.csvtable td,
.csvtable tbody td {
    border-radius: 5px;
    padding: 12px 15px;
    border: 1px solid #ddd;
}

.csvtable tbody tr {
    border-bottom: 1px solid #dddddd;
}
.csvtable tbody tr:hover {
    color: ".$header_bg.";
}
.csvtable tbody tr.even.rowshow{
    background-color: ".$evenbg.";
}
.csvtable tbody tr.odd.rowshow{
    background-color: ".$oddbg.";
}
";

$document->addStyleDeclaration($style);
 if($fileurl!="")
 {
  $file = fopen('images/'.$fileurl,"r");
  if($search){
        echo '<input type="text" class="searchtable" id="searchtable" onkeyup="search_table('.$min_char.')" placeholder="'.$search_placeholder.'">';
   }
 echo '<table class="csvtable" id="csvtable">';

//setlocale(LC_ALL, 'UTF-8');
//mb_internal_encoding('UTF-8');
$z=0;
while($f=fgetcsv($file,1000,$separator))
{
    if ($z == 0){
        echo '<thead>';
        echo '<tr>';
        for($i=0;$i<count($f);$i++)
        {
            echo '<th>'.$f[$i].'</th>';
        }
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        $z++;
    } else {
        if($z % 2 == 0){ 
            $style_row="even rowshow";  
        } 
        else{ 
            $style_row="odd rowshow"; 
        }

        $z++;
        echo '<tr class="'.$style_row.'">';
        for($i=0;$i<count($f);$i++)
        {
           echo '<td>'.$f[$i].'</td>';
        }
        echo '</tr>';
    }
}
echo '</tbody>';
echo '</table>';

fclose($file);
}