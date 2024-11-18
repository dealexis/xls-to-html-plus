### Requirements

1. php8.2^ (terminal `sudo apt install php`)
2. docker
3. [node22^](https://nodejs.org/en/download/package-manager) (better using nvm)
4. composer (terminal `sudo apt install composer`)

### Run in terminal under WSL

Run following sequentially

#### backend

> recommended to make alias for `sail`
> 
> in ~/.bashrc (use `sudo nano ~./bashrc`) add in the end following:
> 
> `alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'`

Generate new .env `cp .env.example .env`

`composer install`

`sail up -d` this will run project locally

`sail artisan migrate`

`sail artisan key:generate`

#### frontend
1. `npm -i -g yarn`
2. `yarn` installs dependencies

The running commands are `sail up -d` for app and `yarn dev` for scripts and styles, so they will be loaded
