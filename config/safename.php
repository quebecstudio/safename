<?php

declare(strict_types=1);

/**
 * SafeName Configuration
 *
 * This configuration file defines lists of reserved words for username validation.
 *
 * Usage in application:
 *
 * 1. Using the validation rule in requests:
 *    $request->validate([
 *        'username' => ['required', new \Quebecstudio\SafeName\Rules\SafeName()]
 *    ]);
 *
 * 2. Custom configuration:
 *    Publish the config:
 *    php artisan vendor:publish --tag="safename"
 *
 *    Then modify this file in your config/safename.php
 *
 * Validation logic:
 * - exact: Must match the complete string (case-insensitive)
 *   e.g., if 'admin' is exact, 'admin1' will pass but 'admin' will fail
 *
 * - partial: Will match any part of the string (case-insensitive)
 *   e.g., if 'admin' is partial, both 'admin' and 'admin1' will fail
 */
return [
    'exact' => [
        'admin',        // Basic admin account
        'root',         // System administrator reference
        'mod',          // Short for moderator
        'user',         // Generic username prevention
        'guest',        // Common default account name
        'ceo',          // Executive title
        'god',          // Prevent superiority claims
    ],
    'partial' => [
        'admin',        // Blocks: administrator, superadmin, adminuser, etc.
        'moderator',    // Blocks: moderatorhelper, comoderator, etc.
        'master',       // Blocks: webmaster, masteradmin, etc.
        'super',        // Blocks: superuser, superman, supermaster, etc.
        'controller',   // Blocks: maincontroller, sitecontroller, etc.
        'founder',      // Blocks: cofounder, founder123, etc.
        'chief',        // Blocks: chiefadmin, chiefmoderator, etc.
        'owner',        // Blocks: siteowner, owner_admin, etc.
        'president',    // Blocks: vicepresident, president_mod, etc.
    ]
];
