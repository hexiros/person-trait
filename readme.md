# Laravel PersonTrait Package
This package provides a PersonTrait that can be used in Laravel models to add common personal information fields. The fields include: firstName, middleName, lastName, birthDate, birthPlace, gender, nationality, religion, suffix, salutation, and title.

### Installation
You can install this package using Composer. Run the following command in your Laravel application directory:

``` composer require your-vendor-name/person-trait ```

Next, add the service provider to the providers array in your Laravel application's config/app.php file:
```
'providers' => [
    // Other service providers...
    Hexiros\PersonTrait\Providers\PersonServiceProvider::class,
],
```
Finally, run the migrations to add the Person fields to your users table:

``` php artisan migrate ```


### Usage
To use the PersonTrait, simply add it to any Laravel model that should have personal information fields:

```
use YourVendorName\PersonTrait\PersonTrait;

class User extends Authenticatable
{
    use PersonTrait;
    
    // Your model code...
}
```
You can then access the Person fields on instances of the model:

```
$user = User::find(1);
$user->firstName = 'John';
$user->lastName = 'Doe';
$user->save();
```
