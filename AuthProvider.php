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

require_once "AccessToken.php";

use \PDO;

/**
 * Authentication provider.
 * Manages authentication of users.
 *
 * This class exhibits a Fluent Interface trhough Method chaining.
 *
 * @package Authentic
 * @author  Marco Zanella <mz@openmailbox.org>
 */
final class AuthProvider
{
    /**
     * Connects to the database.
     */
    public function __construct()
    {
        $db       = parse_ini_file('database.ini');
        $dsn      = 'mysql:host=' . $db['host'] . ';dbname=' . $db['name'];
        $username = $db['user'];
        $password = $db['pass'];
        $options  = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE    => PDO::ERRMODE_EXCEPTION
        ];

        $this->dbh = new PDO($dsn, $username, $password, $options);
    }


    /**
     * Creates a new user.
     * Inserts data about a new user into the database. Password is
     * hased using also a salt.
     * @param string $id       Identifier of the new user
     * @param string $password Password of the new user
     * @return self This AuthProvider itself
     * @todo Enforce input validation
     */
    public function register($id, $password)
    {
        $query = "INSERT INTO authentic_user (id, password) "
               . "VALUES(:id, :password)";
        $stm   = $this->dbh->prepare($query);
        $stm->bindParam(':id', $id);
        $stm->bindParam(':password', $password);

        $password = password_hash($password, PASSWORD_BCRYPT);

        $stm->execute();

        return $this;
    }


    /**
     * Authenticates an user.
     * @param string $id       Identifier of the user
     * @param string $password Password of the user
     * @return AccessToken|bool An access token if the user correctly
     *                          authenticated, false otherwise
     */
    public function authenticate($id, $password)
    {
        $query = "SELECT password FROM authentic_user WHERE id = ?";
        $stm   = $this->dbh->prepare($query);
        $stm->execute([$id]);

        $record = $stm->fetch();
        if (!password_verify($password, $record['password'])) {
            return false;
        }

        return new AccessToken($id);
    }


    /**
     * Deletes an user.
     * @param string $id Identifier of the user to delete
     * @return self This AuthManager itself
     */
    public function delete($id)
    {
        $query = "DELETE FROM authentic_user WHERE id = ?";
        $stm   = $this->dbh->prepare($query);
        $stm->execute([$id]);

        return $this;
    }


    /** Connection to database. */
    private $dbh;
}