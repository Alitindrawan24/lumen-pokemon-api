# Lumen Pokemon API
## Disclaimer
Json dataset from [pokemon.json](https://github.com/fanzeyi/pokemon.json) repository.

## Features
- Pokedex (1 - 890)
- Type and Type Weakness
- Items
- Moves

## Installation
Clone this project
```sh
git clone https://github.com/Alitindrawan24/lumen-pokemon-api.git
```

Install dependencies 
```sh
composer install
```

Copy env.example to .env, then add key and database to .env
```sh
cp env.example .env
```


Run mirgration and Seed
```sh
php artisan migrate --seed
```