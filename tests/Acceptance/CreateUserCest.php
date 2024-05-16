<?php

namespace Acceptance;


use Codeception\Attribute\Group;
use Tests\Support\AcceptanceTester;
use Tests\Support\Helper\Fixtures;
use Tests\Support\Helper\Helper;
use Tests\Support\Page\Acceptance\Login;

class CreateUserCest
{
    public function _before(AcceptanceTester $I, Login $loginPage, Helper $helper, Fixtures $fixtures): void
    {
        $loginPage->login('test@leantime.io', 'test');

        if(!Fixtures::$fixtures)
        {
            $fixtures->callAllFixtures($I);
        }

        if(!Helper::$usercreated){
            $helper->createAUser($I);
        }
    }


    #[Group('user')]
//    #[Depends('Acceptance\LoginCest:loginSuccessfully')]
    public function editUser(AcceptanceTester $I)
        {
            $I->wantTo('Edit a user');
            $I->amOnPage('/users/editUser/1/');
            $I->see('Edit User');
            $I->fillField(['name' => 'jobTitle'], 'Testing');
            $I->click('Save');
            $I->see('User edited successfully');
        }
}
