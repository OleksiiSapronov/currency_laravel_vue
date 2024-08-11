<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Welcome to AZconvert.com

AZconvert.com is a currency conversion website designed for countries.

## Getting Started
1. Setup environments.

    ``` bash
    # Install Git on Ubuntu
    sudo apt update
    sudo apt install git

    # How to Install NVM and yarn on Ubuntu 22.04
    sudo apt install curl
    curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.1/install.sh | bash
    nvm install --lts
    npm install -g yarn

    # How to Install Sqlite
    sudo apt install sqlite3

    # How to Install PPH8.3
    # Save existing php package list to packages.txt file
    sudo dpkg -l | grep php | tee packages.txt

    # Add Ondrej's repo source and signing key along with dependencies
    sudo apt install apt-transport-https
    sudo curl -sSLo /usr/share/keyrings/deb.sury.org-php.gpg https://packages.sury.org/php/apt.gpg
    sudo sh -c 'echo "deb [signed-by=/usr/share/keyrings/deb.sury.org-php.gpg] https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list'
    sudo apt update

    # Install new PHP 8.3 packages
    sudo apt install php8.3 php8.3-cli php8.3-{bz2,curl,mbstring,intl,xml,sqlite3,mysql}

    # Install FPM OR Apache module
    sudo apt install php8.3-fpm

    # Install composer
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
    php composer-setup.php
    php -r "unlink('composer-setup.php');"

    sudo mv composer.phar /usr/local/bin/composer
    ```

2. Clone this [repository](https://github.com/OleksiiSapronov/courrency_laravel_vue) to the server.

3. Install laravel dependencies for this project.

    ``` bash
    $ composer install
    ```

4. Install Node modules for the frontend.

    ``` bash
    $ yarn install
    ```
5. Start project.

    ``` bash
    # Prepare project's environemt.
    php artisan key:generate
    php artisan migrate
    php artisan db:seed --class CountrySeeder

    yarn build
    php artisan serve --host 0.0.0.0
    ```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
