## Basic setup for your RaspberryPi

https://mattwilcox.net/web-development/setting-up-a-secure-home-web-server-with-raspberry-pi

    Assemble the Pi, plug in a keyboard, mouse and screen. Don’t plug the Ethernet cable just yet, we’ll go through some security steps to help prevent undesirable access to our device.
    Plug it to the power
    On the Noobs menu choose Raspian, the ‘recommended’ installation
    After the installation it will reboot and start the Raspian GUI
    Go to the applications button -> choose preferences -> Raspberry configuration -> Choose ‘Boot to CLI’
    Configure the ‘localization’ options according to your country/preferences
    Set a new password for the default user (pi)
    Enable SSH: Choose ‘advanced configuration’ -> SSH -> Enable
    Disable the automatic login feature as user ‘pi’. We will remove that user for security reasons so we need to have that turned off before
    Since the GUI will not be used generally you can reduce the amount of RAM that is reserved for it. In ‘advanced configuration’ -> ‘Memory Split’-> 16
    hit OK and accept restarting as suggested, the next time it boots it will not load straight into the command line.
    Wait for it to boot and once back at the command line login with the default credentials, it will prompt you for the username -> type in ‘pi’ and then the password -> type in the one you chose before.

Now from the command line:

    List the current groups by typing groups on the terminal -> a list will be displayed: group1 group2 group3
    Create a new user, adding it to all the groups: sudo useradd –m –G group1,group2,group3,… USERNAME
    Set a password for the new user: sudo passwd USERNAME
    Shutdown the Pi: sudo shutdown -h now
    The Pi will turn itself off, you can now plug in the Ethernet cable, unplug the power and plug it back in so it starts up
    Wait for it to boot and once again login with your new credentials
    Delete the default user (pi): sudo deluser —remove–all–files pi

Accessing remotely

    Find your IP address (eg. whatismyip)
    Configure your router port fowarding to send incoming requests to your Pi. I have changed my Pi hostname to ‘bitlabpi’ and configured the router to redirect the requests to that, rather than a fixed IP. You can also choose to assign a static IP to your Pi.
    Optionally you can configure a Dynamic DNS (eg. NoIP), that makes it easier to remember, in my case it’s bitlabpi.ddns.net
    From another computer, using a terminal type: ssh USERNAME@yourIPaddress . I’m using Cygwin but PuTTY is a great option
    Type in the password you chose when creating your new user

The basics

    Update & Upgrade the Pi software (type in ‘Y’ when prompted, install vim (or just use plain vi, nano) and git (for later keeping track and versioning your projects)

sudo apt-get update

sudo apt-get upgrade

sudo apt-get install vim

sudo apt-get install git-all

Install the LAMP stack
Install Apache

sudo apt-get install apache2 -y

Check the it is working going to http://bitlabpi.ddns.net ,the default Apache page should appear.

sudo a2enmod rewrite (http://valentinvannay.com/2016/01/21/installation-of-a-web-server-and-laravel-5-on-a-raspberry-pi-2/)

 
Install PHP

sudo apt-get install php5 libapache2-mod-php5 -y

    Now create a file called index.php with some simple content (eg. <?php echo “Hello World” ?>) : vim /var/www/html/index.php -> add the contents -> close with :wq
    Rename or delete the apache index.html file

sudo mv /var/www/html/index.html /var/www/html/apache.html 
or 
sudo rm /var/www/html/index.html

    Check the it is working going to http://bitlabpi.ddns.net , your newly created page should appear.

Install MySQL

sudo apt-get install mysql-server php5-mysql -y

Adjust the default root editing /etc/apache2/sites-available/000-default.conf

    <VirtualHost *:80>
    <Directory “/var/www”>
    AllowOverride All
    </Directory>

    (…)

    ServerAdmin webmaster@localhost
    DocumentRoot /var/www

     

Install PHPmyAdmin

https://www.digitalocean.com/community/tutorials/how-to-install-and-secure-phpmyadmin-on-ubuntu-12-04
Install Codiad

https://www.digitalocean.com/community/tutorials/how-to-install-and-configure-codiad-a-web-based-ide-on-an-ubuntu-vps
Install Laravel

Install Neo4j

https://neo4j.com/docs/operations-manual/current/installation/linux/debian/
