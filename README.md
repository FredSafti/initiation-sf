Initiation Symfony
==================

Pré-requis
----------

- PHP 7.4+ (ou 7.2+ en passant les types des propriétés en phpdoc)
- Composer : https://getcomposer.org/download/
- Exe symfony : https://symfony.com/download

Initialisation
--------------

Voici la commande utilisée pour créer l'application :

```bash
symfony new initiation
cd initiation
```

Et les composants supplémentaires à installer :

```bash
composer req --dev maker profiler test
composer req translation twig
```

Runtime !
---------

En mode web

```bash
symfony serve
```

En mode ligne de commande

```bash
php bin/console app:test
```

En mode test

```bash
./bin/phpunit
```

Diapos
------

Cf "Initiation_Symfony.pptx"
