<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RakutenRws_Client;

class RakutenSearchController extends Controller
{
    public function get_rakuten_items()
    {
        $client = new RakutenRws_Client();

        define("RAKUTEN_APPLICATION_ID", config('app.rakuten_id'));

        $client->setApplicationId(RAKUTEN_APPLICATION_ID);

        $response = $client->execute('IchibaItemSearch', array(
            'keyword' => '任意のキーワードを入れてください'
        ));

        if (!$response->isOk()) {
            return 'Error:' . $response->getMessage();
        } else {
            $items = [];
            foreach ($response as $key => $rakutenItem) {
                $items[$key]['title'] = $rakutenItem['itemName'];
                $items[$key]['price'] = $rakutenItem['itemPrice'];
                $items[$key]['url'] = $rakutenItem['itemUrl'];

                if ($rakutenItem['imageFlag']) {
                    $imgSrc = $rakutenItem['mediumImageUrls'][0]['imageUrl'];
                    $items[$key]['img'] = preg_replace('/^http:/', 'https:', $imgSrc);
                }
            }
            return $items;
        }
    }
}
