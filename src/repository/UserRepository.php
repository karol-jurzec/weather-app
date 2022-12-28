<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository {
    public function getUser(string $email) : ?User {
        $stmt = self::getInstance()->connect()->prepare('
            SELECT * FROM public.users u join public.users_details ud on u.user_details_id = ud.user_details_id where email = :email
        ');

        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user === false) {
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname']
        );
    }

    public function getUserId(string $email) : int {
        $stmt = self::getInstance()->connect()->prepare('
            SELECT public.users.user_id FROM public.users where email = :email
        ');

        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC)['user_id'];
    }

    public function addUser(User $user) {
        $stmt = self::getInstance()->connect()->prepare('
            INSERT INTO users_details (name, surname, phone)
            VALUES (?, ?, ?)
        ');

        $stmt->execute([
            $user->getName(),
            $user->getSurname(),
            $user->getPhone()
        ]);

        $stmt = self::getInstance()->connect()->prepare('
            INSERT INTO users (email, password, user_details_id)
            VALUES (?, ?, ?)
        ');

        $stmt->execute([
            $user->getEmail(),
            $user->getPassword(),
            $this->getUserDetailsId($user)
        ]);
    }

    public function getUserDetailsId(User $user): int {
        $userName = $user->getName();
        $userSurname = $user->getSurname();
        $phone = $user->getPhone();

        $stmt = self::getInstance()->connect()->prepare('
            SELECT * FROM public.users_details WHERE name = :name AND surname = :surname AND phone = :phone
        ');
        $stmt->bindParam(':name', $userName, PDO::PARAM_STR);
        $stmt->bindParam(':surname', $userSurname, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['user_details_id'];
    }
}