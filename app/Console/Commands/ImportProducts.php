<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ImportProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
  //  protected $signature = 'get:products {url} {file_name}';
    protected $signature = 'import:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Save webpage in new file';

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
       /* $url = $this->argument('url');
        $file = $this->argument('file_name');
        $this->info("Initializing curl..");

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, 0);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $this->info("Sending request to " . $url);

        $response = curl_exec($curl);

        Storage::put($file, $response);

        $this->info("File stored at: " . $file);*/

        $this->info("Import products: ");
        //  Initiate curl
        $ch = curl_init();
        $url = ("https://www.milletech.se/invoicing/export/products");

        // Disable SSL verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // Will return the response, if false it print the response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Set the url
        curl_setopt($ch, CURLOPT_URL, $url);
        // Execute
        $result = json_decode(curl_exec($ch), true);
        // Closing
        curl_close($ch);
    }
}
