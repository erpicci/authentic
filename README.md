# Authentic
_PHP library for secure user authentication_

## Table of contents
1. [What is this?](#what-is-this)
1. [How it works](#how-it-works)
1. [Features](#features)
1. [Dependencies](#dependencies)
1. [Install](#install)


## What is this
Authentic is a library which offers a secure authentication system. It is
completely written in PHP and it is thought for a web environment,
althought it can be used in other contexts.

Authentic is based on the idea of having an *access token* which can be
used to authenticate an user. By doing so, it is no longer necessary to
keep a session server-side, nor to continously send username and password
at every request.

*Access tokens* can be shared among users, at their option: it is no longer
the case that accounts are per person, instead groups of users can
share the same *access token*, gaining the possibility to access the
same account without sharing passwords or other sensitive data.

*Access tokens* can be used to temporary delegate others.


## How it works
The whole process is as simple as:
-  **Client** contacts the **Authentication Provider**, giving her username
   and password
-  The **Authentication Provider** checks whether user is who she claims
   to be
-  In case of success, the **Authentication Provider** releases an *access
   token* to the **Client**
-  **Client** can (and must) use her *access token* to authenticate, in
   place of username and password
-  **Client** will send requests to **Resource Server(s)** sending her
   *access token*; server will use the token to authenticate the user
   (and, then, performs regular checks to ensure confidentiality)
-  Optionally, **client** can send her *access token* to other trusted
   **clients** (either different processes, different machines or
   different people); those **clients** will be authenticated as original
   one


## Features
Authentic automatically deals with:
- SQL Injections attacks
- brute force attacks
- password encryption
- hash-table/rainbow-table based attacks
- time-based attacks during password checking

Authentic can be used to:
- authomatically handle interaction with database during authentication
- create shareable sessions trhough access tokens
- avoid replay attacks by periodically regenerating access tokens

Do not forget Authentic is about secure authentication: all the rest is
up to you. In particular, remember:
- username and password are sent just once: make sure channel is secure
- it's up to you and/or users decide how to share their access tokens


## Dependencies
PHP >= 5.4 and a MySQL database are required. There are no other dependecies.


## Install
- Copy PHP files into destination folder (namely *authentic*)
- Create the *authentic_user* table (use the *database.sql* script)
- Create the *authentic.ini* file with information about your database
  and place it in the same directory:
```php
[database]
host = your_host
name = your_database_name
user = your_user
pass = your_password
```
