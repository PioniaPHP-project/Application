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
```md
app
├── switches
├── services
├── authentications
├── commands
├── middlewares
├── routes.php
vendor
.gitignore
composer.json
composer.lock
index.php
pionia
README.md
settings.ini
```
> 1. 📂 authentication:-
       This is where authentication backends should reside. These are the strategies that the app will use to authenticate users to the app context. 
> 2. 📂 middlewares:- This is where all request middlewares reside. These are the classes that run on every request and every response.
> 3. 📂 services:- This is where our actual business logic resides.
> 5. 📄 switches:- This is where our main app switch resides. This is where we register all our services.
> 6. 📄 routes.php:- This is where we register our service switches
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

## Official Documentation

You can follow along the documentation but its under active development.

[Go to documentation here](https://pionia.netlify.app/)

You can also run ``` php pionia``` to get a list of all available commands.

Pionia is basically a REST framework. But if you're intending to use it fullstack with 
any frontend framework of your choice.
Run the command :- 
```bash 
php pionia frontend:scaffold
```

From there, follow the prompts till you get what you need. If your framework uses `vite`, please share it and we add it to our scaffolding.

Pionia can also serve your SPA from the root of the app. This implies you only host Pionia in the live environment and Pionia will take care 
of serving your frontend. 

If you want to build and serve your frontend with Pionia.
```bash 
php pionia frontend:build
```

If you want to revert(remove the build files from your Pionia code), you can reverse this by running 

```bash
php pionia frontend:build:clean
```

Assuming you wanted to use like VueJs and by mistake you scaffold React. Running the following 
command will remove the entire frontend and the configs added to your `settings.ini`

```bash 
php pionia frontend:drop
```

If you're making any http requests from your frontend, we recommend using the `jet-fetch` library.
However, other framework-specific packages are still okay like the `z-fetch` for `z-js`.

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
With the above, Pionia peeps in the frontend too!

## Contributions

All forms of contributions are welcome from documentation, coding, community development and many more.

### 🔥🔥🔥 Goodluck, and happy coding 🔥🔥🔥
