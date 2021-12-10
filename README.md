
## My Reward System

This is reward system where customers place order and get their reward credit points to their purchase. It has a feature with support of multi currency purchase. Its is developed in PHP Laravel Framework 7.2.5.

## Installation

Go to the project folder in command prompt.

Run composer install.

```bash
composer install
```

Change .env.example to .env and set the database configs.

For Windows

```
DB_DATABASE=my_reward_system
DB_USERNAME=root
DB_PASSWORD=
```

For MAC (MAMP)

```
DB_DATABASE=my_reward_system
DB_USERNAME=root
DB_PASSWORD=root
DB_SOCKET=/Applications/MAMP/tmp/mysql/mysql.sock  //path to mysql socket
```

Do migration and seed.

Migrate:
```bash
php artisan module:migrate
```

Seed:
```bash
php artisan module:seed
```

Run:

```bash
php artisan serve
```


Note : Admin Login

```bash
Username : admin@gmail.com
Password : admin@gmail.com
```


## Screenshots

#### Customers Page:
![Test Image 1](https://github.com/angad-gupta/my-reward-system/blob/main/currency.png)

#### Customers Page:
![Test Image 2](https://github.com/angad-gupta/my-reward-system/blob/main/customer.png)

#### Orders Page:
![Test Image 3](https://github.com/angad-gupta/my-reward-system/blob/main/order.png)

#### Rewards Page:
![Test Image 4](https://github.com/angad-gupta/my-reward-system/blob/main/reward.png)
