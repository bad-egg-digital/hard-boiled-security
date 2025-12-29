<?php

namespace bedhbs;

/*
 * Generating short hashes in PHP
 * Roy Tanck · Posted on October 17, 2021
 * https://roytanck.com/2021/10/17/generating-short-hashes-in-php/
 *
 */


/**
 * Create a short, fairly unique, urlsafe hash for the input string.
 */
function shorthash( $input, $length = 8 )
{
    // Create a raw binary sha256 hash and base64 encode it.
    $hash_base64 = base64_encode( hash( 'sha256', $input, true ) );
    // Replace non-urlsafe chars to make the string urlsafe.
    $hash_urlsafe = strtr( $hash_base64, '+/', '-_' );
    // Trim base64 padding characters from the end.
    $hash_urlsafe = rtrim( $hash_urlsafe, '=' );
    // Shorten the string before returning.
    return substr( $hash_urlsafe, 0, $length );
}
