<?php

namespace App\Console\Commands;

use App\Exports\ScraperExport;
use Illuminate\Console\Command;
use Goutte\Client;
use Maatwebsite\Excel\Facades\Excel;

class ScraperCommand extends Command
{
    const URL = 'https://www.thegioididong.com/dtdd-';
    protected $signature = 'scraper';

    protected $description = 'Scraper successfully';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->scraperIphone();
        return Command::SUCCESS;
    }

    protected function scraperIphone()
    {
        $url = self::URL.'apple-iphone';

        $client = new Client();
        $crawler = $client->request('GET', $url);

        $link = $crawler->filter('ul.listproduct > li.item')->each(
            function ($node) {
                $name = $node->filter('h3')->text();
                $linkImg = $node->filter("a > div.item-img > img")->attr('src');

                return [
                    "name" => $name,
//                    "linkImg" => $linkImg,
                ];
            }
        );

//        return Excel::download(new ScraperExport($link), 'invoices.xlsx');

//        foreach ($link as $l) {
//            $img = __DIR__.'/../storage/app/public/media/product/iphone/'.generateSlug($l["name"], '_').'.jpg';
//            file_put_contents($img, file_get_contents($l["linkImg"]));
//        }
    }
}
