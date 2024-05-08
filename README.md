# 🚀JetPhp Framework🚀

The first PHP REST framework that is truly

It runs on top of ✨ J2J ✨ architecture.

## Installation

```bash
composer create-project --prefer-dist=dev [more to be added here after release]
```

## Directory
    
> 1. 📂 authenticationBackends:-
       This is where authentication backends should reside. 
> 2. 📂 middlewares:- This is where all request middlewares reside
> 3. 📂 services:- This is where our actual business logic resides.
> 4. 📂 Controller.php:- This is the only controller we need for the entire project.
> 5. 📄 MainApiSwitch.php:- This is the one that maps requests to their respective services.
> 6. 📄 routes.php:- This is where our one and only endpoint resides.
> 7. 📄 index.php:- This is our entry file to our project.
> 8. 📄 jet:- This is our commandline helper.
> 9. 📄 settings.ini:- all settings for our entire project reside here.

After installation, just run the following to start the server
```bash
php jet serve  # http://localhost:8000
```

By default, the server will run on port 8000, to change that, run the following
```bash
php jet serve -p8080 # http://localhost:8080
```

Your endpoint is now running on http://localhost:8000/api/v1/

## Quick Guide for Getting Started.

Detailed Documentation to follow.

### Creating a service.
Create a new service in services folder. Services are normal PHP classes that extend `jetPhp\request\BaseRestService`.

### Creating an action
In the service/class created above, create a method that returns `jetPhp\response\BaseResponse`. 
This action/method can take on the following params in the respective order:-
       
1. $data:- This is the request data minus the files.
2. $files:- These are the files that have been sent along.
3. $request:- This is the entire request instance. You can omit this and access it in your actions using `$this->request`.

All requests will also define the action name which is the name of the method you want to run in the service registered.

Example Service with an action.
```php
<?php

namespace Jet\JetFramework\services;


use jetPhp\request\BaseRestService;
use jetPhp\response\BaseResponse;

class UserService extends BaseRestService
{
//    public array $actionsRequiringAuth = ['login']; # You can define all actions that will require authentication globally by adding the method names here.
//    public bool $serviceRequiresAuth = true; # Or you can mark that the entire service can only be access by authenticated users.
//    public array $deactivatedActions = ['login'] # you can also mark actions as deactivated by passing them in here.    
    protected function login(
     $data, // this must be the first variable
     $files, // this must be the second
     // $request, You can access the entire request object from here
     ): BaseResponse
    {
//       $this->request; // or you can access it like this.
//       $this->can('VIEW_LOGIN'); // checks if the current user has a permission
//       $this->auth(); // the currently authenticated context user object
//       $this->mustAuthenticate(); // user wont pass here if they are not authenticated
       return BaseResponse::JsonResponse(0,
        "This is the sample response message to the frontend",
         [$data,$files]);
    }
}
```

### Check authentication context.
In your action/method, check for methods like `$this->mustAuthenticate($optionalMessagehere), $this->auth()`.
You can find all the available [methods here ](https://jetphp-project.github.io/JetPhp-Core/classes/jetPhp-request-BaseRestService.html)

### Registering services
In the `MainApiSwitch.php` add your service and give it a name, example:-
```php
# ... rest of the switcher

public function registerServices(): array
    {
        return [
            'user' => new UserService(),
        ];
    }
```
From there on, all requests targeting the `UserService()` will pass the key `SERVICE` with value `user`.

## Request
All requests must define two keys that is `SERVICE` and `ACTION`.

Example request:-
```json
{
    "SERVICE" :"user",
    "ACTION": "login",
//       ...rest of the data also as key-value
}
```

Also, formData is supported as below:- 

```js
let data = new FormData();
data.append('SERVICE', 'user');
data.append('ACTION', 'login');
// more data can be appended to data here
```

## Response
All requests have the same response as [explained here](https://jetphp-project.github.io/JetPhp-Core/classes/jetPhp-response-BaseResponse.html).

All actions in services must return `BaseReponse` from `jetPhp\response\BaseResponse` which is composed of the following:-

1. `$returnCode`:- Return Code is the new and custom way of returning your own custom codes back to the frontend.
The fact that you can customize these gives your team a chance to define different codes for dirrent scenarios.
> However, `returnCode of 0` is reserved for successful requests for conventional purposes but you can make this whatever you want.

> This is the only required parameter on the response. implying that every response defines this atleast.

2. `$returnMessage`:- This is the message you want to send to the front-end or nothing.
3. `$returnData`:- This can be an anything, from arrays, to objects, to anything that you want to sent to the front-end
4. `$extraData`:- Any other data you want to send back to the front-end, can also be anything or nothing.

To send a response, just call:- 
```php
use jetPhp\response\BaseResponse
// rest of your method login here
return BaseResponse::JsonResponse(0, $message, $data, $extraData);
}
```

The format of the response, controller, switch, and request is what defines the architecture `J2J`.
### 🔥🔥🔥 Goodluck, and happy coding 🔥🔥🔥