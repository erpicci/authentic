<?php
/**
 * This file is part of Authentic.
 *
 * Authentic is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Authentic is distributed under the hope it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Authentic. If not, see <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 *
 * @author    Marco Zanella <mz@openmailbox.org>
 * @copyright 2016 Marco Zanella
 * @license   GNU General Public License, version 3
 */
namespace Authentic;

require_once "../../AuthProvider.php";


// Initializes provider
$provider = new AuthProvider();


// Registers a new user
$provider->register("my_user", "my_password");


// Authentication
$access_token = $provider->authenticate("my_user", "my_password");
if ($access_token === false) {
    echo "Cannot authenticate";
}


// Verifies access token
$identifier = $provider->verify("my_user@1974365");
if ($identifier === false) {
    echo "Access token is invalid";
}


// Terminates session
$provider->logout("my_user");


// Deletes user
$provider->delete("my_user");
