<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\ShippingAddress;
use App\BillingAddress;
use App\Order;
use App\Item;

class ImportInvoices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:invoices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import customer invoices';

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
        $this->info("Import invoices: ");
        //  Initiate curl
        $ch = curl_init();
        $url = ("https://www.milletech.se/invoicing/export/");

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


        foreach ($result as $order) {
            $this->info("Importing order: " . $order['id']);

            if ($order['status'] != 'processing') continue; {
                $orders = Order::findOrNew($order['id']);
                $orders->fill($order);
                $orders->save();
            }

            if (isset($order['shipping_address']) && is_array($order['shipping_address'])) {
                $shipping_address = ShippingAddress::findOrNew($order['shipping_address']['id']);
                $shipping_address->fill($order['shipping_address']);
                $shipping_address->save();
            }

            if (isset($order['billing_address']) && is_array($order['billing_address'])) {
                $billing_address = BillingAddress::findOrNew($order['billing_address']['id']);
                $billing_address->fill($order['billing_address']);
                $billing_address->save();
            }

            foreach ($order['items'] as $item) {
                $items = Item::findOrNew($item['id']);
                $items->fill($item);
                $items->save();
            }
        }
    }
}