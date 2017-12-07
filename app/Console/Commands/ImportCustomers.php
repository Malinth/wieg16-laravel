<?php

namespace App\Console\Commands;

use App\Customer;
use App\CustomerAddress;
use App\Company;
use DB;
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
        $file = "storage/app/products.json";
        $url = ("https://www.milletech.se/invoicing/export/customers");

        // Disable SSL verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // Will return the response, if false it print the response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Set the url
        curl_setopt($ch, CURLOPT_URL, $url);
        // Execute
        $this->info("Sending request...");
        $result = json_decode(curl_exec($ch), true);
        // Closing
        curl_close($ch);

        //Spara först companies i en tom array
        $companies = [];
        // Kolla om modellen redan finns via Customer::find($id). Om modellen inte finns så blir det null.
        foreach ($result as $customer) {
            $this->info("Import/update customer: ".$customer['id']);
            $dbCustomer = Customer::findOrNew($customer['id']);
            $dbCustomer->fill($customer)->save();

            // Importing addresses in separate table
            if ($customer['address']==!null) {
                $this->info("Import/update address: ".$customer['address']['id']);
                $dbCustomerAddress = CustomerAddress::findOrNew($customer['address']['id']);
                $dbCustomerAddress->fill($customer['address'])->save();
            }
            // Importing companies in separate table
            $this->info("Import/update companies: ".$customer['id']);
            $companies[] = $customer['customer_company'];
        }

            $companies = array_unique($companies);

            foreach ($companies as $company) {
            $this->info("Import/update company table for ".$company);

            /* @var Company $dbCompany */
            $dbCompany = Company::findOrNew($company);
            $dbCompany->company_name = $company;

            $dbCompany->fill(['company_name' => $company]);
            $dbCompany->save();

             $customers = Customer::where('customer_company', '=', $dbCompany->company_name)->get();
             foreach ($customers as $customer) {
                 $customer->company_id = $dbCompany->id;
                 $customer->save();
             }

            DB::table('customer')
                ->where('customer_company', '=', $dbCompany->company_name)
                ->update(['company_id' => $dbCompany->id]);
        }
    }
}