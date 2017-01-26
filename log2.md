## Linking Laravel with Neo4j

[Back to arcollab Logs](/README.md)

* Setup folder permissions
```
sudo usermod -a -G groupname username
sudo chmod g+w myfolder
```

### Configure Laravel to work with Neo4j and [Neoeloquent] (https://github.com/Vinelab/NeoEloquent) (usefull OGM)

* Add to composer.json

```
{
    "require": {
        "vinelab/neoeloquent": "1.4.*"
    }
}
```

* Add the service provider class in config/app.php:

`Vinelab\NeoEloquent\NeoEloquentServiceProvider::class,`

* Run `composer update` 

* Add to config/database.php

```
'default' => 'neo4j',

'connections' => [
    'neo4j' => [
        'driver' => 'neo4j',
        'host'   => 'localhost',
        'port'   => '7474',
        'username' => 'neo4j',
        'password' => 'neo4j'
    ]
]
```


### MODELS

* Create a app/Models folder > create a test model Node.php

```
namespace App\Models;

class Node extends \NeoEloquent {
 
    protected $label = 'Node';

    protected $fillable = ['name', 'email'];
    
    public function hasNode()
    {
        return $this->hasOne('Node', 'HAS ONE');
    }

	public function likes()
	{
		return $this->hasMany('Node', 'LIKES');
    }
}
```

* Add the models aliases in config/app.php

```
'NeoEloquent' => \NeoEloquent::class,
'Node' => App\Models\Node::class,
```

### BASIC TESTING

If Neo4j is running you can look inside your database going to `localhost:7474`.
On the settings check the `Do no use Bolt` option and enter the credentials to connect (default user: 'neo4j', pass:'neo4j').
Run simple Cypher query (`MATCH (n) RETURN n`) after visiting each of the routes below to see the nodes and relations being created.

**Creating 5 sample nodes with a name property**

```
Route::get('neoTestNodes', function () {
	for($i=0; $i<5; $i++){
		$node = new Node;
	    $node->name = 'Test Node ' . $i;
	    $node->save();
	}
});
```

**Creating a Edge (relation) between two of the nodes**
(This assumes a fresh neo4j database, otherwise the id's will differ - `Node::find(???)`)

```
Route::get('neoTestRelations', function () {

	$node1 = Node::find(1);
	$node2 = Node::find(2);
	$relation = $node1->hasNode()->save($node2);
	$relation->name = $node1->name . "-" . $node2->name;
	$relation->save();
});
```

**Creating a Edges between one of the nodes and all the remainder and modifing Node and Edge properties**

```
Route::get('neoTestModify', function () {
	$node1 = Node::find(1);
	$node2 = Node::find(3);
	$node1->name = $node1->name . ' - modified';
	$node1->save();
	
	$node2->name = $node2->name . ' - modified';
	$node2->save();
	
	$relation = $node1->hasNode()->save($node2);
	$relation->name = 'modified relation';
	$relation->save();
	
	$node0 = Node::find(0);
	$nodes = Node::all();
    foreach($nodes as $node){
    	if($node->id != 0){
	    	$relation = $node0->likes()->save($node);
			$relation->name = 'new like relation';
			$relation->save();
    	}
    }
});
```

### AUTHENTICATION

To use the default builtin Laravel authentication, involved a bit of effort, but it turned out to be pretty simple in the end.
These are the steps I took to successfully configure everything.

* Create the auth scaffolding `php artisan make:auth`
	- This will create most of the structure including the login and register page, as well as a home page where you'll be redirected after a successfull login.
* Update the User model as follows:
 	- The key here was using Contracts as User needs to extend NeoEloquent and not the default Authenticatable.
 	- Next I populated the various abstract methods of each of the Contracts used (Authenticatable & CanResetPassword)
 	- The `sendPasswordResetNotification` method still need to be implemented, to generate and send the Notification but returning null will prevent any errors for now.

```
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPassword;

class User extends \NeoEloquent implements Authenticatable, CanResetPassword
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function getAuthIdentifierName()
	{
	    return $this->email;
	}
	
    public function getAuthIdentifier()
	{
	    return $this->id;
	}
	
	public function getAuthPassword()
	{
	    return $this->password;
	}
	
	public function getRememberToken()
	{
	    return $this->remember_token;
	}
	
	public function setRememberToken($token)
	{
	    $this->remember_token = $token;
	}
	
	public function getRememberTokenName()
	{
	    return 'remember_token';
	}
	
	public function getEmailForPasswordReset()
	{
	    return $this->email;
	}
		
	public function sendPasswordResetNotification($token)
	{
	    return null;
	}
}
```
