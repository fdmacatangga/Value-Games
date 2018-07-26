<?php
return [

    /*
     * Redirect URL after login
     */
    'redirect_url' => '/auth/steam/handle',
    /*
     *  API Key (set in .env file) [http://steamcommunity.com/dev/apikey]
     */
    'api_key' => env('STEAM_API_KEY', '63CDC7A83E806C21AD7C6E6E673C478B'),
    /*
     * Is using https?
     */
    'https' => false
];

?>