<?php

namespace Acceptance;

use Codeception\Attribute\Depends;
use Codeception\Attribute\Group;
use Tests\Support\AcceptanceTester;
use Tests\Support\Helper\Helper;
use Tests\Support\Page\Acceptance\Login;

class CreateUserCest
{
    public function _before(AcceptanceTester $I, Login $loginPage, Helper $helper): void
    {
        $loginPage->login('test@leantime.io', 'test');
        if(!Helper::$usercreated){
            $helper->createAUser($I);
        }
    }


    #[Group('user')]
    #[Depends('Acceptance\LoginCest:loginSuccessfully')]
    public function editAUser(AcceptanceTester $I): void
    {
        $I->wantTo('Edit a user');
        $I->amOnPage('/users/editUser/1/');
        $I->see('Edit User');
        $I->fillField(['name' => 'jobTitle'], 'Testing');
        $I->click('Save');
        $I->see('User edited successfully');
    }
}
