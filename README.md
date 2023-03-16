# osTicket on Docker

osTicket is an open source ticketing system. This repository
contains a docker-compose environment you can use to 
setup an osTicket system.  

## Installation
Make sure docker and docker-compose are installed on your
system and that the docker daemon is running.

Clone this repository to a local directory and execute
the following command:

```
docker-compose build
```
Wait until the building of the images is finished and run:
```
docker-compose up -d
```

Now you can use a browser to go to the following url:  
[http://<docker ip>:3666](http://<docker ip>:3666)  

## osTicket setup
The first time you enter the url you will be presented 
with a setup screen. Use the following settings for the
database:
|Setting|Value|
|-|-|
|MySQL Table Prefix|ost_|
|MySQL Hostname|mysql|
|MySQL Database|osticket|
|MySQL Username|osticket|
|MySQL Password|TicketsTicketsAndMoreTickets|

### Installing plugins
osTicket has a plugin system that requires files to be
installed in the installation directory.  
You can find the application installation in the 
following location on your filesystem:  
`/var/lib/docker/volumes/osticket_osticket_application/`

## Database backup
The database files used by osTicket can be found in
the following location on your filesystem:  
`/var/lib/docker/volumes/osticket_osticket_database` 

## WARNING
When reinstalling the image and updating the containers
the latest version of osTicket will be pulled from the
repository. This docker-compose environment has no 
mechanisms for updating existing installations (e.g.
database model modifications). Make sure to read the 
latest release notes of osTicket to see if there are 
any update steps necessary.  
If you require access to the container to perform
update commands use the following command (make sure
the docker-compose stack is running):  
```
docker exec -it osticket_web /bin/bash
```

## Suggestions or help
Feel free to contact me (Peter Berends) at raldnor [AT] elizium [DOT] nu.

