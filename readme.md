# The bilyiv/restful package
This package under active developing. Please don't use in production.

## Documentation

#### Filter, sort and embed parameters
Now, you can easily apply query filter, sort and embed parameters to  your Eloquent  model:

```php
$posts = Post::filter($request->input('filter', []))->get();
```

```php
$posts = Post::sort($request->input('sort', []))->get();
```

```php
$posts = Post::embed($request->input('embed', []))->get();
```

Also, you can shortly paginate their
 
```php
$paginator = Post::paginateWithParams($request->all());
```

instead of

```php
$paginator = Post::filter($request->input('filter', []))
    ->sort($request->input('sort', []))
    ->embed($request->input('embed', []))
    ->simplePagination($request->input('limit', 100))
    ->appends($request->all());
```

#### Response
You can easily return success response or throw error exception.

```php
    return $this->response->data($data)->send();
```

```php
    return $this->response->data($data)->created($location);
```

```php
    return $this->response->noContent();
```

```php
    return $this->response->paginated($paginator);
```

```php
    return $this->response->errorNoFound();
```