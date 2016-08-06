<?php
// REDAXO Glossary for yform
// Creator: Thomas Skerbis, KLXM Crossmedia GmbH
// Version: 1.0 
// License: Public domain 

$db_table = "rex_glossar";
$sql = rex_sql::factory();
$query = "SELECT * FROM $db_table  ORDER BY Begriff ";
// $sql->debugsql = 1;
$sql->setQuery($query, array($id));
$counter=1;
$bcounter=1;
if (count($sql)) {
foreach($sql as $row)
{
 $id=$row->getValue("id");
 $begriff = $row->getValue("Begriff");
 $beschreibung = $row->getValue("beschreibung");
 # $beschreibung = nl2br($beschreibung); // wenn nur eine Textarea ohne WYSIWYG verwendet wird
 $counter++;
 if (strtoupper(substr($begriff,0,1)) != $dummy) { 
    $bcounter++;   
    $buchstabe ='<h2 id="buchstabe'.strtoupper(substr($begriff,0,1)).'">'.strtoupper(substr($begriff,0,1)). '</h2>'; 
    $index .= '<a type="button" class="btn btn-default" href="#buchstabe'.strtoupper(substr($begriff,0,1)).'">'.strtoupper(substr($begriff,0,1)). '</a>';   
 } 
 else {$buchstabe = "";}
// Ausgabe als Bootstrap Panel
$out .= $buchstabe.' 
<div class="panel panel-default">
            <div class="panel-heading">
              <a data-toggle="collapse" data-parent="#accordionREX_SLICE_ID" href="#collapse'.$counter.'">'.$begriff.'</a>
            </div>
            <div id="collapse'.$counter.'" class="panel-collapse collapse">
                <div class="panel-body">'.$beschreibung.'
                </div>
            </div>
        </div>';

$dummy = strtoupper(substr($begriff,0,1));

 } 
echo $index;
echo $out;
}
?>
