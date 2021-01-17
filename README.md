### Student

Arthur Brito de Araujo Costa (JC788339)

## Requirements

Make sure you have the latest versions of **Docker** and **Docker Compose** and **git** installed on your machine.

Clone this repository or copy the files from this repository into a new folder. In the **docker-compose.yml**

Make sure to [add your user to the `docker` group](https://docs.docker.com/install/linux/linux-postinstall/#manage-docker-as-a-non-root-user) when using Linux.

## Wordpress & Docker

This file will setup Wordpress, MySQL & PHPMyAdmin with a single command. Add the code below to a file called "docker-compose.yaml" and run the command

```
$ docker-compose up

# To Tear Down
$ docker-compose down --volumes
```

This will run MySQL, Wordpress and PHPmyAdmin which is what is necessary to start the development

Now open the browser and open `locahost:8000` to see the wordpress running

## Git Workflow

To follow this workflow you have to have git installed.

The workflow start with cloning the repository

`git clone `

This will make a copy of the repository into your own profile.

Open the directory
`cd Assigment-2`

To startup creating a branch for the feature you are developing run

`git checkout -b "feature/name-of-the-feature"`

Add the changes into the stage
`git add .`

Create a commit
`git commit -m "Your message"`

Once you done with the feature you can publish it

`git push origin HEAD`\*

\*You might need to login or adjust your ssh keys to push to production.

A link will be generated that can help you to create a **Pull Request**
Example: https://github.com/jcu-cms-bachelors/Assignment-2/pull/new/feature/read-me

Following the link steps you can create a **Pull Request**.
Pull Requests needs to be reviewed by the peers to be merged into **Staging** environment.

[A staging environment is the last step before something goes into production and is visible on the live site. ](https://umbraco.com/about-us/umbraco-dictionary/staging-environment/#:~:text=A%20staging%20environment%20is%20the,they%20hit%20the%20live%20website. "A staging environment is the last step before something goes into production and is visible on the live site. ")

After the things are push into staging and tested we can then push to the production which is the **main** branch.

## Deploy
