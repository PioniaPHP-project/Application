# 🚀Pionia Framework🚀
![Pionia Logo](/static/favicon.png) 

Pionia Framework is a PHP framework for building RESTFUL APIs. 
It is a lightweight framework that is easy to use and easy to understand.

It runs on top of ✨ Moonlight ✨ architecture. 

## Creating a project

```bash
composer create-project pionia/pionia project_name
```
Please remember to replace `project_name` with your project name

## Directory
```md
|-authentications
|-bootstrap
|----application.php
|----routes.php
|-commands
|-environment
|----.env
|----settings.ini
|-middlewares
|-public
|-- .htaccess
|-- index.php
services
static
|-- favicon.png
|-- pionia_logo.webp
|-- favicon.ico
|-- bootstrap.min.css
storage
|-- cache
|-- logs
|-- scripts
vendor
.gitignore
composer.json
composer.lock
pionia
README.md
```
> 1. 📂 authentication:-
       This is where authentication backends should reside. These are the strategies that the app will use to authenticate users to the app context. 
> 2. 📂 middlewares:- This is where all request middlewares reside. These are the classes that run on every request and every response.
> 3. 📂 services:- This is where our actual business logic resides.
> 4. 📂 commands:- This is where all our commandline commands reside.
> 5. 📂 environment:- This is where all our environment settings reside.
> 6. 📂 storage:- This is where all our storage files reside.
> 7. 📂 static:- This is where all our static files reside. Default files found here should never be deleted.
> 8. 📂 vendor:- This is where all our composer dependencies reside.
> 9. 📄 .gitignore:- This is where we specify files that should not be tracked by git.
> 10. 📄 composer.json:- This is where we specify all our composer dependencies.
> 11. 📄 composer.lock:- This is where we specify all our composer dependencies.
> 12. 📄 pionia:- This is our commandline helper. For every command, we call this file. 
> 13. 📂 public:- This is where our public files reside. This is where our entry file resides. 
> 14. 📄 switches:- This is where our main app switch resides. This is where we register all our services. 
> 15. 📄 pionia:- This is our commandline helper. For every command, we call this file.
> 16. 📄 README.md:- This is our documentation file. This is where we document our project.
> 17. 📂 bootstrap:- This is where our application bootstrapping files reside. This is where we register all our routes.

After installation, just run the following to start the server
```bash
php pionia serve  # http://localhost:8000
```

By default, the server will run on port 8000, to change that, run the following
```bash
 php pionia serve --port 8080 # http://localhost:8080
```

Your endpoint is now running on http://localhost:8080/api/v1/

## Official Documentation

You can follow along the documentation but its under active development.

[Go to documentation here](https://pionia.netlify.app/)

You can also run ``` php pionia``` to get a list of all available commands.

If you're making any http requests from your frontend, we recommend using the `jet-fetch` library.
However, other framework-specific packages are still okay like the `z-fetch` for `z-js` and `axios`.

In the root of your project, run :-

NPM
```bash
npm install jet-fetch
```

YARN
```bash 
yarn add jet-fetch
```

Then use the `moonlightRequest` method of the package to query any moonlight-powered backend.

```js
import { Jet } from 'jet-fetch';
const jet = new Jet({
  baseUrl: 'http://localhost:8000/api/',
});

// unauthenticated requests
const res = await jet.moonlightRequest(
    { 
           service: 'yourService', 
           action: 'yourAction', 
           ...anyOtherData 
    }, 'v2/');

// for jwt-authenticated requests
const res = await jet.secureMoonlightRequest(
        {
               service: 'yourService',
               action: 'yourAction',
               ...anyOtherData
        }, 'v2/');
```

For details about `jet-fetch`, follow the [readme guide provided here.](https://github.com/OSCA-Kampala-Chapter/jet-fetch?tab=readme-ov-file#about-jet-fetch-library)


## Contributions

All forms of contributions are welcome from documentation, coding, community development and many more.

### 🔥🔥🔥 Goodluck, and happy coding 🔥🔥🔥
