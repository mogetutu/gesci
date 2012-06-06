gesci-application-form-automation
=====================================

It provides a full CRUD base to make developing database interactions easier and quicker. It also includes a bunch of other cool stuff, including before and after create callbacks, validation and a some table name guessing.

Synopsis
--------
User creates an account submits form and await updates from organisation. Application date ends in August

Database
--------
Database name: gesci

Unit Tests
----------

MY_Model contains a robust set of unit tests to ensure that the system works as planned.

**Currently, the tests only run on PHP5.4 or 5.3.**

Install [PHPUnit](https://github.com/sebastianbergmann/phpunit). I'm running version 3.6.10.

Then, simply run the `phpunit` command on the test file:

    $ phpunit tests/MY_Model_test.php

Changelog
---------

**Version 1.0.0 - 1.1.0**
* Initial Releases