# Laravel Nova: Inline Boolean

## Prerequisites
 - [Laravel](https://laravel.com/)
 - [Laravel Nova](https://nova.laravel.com/)

## Installation

## Usage

```php
use DarioBinalogue\InlineBoolean\InlineBoolean;

class MyResource extends Resource
{
    public function fields(Request $request)
    {
        return [
            InlineBoolean::make('Enabled')
                ->inlineOnIndex()  // Use inline field on the index page
        ];
    }
}
```