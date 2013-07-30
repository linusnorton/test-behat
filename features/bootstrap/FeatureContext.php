<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

use Behat\MinkExtension\Context\MinkContext,
    Behat\Mink\Driver\Selenium2Driver,
    Behat\Mink\Session,
    Behat\Mink\WebAssert,
    Behat\Mink\Mink;
/**
 * Features context.
 */
class FeatureContext extends MinkContext
{
    private static $session;

    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        if (!self::$session) {
            self::$session = new Session($this->getDriver($parameters));
            self::$session->start();
        }
    }

    private function getDriver(array $parameters)
    {
        return new Selenium2Driver(
            'firefox',
            array(
                'version'        => 'ANY',
                'platform'       => 'ANY',
                'browserVersion' => 'ANY',
                'browser'        => 'firefox'
            ),
            $parameters['wd_host']
        );
    }

    public function getSession()
    {
        return self::$session;
    }

    /**
     * Returns session asserter.
     *
     * @param Session|string $session session object or name
     *
     * @return WebAssert
     */
    public function assertSession($session = null)
    {
        if (!($session instanceof Session)) {
            $session = $this->getSession($session);
        }
        return new WebAssert($session);
    }
}
