# OPTION

#### Stop using null!

Usage:

```php
// In a service where the repository can return either an object or a null

// This returns a Some if an object comes back, or None if a null comes back
$x = Option\Option::_($this->repository->getUserById($id));

// Now, rather than checking for null or using the object and
// getting null reference errors, we can use the built-in functions
if ($x->isEmpty()) {
    // No user exists
}

// Maybe we want to get the user, but call a function if it's not set
$user = $x->getOrCall(function () { return somethingElse(); });
```

With this functionality, there's no reason to use nulls.

If we try and `get()` a `None` type, we get a proper Exception which can
be resolved far more easily than a Null Reference Exception.