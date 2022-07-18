<?php

    $cn='active';
    
    $links=array(
        'login.php'      =>  'LOGIN',	
        'faq.php'        =>  'FAQ',		
        'aboutus.php'    =>  'ABOUT US',
        'index.php'     =>  'HOME',		
    );
?>

    <div class="row header">
        <img src="images/logS.png">
<?php
        foreach( $links as $href => $text ){
            printf(
                '<a href="%s" class="normal %s">%s</a>',
                $href,
                ( basename( $_SERVER['SCRIPT_FILENAME'] )==$href ? $cn : '' ),
                $text
            );
        }
?>
    </div>