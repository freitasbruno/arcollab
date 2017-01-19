## Basic setup for your RaspberryPi

[Back to arcollab Logs](/README.md)

This project is being developed on a rapsberry pi home server, using open source technologies for the development of the aplication.
I followed some usefull instructions for setting up the Pi, you can read the full article [here](https://mattwilcox.net/web-development/setting-up-a-secure-home-web-server-with-raspberry-pi)

### Installing Raspian

1. Assemble the Pi, plug in a keyboard, mouse and screen. Don’t plug the Ethernet cable just yet, we’ll go through some security steps to help prevent undesirable access to our device.
2. Plug it to the power
3. On the Noobs menu choose Raspian, the ‘recommended’ installation
4. After the installation it will reboot and start the Raspian GUI
5. Go to the applications button -> choose preferences -> Raspberry configuration -> Choose ‘Boot to CLI’
6. Configure the ‘localization’ options according to your country/preferences
7. Set a new password for the default user (pi)
8. Enable SSH: Choose ‘advanced configuration’ -> SSH -> Enable
9. Disable the automatic login feature as user ‘pi’. We will remove that user for security reasons so we need to have that turned off before
10. Since the GUI will not be used generally you can reduce the amount of RAM that is reserved for it. In ‘advanced configuration’ -> ‘Memory Split’-> 16
	* Hit OK and accept restarting as suggested, the next time it boots it will not load straight into the command line.
11. Wait for it to boot and once back at the command line login with the default credentials, it will prompt you for the username -> type in ‘pi’ and then the password -> type in the one you chose before.

### Now from the command line:

1. List the current groups by typing groups on the terminal -> a list will be displayed: group1 group2 group3
2. Create a new user, adding it to all the groups: sudo useradd –m –G group1,group2,group3,… USERNAME
3. Set a password for the new user: sudo passwd USERNAME
4. Shutdown the Pi: sudo shutdown -h now
5. The Pi will turn itself off, you can now plug in the Ethernet cable, unplug the power and plug it back in so it starts up
6. Wait for it to boot and once again login with your new credentials
7. Delete the default user (pi): sudo deluser —remove–all–files pi

### Accessing remotely

1. Find your IP address (eg. whatismyip)
2. Configure your router port fowarding to send incoming requests to your Pi. I have changed my Pi hostname to ‘bitlabpi’ and configured the router to redirect the requests to that, rather than a fixed IP. You can also choose to assign a static IP to your Pi.
3. Optionally you can configure a Dynamic DNS (eg. NoIP), that makes it easier to remember, in my case it’s bitlabpi.ddns.net
4. From another computer, using a terminal type: ssh USERNAME@yourIPaddress . I’m using Cygwin but PuTTY is a great option
5. Type in the password you chose when creating your new user

### Basic configuration and software

* Update & Upgrade the Pi software 
* Install vim (or just use plain vi, nano) 
* Install git (for later keeping track and versioning your projects)

```
sudo apt-get update

sudo apt-get upgrade

sudo apt-get install vim

sudo apt-get install git-all
```

### Setting up the Pi as a server

For this step I followed yet another usefull post, full article [here](http://valentinvannay.com/2016/01/21/installation-of-a-web-server-and-laravel-5-on-a-raspberry-pi-2/).
We basically need to install the LAMP stack, which comprises Apache, PHP and MySQL.

* Install Apache 
`sudo apt-get install apache2 -y`

	* Check the it is working typing your ip address in a browser, the default Apache page should appear.
	* Set apache mod rewrite
	`sudo a2enmod rewrite`
 
* Install PHP
`sudo apt-get install php5 libapache2-mod-php5 -y`

	* Check the it is working by creating a file called index.php with some simple php content. Type `"<?php echo “Hello World” ?>" > var/www/html/index.php`
    * Rename or delete the apache index.html file - `sudo rm /var/www/html/index.html` - by default .html files take precedence over .php files. That also could be configured to fit best your your requirements.
    * Again, typing your ip address in a browser should display your newly created page.
    * Install **Curl**: `sudo apt-get install php5-curl`

### Install MySQL

`sudo apt-get install mysql-server php5-mysql -y`

* Adjust the default root editing the Apache config file - **/etc/apache2/sites-available/000-default.conf**

```
    <VirtualHost *:80>
    <Directory “/var/www”>
    AllowOverride All
    </Directory>

    (…)

    ServerAdmin webmaster@localhost
    DocumentRoot /var/www
```
     

### Install PHPmyAdmin

Detailed tutorial [here](https://www.digitalocean.com/community/tutorials/how-to-install-and-secure-phpmyadmin-on-ubuntu-12-04).


### Install Codiad

I've installed codiad to allow me to develop my project directly on the Pi. There's a good set of instructions [here](https://www.digitalocean.com/community/tutorials/how-to-install-and-configure-codiad-a-web-based-ide-on-an-ubuntu-vps) to install it.

### Install Laravel

Laravel uses [Composer](https://getcomposer.org/download/) to manage its dependencies, you can install it from the command line with the following commands:
```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === '55d6ead61b29c7bdee5cccfb50076874187bd9f21f65d8991d46ec5cc90518f447387fb9f76ebae1fbbacf329e583e30') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

* Require the laravel installer via composer
`composer global require "laravel/installer"`

* Create a new laravel project using composer
`composer create-project --prefer-dist laravel/laravel blog`

### Install Neo4j

Although I installed it this particular project will not be using a SQL database, but a Graph database instead.
Read about the installation steps [here](https://neo4j.com/docs/operations-manual/current/installation/linux/debian/).

