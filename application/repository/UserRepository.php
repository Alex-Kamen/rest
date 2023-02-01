<?php
require_once(ROOT.'/utilities/database/Db.php');
require_once(ROOT.'/application/model/entity/User.php');
require_once(ROOT.'/application/model/mapper/UserMapper.php');

class UserRepository
{
    public static function selectAll() {
        $db = Db::getConnection();

        $result = $db->prepare("SELECT * FROM " . User::TABLE_NAME);

        $result->execute();
        $userList = [];

        while($row = $result->fetch()) {
            $userList[] = UserMapper::toEntity($row);
        }

        return $userList;
    }

    public static function selectById($id) {
        $db = Db::getConnection();

        $result = $db->prepare("SELECT * FROM " . User::TABLE_NAME . " WHERE " . User::FIELDS['id'] . " = " . ":id");
        $result->bindParam(":id", $id, PDO::PARAM_STR);

        $result->execute();
        $userList = [];

        while($row = $result->fetch()) {
            $userList[] = UserMapper::toEntity($row);
        }

        return $userList;
    }

    public static function add($user) {
        $db = Db::getConnection();
        $fullName = $user->getFullName();
        $login = $user->getLogin();
        $password = $user->getPassword();

        $result = $db->prepare("INSERT INTO " . User::TABLE_NAME . " VALUES (NULL, :fullName, :login, :password)");
        $result->bindParam(":fullName", $fullName, PDO::PARAM_STR);
        $result->bindParam(":login", $login, PDO::PARAM_STR);
        $result->bindParam(":password", $password, PDO::PARAM_STR);
        $result->execute();

        $userList = [];

        while($row = $result->fetch()) {
            $userList[] = UserMapper::toEntity($row);
        }

        return $userList;
    }

    public static function update($user) {
        $db = Db::getConnection();

        $id = $user->getId();
        $fullName = $user->getFullName();
        $login = $user->getLogin();
        $password = $user->getPassword();

        $result = $db->prepare("UPDATE " .
            User::TABLE_NAME
            . " SET "
            . User::FIELDS['login'] . " = :login, "
            . User::FIELDS['password'] . " = :password, "
            . User::FIELDS['fullName'] . " = :fullName WHERE "
            . User::FIELDS['id'] . " = :id");

        $result->bindParam(":fullName", $fullName, PDO::PARAM_STR);
        $result->bindParam(":login", $login, PDO::PARAM_STR);
        $result->bindParam(":password", $password, PDO::PARAM_STR);
        $result->bindParam(":id", $id, PDO::PARAM_INT);
        $result->execute();

        $userList = [];

        while($row = $result->fetch()) {
            $userList[] = UserMapper::toEntity($row);
        }

        return $userList;
    }

    public static function delete($id) {
        $db = Db::getConnection();

        $result = $db->prepare("DELETE FROM " . User::TABLE_NAME . " WHERE " . User::FIELDS['id'] . " = :id");
        $result->bindParam(":id", $id, PDO::PARAM_INT);
        $result->execute();

        $userList = [];

        while($row = $result->fetch()) {
            $userList[] = UserMapper::toEntity($row);
        }

        return $userList;
    }
}