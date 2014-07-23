<?php
require('LoremIpsum.class.php');
$generator = new LoremIpsumGenerator;


echo $generator->getContent($_REQUEST["words"], 'html');

?>