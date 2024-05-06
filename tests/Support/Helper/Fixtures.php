<?php

declare(strict_types=1);

namespace Tests\Support\Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

use Tests\Support\AcceptanceTester;

class Fixtures extends \Codeception\Module
{


    public function upLoadUsers( AcceptanceTester $I)
    {
        $users = [
            ['username' => 'user1@example.com', 'password' => 'pass1', 'firstname' => 'John', 'lastname' => 'Doe', 'role' => 50, 'phone' => rand(10000000, 99999999), 'clientId' => 2,],
            ['username' => 'user2@example.com', 'password' => 'pass2', 'firstname' => 'Jane', 'lastname' => 'Doe', 'role' => 50, 'phone' => rand(10000000, 99999999), 'clientId' => 3,],
            ['username' => 'user3@example.com', 'password' => 'pass3', 'firstname' => 'Bob', 'lastname' => 'Smith', 'role' => 50, 'phone' => rand(10000000, 99999999)],
            ['username' => 'user4@example.com', 'password' => 'pass4', 'firstname' => 'Alice', 'lastname' => 'Johnson', 'role' => 50, 'phone' => rand(10000000, 99999999)],
            ['username' => 'user5@example.com', 'password' => 'pass5', 'firstname' => 'Charlie', 'lastname' => 'Brown', 'role' => 50, 'phone' => rand(10000000, 99999999)],
            ['username' => 'user6@example.com', 'password' => 'pass6', 'firstname' => 'Emily', 'lastname' => 'Davis', 'role' => 50, 'phone' => rand(10000000, 99999999)],
            ['username' => 'user7@example.com', 'password' => 'pass7', 'firstname' => 'Frank', 'lastname' => 'Miller', 'role' => 50, 'phone' => rand(10000000, 99999999)],
            ['username' => 'user8@example.com', 'password' => 'pass8', 'firstname' => 'Grace', 'lastname' => 'Wilson', 'role' => 50, 'phone' => rand(10000000, 99999999)],
            ['username' => 'user9@example.com', 'password' => 'pass9', 'firstname' => 'Harry', 'lastname' => 'Moore', 'role' => 50, 'phone' => rand(10000000, 99999999)],
            ['username' => 'user10@example.com', 'password' => 'pass10', 'firstname' => 'Ivy', 'lastname' => 'Taylor', 'role' => 50, 'phone' => rand(10000000, 99999999)]
        ];



        foreach ($users as $user) {
            $I->haveInDatabase('zp_user', $user);
        }
    }

    public function upLoadClients( AcceptanceTester $I)
    {
        $firms = [
            ['name' => 'Quantum Quirks'],
            ['name' => 'Nebula Networks'],
            ['name' => 'Galactic Grids'],
            ['name' => 'Cosmic Coders'],
            ['name' => 'Stellar Systems'],
            ['name' => 'Astro Architects'],
            ['name' => 'Pulsar Programmers'],
            ['name' => 'Orbit Optimizers'],
            ['name' => 'Meteor Makers'],
            ['name' => 'Comet Creators']
        ];




        foreach ($firms as $firm) {
            $I->haveInDatabase('zp_clients', $firm);
        }
    }
    // Load Fixtures
    public function upLoadProjects(AcceptanceTester $I)
    {
        $projects = [
            ['name' => 'Innovative Solutions', 'clientId' => 2, 'details' => 'A deep dive into the world of cutting-edge ideas and groundbreaking solutions.', 'hourBudget' => 0],
            ['name' => 'The Power of Creativity', 'clientId' => 3, 'details' => 'An exploration of how creativity can reshape the world and drive progress.', 'hourBudget' => 0],
            ['name' => 'Exploring the Future', 'clientId' => 4, 'details' => 'A forward-looking perspective on the trends and technologies that will shape our future.', 'hourBudget' => 0],
            ['name' => 'Embracing Change', 'clientId' => 5, 'details' => 'A guide to understanding and navigating the rapid changes happening in our world.', 'hourBudget' => 0],
            ['name' => 'The Journey of Discovery', 'clientId' => 6, 'details' => 'An exciting journey through new ideas, discoveries, and breakthroughs.', 'hourBudget' => 0],
            ['name' => 'Unleashing Potential', 'clientId' => 7, 'details' => 'A look at how we can unlock our potential and achieve great things.', 'hourBudget' => 0],
            ['name' => 'The Art of Possibility', 'clientId' => 1, 'details' => 'An inspiring exploration of the possibilities that lie ahead of us.', 'hourBudget' => 0],
            ['name' => 'Navigating Progress', 'clientId' => 1, 'details' => 'A roadmap for navigating the path of progress and innovation.', 'hourBudget' => 0],
            ['name' => 'The Pulse of Transformation', 'clientId' => 1, 'details' => 'A pulse on the transformative changes reshaping our world.', 'hourBudget' => 0],
            ['name' => 'Catalyst for Success', 'clientId' => 1, 'details' => 'A catalyst for sparking success and achieving our goals.', 'hourBudget' => 0]
        ];

        foreach ($projects as $project) {
            $I->haveInDatabase('zp_projects', $project);
        }
    }
}
