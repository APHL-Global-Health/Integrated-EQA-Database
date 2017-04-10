# README #

Welcome to the Open Source repository of the e-Proficiency Testing (ePT) software

## How do I get set up? ##
### *NIX Systems

1. [Download]((https://framework.zend.com/downloads/archives)) and install and set up/configure Zend Framework 1.12
   ```
   wget https://packages.zendframework.com/releases/ZendFramework-1.12.20/ZendFramework-1.12.20.tar.gz
   
   tar xzf ZendFramework-1.12.20.tar.gz
   
   ```
   * Edit your `php.ini` file to include your ZF1 libraries (Apache2 example below. Change analogous file for other web servers)
   ```
   vi /etc/php5/apache2/php.ini
   ```
      Look for the line `;include_path = ".:/usr/share/php"` and edit it as follows:
      ```
      include_path = ".:/path/to/ZendFramework-1.12.20/library/"
      ```
   * Edit your `bash.rc` file to add the `zf` as an alias for `[ZEND_HOME]/bin/zf.sh`
   ```
   vi /etc/bash.bashrc
   ```
      Append the following line:
      ```
      alias zf="/path/to/ZendFramework-1.12.20/bin/zf.sh"
      ```
      Save and run the `source` command to activate the alias
      ```
      source /etc/bash.bashrc
      ```
1. Clone this git repository and put it into your server's root folder (www or htdocs). 
1. Create a database and [import and execute the appropriate SQL file from the `databases` folder](https://github.com/APHLK/ePT-Repository/tree/master/database)
1. Modify the config file (application/configs/application.ini) and update the database parameters
1. Create a virtual host pointing to the public folder of the source code

### Windows
... coming soon ...

## Next Steps ##

1. Once you have the software set up, you can visit the admin panel http://ept/admin and log in with the credentials eptmanager@eqapt.com and 123
1. Now you can start adding Participants, Participant logins, PT Surveys, Shipments etc.
