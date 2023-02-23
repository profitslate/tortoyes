<?php

class Server
{
    protected $HostName = "localhost";
    protected $PortNumber = "8000";
    protected $ProcessId = "";
    protected $LogPath = "";

    public function Stop()
    {
        // echo "kill $this->ProcessId";
        if ($this->ProcessId) {
            exec(sprintf("kill %s > %s 2", $this->ProcessId, "/dev/null"));
            echo "Development Server is Stopped [http://$this->HostName:$this->PortNumber]\n" ;
        } else {
            echo "No Development Server is Running on this [http://$this->HostName:$this->PortNumber] Location\n";
        }
    }
}
class WebServer extends Server
{
    private $DocRoot;
    /**
     * @param mixed $__arguments - array of parameters to create the server
     * example @("host" => "localhost", "port" => "8000")
     */
    public function __construct($__arguments = array("host" => "localhost", "port" => "8000"))
    {
        $curpath = exec('pwd');
        if (array_key_exists("host", $__arguments)) {
            $this->HostName = $__arguments["host"];
        }
        if (array_key_exists("port", $__arguments)) {
            $this->PortNumber = $__arguments["port"];
        }
        if (array_key_exists("logpath", $__arguments)) {
            $this->LogPath = $__arguments['logpath'];
        } else {
            $this->LogPath = "$curpath/webserver.log";
        }
        if (array_key_exists("docroot", $__arguments)){
            $this->DocRoot = $__arguments['docroot'];
        }else {
            $this->DocRoot = "$curpath/Application/";
        }

    }
    public function Start()
    {
        $this->ProcessId = trim(shell_exec(sprintf("php -S $this->HostName:$this->PortNumber -t $this->DocRoot > %s 2>&1 & echo $!", $this->LogPath)));
        echo "Development Server is Started [http://$this->HostName:$this->PortNumber] : $this->ProcessId\n";
    }

}
?>