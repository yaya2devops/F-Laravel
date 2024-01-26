<?php

return [
    /*
    |--------------------------------------------------------------------------
    | SAML idP configuration file
    |--------------------------------------------------------------------------
    |
    | Use this file to configure the service providers you want to use.
    |
     */
    // Outputs data to your laravel.log file for debugging
    'debug' => false,
    // Define the email address field name in the users table
    'email_field' => 'email',
    // Define the name field in the users table
    'name_field' => 'name',
    // The URI to your login page
    'login_uri' => 'login',
    // Log out of the IdP after SLO
    'logout_after_slo' => env('LOGOUT_AFTER_SLO', false),
    // The URI to the saml metadata file, this describes your idP
    'issuer_uri' => 'saml/metadata',
    // The certificate
    'cert' => env('SAMLIDP_CERT'),
    // Name of the certificate PEM file, ignored if cert is used
    'certname' => 'cert.pem',
    // The certificate key
    'key' => env('SAMLIDP_KEY'),
    // Name of the certificate key PEM file, ignored if key is used
    'keyname' => 'key.pem',
    // Encrypt requests and responses
    'encrypt_assertion' => true,
    // Make sure messages are signed
    'messages_signed' => true,
    // Defind what digital algorithm you want to use
    'digest_algorithm' => \RobRichards\XMLSecLibs\XMLSecurityDSig::SHA256,
    // list of all service providers
    'sp' => [
'aHR0cHM6Ly93d3cuY291cnNlcmEub3JnL2FwaS9zYW1sTG9naW4udjEvbG9naW4=' => [
            'destination' => 'https://www.coursera.org/api/samlLogin.v1/login',
            'logout' => '',
            'certificate' => 'MIIDIzCCAgugAwIBAgIUQcpjVsXfi2yrEF+BC1rWJMH0nHkwDQYJKoZIhvcNAQEL BQAwITEfMB0GA1UEAwwWZG9tVS0xMi0zMS0zOS0wQi1BNi0xMzAeFw0yMjA2MDIy MzM4NTNaFw0yNTA2MDEyMzM4NTNaMCExHzAdBgNVBAMMFmRvbVUtMTItMzEtMzkt MEItQTYtMTMwggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEKAoIBAQDotgyCjUpn Q6fFnQ0j6s5xP33BoDfU7VuROFimFX9K+Tt9iGPWk5pV6obcStIA8c/GLsxXy4+N wkOdnjsmEFTinpVhD/ndWuc/NyewrHuZeVF3JII3brRiomfSv2T/8gAAUg8LJ6Vn iwmPUAOm5d549X57Q6NTHAuNWFU8SLcHiVuUzXPOUVhNe7Oi850Z2j8gKvSWAzx3 GiDk0AtAHpb1llXWN4I6ZbXJKuelGX3ISHZV7Ui+QpX/sTbhHpCm3KvkyE5AOQGG WVtErMnnOkES5Zf2YYvOLvSjWTmcXWzwTLgxadg1sNKA0IK8J707+xCYwA6QGEnJ sBrAxwh6r0LnAgMBAAGjUzBRMB0GA1UdDgQWBBQFM+Km1Znc/Yf0YaK85e9jP+dZ NzAfBgNVHSMEGDAWgBQFM+Km1Znc/Yf0YaK85e9jP+dZNzAPBgNVHRMBAf8EBTAD AQH/MA0GCSqGSIb3DQEBCwUAA4IBAQBHEA3qY2OMTOskEYRx43qnY4lMvEITpKdd 6JRwNcAwZd/nD0udXnGHqo6LtYACuFExLu9eZ7C6Po+kHpA/abKXtmC35nALd/VK tqzH4c30gjN/poVpakfaDE5M6OI1XcDieZuROuhkSVSA8iVYOG82gmV4JlaKWqkc twCoBYEVvrLYyiiRwn3V4IuyZlRCA6dZRIZwvjrhx1DptqoLSF5r1w1HjqPPJnut 09GfkfIaMsli37OdDf7299D55AF5oawW5p6RQZuwUoHABszKkAFKCJlD0EQ/Ly7N jMqegYYx1kuR8JNReGYBOXPnBaOPB8Im0Le/PNOals5XCHGdJys9',
            'query_params' => true,
            'encrypt_assertion' => false,
         ]
    ],

    // If you need to redirect after SLO depending on SLO initiator
    // key is beginning of HTTP_REFERER value from SERVER, value is redirect path
    'sp_slo_redirects' => [
        // 'https://example.com' => 'https://example.com',
    ],

    // All of the Laravel SAML IdP event / listener mappings.
    'events' => [
        'CodeGreenCreative\SamlIdp\Events\Assertion' => [],
        'Illuminate\Auth\Events\Logout' => ['CodeGreenCreative\SamlIdp\Listeners\SamlLogout'],
        'Illuminate\Auth\Events\Authenticated' => ['CodeGreenCreative\SamlIdp\Listeners\SamlAuthenticated'],
        'Illuminate\Auth\Events\Login' => ['CodeGreenCreative\SamlIdp\Listeners\SamlLogin'],
    ],

    // List of guards saml idp will catch Authenticated, Login and Logout events
    'guards' => ['web'],
];
