<?php

declare(strict_types=1);

namespace Modules\Blog\Filament\Resources\Posts\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Blog\Filament\Resources\Posts\PostResource;

final class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;
}
