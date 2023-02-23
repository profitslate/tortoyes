# {Pre-requisite}

    You need two softwares to be installed in your system
        1. PHP
        2. GIT

-h      | Print all the arguments
-cli    | open command line interface to know more check documentation
-c      | specify the config file path to know more check documentation
-s      | to start mongo server 'port=8800,logpath=log.log'
-mongo  | to start mongo server 'port=8800,logpath=log.log'

# How to start a Web Server

## Using Command line Argument

 - Start with Default Vaues

 `php boss.php -s`

 - Arguments you can Specify

 `php boss.php -s "port=8690,logpath=~/phpMongo/web.log,docroot=~/phpMongo/Application/"`

## Using CLI 
 - To start the CLI

   `php boss.php -cli`

 -To start a web Server with default configaration 

   `start(server=web)`

 -Arguments we can give

 `start(server=web,port=8690,logpath=~/phpMongo/web.log,docroot=~/phpMongo/Application/)
    
    -docroot [where the web server codes is placced]
    -logpath [Path of the file where the server log is getting stored]
    -port [port for the server]

# How to stop a Web server

## Using Command line argument

 - `ctrl+c`

## Using CLI

 -Stop all the server at once
    `stop(server=web)`

 -Stop a server in specific port
    `stop(server=web,port=8900)`

#Who should you use CLI over command line argument

    1. You can Run Multiple servver instace at once
    2. You can build the codes while running the server form same place
    3. Other features are coming soon