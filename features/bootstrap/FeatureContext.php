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
    \Behat\Mink\Mink;
/**
 * Features context.
 */
class FeatureContext extends MinkContext
{
    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        $driver = new \Behat\Mink\Driver\Selenium2Driver(
            $parameters['wd_capabilities']['browser'], 
            $parameters['wd_capabilities'], 
            $parameters['wd_host']
        );

        // init session:
        $session = new \Behat\Mink\Session($driver);

        $mink = new Mink(array($session));


        $this->setMink($mink);
    }

//
// Place your definition and hook methods here:
//
//    /**
//     * @Given /^I have done something with "([^"]*)"$/
//     */
//    public function iHaveDoneSomethingWith($argument)
//    {
//        doSomethingWith($argument);
//    }
//
}
