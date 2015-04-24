# CSV Module

* Date:    August 13, 2014
* Author:  Jaime A. Rodriguez <hi.i.am.jaime@gmail.com>
* Version: 1.8
* License: http://opensource.org/licenses/MIT

Creates a Comma Separated Value file.

## Usage

### Create a new CSV

~~~ php
    $c = new \Module\CSV\Document();
    $c->add(array(
        'George',
        'Washington'
    ));
    $c->save('presidents.csv');
~~~

### Add to an existing CSV

~~~ php
    $c = new \Module\CSV\Document('presidents.csv');
    $c->add(array(
        'Abraham',
        'Lincoln'
    ));
    $c->save();
~~~

### Search a CSV

~~~ php
    $c = new \Module\CSV\Document('presidents.csv');
    $results = $c->search("Abraham");
    foreach ($results as $r) { // This is an array of arrays, each is a row
        print_r($r); // This will be an array of data, each is a column
    }
~~~
