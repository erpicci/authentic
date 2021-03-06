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

/**
 * Access token.
 * This class exhibits a Fluent Interface through Method Chaining.
 *
 * @package Authentic
 * @author  Marco Zanella <mz@openmailbox.org>
 */
final class AccessToken
{
    /**
     * Sets identifier and builds access token.
     * @param string $id Identifier of an user
     * @example examples/access_token.php 29 2 Creates an access token.
     */
    public function __construct($id)
    {
        $this->id = $id;
        $this->refresh();
    }


    /**
     * Returns identifier of the owner of this token.
     * @return string Identifier of the owner of this token
     * @example examples/access_token.php 33 2 Prints identifier of owner.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns this access token as a string.
     * @return string This access token
     * @example examples/access_token.php 37 2 Interprets as a string.
     */
    public function __tostring()
    {
        return $this->access_token;
    }


    /**
     * Refreshes this access token.
     * @return self This access token itself
     * @example examples/access_token.php 41 2 Refreshes access token.
     */
    public function refresh()
    {
        $this->access_token = $this->id . "@" . rand();

        return $this;
    }


    /**
     * Deletes this access token.
     * Access token is invalidated.
     * @example examples/access_token.php 45 2 Deletes access token.
     */
    public function delete()
    {
        $this->id = "";
        $this->access_token = "";

        return $this;
    }



    /**
     * Instance variables.
     * @var string id           Owner of this access token
     * @var string access_token This access token
     */
    private $id, $access_token;
}
