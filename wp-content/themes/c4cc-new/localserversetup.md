# Current WP Site to XAMPP/MAMP Local Migration Process:  
- host is Electric Embers, files in FreeBSD 10.3-RELEASE-p18 server     
- commands to migrate files:  

  ```bash
  mysqldump -h db.electricembers.net -u changeaction databasename > dumpfilename.sql  
  tar -cvf archive_name.tar directory_to_compress  
  
  # then go to local computer and use scp to transfer file:  
  scp nameofssh:~/path/to/file destination/in/your/local  
  
  # I configured the ssh shortcut in .ssh/config file as ee-main with specific port number
  scp ee-main:/home/changeaction/public_html/nameofexportablefilehere /Users/akh/Desktop  
  
  ``` 

- update wp-config.php: 
    - for XAMPP: db is root, leave pw field blank  
    - for MAMP: db is also root, pw is root  
  
 - Steps to Update URLs:  
    	1. set php.ini and increase the upload size so localhost phpmyadmin can import large sql file  
    	2. wp-config.php needs to be set up for localhost by setting DB_NAME to the one you created, DB_ROOT to 'root', and leave DB_PASSWORD blank. 
      3. Update all urls on both the dashboard and mysql to localhost/s folder:  
        - Better Search Replace plugin
        - in phpmyadmin, change wp_options --> site url to http://localhost/nameoflocalwpsite  
    
    Also, add these two lines:  
    ```php
    define('WP_HOME', 'http://localhost/nameoflocalwpsite')
    define('WP_SITEURL', 'http://locahost/nameoflocalwpsite')
    ```

## Resources  

1. [The Ultimate WP Development Environment](https://premium.wpmudev.org/blog/ultimate-wordpress-development-environment/)

2. [General WP XAMPP Set Up](https://premium.wpmudev.org/blog/setting-up-xampp/)

3. [Good reminder of sql overwrite for wp_options -> siteurl option](https://managewp.com/how-to-create-a-local-copy-of-a-live-wordpress-site)

4. [Using Gulp for WP](https://premium.wpmudev.org/blog/gulp-for-wordpress/)

5. [Localhost to public url with ngrok](https://ngrok.com/)   

6. [MAMP WP Install](https://skillcrush.com/2015/04/14/install-wordpress-mac/)

