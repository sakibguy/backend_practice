<?php
/*
 * Example 18 - Updating an existing customer via the Mollie API.
 */
try {
    /*
     * Initialize the Mollie API library with your API key or OAuth access token.
     */
    require "./initialize.php";
    /*
     * Retrieve an existing customer by his customerId
     */
    $customer = $mollie->customers->get("cst_cUe8HjeBuz");
    /**
     * Customer fields that can be updated.
     *
     * @See https://www.mollie.com/en/docs/reference/customers/update
     */
    $customer->name = "Luke Sky";
    $customer->email = "luke@example.org";
    $customer->locale = "en_US";
    $customer->metadata->isJedi = TRUE;
    $customer->update();

    echo "<p>Customer updated: " . htmlspecialchars($customer->name) . "</p>";
} catch (\Mollie\Api\Exceptions\ApiException $e) {
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}