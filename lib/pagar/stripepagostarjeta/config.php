<?php
require_once('vendor/autoload.php');

//pruebas
/*$stripe = array(
    'secret_key' => 'sk_test_4qeORmbbBs4BOcFZnsToWH1l',
    'publishable_key' => 'pk_test_EGAPBj1LAN1cRR5LQ5cbcgzj',
);*/

$stripe = array(
    'secret_key' => 'sk_lisk_test_51IA243ELIpuVRIhNQqbP4w3NB6UOxfkqBMSwqn6LgAKUfpnN0DDyouxwDg342hDqcQETGUq1wGTbfXA8K7Cs2oMK00WECOzhJVve_E7jBH8MBhkXPTysnpgb6JcLD',
    'publishable_key' => 'pk_test_51IA243ELIpuVRIhNADv8bzVxAT8NNncrkt7ohrSSKV7omasgwn0MnWpynUTR5RqQcVCTus7X239QBifDgE2MRkE800OHCKQcKS',
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>
