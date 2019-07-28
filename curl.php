<?php
$food=array();
$data="
<foods>
     <chinese foodtype='soup'>Shark Fin</chinese>
     <japanese foodtype='fish'>Sushi</japanese>
     <italian foodtype='wheat'>Pasta</italian>
     <british foodtype='delicious'>fish n chips</british>
</foods>";

/* Try to prevent errors from being displayed */
libxml_use_internal_errors( true );

/* Create the reference to the DOMDocument and set some properties */
$dom=new DOMDocument;
$dom->validateOnParse=false;
$dom->standalone=true;
$dom->preserveWhiteSpace=true;
$dom->strictErrorChecking=false;
$dom->substituteEntities=false;
$dom->recover=true;
$dom->formatOutput=false;
/* Load the XML data */
$dom->loadXML( $data );
$parse_errs=serialize( libxml_get_last_error() );

libxml_clear_errors();

/* Get the root node and then iterate through it's children */
$foods=$dom->getElementsByTagName('foods')->item(0);
foreach( $foods->childNodes as $i => $node ) {

    if( $node->nodeType==XML_ELEMENT_NODE ){
        /* Elements can have attributes, use this methodology to find and get attributes */
        $foodtype=$node->hasAttribute('foodtype') ? $node->getAttribute('foodtype') : '';
        /* Do whatever you want with the tag or data etc */
        echo $node->tagName.' '.$node->nodeValue.' '.$foodtype.'<br>';
        /* You could store in an array for later use for example */
        $food[ $node->tagName ]=(object)array( 'type'=>$foodtype, 'value'=>$node->nodeValue );
    }
}

$dom=null;

/* Later on.... */
$type='chinese';
echo 'From the array: '.$food[ $type ]->type.' '.$food[ $type ]->value;
?>