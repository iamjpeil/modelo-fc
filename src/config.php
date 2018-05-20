<?php
/*
* É recomendado que a configuração da URL base, caso necessário, seja nesse arquivo.
* Veja o exemplo:
*/



/** caminho absoluto para a pasta do sistema **/	
if ( !defined('ABSPATH') )		define('ABSPATH', dirname(__FILE__) . '/');			
/** caminho no server para o sistema **/	
if ( !defined('BASEURL') )		define('BASEURL', 'http://localhost/modelo-fc/src/');

/** caminho do arquivo de banco de dados **/	
if ( !defined('DBAPI') )		define('DBAPI', ABSPATH . 'model\database.php');

//define("URL", "http://localhost/modelo-fc/src/");
/** caminhos dos templates de header e footer **/	
define('HEADER_TEMPLATE', ABSPATH . 'view/includes/header.php');	
define('FOOTER_TEMPLATE', ABSPATH . 'view/includes/footer.php');

 require_once 'model/config-banco-dados.php';

/*
* Exemplo de utilização da URL base no carregamento de arquivo .css:
* <link rel="stylesheet" type="text/css" href="<?php echo URL;?>model/css/style.css">
*/
