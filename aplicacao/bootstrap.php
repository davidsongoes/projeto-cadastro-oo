<?php

function carregar_classe( $classe )
{
    $classe = str_replace( '\\', '/', $classe );
    if ( file_exists( "aplicacao/$classe.class.php" ) ) {
        require_once( "aplicacao/$classe.class.php" );
    }else{

    	throw new Exception("Error Processing Request :$classe", 1);
    	
    }
}

spl_autoload_register( 'carregar_classe' );