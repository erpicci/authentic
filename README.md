# Authentic
_PHP library for secure user authentication_

## Table of contents
1. [What is this?](#what-is-this)
2. [How it works](#how-it-works)
3. [Dependencies](#dependencies)
4. [Install](#install)


## What is this
Authentic is a library which offers a secure authentication system. It is
completely written in PHP and it is thought for a web environment,
althought it can be used in other contexts.

![logo](https://raw.githubusercontent.com/erpicci/authentic/master/doc/img/authentic.png "Authentic")

Authentic is based on the idea of having an _access token_ which can be
used to authenticate an user. By doing so, it is no longer necessary to
keep a session server-side, nor to continously send username and password
at every request.

_Access tokens_ can be shared among users, at their option: it is no longer
the case that accounts are _per person_, instead groups of users can
share the same _access token_, gaining the possibility to access the
same account without sharing passwords or other sensitive data.

_Access tokens_ can be used to temporary delegate others.


## How it works
The whole process is as simple as:
-  *Client* contacts the *Authentication Provider*, giving her username
   and password
-  The *Authentication Provider* checks whether user is who she claims
   to be
-  In case of success, the *Authentication Provider* releases an _access
   token_ to the *Client*
-  *Client* can (and must) use her _access token_ to authenticate, in
   place of username and password
-  *Client* will send requests to *Resource Server(s)* sending her
   _access token_; server will use the token to authenticate the user
   (and, then, performs regular checks to ensure confidentiality)
-  Optionally, *client* can send her _access token_ to other trusted
   *clients* (either different processes, different machines or
   different people); those *clients* will be authenticated as original
   one
![logo](https://raw.githubusercontent.com/erpicci/authentic/master/doc/img/authentic-token.png "Access token")


## Dependencies
PHP >= 5.4 is required. There are no other dependecies.


## Install
To do
