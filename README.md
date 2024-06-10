# 🚀Pionia Framework🚀

The first PHP REST framework that is truly restful.

It runs on top of ✨ Moonlight ✨ architecture. 

![Pionia Logo](https://pionia.netlify.app/pionia_hu7bc625304583a71a69e31d56c05815e9_99619_602x0_resize_q85_h2_lanczos_3.webp)

## Creating a project

```bash
composer create-project pionia/pionia-app my_simple_project
```
Please remember to replace `my_simple_project` with your project name

## Directory
    
> 1. 📂 authenticationBackends:-
       This is where authentication backends should reside. These are the strategies that the app will use to authenticate users to the app context. 
> 2. 📂 middlewares:- This is where all request middlewares reside. These are the classes that run on every request and every response.
> 3. 📂 services:- This is where our actual business logic resides.
> 4. 📂 controller:- This is where our only controller resides. under normal circumstances, you will not need to touch this.
> 5. 📄 switches:- This is where our main app switch resides. This is where we register all our services.
> 6. 📄 Routes.php:- This is where our one and only endpoint resides.
> 7. 📄 index.php:- This is our entry file to our project.
> 8. 📄 pionia:- This is our commandline helper. For every command, we call this file.
> 9. 📄 settings.ini:- All settings for our entire project reside here.

After installation, just run the following to start the server
```bash
php pionia serve  # http://localhost:8000
```

By default, the server will run on port 8000, to change that, run the following
```bash
php pionia serve -p8080 # http://localhost:8080
```

Your endpoint is now running on http://localhost:8000/api/v1/

## Quick Guide for Getting Started.

You can follow along the documentation but its under active development.

[Go to documentation here](https://pionia.netlify.app/)

You can also run ``` php pionia``` to get a list of all available commands.

[//]: # ()
[//]: # (### Creating a service.)

[//]: # (Create a new service in services folder. Services are normal PHP classes that extend `Pionia\request\BaseRestService`.)

[//]: # ()
[//]: # (### Creating an action)

[//]: # (In the service/class created above, create a method that returns `Pionia\response\BaseResponse`. )

[//]: # (This action/method can take on the following params in the respective order:-)

[//]: # (       )
[//]: # (1. $data:- This is the request data minus the files.)

[//]: # (2. $files:- These are the files that have been sent along.)

[//]: # (3. $request:- This is the entire request instance. You can omit this and access it in your actions using `$this->request`.)

[//]: # ()
[//]: # (All requests will also define the action name which is the name of the method you want to run in the service registered.)

[//]: # ()
[//]: # (Example Service with an action.)

[//]: # ()
[//]: # (```php)

[//]: # (<?php)

[//]: # ()
[//]: # (namespace application\services;)

[//]: # ()
[//]: # ()
[//]: # (use Pionia\request\BaseRestService;)

[//]: # (use Pionia\response\BaseResponse;)

[//]: # ()
[//]: # (class UserService extends BaseRestService)

[//]: # ({)

[//]: # (//    public array $actionsRequiringAuth = ['login']; # You can define all actions that will require authentication globally by adding the method names here.)

[//]: # (//    public bool $serviceRequiresAuth = true; # Or you can mark that the entire service can only be access by authenticated users.)

[//]: # (//    public array $deactivatedActions = ['login'] # you can also mark actions as deactivated by passing them in here.    )

[//]: # (    protected function login&#40;)

[//]: # (     $data, // this must be the first variable)

[//]: # (     $files, // this must be the second)

[//]: # (     // $request, You can access the entire request object from here)

[//]: # (     &#41;: BaseResponse)

[//]: # (    {)

[//]: # (//       $this->request; // or you can access it like this.)

[//]: # (//       $this->can&#40;'VIEW_LOGIN'&#41;; // checks if the current user has a permission)

[//]: # (//       $this->auth&#40;&#41;; // the currently authenticated context user object)

[//]: # (//       $this->mustAuthenticate&#40;&#41;; // user wont pass here if they are not authenticated)

[//]: # (       return BaseResponse::JsonResponse&#40;0,)

[//]: # (        "This is the sample response message to the frontend",)

[//]: # (         [$data,$files]&#41;;)

[//]: # (    })

[//]: # (})

[//]: # (```)

[//]: # ()
[//]: # (### Check authentication context.)

[//]: # (In your action/method, check for methods like `$this->mustAuthenticate&#40;$optionalMessagehere&#41;, $this->auth&#40;&#41;`.)

[//]: # (You can find all the available [methods here ]&#40;https://Pionia-project.github.io/Pionia-Core/classes/Pionia-request-BaseRestService.html&#41;)

[//]: # ()
[//]: # (### Registering services)

[//]: # (In the `MainApiSwitch.php` add your service and give it a name, example:-)

[//]: # (```php)

[//]: # (# ... rest of the switcher)

[//]: # ()
[//]: # (public function registerServices&#40;&#41;: array)

[//]: # (    {)

[//]: # (        return [)

[//]: # (            'user' => new UserService&#40;&#41;,)

[//]: # (        ];)

[//]: # (    })

[//]: # (```)

[//]: # (From there on, all requests targeting the `UserService&#40;&#41;` will pass the key `SERVICE` with value `user`.)

[//]: # ()
[//]: # (## Request)

[//]: # (All requests must define two keys that is `SERVICE` and `ACTION`.)

[//]: # ()
[//]: # (Example request:-)

[//]: # (```json)

[//]: # ({)

[//]: # (    "SERVICE" :"user",)

[//]: # (    "ACTION": "login")

[//]: # (    // ...rest of the data also as key-value)

[//]: # (})

[//]: # (```)

[//]: # ()
[//]: # (Also, formData is supported as below:- )

[//]: # ()
[//]: # (```js)

[//]: # (let data = new FormData&#40;&#41;;)

[//]: # (data.append&#40;'SERVICE', 'user'&#41;;)

[//]: # (data.append&#40;'ACTION', 'login'&#41;;)

[//]: # (// more data can be appended to data here)

[//]: # (```)

[//]: # ()
[//]: # (## Response)

[//]: # (All requests have the same response as [explained here]&#40;https://Pionia-project.github.io/Pionia-Core/classes/Pionia-response-BaseResponse.html&#41;.)

[//]: # ()
[//]: # (All actions in services must return `BaseReponse` from `Pionia\response\BaseResponse` which is composed of the following:-)

[//]: # ()
[//]: # (1. `$returnCode`:- Return Code is the new and custom way of returning your own custom codes back to the frontend.)

[//]: # (The fact that you can customize these gives your team a chance to define different codes for dirrent scenarios.)

[//]: # (> However, `returnCode of 0` is reserved for successful requests for conventional purposes but you can make this whatever you want.)

[//]: # ()
[//]: # (> This is the only required parameter on the response. implying that every response defines this atleast.)

[//]: # ()
[//]: # (2. `$returnMessage`:- This is the message you want to send to the front-end or nothing.)

[//]: # (3. `$returnData`:- This can be an anything, from arrays, to objects, to anything that you want to sent to the front-end)

[//]: # (4. `$extraData`:- Any other data you want to send back to the front-end, can also be anything or nothing.)

[//]: # ()
[//]: # (To send a response, just call:- )

[//]: # (```php)

[//]: # (use Pionia\response\BaseResponse)

[//]: # (// rest of your method login here)

[//]: # (return BaseResponse::JsonResponse&#40;0, $message, $data, $extraData&#41;;)

[//]: # (})

[//]: # (```)

[//]: # ()
[//]: # (The format of the response, controller, switch, and request is what defines the architecture `Moonlight`.)

[//]: # ()
[//]: # (## Database Querying)

[//]: # (This framework is meant for performance intensive applications. Both developer and program performance. )

[//]: # (That's why it strips off the use of models and maintains simple queries that we are all used to. )

[//]: # ()
[//]: # (No more hustling with customization, it's your query, you know what to do with it.)

[//]: # ()
[//]: # (With that in mind, we provide you some helpers that ease this work:- )

[//]: # ()
[//]: # (Using the class `QueryBuilder&#40;&#41;`, you have access to and three methods:-)

[//]: # ()
[//]: # ( >  one&#40;$query, array $bindings&#41;:- )

[//]: # (This method is for when you want to return a single item.)

[//]: # (```php)

[//]: # ()
[//]: # ($username = $data['email'];)

[//]: # ($query = new \Pionia\database\QueryBuilder&#40;&#41;;)

[//]: # ()
[//]: # ($results = $query->one&#40;"SELECT * FROM users WHERE email = :username", ['username'=>$username]&#41;; // an object)

[//]: # ()
[//]: # (```)

[//]: # ()
[//]: # (> all&#40;$query, $bindings&#41;:- This is for returning an array of items)

[//]: # ()
[//]: # (```php)

[//]: # ( $query = new QueryBuilder&#40;&#41;;)

[//]: # ( $results = $query->all&#40;"SELECT * FROM users"&#41;; // array of items)

[//]: # (```)

[//]: # ()
[//]: # (> Query&#40;$query, $mode&#41;:- This is helpful for running queries directly that are unbound. It can run all sorts of queries.)

[//]: # ()
[//]: # (```php)

[//]: # ()
[//]: # ( $query = new \Pionia\database\QueryBuilder&#40;&#41;;)

[//]: # ( $query->Query&#40;"INSERT into password_reset_tokens&#40;email, token&#41; values &#40;'sample@gmail.com', 12345&#41;"&#41;;)

[//]: # (```)

[//]: # ()
[//]: # (### Multi-databases)

[//]: # (By default, the database under the `[db]` setting in the settings.ini will be used.)

[//]: # ()
[//]: # (You can however, define other databases like `[db2]` and use them like this.)

[//]: # ()
[//]: # (```php)

[//]: # ()
[//]: # ($q = new QueryBuilder\&#40;&#41;;)

[//]: # ($q->Using&#40;'db2'&#41;->all&#40;'your-query-here-as-usual'&#41;;)

[//]: # (```)

[//]: # ()
[//]: # (Note that, `Using` must be called first to change the connection before calling the other instance methods.)

[//]: # ()
[//]: # (So, from the above, we get the following cons)

[//]: # ()
[//]: # ( - No mapping result sets to models therefore no model hydration.)

[//]: # ( - No strange ORM therefore you get to do what you want.)

[//]: # ( - No migrations, no more commands to run. )

[//]: # ( - You get to customise and optimise your queries according to you!!)

[//]: # ( - You get to work with any existing or new databases!)

[//]: # ()
[//]: # (### Query Pagination)

[//]: # ()
[//]: # (We understand that you might be wanting to query huge datasets, we got that covered.)

[//]: # ()
[//]: # (```php)

[//]: # ()
[//]: # ()
[//]: # ($paginator = new \Pionia\database\Paginator&#40;"select * from users"&#41;;)

[//]: # ()
[//]: # ($results = $paginator)

[//]: # (            ->LimitBy&#40;10&#41; // items per page)

[//]: # (            ->startFrom&#40;0&#41; // where to start from )

[//]: # (            ->paginate&#40;array $bidings_if_any&#41;; // call this to finally run the pagination along any of your bindings)

[//]: # (```)

[//]: # ()
[//]: # (The response will be an associative array containing the following :-)

[//]: # (       )
[//]: # (* total_records :- These are all the the records before applying the limits and offsets)

[//]: # (* results :- This is the data we got back from the database.)

[//]: # (* next_offset :- Next starting point basing on current limit and offset.)

[//]: # (* previous_offset :- Offset to call if one wants to go back.)

[//]: # (* has_next_page :- If we have a next page to go to at all. False if we are at the last page.)

[//]: # (* has_prev_page :- If we can go back. False if we are at the first page )

[//]: # (* number_of_records :- The number of records returned in the current result set. Should always be less than limit.)

[//]: # ()
[//]: # (## Middlewares)

[//]: # ()
[//]: # (A middle in this framework run on every request and every response. )

[//]: # (It runs before before authentication backends. Therefore, you can't access the authenticated user context from the request, but the cleanup will )

[//]: # (have this data, therefore you can access the authenticated user. This is great for doing staff like logging a request, encrypting and descryption...)

[//]: # ()
[//]: # (All middleware must extend `Pionia\core\interceptions\BaseMiddleware`)

[//]: # ()
[//]: # (```php)

[//]: # ()
[//]: # (class MySimpleMiddleware extends \Pionia\core\interceptions\BaseMiddleware)

[//]: # ({)

[//]: # (    public function run&#40;\Pionia\request\Request $request,?\Pionia\response\Response $response&#41;{)

[//]: # (        if &#40;$response&#41;{)

[//]: # (            // here you can do logic that has access to both request and response)

[//]: # (            // this will run after running the service. So there is a high chance that you can even access the response data here)

[//]: # (        } else {)

[//]: # (            // add login here that only has access to request only.)

[//]: # (            // this will run the first time before hitting the actual service)

[//]: # (        })

[//]: # (    })

[//]: # (})

[//]: # (```)

[//]: # ()
[//]: # (### Middleware Registration)

[//]: # ()
[//]: # (Creating a middleware is not enough, you need to add them in our `kernel`.)

[//]: # (Head over to `index.php` and add it on this line)

[//]: # (```php)

[//]: # (->registerMiddleware&#40;[)

[//]: # (    'application\middlewares\MySimpleMiddleware')

[//]: # (]&#41;)

[//]: # (```)

[//]: # (That's it, your middleware is now ready to start running against every request and every response.)

[//]: # ()
[//]: # (## Authentication Backends.)

[//]: # ()
[//]: # (These are the strategies the app will use to authenticate user to the app context.)

[//]: # (They run on every request in the order of their registration.)

[//]: # ()
[//]: # (Once one of these set the user to context, the rest will be ignored!)

[//]: # ()
[//]: # (Imagine an app where users authenticate differently forexample for web and mobile.)

[//]: # (This could be your advantage to define them seperately. You can also have only auth backend, example)

[//]: # (all your users can decide to authenticate using JWT. That's it. Implement that and you're done.)

[//]: # ()
[//]: # (All Auth Backends must extend the `application\core\interceptions\BaseAuthenticationBackend`, implement the )

[//]: # (`authenticate` method and return `ContextUserObject` or `null`)

[//]: # ()
[//]: # (That means in your backend, the only job you have is to query and set up the `ContextUserObject` accordingly.)

[//]: # (```php)

[//]: # (class MobileAuthBackend extends BaseAuthenticationBackend)

[//]: # ({)

[//]: # ()
[//]: # (    public function authenticate&#40;Request $request&#41;: ContextUserObject)

[//]: # (    {)

[//]: # (        // this is where you can look up your user accordingly and set up)

[//]: # (        return new ContextUserObject&#40;&#41;;)

[//]: # (    })

[//]: # (})

[//]: # (```)

[//]: # (Authentication Backends also have access to the ongoing request just incase you want to pick something from headers or body itself.)

[//]: # ()
[//]: # (### Authentication Backend Registration.)

[//]: # ()
[//]: # (Just like middlewares, you can find and add your auth backends to the `kernel` in `index.php` on this line)

[//]: # ()
[//]: # (```php)

[//]: # (->registerAuthBackends&#40;['application\authenticationBackends\MobileAuthBackend']&#41; // add your authentication backends here)

[//]: # (```)

[//]: # ()
[//]: # (And that's it!!! )

## Contributions

All forms of contributions are welcome from documentation, coding, community development and many more.

### 🔥🔥🔥 Goodluck, and happy coding 🔥🔥🔥
