<?php
require_once(ROOT . '/application/model/entity/User.php');

class UserMapper
{
    public static function toModel($entity)
    {
        return array(
            'id' => $entity->getId(),
            'login' => $entity->getLogin(),
            'fullName' => $entity->getFullName(),
            'password' => $entity->getPassword(),
        );
    }

    public static function toEntity($model)
    {
        return (new User())
            ->setId($model['id'])
            ->setLogin($model['login'])
            ->setFullName($model['fullName'])
            ->setPassword($model['password']);
    }
}