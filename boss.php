<?php

require("API/Server.php");
require("API/Cli.php");

// printing command line arguments
/**
 * Arguments are 
 * host , port, logpath, docroot
 */

$webServers = array();
function print_help()
{
    echo "-h | Print all the arguments\n";
    echo "-cli | open command line interface to know more check documentation\n";
    echo "-c | specify the config file path to know more check documentation\n";
    echo "-s | to start mongo server 'port=8800,logpath=log.log'\n";
    echo "-m | to start mongo server 'port=8800,logpath=log.log'\n";
    echo " To Know more check the Documentation";
    exit(0);
}

function get_arguments($args)
{
    $arrguments = array();
    if (!$args) {
        return $arrguments;
    }
    $args = explode(",", $args);
    if ($args) {
        foreach ($args as $arg) {
            $data = explode("=", $arg);
            if ($data) {
                $arrguments["$data[0]"] = "$data[1]";
            }
        }
    }
    return $arrguments;
}
if ($argc < 1) {
    echo "-h | Print all the arguments\n";
    exit(0);
}

for ($i = 1; $i < $argc; $i++) {
    if ($argv[$i] == "-h") {
        if (function_exists(print_help())) {
            print_help();
        }
    } elseif ($argv[$i] == "-cli") {
        $cli = new CLI();
        $cli->Run();
    } elseif ($argv[$i] == "-s") {
        // create web server with the arguments user provided
        $arguments = get_arguments($argv[++$i]);
        foreach($arguments as $x => $v){
            echo "$x => $v\n";
        }
        (new WebServer($arguments))->Start();
        // echo $argv[++$i];
    } elseif ($argv[$i] == "-mongo") {
        // create monog db server with the argumnets user provided
    }
}
?>