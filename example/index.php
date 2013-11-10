<?php
/**
 * This file passes the content of the Readme.md file in the same directory through the Markdown filter.
 * You can adapt this sample code in any way you like.
 */
require __DIR__.'/../src/nazarpc/MarkdownNext.php';
// Use MarkdownNext class
use		nazarpc\MarkdownNext;
// Read file and pass content through the Markdown parser
$text	= file_get_contents('../Readme.md');
$html	= MarkdownNext::defaultTransform($text);
?><!DOCTYPE html>
<html>
    <head>
        <title>PHP Markdown Next - Readme</title>
    </head>
    <body>
		<?=$html?>
    </body>
</html>