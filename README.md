# event

## Instructions

#### Requirements
* Docker
* Disable others services that be running in port 80

#### Run
##### In the terminal run this code:
```
docker-compose up
```

***This code will download all dependencies***

<img src="img/docker_up.png"/>

#### Open other terminal and run this code to enter in container:
```
docker exec -it event_site_1 bash
``` 

<img src="img/enter_container.png"/>

***Check the container name, in my case the name is event_site_1***

#### In container, browser to project folder: 
```
cd /var/www/html/
```

<img src="img/browser_project.png"/>

#### Finally run this code to start application
```
php index.php
```
<img src="img/run_app.png"/>

#### Or run the code below to automatically add and show result
```
php automatically.php 
```
<img src="img/run_automatically.png"/>

## Run test
```
vendor/bin/phpunit tests/
```
<img src="img/run_test.png"/>