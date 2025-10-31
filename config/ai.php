<?php

declare(strict_types=1);

return [
    // Global AI model enablement flags used across the app.
    // NOTE: This file only exposes configuration; wire it into your services where appropriate.
    'enabled_models' => [
        'anthropic' => [
            // "Claude Sonnet 4" availability for all tenants/clients
            // Toggle to false to disable universally or gate per-tenant in your service layer.
            'claude_sonnet_4' => true,
        ],
    ],
];
