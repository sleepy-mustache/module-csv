# CSV Module

Creates a Comma Separated Value file.

## Usage

### Create a new CSV

    $c = new \Module\CSV\Document();
    $c->add(array(
        'George',
        'Washington'
    ));
    $c->save('presidents.csv');

### Add to an existing CSV

    $c = new \Module\CSV\Document('presidents.csv');
    $c->add(array(
        'Abraham',
        'Lincoln'
    ));
    $c->save();

### Search a CSV

    $c = new \Module\CSV\Document('presidents.csv');
    $results = $c->search("Abraham");
    foreach ($results as $r) { // This is an array of arrays, each is a row
        print_r($r); // This will be an array of data, each is a column
    }

