<?php
require_once(ROOT.'/application/repository/UserRepository.php');
require_once(ROOT.'/application/model/mapper/UserMapper.php');

class UserService {
    public static function list() {
        $userList = [];

        foreach (UserRepository::selectAll() as $user) {
            $userList[] = UserMapper::toModel($user);
        }

        return $userList;
    }

    public static function getById($id) {
        $userList = UserRepository::selectById($id);

        if (count($userList) == 0) {
            throw new ServerException(404, "NOT FOUND", "user by id " . $id . " not found");
        } else {
            return UserMapper::toModel($userList[0]);
        }
    }

    public static function add($user) {
        return $user;
    }

    public static function update($user) {
        return $user;
    }

    public static function delete($id) {
        return $id;
    }
}