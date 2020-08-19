<?php

namespace App\Tests\Functional;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CalculatorTest extends WebTestCase
{
    public function testAddOperation()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $buttonCrawlerNode = $crawler->selectButton('submit');

        // select the form that contains this button
        $form = $buttonCrawlerNode->form();

        $form = $buttonCrawlerNode->form([
            'calculator[operator]'    => 'add',
            'calculator[firstValue]' => 25,
            'calculator[secundValue]' => 25
        ]);

        $client->submit($form);
    }
}
