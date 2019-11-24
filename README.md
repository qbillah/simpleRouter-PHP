# simpleRouter

### A simple router / sessions library made in PHP 


#### Router:
To use the Router class:
```PHP
$router = new Router(new Request);
```
GET request using the Router class:
```PHP
$router->get('/' , function(){
  //Implement your own views & controls
});
```
POST request using the Router class:
```PHP
$router->post('/data' , function($req){
  echo json_encode($req->getBody());
  //Implement whatever you want to do with JSON data
});
```

#### Sessions:
**Make sure you have session_start(); on top of each page

##### Normal Constructor
```PHP
$mySessionVar = new Sessions();
```

##### Overloaded Constructor:
Sets a session variable
```PHP
$mySessionVar = new Sessions('session-name' , 'session-value' , 0);
```
ARG 1 = Session variable name

ARG 2 = Session variable value

ARG 3 = Session type

Session type 0 - expires when browser is closed

Session type 1 - doesn't expire when browser is closed

##### checkIsSession function:
Returns 1 if the session variable exists and 0 if it doesn't.
```PHP
//Use Normal Constructor
$sessionCheck = new Sessions();
echo $sessionCheck->checkIsSession($sessionName);
```
ARG1 = Session variable you are checking

##### getSessionValue function:
Returns the value of the session variable 
```PHP
//Use Normal Constructor
$sessionCheck = new Sessions();
echo $sessionCheck->getSessionValue($sessionName);
```
ARG1 = Session variable you are trying to get the value for






