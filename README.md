# MSM Development(WordPress)

> This repository only contains `wp-content`, you need to download and configure rest of WordPress files.

### Requirements
* php v7.4
* MySql v5.7+
* apache v2.4 with rewrite module

### Quick setup
* Git clone
```
https://github.com/jayjapneetsingh/msm-multishopsmarket.git
```
* Install [wp-cli](http://wp-cli.org/) (if not installed)
```

chmod +x wp-cli.phar
sudo mv wp-cli.phar /usr/local/bin/wp
wp --info
```
* Download WordPress
```
wp core download --skip-content 
```
* Import database and configure database credentials
```
cp wp-config-sample.php wp-config.php
```
* Create a new virtual host that point to root of this project.
* You might also want to create [.htaccess](https://codex.wordpress.org/htaccess) file on project root
