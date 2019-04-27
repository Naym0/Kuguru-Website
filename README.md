# Kuguru Food Complex Limited

A revamp of their [company website](http://kuguru.com) in an attempt to understand concepts in Human Computer Interactions

## Contributors

* [Allan Vikiru](http://github.com/AllanVikiru)
* [Nicole Muswanya](http://github.com/Naym0)
* [Stephen Wanyee](http://github.com/steekam)
* [Victor Zeddy's](http://github.com/Zeddling)

## Setting up the project

### Environment variables

In the root folder there is a file **.env-example** copy it and rename name the new file **.env**. Change the variables to reflect your machine configurations.
For the assets to load correctly ensure you set your BASEPATH.

```BASEPATH = http://localhost/project-folder```

Ensure you have composer installed. Go to your terminal/cmd in the project root directory and enter the following command ```composer install``` to install the required php libraries.

### Dbv (Database version control) setup

In this project we are using a database version control tool that will help with managing a common database schema with ease.

Having a database in your server for this project, go to ```http://localhost/project_root/dbv/```. Move the schemas from disk to your database. If there are any _revisions_ or _seeders_ you can run them as well.