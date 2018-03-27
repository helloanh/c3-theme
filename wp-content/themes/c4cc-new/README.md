# Installing the project
For run this theme in dev machine, we need to setup a few tools.
NB: For any command running on terminal, we need to be on the theme root

# Installing the Packages managers
1) NPM: is the package manager for JavaScript
- Download and install the nodejs from `https://nodejs.org/en/download/`
- After that, install the packages by runing this command on the terminal
`npm install`
2) Bower: is a script manager, can download and manage (jquery, bootstrap, font-awesome..)
- It will be install in the previous command.
run `bower install`
3) run `gulp` to produce the css and js files
4) Composer: is the package manager for PHP (Install only once!)
- Download and install the composer from `https://getcomposer.org/download/`
- After that, run this command to download and dump the autoloader
`composer install`

# Continous Integration Set Up
Github + CodeShip CI --> WPEngine Set Up with SFTP  

- follow the codeship-deployment-script.sh file  
- follow Codeship CI with SSH  here: `https://documentation.codeship.com/basic/continuous-deployment/deployment-with-ftp-sftp-scp/#authenticating-via-ssh-public-keys`

```bash


```