# 🧱 Blocks Module - Advanced Content Management System

The **Blocks Module** is a revolutionary content management system that provides **modular, API-driven blocks** for Laravel applications. This system enables content creators to build dynamic pages using reusable components while providing developers with a flexible, type-safe architecture.

## 🌟 **Why This Block System is Special**

Unlike traditional CMS systems, our block architecture offers:

- **🎨 Unique Schemas**: Each block type has completely different form structures and validation rules
- **🚀 API-First**: Designed for headless CMS with any frontend framework (React, Vue, Angular, mobile)
- **� Developer Friendly**: Simple artisan commands with auto-discovery
- **📱 Admin Integration**: Beautiful Filament forms with real-time validation
- **🎯 Type Safe**: Full PHP 8.4 strict typing with comprehensive data mutations
- **🔄 Flexible Content**: Same block types, different content per page

---

## 🏗️ **System Architecture**

### **Core Components**

1. **BlockRegistry** - Auto-discovers and registers blocks from modules
2. **Block Trait** - Provides common functionality (getName, mutateData, schema)
3. **BlockEditor** - Filament component for visual block management
4. **API Integration** - Automatic block resolution in page responses

### **Data Flow**

```
Content Editor → Filament Admin → Block Storage → API Response → Frontend
     ↓              ↓               ↓              ↓            ↓
  Creates        Validates     JSON Storage    Mutates      Renders
   Blocks         Schema        Database       Data         Blocks
```

---

## 🔍 **Block Discovery System**

The system automatically discovers blocks from multiple locations:

### **Discovery Paths**
- **`app/Blocks/`** - Global application-wide blocks
- **`Modules/*/Blocks/`** - Module-specific blocks  
- **`Modules/*/src/Blocks/`** - Alternative module structure
- **`Modules/*/resources/blocks/`** - Resource-based blocks

### **Auto-Registration Process**

1. **Boot Time**: `BlocksServiceProvider` triggers auto-discovery
2. **File Scanning**: System scans all discovery paths for PHP classes
3. **Trait Detection**: Identifies classes using the `Block` trait
4. **Registration**: Adds valid blocks to the singleton registry
5. **Manifest Caching**: Production environments use cached manifest for performance

```php
// Automatic in BlocksServiceProvider
$registry = app('blocks');
if (app()->environment('production')) {
    $registry->loadManifest();
} else {
    $registry->autoDiscover();
}
```

---

## 🚀 **Getting Started**

### **1. Create Your First Block**

```bash
# Create a basic block
php artisan make:block HeroBlock --module=Website

# Create a block with Blade view (hybrid approach)  
php artisan make:block TestimonialBlock --module=Website --view
```

### **2. Discovery & Registration**

```bash
# Manually discover blocks (development)
php artisan blocks:discover

# Check registered blocks
php artisan tinker
>>> app('blocks')->all()
```

### **3. Available Commands**

| Command | Description | Options |
|---------|-------------|---------|
| `make:block {name}` | Generate new block | `--module=Module`, `--view` |
| `blocks:discover` | Refresh block registry | None |

---

## 🧩 **Block Development Guide**

### **Basic Block Structure**

Every block follows this pattern:

```php
<?php

declare(strict_types=1);

namespace Modules\Website\Blocks;

use Filament\Forms\Components\Builder\Block as BuilderBlock;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Modules\Blocks\Interfaces\Block as BlockTrait;

final class HeroBlock
{
    use BlockTrait;

    /**
     * Block identifier (auto-generated from class name if not specified)
     */
    protected static string $name = 'HeroBlock';

    /**
     * Whether this block is API-only (no Blade rendering)
     */
    protected static bool $apiOnly = true;

    /**
     * Icon for Filament admin interface
     */
    protected static ?string $icon = 'heroicon-o-photo';

    /**
     * Define the Filament form schema for this block
     */
    public static function schema(): BuilderBlock
    {
        return static::make()
            ->schema([
                TextInput::make('headline')
                    ->required()
                    ->maxLength(120)
                    ->helperText('Main headline'),
                
                RichEditor::make('content')
                    ->required()
                    ->toolbarButtons(['bold', 'italic', 'link']),
            ]);
    }

    /**
     * Transform/validate data before API response
     */
    public static function mutateData(array $data): array
    {
        return [
            'headline' => $data['headline'] ?? null,
            'content' => $data['content'] ?? null,
            // Add computed fields, validation, formatting, etc.
        ];
    }
}
```

