<?php

namespace App\Console\Commands;

use App\Customer;
use App\CustomerAddress;
use Illuminate\Console\Command;

class ImportCustomers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:customers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import customers';

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
        $this->info("Import customers: ");
        //  Initiate curl
        $ch = curl_init();
        $url = ("https://www.milletech.se/invoicing/export/customers");

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

// Kolla om modellen redan finns via Customer::find($id). Om modellen inte finns så blir det null.
        foreach ($result as $customer) {
            $this->info("Importing customer: ".$customer['id']);
            $dbCustomer = Customer::findOrNew($customer['id']);
            $dbCustomer->fill($customer)->save();

            if($customer['address']!==null) {
                $this->info("Importing address: " . $customer['address']['id']);
                $dbCustomerAddress = CustomerAddress::findOrNew($customer['address']['id']);
                $dbCustomerAddress->fill($customer['address'])->save();
            }


        }
    }
}
