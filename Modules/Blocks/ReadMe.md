# Blocks Module

The **Blocks Module** provides a unified and extensible system for managing dynamic content blocks across your Laravel modular application. Inspired by **Filament Fabricator**, this module replaces Blade-based block rendering with **API-driven** blocks, allowing you to serve and reuse content across multiple modules and frontend frameworks.

---

## 📦 Overview

Blocks are reusable content components (e.g., Hero, Banner, Testimonials, Blog List) that can be dynamically registered and used across modules such as **Website**, **Blog**, or **Careers**.

Each block is represented by a PHP class extending the `Block` base class and can include logic for data mutation, validation, and API serialization.

---

## 🧱 Block Discovery

Blocks can be automatically discovered from the following paths:

* `app/Blocks` — for global application-wide blocks.
* `Modules/*/Blocks` — for module-specific blocks.

The `BlockRegistry` handles automatic discovery and registration of blocks at runtime.

---

## ⚙️ Usage

### 1. Auto-discover Blocks

Ensure that your service provider (e.g., `BlocksServiceProvider`) calls:

```php
\Modules\Blocks\Interfaces\BlockRegistry::autoDiscover();
```

This scans and registers all blocks located in the defined paths.

### 2. Create a Block

You can generate a new block using the custom artisan command:

```bash
php artisan make:block HeroBlock --module=Website
```

#### Options

* `--module` → Specify which module to create the block in.
* `--view` → Generate a Blade view for the block (for hybrid rendering).

If no module is provided, the block will be created in `app/Blocks`.

---

## 🧩 Block Structure

Each block class should extend the `Block` base class and implement the following methods:

```php
namespace Modules\Website\Blocks;

use Modules\Blocks\Interfaces\Block;

class HeroBlock extends Block
{
    public static function getName(): string
    {
        return 'hero';
    }

    public static function mutateData(array $data): array
    {
        // Modify or format block data before rendering or API output
        return $data;
    }
}
```

---

## 🔗 API Integration

Blocks are designed to be rendered via APIs instead of Blade templates.
You can resolve blocks from JSON data and serve them through endpoints:

```php
$blocks = BlockRegistry::resolveBlocks($page->content_blocks);
return response()->json($blocks);
```

---

## 🧭 Roadmap

* [ ] Add caching for discovered blocks
* [ ] Add Filament integration for managing blocks visually
* [ ] Add block versioning and metadata
* [ ] Add support for JSON schema validation per block

---

## 💡 Best Practices

* Keep blocks modular and independent.
* Use API serialization instead of Blade for dynamic rendering.
* Group related blocks in their respective module folders.
* Maintain global blocks in `app/Blocks` for reuse.

---

## 📘 Example Directory Structure

```
app/
  Blocks/
    HeroBlock.php
Modules/
  Website/
    Blocks/
      BannerBlock.php
  Blog/
    Blocks/
      FeaturedPostsBlock.php
```

---

## 🧰 Dependencies

* Laravel 10+
* nwidart/laravel-modules or coolsam/modules
* Filament (optional for block management UI)

---

## 🏁 Conclusion

The **Blocks Module** bridges the gap between content flexibility and modular architecture, empowering developers to build API-driven dynamic pages across their Laravel ecosystem while maintaining clean separation of concerns.
