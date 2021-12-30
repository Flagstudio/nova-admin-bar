# Installation

Require this package with composer using the following command:

`composer require flagstudio/nova-admin-bar`

# Configuration

The defaults configuration settings are set in config/adminbar.php. You can publish the config using this command:

`php artisan vendor:publish --tag=NovaAdminBarConfig --force`

Publish assets:

`php artisan vendor:publish --tag=NovaAdminBarAssets --force`

The defaults

# Usage

To output admin bar use this code in your view:

`{!! AdminBar::generate() !!}`

To set model for generate edit and view links use this code before generate admin bar:

`{{ AdminBar::setModel($post) }}`

You can specify resource name for model if it named differently

`{{ AdminBar::setResource('PostResource') }}`

You can also use set resource without setting model to generate link to resource index page.

The settings for the environment parameters in the admin bar are taken from the git by default, but if this is not possible, then they can be obtained from .env.
