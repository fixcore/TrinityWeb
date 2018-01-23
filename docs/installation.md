# INSTALLATION

## TABLE OF CONTENTS
- [Before you begin](#before-you-begin)
- [Manual installation](#manual-installation)
    - [Requirements](#requirements)
    - [Setup application](#setup-application)
    - [Configure your web server](#configure-your-web-server)
- [Single domain installtion](#single-domain-installation)
- [Demo users](#demo-users)
- [Important-notes](#important-notes)

## Before you begin
1. If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

2. Install NPM or Yarn to build frontend scripts
- [NPM] (https://docs.npmjs.com/getting-started/installing-node)
- Yarn (https://yarnpkg.com/en/docs/install)

### Get source code
#### Download sources
https://github.com/trntv/yii2-starter-kit/archive/master.zip

#### Or clone repository manually
```
git clone https://github.com/Qblolz/TrinityWeb.git
```
#### Install composer dependencies
```
composer install
```

### Get source code via Composer
You can install this application template with `composer` using the following command:

```
composer create-project --prefer-dist --stability=dev Qblolz/TrinityWeb
```

## Manual installation

### REQUIREMENTS
The minimum requirement by this application template that your Web server supports PHP 5.6.0.
Required PHP extensions:
- intl
- gd
- mcrypt
- com_dotnet (for Windows)

### Setup application
1. Copy `.env.dist` to `.env` in the project root.
2. Adjust settings in `.env` file
	- Set debug mode and your current environment
	```
	YII_DEBUG   = true
	YII_ENV     = dev
	```
	- Set DB configuration
	```
	DB_DSN           = mysql:host=127.0.0.1;port=3306;dbname=db
	DB_USERNAME      = user
	DB_PASSWORD      = password
	```

	- Set application canonical urls
	```
	FRONTEND_HOST_INFO    = http://localhost.dev
	BACKEND_HOST_INFO     = http://backend.localhost.dev
	STORAGE_HOST_INFP     = http://storage.localhost.dev
	```

3. Run in command line
```
php console/yii app/setup
npm install
npm run build
```
- Adjust settings in `common/config/base_characters.php` file

### Configure your web server
- Copy `docker/vhost.conf` to your nginx config directory
- Change it to fit your environment

## Demo data
### Demo Users
```
Login: webmaster
Password: -----

Login: moderator
Password: ----

Login: user
Password: user
```

## Single domain installation
1. Setup application
Adjust settings in `.env` file

```
FRONTEND_BASE_URL   = /
BACKEND_BASE_URL    = /backend/web
STORAGE_BASE_URL    = /storage/web
```

2. Adjust settings in `backend/config/web.php` file
```
    ...
    'components'=>[
        ...
        'request' => [
            'baseUrl' => '/admin',
        ...
```
3. Adjust settings in `frontend/config/web.php` file
```
    ...
    'components'=>[
        ...
        'request' => [
            'baseUrl' => '',
        ...
```

## Important notes
- There is a VirtualBox bug related to sendfile that can lead to corrupted files, if not turned-off
Uncomment this in your nginx config if you are using Vagrant:
```sendfile off;```
