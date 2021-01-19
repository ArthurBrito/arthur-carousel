### Student

Arthur Brito de Araujo Costa (JC788339)

## Requirements

Make sure you have the latest versions of **Docker** and **Docker Compose** and **git** installed on your machine.

Clone this repository or copy the files from this repository into a new folder. In the **docker-compose.yml**

Make sure to [add your user to the `docker` group](https://docs.docker.com/install/linux/linux-postinstall/#manage-docker-as-a-non-root-user) when using Linux.

## Wordpress & Docker (local environment)

This file will setup Wordpress, MySQL & PHPMyAdmin with a single command. Add the code below to a file called "docker-compose.yaml" and run the command

```
$ docker-compose up

# To Tear Down
$ docker-compose down --volumes
```

This will run MySQL, Wordpress and PHPmyAdmin which is what is necessary to start the development

Now open the browser and open `locahost:8000` to see the wordpress running

## Deploy

Go to the wordpress admin

Click on Plugins tab

Click on Upload plugin

Zip the arthur-carousel file

Make the Upload

Activate plugin

## How to use it

Go to the Site Scripts tab

Give the link and alt text for at least two images

Change the style configuration as you want

And finally

Go to one of your pages or posts and write on the text

```
[arthur_carousel]
```

Done!
