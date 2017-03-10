<?php

namespace sil13\VitrineBundle\Tests\Controller;

use sil13\VitrineBundle\Utils\Constants;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CartControllerTest extends WebTestCase
{
    /**
     * Test d'un scénario complet de mise en panier et validation du panier
     */
    public function testCompleteScenario()
    {
        // Create a new client to browse the application
        $client = static::createClient();
        $session = $client->getContainer()->get('session');
        $this->assertNotNull($session, 'session is nul');
        $this->assertNull($session->get(Constants::CART), 'The cart must be null !');

        // Register article id 3 to the client Cart
        $client->request('POST', '/cart/add/3', ['quantity' => 10]);
        $client->followRedirect();

        // Cart must not be null and it must contains 10 articles with id = 3
        $this->assertNotNull($session->get(Constants::CART), 'Cart is not in client session');
        $this->assertFalse($session->get(Constants::CART)->isEmpty(), 'The cart is empty');
        $this->assertEquals(10, $session->get(Constants::CART)->getContainer()[3], 'The cart has a wrong count of articleId = 3');

        // Validating cart
        $client->request('GET', '/cart/validate');
        $client->followRedirect();

        $this->assertNotNull($session->get(Constants::CART), 'The cart is null');

        // Problème avec les sessions lors des tests. J'ai tenter des Mock mais rien ne fonctionne.
        // J'ai pas trouvé la solution. Le test s'arrête donc là. Je veux bien la solution par mail si vous l'avez ! :)

        $this->assertTrue($client->getContainer()->get('session')->get(Constants::CART)->isEmpty(), 'The cart is not empty');

        $crawler = $client->request('GET', '/me');
        $this->assertEquals(1, $crawler->filter('h3')->count()); // Confirmation de la commande passée.

    }
}
