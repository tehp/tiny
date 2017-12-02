# Tiny House Marketplace
A project for the BC Tiny House Collective

## Development
There are a number of development resources contained in this document. See the NPM Scripts section for a quick start at testing.

### NPM Scripts
test: `npm run test`<br>
build: `npm run build`<br>
dev: `npm run dev`<br>

### Color Palette
Very Dark Grey: `#1F1913`<br>
Bright Warm Yellow: `#FFD800`<br>
True White: `#FFFFFF`<br>
Really Bright Light Blue: `#68C5F8`<br>
Sad Dark Green: `#16313A`<br>

## Instalation
This section contains a guide on installing the Tiny House Marketplace application. 

### Dependencies
* A linux server with root SSH access
* LAMP stack

#### Installing Dependencies
This section lists the commands to run on your server to install the dependencies for the app.

##### Find your servers IP address
Before we start, we need to find the IP address of our server.

```
$ ifconfig
```

Take note of your server's IP address, as we will use it in a later step.

##### Install Apache:

```
$ sudo yum install apache2
```

You will have to enter your root password each time you run a sudo command. Do this each time you are prompted. We will not explain this for each subsequent command.


##### Set ServerName
Open `/etc/apache2/apache2.conf` using your text editor of choice. We like vim.

```
$ sudo vi /etc/apache2/apache2.conf
```

Navigate to the bottom of the file `Shift + G`, and then change this line:

```
ServerName [ip]
``` 

Replace `[ip]` with the IP address of the server.

##### Restart Apache to save changes
```
$ sudo systemctl restart apache2
```

##### Allow incoming traffic to Apache
We need to allow browsers to access Apache on the server.

```
$ sudo ufw allow in "Apache Full"
```

##### Install MySQL
```
$ sudo yum install mysql-server
```

##### Configure MySQL Password
Set the password using the pre made MySQL security script.

```
$ mysql_secure_installation
```

Enter your desired password and answer the each prompt with `y` or `n` to accept or decline respectivelly. 

##### Install PHP
```
$ sudo yum install php libapache2-mod-php php-mcrypt php-mysql
```

##### Modify the file order that Apache servers
Open `/etc/apache2/mods-enabled/dir.conf`. Like earlier, we will use vim. You can use any text editor that you are comfortable with.

```
$ sudo vi /etc/apache2/mods-enabled/dir.conf
```

You will see this:

```
<IfModule mod_dir.c>
    DirectoryIndex index.html index.cgi index.pl index.php index.xhtml index.htm
</IfModule>
```

Adjust the file to this:

```
<IfModule mod_dir.c>
    DirectoryIndex index.php index.html index.cgi index.pl index.xhtml index.htm
</IfModule>
```

Save and close.

##### Restart Apache to save changes
```
$ sudo systemctl restart apache2
```

##### Install phpMyAdmin
```
$ sudo yum install phpmyadmin apache2-utils
```
**INSTRUCTIONS**: During the installation, make sure you choose YES when you are prompted asking if you wish to configure the database for phpMyAdmin.

##### Add phpMyAdmin to Apache startup
Edit the following file: `/etc/apache2/apache2.conf`.

```
$ sudo vi /etc/apache2/apache2.conf
```

Add the following line:

```
Include /etc/phpmyadmin/apache.conf
```

Save and exit. 

##### Restart Apache to save changes
```
$ sudo systemctl restart apache2
```

##### Cloning the repository
Navigate to the directory where we will clone the repo:

```
$ cd /var/www
```

Rename the existing `html` folder:

```
$ mv html html_old
```

Clone the repository:

```
$ sudo git clone https://github.com/tehp/tiny.git
```

*Note: make sure you are signed in on git to clone the private repository.*

Rename the repository:

```
$ mv tiny html
```

##### Setting up the database

Log in to phpMyAdmin with the password that you setup earlier. Navigate to `http://[ip]/phpMyAdmin`.

On the left column of the page you should see a `New` option. Click this to start creating a database. 

Name the database `tiny`. It is important that you name it this, because this is the DB name that `init.php` looks for. If you wish to name is something different for some reason, you need to change `init.php` accordingly. 

Set the database type to `Collation`, and press `Create`. 

Once created, we can begin running SQL commands to setup the DB.

##### Running SQL Commands

Within phpMyAdmin, open the `SQL` tab of your database. 

You should see: `Run SQL query/queries on database tiny`. In the textbox below, paste the contents of `/db/db_current.sql`. 