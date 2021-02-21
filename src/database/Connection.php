<?php

namespace Src\database;

use PDO;
use Exception;

class Connection{
	
	public static function open($name){

		//verifica se existe arquivo de configuração para este banco de dados
		if (file_exists(__DIR__."/../config/{$name}.ini")){
			
			$db = parse_ini_file(__DIR__."/../config/{$name}.ini");
		}else{
			throw new Exception("Arquivo '$name' não encotrado", 1);
			
		}

		//lê as informações contidas no arquivo
		$user = isset($db['DB_USERNAME'])   ? $db['DB_USERNAME']    : NULL;
		$pass = isset($db['DB_PASSWORD'])   ? $db['DB_PASSWORD']    : NULL;
        $name = isset($db['DB_DATABASE'])   ? $db['DB_DATABASE']    : NULL;
		$host = isset($db['DB_HOST'])       ? $db['DB_HOST']        : NULL;
		$type = isset($db['DB_CONNECTION']) ? $db['DB_CONNECTION']  : NULL;
		$port = isset($db['DB_PORT'])       ? $db['DB_PORT']        : NULL;

		//descobre qual o tipo (driver) de banco de dados a ser utilizado
		switch ($type) {
			case 'mysql':
				try{
                    
                    $port = $port ? $port : '3306';
				    $conn = new PDO("mysql:host={$host};port={$port};dbname={$name}",$user,$pass);
                    
                    //echo "Conectado no Banco de Dados...";
                }
                catch(PDOException $e){
                
                    echo "Não Conectado ao Banco de Dados...".$e->getMessage;
                }
			break;
		}

		//define para que o PDO lance exceções na ocorrência de erros 
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conn;
	}
}