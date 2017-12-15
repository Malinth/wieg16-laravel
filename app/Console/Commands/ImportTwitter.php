<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportTwitter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:twitter {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importing tweets';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.twitter.com/1.1/search/tweets.json?q=metoo",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer AAAAAAAAAAAAAAAAAAAAANqr3QAAAAAAejBtZKjr2ncGEL8aK3tTVb4auCw%3DGQg653S1J85ogDE9ymKtC8g7dpHd2QT6su5uInv09ZDULZmIFn",
                "cache-control: no-cache",
                "postman-token: 09b1b82d-134a-e232-2e0c-f4fe87e3da7d"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        $result = json_decode($response, true);


        foreach ($result['data'] as $twitter) {
            $this->info("Importing instagram: " . $twitter['id']);


            $dbtwitter = Twitter::findOrNew($twitter['id']);
            $dbtwitter->fill([

                    'id' => $twitter ['user_mentions']['id'],
                    'statuses' => $twitter['statuses']['text']]
            )->save();
        }
    }
}
