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

## Contributions

All forms of contributions are welcome from documentation, coding, community development and many more.

### 🔥🔥🔥 Goodluck, and happy coding 🔥🔥🔥