### **🎨 Different Block Examples**

#### **Simple FAQ Block**
```php
// Simple structure - just title and content
public static function schema(): BuilderBlock
{
    return static::make()
        ->schema([
            TextInput::make('title')->required(),
            Textarea::make('content')->required(),
        ]);
}
```

#### **Complex Hero Block**  
```php
// Complex nested structure with media, styling, CTAs
public static function schema(): BuilderBlock
{
    return static::make()
        ->schema([
            Section::make('Content')
                ->schema([
                    TextInput::make('headline')->required(),
                    TextInput::make('subheadline'),
                ]),
            Section::make('Background')
                ->schema([
                    FileUpload::make('background_image')->image(),
                    Select::make('overlay')->options([...]),
                ]),
            Section::make('Call to Action')
                ->schema([
                    Toggle::make('show_cta'),
                    TextInput::make('cta_text')->visible(fn($get) => $get('show_cta')),
                ]),
        ]);
}
```

#### **Repeater-Based Testimonial Block**
```php
// Dynamic repeating content
public static function schema(): BuilderBlock
{
    return static::make()
        ->schema([
            Repeater::make('testimonials')
                ->schema([
                    TextInput::make('customer_name')->required(),
                    FileUpload::make('avatar')->avatar(),
                    Textarea::make('testimonial_text'),
                    Select::make('rating')->options(['1' => '1 Star', '5' => '5 Stars']),
                ])
                ->minItems(1)
                ->maxItems(6),
        ]);
}
```

### **📋 Block Properties**

| Property | Type | Description | Default |
|----------|------|-------------|---------|
| `$name` | `string` | Block identifier | Auto-generated from class |
| `$apiOnly` | `bool` | Skip Blade rendering | `true` |
| `$view` | `string` | Blade template path | `null` |
| `$icon` | `string` | Filament icon | `heroicon-o-cube-transparent` |

---

## 🔗 **API Integration**

### **How Blocks Appear in API Responses**

When a page is requested via API, blocks are automatically resolved and mutated:

```php
// In PageResource.php
public function toArray($request): array
{
    return [
        'id' => $this->id,
        'title' => $this->title,
        'blocks' => $this->resolvedBlocks(), // ← Automatic block resolution
    ];
}

// In Page.php model  
public function resolvedBlocks(): array
{
    return app('blocks')->resolveBlocks($this->blocks);
}
```

### **API Response Examples**

#### **Raw Database Storage**
```json
{
  "blocks": [
    {
      "type": "HeroBlock",
      "data": {
        "headline": "Welcome",
        "background_image": "/images/hero.jpg",
        "show_cta": true,
        "cta_text": "Get Started"
      }
    }
  ]
}
```

#### **Mutated API Response**
```json
{
  "blocks": [
    {
      "type": "HeroBlock", 
      "data": {
        "headline": "Welcome",
        "background": {
          "image": "/images/hero.jpg",
          "overlay": "dark"
        },
        "cta": {
          "text": "Get Started",
          "url": "#",
          "style": "primary"
        }
      }
    }
  ]
}
```

### **Manual Block Resolution**

```php
// Get registry instance
$registry = app('blocks');

// Resolve specific blocks
$resolvedBlocks = $registry->resolveBlocks([
    ['type' => 'HeroBlock', 'data' => ['headline' => 'Test']],
    ['type' => 'TestimonialBlock', 'data' => ['title' => 'Reviews']],
]);

// Get all registered block types
$allBlocks = $registry->all();

// Get Filament schemas for admin
$schemas = $registry->getSchemas();
```

---

## 🎨 **Filament Integration**

### **Visual Block Management**

The system provides seamless integration with Filament admin panels:

```php
// In PageForm.php
Section::make('Blocks & Content')
    ->schema([
        \Modules\Blocks\Filament\Forms\BlockEditor::make('blocks')
            ->label('Page Blocks')
            ->collapsed(),
    ])
```

### **Block Editor Features**

- **📝 Dynamic Forms**: Each block type shows its unique form fields
- **🔄 Drag & Drop**: Reorder blocks visually
- **📋 Clone/Delete**: Easily duplicate or remove blocks  
- **🔒 Validation**: Real-time validation based on block schema
- **👁️ Preview**: Live preview of block data structure

