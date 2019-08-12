<?php


namespace Alura\BuscadorDeCursos;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class Buscador
{
    /**
     * @var ClientInterface
     */
    private $httpClient;
    /**
     * @var Crawler
     */
    private $crawler;

    public function __construct(ClientInterface $httpClient, Crawler $crawler)
    {
        $this->httpClient = $httpClient;
        $this->crawler = $crawler;
    }

    public function buscar(string $url) : array
    {
        //Obtem a página HTML com os cursos do site informado na url (neste caso, alura)
        $resposta = $this->httpClient->request('GET', $url);

        //Pega somente o corpo da página
        $html = $resposta->getBody();

        //Anexa o HTML ao Crawler
        $this->crawler->addHtmlContent($html);

        //Filtra somente pelo elemento (div span) que possui o nome dos cursos
        $elementosCursos = $this->crawler->filter('span.card-curso__nome');
        $cursos = [];
        foreach ($elementosCursos as $elemento) {
            $cursos[] = $elemento->textContent;
        }
        return $cursos;
    }
}
