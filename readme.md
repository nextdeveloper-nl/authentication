# NextDeveloper Authentication Library
In this library we try to support almost all available authentication mechanisms as well as a secure authorization mechanisms. For that we will be applying various standarts stated below.

# Authentication Mechanisms
- [ ] old school username and password check
- [ ] 2FA implementations
- - [ ] SMS one time code
- - [ ] Email one time code
- - [ ] Whatsapp one time code
- - [ ] Telegram one time code
- - [ ] Various push mechanisms for one time code
- [ ] implemeting passwordless logins using different devices at the same time

# Password Management
For password management we are and will be applying various different practices to increase the security;
- [ ] using Argon2id for hashing passwords and scrypt for fallback.
- [ ] storing the old passwords to check if the user is not using the very same password
- [ ] checking the password quality, in terms of complexity
- [ ] rehashing passwords using rehash algorithms if available.

Notes to developers;
- Please take a good look at configuration file which is under the config folder.
- Please set the hashing algorithm, and please use argon2id or scrypt for fallback.

Notes for myself, and maybe you ?
- https://cheatsheetseries.owasp.org/cheatsheets/Password_Storage_Cheat_Sheet.html#argon2id
- https://wiki.php.net/rfc/argon2_password_hash

# Token Management
We are producing tokens with JWT and Laravel Password implementation. However we are also creating different tokens to be able to login user with the client information and location information for enhanced security. That is why we are actually saving tokens with location, ip, client information (user-agent), JWT token and returning the user a hash of this data. When the user sends the token without "NDAuth" keyword instead of "Bearer" we understand that they are using our implementation of token management. In that case we go to JWT token database and look at the client information. If we think that the user is correct then we return the JWT token.

## Transparent JWT token manipulation
When the user is sending the token that we generate instead of JWT token, we need to tell the application that the user is valid and its the user we are looking for. There are various ways to do this, including but not limited to database search, redis search or monipulation at load balancer or proxy level.

We implement application level lookup at the moment but we will be offering Load Balancer level of lookup for reduced cpu usage and overhead.

- [ ] Application lookup
- [ ] Load balancer lookup

# Commercial Support
Please let us know if you need any commercial support. We dont have such a business plan but we will be happy to help you on your project and/or applying this library in your project

# Want to contribute? 
You are very welcome to contribute of course. Please send us an email so that we can get in touch and talk about details;
codewithus@nextdeveloper.com