### **Admin Actions**

Available in `PageResource`:

```php
public static function getActions(): array
{
    return [
        \Modules\Blocks\Filament\Actions\GenerateBlockAction::make(),
        \Modules\Blocks\Filament\Actions\EditBlockClassAction::make(),
    ];
}
```

---

## 🌐 **Frontend Integration Examples**

### **React/Next.js Integration**

```javascript
// Fetch page with blocks
const response = await fetch('/api/v1/pages/home');
const { data: page } = await response.json();

// Dynamic block rendering
const BlockRenderer = ({ block }) => {
  switch (block.type) {
    case 'HeroBlock':
      return (
        <section className="hero" style={{backgroundImage: `url(${block.data.background.image})`}}>
          <h1>{block.data.headline}</h1>
          {block.data.cta && (
            <a href={block.data.cta.url} className={`btn btn-${block.data.cta.style}`}>
              {block.data.cta.text}
            </a>
          )}
        </section>
      );
      
    case 'TestimonialBlock':
      return (
        <section className="testimonials">
          <h2>{block.data.section.title}</h2>
          <div className={`layout-${block.data.display.layout}`}>
            {block.data.testimonials.map(testimonial => (
              <div key={testimonial.customer.name} className="testimonial">
                <img src={testimonial.customer.avatar} alt={testimonial.customer.name} />
                <p>"{testimonial.content}"</p>
                <cite>{testimonial.customer.name}, {testimonial.customer.title}</cite>
                {block.data.display.show_ratings && (
                  <div className="rating">{'★'.repeat(testimonial.rating)}</div>
                )}
              </div>
            ))}
          </div>
        </section>
      );
      
    default:
      return <div>Unknown block type: {block.type}</div>;
  }
};

// Render all blocks
const PageRenderer = () => (
  <div>
    {page.blocks.map((block, index) => (
      <BlockRenderer key={index} block={block} />
    ))}
  </div>
);
```

### **Vue/Nuxt Integration**

```vue
<template>
  <div class="page-content">
    <component
      v-for="(block, index) in page.blocks"
      :key="index"
      :is="getBlockComponent(block.type)"
      :data="block.data"
    />
  </div>
</template>

<script setup>
// Fetch page data
const { data: page } = await $fetch('/api/v1/pages/about');

// Component mapping
const getBlockComponent = (blockType) => {
  const components = {
    HeroBlock: 'BlockHero',
    TestimonialBlock: 'BlockTestimonials',
    NewsLetterSubscription: 'BlockNewsletter',
  };
  return components[blockType] || 'BlockDefault';
};
</script>
```

### **Mobile App Integration (React Native)**

```javascript
// Block component mapping
const BlockComponents = {
  HeroBlock: ({ data }) => (
    <View style={styles.hero}>
      <ImageBackground source={{uri: data.background.image}}>
        <Text style={styles.headline}>{data.headline}</Text>
        {data.cta && (
          <TouchableOpacity style={styles.ctaButton}>
            <Text>{data.cta.text}</Text>
          </TouchableOpacity>
        )}
      </ImageBackground>
    </View>
  ),
  
  TestimonialBlock: ({ data }) => (
    <ScrollView horizontal={data.display.layout === 'carousel'}>
      {data.testimonials.map(testimonial => (
        <View key={testimonial.customer.name} style={styles.testimonial}>
          <Image source={{uri: testimonial.customer.avatar}} />
          <Text>"{testimonial.content}"</Text>
          <Text>{testimonial.customer.name}</Text>
        </View>
      ))}
    </ScrollView>
  ),
};
```

---

## 🏗️ **Advanced Use Cases**

### **Block Composition**

```php
// Create complex blocks that include other blocks
class LandingPageBlock
{
    public static function schema(): BuilderBlock
    {
        return static::make()
            ->schema([
                Builder::make('sections')
                    ->blocks([
                        HeroBlock::schema(),
                        TestimonialBlock::schema(),
                        NewsLetterSubscription::schema(),
                    ])
            ]);
    }
}
```

### **Conditional Block Logic**

