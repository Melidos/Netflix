<?php

namespace App\DataFixtures;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder) {
        $this->$passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $user = new User();

        $user->setUsername("Kevin");

        $user->setMail("kevin@kbesson.com");

        $user->setFullName("Kevin BESSON");

        $user->setPassword($this->$passwordEncoder->encodePassword(
            $user,
            "123456789"
        ));

        $manager->persists($user);

        $manager->flush();
    }
}
