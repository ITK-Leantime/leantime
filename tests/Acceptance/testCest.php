<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;
use Tests\Support\Helper\Fixtures;
use Tests\Support\Helper\Helper;
use Tests\Support\Page\Acceptance\Login;


class testCest
{
    public function _before(AcceptanceTester $I, Fixtures $fixtures, Login $loginPage): void
    {
        $loginPage->login('test@leantime.io', 'test');

        $fixtures->upLoadProjects($I);
        $fixtures->upLoadClients($I);
        $fixtures->upLoadUsers($I);
    }

    public function _after(AcceptanceTester $I, Fixtures $fixtures): void
    {

    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
    }




}
