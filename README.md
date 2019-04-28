# Kuguru Food Complex Limited

A revamp of their [company website](http://kuguru.com) in an attempt to understand concepts in Human Computer Interactions

## Contributors

* [Allan Vikiru](http://github.com/AllanVikiru)
* [Nicole Muswanya](http://github.com/Naym0)
* [Stephen Wanyee](http://github.com/steekam)
* [Victor Zeddy's](http://github.com/Zeddling)

## Setting up the project

### Installing Composer

#### Windows - Using the installler

This is the easiest way to get Composer set up on your machine.

Download and run [Composer-Setup.exe](https://getcomposer.org/Composer-Setup.exe). It will install the latest Composer version and set up your PATH so that you can call composer from any directory in your command line.

> __Note:__ Close your current terminal. Test usage with a new terminal: This is important since the PATH only gets loaded when the terminal starts.

#### Linux / Unix / macOS

##### Downloading the Composer Executable

Composer offers a convenient installer that you can execute directly from the command line. Feel free to [download this file](https://getcomposer.org/installer) or review it on [GitHub](https://github.com/composer/getcomposer.org/blob/master/web/installer) if you wish to know more about the inner workings of the installer. The source is plain PHP.

There are in short, two ways to install Composer. Locally as part of your project, or globally as a system wide executable.
I will show global installation only, if you want it locally to the project only, you cna check out the [composer instructions](https://getcomposer.org/doc/00-intro.md#locally).

###### Global installation

You can place the Composer PHAR anywhere you wish. If you put it in a directory that is part of your PATH, you can access it globally. On Unix systems you can even make it executable and invoke it without directly using the php interpreter.

After running the installer following [the Download page instructions](https://getcomposer.org/download/) you can run this to move composer.phar to a directory that is in your path:

> ```mv composer.phar /usr/local/bin/composer```

If you like to install it only for your user and avoid requiring root permissions, you can use ~/.local/bin instead which is available by default on some Linux distributions.

>__Note:__ If the above fails due to permissions, you may need to run it again with sudo.
>
> __Note:__ On some versions of macOS the /usr directory does not exist by default. If you receive the error "/usr/local/bin/composer: No such file or directory" then you must create the directory manually before proceeding: ```mkdir -p /usr/local/bin.```
>
> __Note:__ For information on changing your PATH, please read [the Wikipedia article](https://en.wikipedia.org/wiki/PATH_(variable)) and/or use Google.

Now run ```composer``` in order to run Composer instead of ```php composer.phar```

---

### After Installing Composer

If you already have composer installed now. Go to the terminal in the root folder of the project and run the command ```composer install```. This installs all the dependencies required in the project.

### Environment variables

In the root folder of the project you will find a file: __env-example__. Make a copy and name the copy __.env__

In the new __.env__ file change the variable values to match your system.

> ```BASEPATH = http://localhost/Kuguru-Website```
>
>```DB_HOST = "localhost"```
>
>```DB_USER = "root"```
>
>```DB_PASSWORD = "PASSWORD-HERE-IF-ANY"```
>
>```DB_NAME = "DATABASE-NAME"```

### Dbv (Database version control) setup

In this project we are using a database version control tool that will help with managing a common database schema with ease.

Having a database in your server for this project, go to ```http://localhost/project_folder/dbv/```. Move the schemas from disk to your database. If there are any _revisions_ or _seeders_ you can run them as well.