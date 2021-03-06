# Contributing

Contributions are **welcome** and will be fully **credited**.

We accept contributions via Pull Requests on [Github](https://github.com/sebastiaanluca/laravel-blog).


## Pull Requests

- **[PSR-2 Coding Standard](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md)** - Check the code style with ``$ composer check-style`` and fix it with ``$ composer fix-style``.

- **Add tests!** - Your patch won't be accepted if it doesn't have tests.

- **Document any change in behaviour** - Make sure the `README.md` and any other relevant documentation are kept up-to-date.

- **Consider our release cycle** - We try to follow [SemVer v2.0.0](http://semver.org/). Randomly breaking public APIs is not an option.

- **Create feature branches** - Don't ask us to pull from your master branch.

- **One pull request per feature** - If you want to do more than one thing, send multiple pull requests.

- **Send coherent history** - Make sure each individual commit in your pull request is meaningful. If you had to make multiple intermediate commits while developing, please [squash them](http://www.git-scm.com/book/en/v2/Git-Tools-Rewriting-History#Changing-Multiple-Commit-Messages) before submitting.


## Development

Note: execute all commands in the root of the package.

### Autoload

`composer install` in the package directory + add to `bootstrap/autoload.php`:

```
// Autoload our package's vendors
require __DIR__.'/../packages/sebastiaanluca/blog/vendor/autoload.php';
```

Create a .env file with `SERVE_PROXY_TARGET` in it.

```
yarn install
yarn run build
```

### Symlink dev build directory

Symlink local dev build dir to `public/vendor/blog`.

### Build assets

`yarn run build`

### Auto-reloading server

`yarn run serve`

## Running Tests

``` bash
$ composer test
```


**Happy coding**!
