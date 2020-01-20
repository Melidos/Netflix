<?php

namespace App\DataFixtures;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;

class UserFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder) {
        echo( isset($this->passwordEncoder) ? gettype($this->passwordEncoder) : "Non set");
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        // $passwordEncoder = new UserPasswordEncoderInterface();

        $user = new User();

        $user->setUsername("Kevin");

        $user->setMail("kevin@kbesson.com");

        $user->setFullName("Kevin BESSON");

        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            "123456789"
        ));

        $manager->persist($user);

        $manager->flush();
    }
}
