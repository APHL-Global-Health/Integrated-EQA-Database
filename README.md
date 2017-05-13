# README #

Welcome to the Open Source repository for the Integrated EQA System software. This system builds on the [ePT application](https://github.com/deforay/ept).

### How do I get set up? ###

* [Install Zend Framework 1.12](http://framework.zend.com/manual/1.12/en/introduction.installation.html)
* Download the [Source Code](https://github.com/APHLK/ePT-Repository/archive/master.zip) or clone this repository to a suitable location on your computer. We'll call this `EQA_HOME`. 
* Create a database (MySQL).
* Run the database creation files (`database.minimal.sql`) and migration files (prefixed with a timestamp) located in the `EQA_HOME/database/` folder
* Modify the config files (`EQA_HOME/application/configs/application.ini` and `EQA_HOME/application/configs/config.ini`) and set the appropriate parameters
* Create a virtual host pointing to the `EQA_HOME/public` folder. Ensure that the web-server has write permissions to the following folders: `EQA_HOME/public/files`, `EQA_HOME/public/uploads`, `EQA_HOME/application/cache`. If need be create the folders.
* 

### Running ###

* Once you have the software set up, you can visit the admin panel http://ept/admin and log in with the credentials `nphleqa@gmail.com` and `password`
* Now you can start adding Participants, Participant logins, PT Surveys, Shipments etc.

### Who do I talk to? ###

* To contribute a feature or fix, create a pull request and we'll happily review it.
* To report a bug or request an enhancement , add an issue to the issue list.
* For general inquiries, submit a ticket on the [NPHL Help Desk](http://nphls.or.ke/helpdesk/) and we'll get back to you.
