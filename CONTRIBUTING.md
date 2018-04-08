# Contributing  
  
Before you contribute code, please make sure it conforms to the PSR-2 coding standard and that the unit tests still pass. The easiest way to contribute is to work on your own fork.

If you do this, you can run the following commands to check if everything is ready to submit.

## Dependencies

In order to load the dependencies, you should run composer:

```bash
composer install
```

## PSR-2 Specs

This package follows the PSR-2 coding standard.

- [PSR-2: Coding Style Guide]
- [OPNsense PSR-2 Coding Style Guide]

To test if your contribution passes the standard, you can use the command:

```bash
./vendor/bin/phpcs --standard=phpcs.xml
```

Which should give you no output, indicating that there are no coding standard errors.

## Unit testing

You can write your own tests and add them to the `tests` directory.

To run the test command:

```bash
./vendor/bin/phpunit --configuration phpunit.xml --coverage-text
```

Which should give you no failures or errors.

A coverage and logs will be created in the `build` directory.

In order to give support to older versions, you should test it also with the lowest composer packages:

```bash
composer update --prefer-stable --prefer-lowest
```

## Branching and pull requests

As a guideline, please follow this process:

 1. [Fork the repository].
 2. Create a topic branch for the change:
    - New features should branch from **develop**.
    - Bug fixes to existing versions should branch from **master**.
    - Please ensure the branch is clearly labelled as a feature or fix.
 3. Make the relevant changes.
 4. [Squash] commits if necessary.
 4. Submit a pull request to the **develop** branch.

Please note this is a general guideline only. For more information on the
branching structure please see the [git-flow cheatsheet].

<!-- References -->

[PSR-2: Coding Style Guide]: http://www.php-fig.org/psr/psr-2/
[OPNsense PSR-2 Coding Style Guide]: https://docs.opnsense.org/development/guidelines/psr2.html
[Fork the repository]: https://help.github.com/articles/fork-a-repo
[git-flow cheatsheet]: http://danielkummer.github.com/git-flow-cheatsheet/
[Squash]: http://git-scm.com/book/en/Git-Tools-Rewriting-History#Changing-Multiple-Commit-Messages