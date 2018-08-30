# Meta Tags for Laravel

This library helps you manage meta tags (including Open Graph) for your Laravel website or web application.

Essentially it's an integration with the (framework-agnostic) Meta Tags package. The [documentation](https://lukaswhite.github.io/meta-tags) is a good place to start.

## Simple Example

```php
class Controller extends BaseController
{
    use ManagesMetaTags;
}

class PagesController extends Controller {

	public function show( Page $page )
	{
		$this->metaTags( )
			->title( $page->title )
			->description( $page->description )
			->url( $page->url )
			->canonical( $page->url );
			
		return view( 'pages.show', compact( 'page' );
	}

}
```

Then, in your layout:

```
<html>
	<head>
		@metaTags
	</head
```	

## Installation

```
composer require/laravel-meta-tags	
```

Laravel will discover the package automatically.

## The Basics

The package creates an instance of `MetaTags` as a singleton, and puts it in the service container.

For convenience, the `ManagesMetaTag` returns it when you call `metaTags( )`, though it's entirely optional.

The `@metaTags` Blade directive outputs the tags, though that too is optional; you can simply pass it to your layout and call the `render( )` method.

## Laravel-specific Features

The library extends the main `MetaTags` class, providing a few Laravel-specific methods.

### Default Tags

The library allows you to inject certain meta tags based on Laravel configuration variables.

#### The Site Name

In Laravel you can name an application, which is configured in `config/app.php`.

By default the package will set the Open Graph site name meta tag, using that value.

> If you wish, you can disable this feature. First, publish the configuration and then modify the appropriate setting.

#### The Locale

There's an Open Graph tag that specifies the locale, so you have the option to set that automatically based on the value in `config/app.php`.

#### CSRF Token

The [Laravel documentation](https://laravel.com/docs/5.6/csrf#csrf-x-csrf-token) suggests adding the following to your layout:

```
<meta name="csrf-token" content="{{ csrf_token() }}">
```

With this package, however, this is done automatically for you.

> You can disable this if you wish. Simply publish the configuration file and disable it there.

### Pagination

The meta tags package allows you to add pagination-related links; think `rel="prev"` and `rel="next"`.

This Laravel integration allows you to pass a paginator (specifically, an implementation of `Illuminate\Contracts\Pagination\Paginator`) to the `paginator( )` method.

Here's a simple example:

```php
class ArticlesController extends Controller {
	
	public function index( )
	{
		$articles = Article::paginate( 20 );
		
		$this->metaTags( )
			->title( 'Articles' )
			->paginator( $articles );
			
		return view( 'articles.index', compact( 'articles' );	
	}
	
}
```

### Named Routes for Canonical URLs

One of the advantages of using named routes is consistency; given the same set of parameters, the same URL will always be returned. As such, you can use a named route to set the canonical URL.

Here's a simple example:

```php
$this->metaTags( )
	->canonicalRoute( 'articles', compact( 'page' ) );
```

### Eloquent

#### Images

If you want to store images as Eloquent models and then use them to add images to the meta tags using the Open Graph, then the package includes an `Image` class which implements the necessary interface. You'll probably want to `extend` it so that you can customize it, set the mass-assignment rules and so-on.

By default the class simply pulls out the necessary attributes; feel free to override this.

### Videos

Likewise, if you want to associate videos that are implemented as Eloquent models with pages, you can utilize the `Video` class.

### Videos

To associate Eloquent-based models with pages via the corresponding Open Graph tags, you can utilize the `Video` class.

### Contact Data

If you have an entity that includes contact data, the package provides a trait you can apply to your models. You can then create the appropriate Open Graph meta tags simply by passing an instance to the `contactData( )` method.

For example, suppose you're building a business directory, and have a `Business` model that includes a physical address, e-mail address, telephone number and so on.

Simply do this:

```php
class Business extends Model
{
	use ContactData;

	// Your model code here
}
```

Then, in your controller for example:

```php
class BusinessController {

	public function show( Business $business )
	{
		app( )->make( MetaTags::class )
			->isBusiness( )
			->title( $business->name )
			->description( $business->description )
			->contactData( $business );
			
		// The rest of the method	
	}

}
```

#### Geopoints

If you have an entity, modelled using Eloquent that includes a geopoint; i.e. a geographical location, or more specifically a latitude and longitude and optional altitude; you can utilize the `Geopoint` trait.

Let's modify the previous example, since a business that has a physical address will probably also have a latitude and longitude:


```php
class Business extends Model
{
	use ContactData, Geopoint;

	// Your model code here
}
```

Then, in your controller for example:

```php
class BusinessController {

	public function show( Business $business )
	{
		app( )->make( MetaTags::class )
			->isBusiness( )
			->title( $business->name )
			->description( $business->description )
			->contactData( $business )
			->addGeopoint( $business );
			
		// The rest of the method	
	}

}
```

