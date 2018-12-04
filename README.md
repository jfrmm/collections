# Collections

This is the API for a tool that helps manage a collection of items. It has been developed using [Laravel](https://laravel.com).

# Table of Contents

-   [Getting started](#getting-started)
    -   [Configure Homestead](#configure-homestead)
    -   [Configure .env](#configure-env)
    -   [Install](#install)
    -   [Migrate and seed](#migrate-and-seed)
-   [Troubleshooting](#troubleshooting)
    -   [App responses are very slow](#app-responses-are-very-slow)
-   [Built with](#built-with)
-   [References](#references)
-   [Licence](#licence)

# Getting started

The following instructions are guidelines for a development environment based on Homestead. Of course these are not mandatory, and you should use whatever setup you find yourself comfortable with

## Configure Homestead

Then, in your Homestead.yaml, name the database as `collections`

```
databases:
    - collections
```

> If you don't have Homestead in your system yet, please follow the steps indicated here in this [section](https://laravel.com/docs/5.7/homestead#first-steps).

## Configure .env

Set your `.env` as the following, in the appropriate lines

```
APP_NAME=Collections
DB_DATABASE=collections
```

## Install

Start with a package dependency check and installation

```
composer install
```

> The installer for Composer can be found [here](https://getcomposer.org/download/).

## Migrate and seed

Then start building the DB with some test data, just run

```
php artisan migrate --seed
```

# Troubleshooting

## App responses are very slow

If you are running Windows and are using Homestead, [enabling NFS support](http://backendtime.com/setup-laravel-homestead-windows/#speeding-up) may help. The instructions below were tested with VirtualBox 5.2.22, Vagrant 2.2.2 and laravel/homestead v7.18.0

Add these lines to your `folders` mapping in `c:\path\to\Homestead\Homestead.yaml`:

```
type: "nfs"
mount_options: ['nolock,vers=3,udp,noatime']
```

Then install this plugin in your box

```
vagrant plugin install vagrant-winnfsd
```

If your box was already up, you should restart and provision it (it will destroy your databases!)

```
vagrant reload --provision
```

# Built with

-   [Laravel](https://laravel.com)

# References

<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

Copyright © 2018, [JFRMM](johnmirra@gmail.com)
