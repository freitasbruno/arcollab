## Linking Laravel with Neo4j

[Back to arcollab Logs](/README.md)

sudo apt-get install php5-curl

sudo usermod -a -G groupname username
sudo chmod g+w myfolder

Add to composer.json

{
    "require": {
        "vinelab/neoeloquent": "1.4.*"
    }
}

Add the service provider in config/app.php:

'Vinelab\NeoEloquent\NeoEloquentServiceProvider',

Run composer update

Add to config/database.php

'default' => 'neo4j',

'connections' => [
    'neo4j' => [
        'driver' => 'neo4j',
        'host'   => 'localhost',
        'port'   => '7474',
        'username' => 'neo4j',
        'password' => 'j4oen'
    ]
]

### MIGRATIONS

    create the folder database/labels
    modify composer.json and add "database/labels" to the classmap array
    run composer dump-autoload

### Models

Create a app/Models folder > create a test model Node.php

<?php

namespace App\Models;

class Node extends \NeoEloquent {

}

?>

Add the models aliases in config/app.php

 'NeoEloquent' => \NeoEloquent::class,
 'Node' => App\Models\Node::class,
