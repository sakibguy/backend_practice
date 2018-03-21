<?php
/*
 * Example 2 - How to verify Mollie API Payments in a webhook.
 */

use Mollie\Api\Exceptions\ApiException;

try {
    /*
     * Initialize the Mollie API library with your API key.
     *
     * See: https://www.mollie.com/dashboard/settings/profiles
     */
    require "initialize.php";

    /*
     * Retrieve the payment's current state.
     */
    $payment = $mollie->payments->get($_POST["id"]);
    $orderId = $payment->metadata->order_id;

    /*
     * Update the order in the database.
     */
    database_write($orderId, $payment->status);

    if ($payment->isPaid() == true) {
        /*
         * At this point you'd probably want to start the process of delivering the product to the customer.
         */
    } elseif ($payment->isOpen() == false) {
        /*
         * The payment isn't paid and isn't open anymore. We can assume it was aborted.
         */
    }
} catch (ApiException $e) {
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}

/*
 * NOTE: This example uses a text file as a database. Please use a real database like MySQL in production code.
 */
function database_write($orderId, $status)
{
    $orderId = intval($orderId);
    $database = dirname(__FILE__) . "/orders/order-{$orderId}.txt";

    file_put_contents($database, $status);
}
