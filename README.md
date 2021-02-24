## Guide d'installation
* Pour installer et configurer le site, fais ceci dans le terminal :
```
    git clone git@gitlab.com:Yasmine091/le-carnet-des-artistes.git
    cd le-carnet-des-artistes/
    composer install
    npm install
    cp .env.example .env
```
* Configure le fichier .env
* Fais l'installation des frameworks
* Puis reviens au terminal et fais ceci :
```
    composer require laravel/ui
    php artisan ui vue --auth
    composer require encore/laravel-admin
    php artisan vendor:publish --provider="Encore\Admin\AdminServiceProvider"
    php artisan admin:install
    npx mix
    php artisan serve
```

## Frameworks
* Laravel
* BootStrap 
* FontAwesome Icons

## Version en ligne
* Espace membres : http://le-carnet-des-artistes.herokuapp.com/
* Espace président : http://le-carnet-des-artistes.herokuapp.com/admin
```
Comptes ~ Espace membres :
Membre autorisé -> j.doe@gmail.com : JohnDoe16
Membre non autorisé -> c.dubosq@outlook.com : Charles25

Comptes ~ Espace président :
Président -> Deedee : Deedee34

```

## Ressources du projet
* Trello : https://trello.com/c/C2rVgdPp/
* MCD: https://lucid.app/lucidchart/cc4660d2-9ad9-406a-a1fa-d00d8ff0680e/view
* Diagramme de séquence : https://lucid.app/lucidchart/103d2d5e-e90c-4762-950d-c733f9ba3b61/view
* Use case : https://lucid.app/lucidchart/0b43b8b6-2fb1-482a-8776-21985a38ba76/view