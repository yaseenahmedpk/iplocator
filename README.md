# IPLocator Laravel Package

## Introduction

Welcome to IPLocator, a powerful Laravel package that provides easy-to-use functionality for retrieving detailed information about IP addresses. With this package, you can effortlessly obtain essential details like location, currency, language, and more for any given IP address.

### Features

- **Accurate IP Information**: IPLocator uses reliable data sources to provide accurate information about the geographical location of an IP address.

- **Currency and Language Details**: Retrieve currency and language information associated with the provided IP address.

- **Simple Integration**: Seamlessly integrate the IPLocator package into your Laravel projects without hassle.

- **Customizable Options**: Customize the package settings to suit your application's requirements.

- **Fast and Efficient**: IPLocator is designed to be efficient, ensuring minimal impact on your application's performance.

- **Regular Updates**: The package is maintained actively, and updates will be provided regularly to keep the data up-to-date.

### Requirements

- Laravel 7.x or higher
- PHP 7.4 or higher

### Installation

You can install the IPLocator package via Composer. Run the following command in your terminal:

```bash
composer require bytes4sale/iplocator
```
## Prerequisites

Before using IPLocator, you need to sign up for an API key from the IP data providers you wish to use. IPLocator currently supports the following IP data providers, each offering different sets of information. So key is required to access their API to fetch IP information

1. IPDATA : You can register and obtain your API key by visiting their website at [https://www.ipdata.co](https://www.ipdata.co).
2. IPSTACK : You can register and obtain your API key by visiting their website at [https://ipstack.com](https://ipstack.com).


## Configuration
Before using the IPLocator package, you need to set your API key and API Source in the .env file of your Laravel project.

1. Open your Laravel project's root directory.
2. Create or modify the `.env` file and add:

```php
//for IPDATA
IP_LOCATOR_SOURCE=IPDATA
IPDATA_KEY=your_ipdata_api_key_here,

//for IPSTACK
IP_LOCATOR_SOURCE=IPSTACK
IPSTACK_KEY=your_ipstack_api_key_here,
```

## Usage

Getting information for an IP address is a breeze with IPLocator. Simply follow these steps:

1. **Initialize IPLocator**: Before using the package, make sure to initialize it. You can do this by adding the `ServiceProvider` to the `config/app.php` file:

   ```php
   // config/app.php
   
   'providers' => [
       // Other providers...
       bytes4sale\iplocator\IPLocatorServiceProvider::class,
   ],

2. **Retrieve IP Information**: Once the package is initialized, you can easily get the details for an IP address:

   ```php
    use bytes4sale\iplocator\Facades\IPLocator;
   
   // Get information for an IP address
    $ipAddress = '203.0.113.0';
    $response  = IPLocator::getIpCompleteDetails($ipAddress);
    if ($response->isSuccessful()) {
        print_r($response->getTodayRequestCount());
         
        } else {
            print_r($response->getErrorResponse();
        }
### Configuration

IPLocator allows you to customize its behavior by publishing its configuration file. To do this, run the following artisan command:

```bash
php artisan vendor:publish --provider="bytes4sale\iplocator\IPLocatorServiceProvider" --tag="iplocator-config"
```

After running the command, you will find the configuration file at config/iplocator.php. You can modify the settings as per your needs.
# Advanced Settings

If you want to save the API keys in the database, you can use the `IpLocatorConfig::setCredentials(["key" => "123"])` function to set the API key. Make sure the array key should be "key".

This allows you to securely store and manage your API keys within your application's database, providing a more flexible and configurable way to use the IpLocator package.
# Available Methods


| Method                              | Description                                                                                         |
| ----------------------------------- | --------------------------------------------------------------------------------------------------- |
| `IPLocator::getStatusCode()`        | Get the status code receiving from the IP Address.                                                  |
| `IPLocator::getContent()`           | Get the complete data about IP Address.                                                             |
| `IPLocator::isSuccessful()`         | Get the status of request either succeed or not.                                                    |
| `IPLocator::getCarrierDetails()`    | Get Mobile Carrier details of an IP Address.                                                        |
| `IPLocator::getErrorResponse()`     | Get complete error details if there is any.                                                         |
| `IPLocator::getLanguages()`         | Get the language details of IP Address location.                                                    |
| `IPLocator::getCurrency()`          | Get the IP Address home currency.                                                                   |
| `IPLocator::getTimeZone()`          | Get the Time Zone of IP Address.                                                                    |
| `IPLocator::getThreat()`            | Get malicious IP addresses details. also track Tor nodes and open proxies                           |
| `IPLocator::getAsn()`               | Get the ASN details about IP Address                                                                |
| `IPLocator::getTodayRequestCount()` | Get the request count per day                                                                       |
| `IPLocator::getContinentDetails()`  | Get the continent details of provided ip                                                            |
| `IPLocator::getCountryDetails()`    | Get the country details of provided ip                                                              |
| `IPLocator::getRegionDetails()`     | Get the region details of provided ip                                                               |
| `IPLocator::getCity()`              | Get the city of provided ip                                                                         |
| `IPLocator::getZip()`               | Get the zip code of provided ip                                                                     |
| `IPLocator::isEu()`                 | Returns true or false depending on whether the country is a recognized member of the European Union |
| `IpLocatorConfig::getLatLong()`     | Get latitude and longitude of provided IP                                                           |
| `IpLocatorConfig::setSource()`      | Set the api source.You can also set in .env file                                                    |
| `IpLocatorConfig::setCredentials()` | Set the api credentials details.You can also set in .env file                                       |


## Contributions and Bug Reports
We welcome contributions from the community to improve bytes4sale IPLocator. If you find a bug or have a suggestion for a new feature, we encourage you to participate and help make this package even better.

### Bug Reports

If you encounter any issues or bugs while using bytes4sale IPLocator, please open an issue in our [GitHub repository](https://github.com/bytes4sale/iplocator). When reporting a bug, please provide as much detail as possible, including:
- A clear and descriptive title for the issue.
- Steps to reproduce the bug.
- Information about your PHP and Laravel versions.
- Any relevant error messages or screenshots.

### Feature Requests

If you have a new feature idea or enhancement in mind, you can also open an issue in the [GitHub repository](https://github.com/bytes4sale/iplocator). Please outline the feature's functionality and the problem it solves or the value it adds to the package.

### Contributing

We appreciate contributions from the community to help us improve the package. If you'd like to contribute code, please follow these steps:

1. Fork the repository and create a new branch from the `master` branch.
2. Implement your changes or additions.
3. Write tests to ensure the new code functions correctly and update existing tests as needed.
4. Make sure all tests pass.
5. Create a pull request (PR) to submit your changes. Clearly describe the changes you've made and any related issues or features.

Our team will review your PR, and if everything looks good, we'll merge it into the `master` branch.

By contributing to bytes4sale IPLocator, you agree to make your contributions available under this package.

We appreciate the efforts of our contributors, and your help will make the package better for everyone. Thank you!

## License
The MIT License (MIT). Please see [License File](https://github.com/yaseenahmedpk/iplocator/blob/master/LICENSE.md) for more information.

## Acknowledgments

If you find this package helpful, consider giving credit to the authors and contributors.

