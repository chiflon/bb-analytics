# BB PHP Exercise
A small webapp that show the Top N user agents that a campaign receives in a certain day.

## Contents

- [Requirements](#requirements)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)   
- [License](#license)
- [Contribution guidelines](#contribution-guidelines)
- [Additional information](#additional-information)

## Requirements
- PHP >= 5.4.0
- PDO PHP Extension
- [Composer](https://getcomposer.org/)
- [Bower](https://bower.io/)

## Installation
To install this project you only have to clone, install font & end dependencies by composer and bower.

```bash
	git clone https://chiflon@bitbucket.org/chiflon/basebone.test.git
	composer install
	bower install
```
DocumentRoot must point to `/public`
	
## Configuration
You can set the following config values in the `app/config.php`:

- Debug mode. 
- Template name.
- DB access.

```php
	define('APP_DEBUG', true);
	
	define('VIEW_TEMPLATE', 'default');
	
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'db_name');
	define('DB_USER', 'user');
	define('DB_PASS', 'password');
```

## Usage
In the first visit it shows the instalation page for create the DB and demo data.
Then you can view the main page with a form. To get the Top user agent list you only have to push in `Generate TOP`.



## License

BB Analytics is free software distributed under the terms of the MIT license.

## Contribution guidelines
If you want to contribute, you must to follow these pattern design and paradigms:

- POO
- MVC Pattern Design
- Autoload PSR-4


## Additional information
###Elephpant approves this project! :D
![Elephpant approves this project]
(http://i67.tinypic.com/2jcc0h4.jpg)