```php
public static function mutateData(array $data): array
{
    $result = [
        'title' => $data['title'] ?? null,
        'content' => $data['content'] ?? null,
    ];
    
    // Add computed fields based on conditions
    if (isset($data['show_social_links']) && $data['show_social_links']) {
        $result['social_links'] = SocialMediaService::getLinks();
    }
    
    // Format dates
    if (isset($data['publish_date'])) {
        $result['formatted_date'] = Carbon::parse($data['publish_date'])->format('F j, Y');
    }
    
    return $result;
}
```

### **Block Relationships**

```php
// Preload related data for multiple blocks
public static function preloadRelatedData(Page $page, array &$blocks): void
{
    $testimonialBlocks = collect($blocks)->where('type', 'TestimonialBlock');
    
    if ($testimonialBlocks->isNotEmpty()) {
        // Preload customer avatars, optimize queries, etc.
        $customerIds = $testimonialBlocks->pluck('data.customer_ids')->flatten();
        $customers = Customer::whereIn('id', $customerIds)->get();
        // Cache or attach to blocks...
    }
}
```

---

## � **Performance Optimization**

### **Production Caching**

```php
// In production, blocks are cached via manifest
// storage/app/blocks_manifest.json contains:
{
  "Modules\\Website\\Blocks\\HeroBlock": {
    "name": "HeroBlock",
    "path": "/path/to/HeroBlock.php", 
    "module": "Website"
  }
}
```

### **Best Practices**

- **✅ Keep blocks lightweight**: Avoid heavy computations in `mutateData()`
- **✅ Use eager loading**: Preload relationships in `preloadRelatedData()`
- **✅ Cache external API calls**: Store results in block data or separate cache
- **✅ Optimize images**: Use proper image optimization for media blocks
- **✅ Validate early**: Use Filament validation to catch issues before storage

---

## 🔧 **Troubleshooting**

### **Common Issues**

#### **Block Not Discovered**
```bash
# Check if block is properly structured
php artisan blocks:discover

# Verify trait usage
php artisan tinker
>>> class_uses_recursive(Modules\Website\Blocks\MyBlock::class);
```

#### **Filament Form Not Showing**
```php
// Ensure schema() method returns BuilderBlock
public static function schema(): BuilderBlock
{
    return static::make() // ← Must call static::make()
        ->schema([/* ... */]);
}
```

#### **API Data Not Mutated**
```php
// Verify PageResource uses resolvedBlocks()
'blocks' => $this->resolvedBlocks(), // ← Not $this->blocks
```

### **Debug Commands**

```bash
# Check registered blocks
php artisan tinker --execute="dd(app('blocks')->all())"

# Verify manifest
cat storage/app/blocks_manifest.json | jq

# Test API response
curl localhost:8000/api/v1/pages/home | jq '.data.blocks'
```

---

## 🎯 **Migration Guide**

### **From Traditional CMS**

1. **Identify Content Types**: Map existing content to block types
2. **Create Block Classes**: Generate blocks with `make:block`
3. **Migrate Data**: Transform existing content to block JSON format
4. **Update Frontend**: Replace static templates with dynamic block rendering

### **From Blade-Based Blocks**

1. **Extract Logic**: Move Blade logic to `mutateData()` methods
2. **API-First**: Return structured data instead of HTML
3. **Frontend Components**: Create corresponding frontend components
4. **Gradual Migration**: Use `$apiOnly = false` during transition

---

## 📚 **Additional Resources**

- **[Main Application README](../../README.md)** - Full application documentation
- **[Pages API Documentation](../Website/PAGES_API.md)** - API endpoint reference
- **[Filament Documentation](https://filamentphp.com/docs)** - Admin panel framework
- **[Laravel Modules](https://nwidart.com/laravel-modules)** - Module structure

---

## 🏁 **Conclusion**

The **Blocks Module** provides a **revolutionary approach** to content management that combines:

- **🎨 Creative Freedom**: Unique schemas per block type
- **🚀 Developer Experience**: Simple commands and auto-discovery  
- **📱 Modern Architecture**: API-first, frontend-agnostic design
- **🔧 Enterprise Ready**: Type-safe, performant, and scalable

This system **empowers content creators** while providing **developers with flexibility** to build sophisticated, maintainable applications that can evolve with changing requirements.

**Ready to build something amazing? Start creating your first block today!** 🚀
