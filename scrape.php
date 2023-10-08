<?php
    require 'vendor/autoload.php';
    use Goutte\Client;
    $client = new Client();
    $crawler = $client->request('GET', 'https://books.toscrape.com');
    
    function scrapePage($url, $client, $file) {
        $crawler = $client->request('GET', $url);
        $crawler->filter('.product_pod')->each(function ($node) use ($file) {
            $title = $node->filter('.image_container img')->attr('alt');
            $price = $node->filter('.product_price p')->text();

            fputcsv($file, [$title, $price]);
        });
        try {
            $next_page = $crawler->filter('.next > a')->attr('href');
        } catch (InvalidArgumentException) {
            return null;
        }
        return "https://books.toscrape.com/catalogue/" . $next_page;
    }

    $client = new Client();
    $file = fopen("books.csv", "a");
    $page = 1;
    while($page <= 5) {
        $nextUrl = "https://books.toscrape.com/catalogue/page-".$page.".html";
        // echo "<h4>" . $nextUrl . "</h4>" . PHP_EOL;
        $nextUrl = scrapePage($nextUrl, $client, $file);
        $page++;
    }
    echo "<h3>Scraping Data Success</h3>";

    ?>
        <a href="primary.php" class="btn btn-secondary" role="button">Back</a>
    <?php

    fclose($file);
?>