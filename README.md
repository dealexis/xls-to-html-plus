### Requirements

1. php8.2^
2. docker
3. node22^ (better using nvm)

### Run in terminal under WSL

Run following sequentially

#### backend

Generate new .env `cp .env.example .env`

`composer install`

`sail artisan migrate`

`sail up -d` this will run project locally

#### frontend
1. `npm -i -g yarn`
2. `yarn` installs dependencies

The running commands are `sail up -d` for app and `yarn dev` for scripts and styles, so they will be loaded
