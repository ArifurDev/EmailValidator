## Register New User

### Example Request:
```
POST https://emailchecker.arifurrahmanrifat.com/api/signup?name=arif&email=arifinfott@gmail.com&password=123456&confirm_password=123456
```

### This API register new user

```
$client = new Client();

$headers = \[

'name' => 'Arif',

'email' => 'arif@gmail.com',

'password' => '123456',

'confirm\_password' => '123456'

\];

$body = '';

$request = new Request('POST', 'https://emailchecker.arifurrahmanrifat.com/api/signup?name=arif&email=arifinfott@gmail.com&password=123456&confirm_password=123456', $headers, $body);

$res = $client->sendAsync($request)->wait();

echo $res->getBody();
```


## User Login Authentication

### Example Request:
```
POST https://emailchecker.arifurrahmanrifat.com/api/signin?email=arif@gmail.com&password=123456
```
### This API login Authenticates the user with the provided email and password
```
$client = new Client();

$request = new Request('POST', 'https://emailchecker.arifurrahmanrifat.com/api/signin?email=arif@gmail.com&password=123456');

$res = $client->sendAsync($request)->wait();

echo $res->getBody();
```


## User Logout

### Example Request:
```
GET https://emailchecker.arifurrahmanrifat.com/api/user-logout
```
### Logs out the currently logged-in user and removes the login token.
```
$client = new Client();

$request = new Request('GET', 'https://emailchecker.arifurrahmanrifat.com/api/user-logout');

$res = $client->sendAsync($request)->wait();

echo $res->getBody();
```


## Email Address Validation

### Example Request:
```
POST https://emailchecker.arifurrahmanrifat.com/api/emailValidator?email=arif@gmail.com

```
### This API Validate the existenc and validity of an email address
```
$client = new Client();

$request = new Request('POST', 'https://emailchecker.arifurrahmanrifat.com/api/emailValidator?email=arif@gmail.com');

$res = $client->sendAsync($request)->wait();

echo $res->getBody();
```




