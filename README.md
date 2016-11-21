# PHP-Insightly
## Getting started
### Composer
`composer require ggdx/php-insightly`


### Example:
```php
$insightly = new Insightly($api_key, $api_version) // $api_version is optional, v2.2 is default
$insightly->getContacts();
```

Documentation will follow but for now, all methods are fully documented in the code.

For $data arrays, please see [Insightly API Docs](https://api.insight.ly/v2.2/) for requirements. For the most part, Insightly is pretty flexible with "required" data but there are certain situations where a minimum dataset is required.

For the Laravel 5 service provider, look [here](https://github.com/ggdx/LaravelInsightly)
