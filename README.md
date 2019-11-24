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

```PHP
$mySessionVar = new Sessions('session-name' , 'session-value' , 0);
```



