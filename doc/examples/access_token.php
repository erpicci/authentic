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

require_once "../../AccessToken.php";


// Creates a new access token
$access_token = new AccessToken("my_user");


// Gets and shows identifier of owner
echo $access_token->getId();


// Shows access token (interprets it as a string)
echo $access_token;


// Regenerate the access token
echo $access_token->refresh();


// Deletes the access token
echo '"' . $access_token->delete() . '"';
