<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PostTicketTest extends WebTestCase
{
    public function testCreateTicket(): void
    {
        $client = static::createClient();

        $crawler = $client->request("GET", "/");

        $this->assertResponseIsSuccessful();

        $form = $crawler->selectButton("Envoyer")->form([
            "form[firstName]" => "John",
            "form[name]" => "Doe",
            "form[message]" => "This is a test message",
            "form[phone]" => "1234567890",
        ]);

        $client->submit($form);

        $client->followRedirects();

        $this->assertResponseStatusCodeSame(302);
    }
}
