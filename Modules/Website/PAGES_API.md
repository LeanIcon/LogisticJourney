# Pages API Documentation

## Overview
The Pages API provides public access to website content pages including Home, About Us, Contact Us, and custom pages. Pages support hierarchical relationships (parent/child) and block-based content rendering.

---

## Endpoints

### 1. List All Pages
**GET** `/api/v1/pages`

Retrieve a paginated list of published pages.

#### Query Parameters
| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `type` | string | null | Filter by page type (home, about, contact, custom, etc.) |
| `q` | string | null | Search in title, slug, or content |
| `per_page` | integer | 15 | Items per page (max: 100) |
| `include_hierarchy` | boolean | false | Include parent/children relationships |

#### Example Requests
```bash
# Get all pages
curl https://your-domain.com/api/v1/pages

# Filter by type
curl https://your-domain.com/api/v1/pages?type=about

# Search pages
curl https://your-domain.com/api/v1/pages?q=contact

# Include parent/child relationships
curl https://your-domain.com/api/v1/pages?include_hierarchy=true
```

#### Example Response
```json
{
  "data": [
    {
      "id": 1,
      "title": "About Us",
      "slug": "about-us",
      "type": "about",
      "url": "https://your-domain.com/about-us",
      "content": "Legacy text content...",
      "blocks": [
        {
          "type": "hero",
          "data": { "title": "About Our Company" }
        }
      ],
      "parent_id": null,
      "meta": {
        "title": "About Us | Company Name",
        "description": "Learn about our story..."
      },
      "status": "published",
      "created_at": "2025-10-27T10:00:00Z",
      "updated_at": "2025-10-27T12:00:00Z"
    }
  ],
  "links": { ... },
  "meta": { ... }
}
```

---

### 2. Get Page by Slug or ID
**GET** `/api/v1/pages/{identifier}`

Retrieve a single page by its slug (SEO-friendly) or numeric ID.

#### Path Parameters
| Parameter | Type | Description |
|-----------|------|-------------|
| `identifier` | string\|int | Page slug (e.g., "about-us") or ID (e.g., 1) |

#### Query Parameters
| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `include_hierarchy` | boolean | false | Include parent/children relationships |

#### Example Requests
```bash
# By slug (recommended for SEO)
curl https://your-domain.com/api/v1/pages/about-us

# By ID
curl https://your-domain.com/api/v1/pages/1

# With hierarchy
curl https://your-domain.com/api/v1/pages/about-us?include_hierarchy=true
```

#### Example Response
```json
{
  "data": {
    "id": 1,
    "title": "About Us",
    "slug": "about-us",
    "type": "about",
    "url": "https://your-domain.com/about-us",
    "content": null,
    "blocks": [
      {
        "type": "heading",
        "data": { "text": "Our Story", "level": 1 }
      },
      {
        "type": "paragraph",
        "data": { "text": "Founded in 2020..." }
      },
      {
        "type": "image",
        "data": { "url": "/images/team.jpg", "alt": "Our Team" }
      }
    ],
    "parent_id": null,
    "parent": null,
    "children": [
      {
        "id": 5,
        "title": "Our Team",
        "slug": "about-us/team",
        "url": "https://your-domain.com/about-us/team"
      }
    ],
    "meta": {
      "title": "About Us | Company Name",
      "description": "Learn about our mission and values"
    },
    "status": "published",
    "created_at": "2025-10-27T10:00:00Z",
    "updated_at": "2025-10-27T12:00:00Z"
  }
}
```

---

### 3. Get Page by Type
**GET** `/api/v1/pages/type/{type}`

Convenience endpoint to fetch a specific page by its type. Useful for frontend to load standard pages like Home, About, Contact.

#### Path Parameters
| Parameter | Type | Description |
|-----------|------|-------------|
| `type` | string | Page type (home, about, contact, custom, etc.) |

#### Query Parameters
| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `include_hierarchy` | boolean | false | Include parent/children relationships |

#### Common Page Types
- `home` - Homepage
- `about` - About Us page
- `contact` - Contact Us page
- `privacy` - Privacy Policy
- `terms` - Terms & Conditions
- `custom` - Custom landing pages

#### Example Requests
```bash
# Get homepage
curl https://your-domain.com/api/v1/pages/type/home

# Get about page
curl https://your-domain.com/api/v1/pages/type/about

# Get contact page
curl https://your-domain.com/api/v1/pages/type/contact
```

#### Example Response
Same structure as "Get Page by Slug or ID" endpoint.

---

## Blocks Structure

Pages support block-based content rendering. The `blocks` field contains a JSON array of content blocks.

### Common Block Types

#### Hero Block
```json
{
  "type": "hero",
  "data": {
    "title": "Welcome to Our Site",
    "subtitle": "Your journey starts here",
    "backgroundImage": "/images/hero-bg.jpg",
    "ctaText": "Get Started",
    "ctaUrl": "/signup"
  }
}
```

#### Heading Block
```json
{
  "type": "heading",
  "data": {
    "text": "Our Services",
    "level": 2
  }
}
```

#### Paragraph Block
```json
{
  "type": "paragraph",
  "data": {
    "text": "We provide world-class solutions..."
  }
}
```

#### Image Block
```json
{
  "type": "image",
  "data": {
    "url": "/images/product.jpg",
    "alt": "Product showcase",
    "caption": "Our flagship product"
  }
}
```

#### Feature List Block
```json
{
  "type": "features",
  "data": {
    "items": [
      { "icon": "check", "title": "Fast", "description": "Lightning speed" },
      { "icon": "shield", "title": "Secure", "description": "Bank-level security" }
    ]
  }
}
```

#### CTA (Call to Action) Block
```json
{
  "type": "cta",
  "data": {
    "title": "Ready to get started?",
    "description": "Join thousands of satisfied customers",
    "buttonText": "Sign Up Now",
    "buttonUrl": "/register"
  }
}
```

---

## Use Cases

### Frontend Application Integration

#### React/Next.js Example
```javascript
// Fetch homepage
const response = await fetch('https://api.example.com/api/v1/pages/type/home');
const { data: page } = await response.json();

// Render blocks dynamically
page.blocks.forEach(block => {
  switch(block.type) {
    case 'hero':
      return <HeroSection {...block.data} />;
    case 'paragraph':
      return <p>{block.data.text}</p>;
    // ... handle other block types
  }
});
```

#### Vue/Nuxt Example
```javascript
// Fetch about page by slug
const { data } = await useFetch('https://api.example.com/api/v1/pages/about-us');

// Component
<template>
  <div v-for="block in data.blocks" :key="block.type">
    <component :is="getBlockComponent(block.type)" :data="block.data" />
  </div>
</template>
```

---

## Error Responses

### 404 Not Found
```json
{
  "message": "No query results for model [Modules\\Website\\Models\\Page]."
}
```

### 422 Validation Error (if applicable)
```json
{
  "message": "The given data was invalid.",
  "errors": {
    "type": ["The type field is required."]
  }
}
```

---

## Best Practices

1. **Use Slug-based URLs** - Always prefer `/pages/about-us` over `/pages/1` for SEO
2. **Cache Responses** - Pages rarely change; implement client-side caching
3. **Fetch by Type** - Use `/pages/type/{type}` for standard pages like home/about/contact
4. **Include Hierarchy Sparingly** - Only request when building navigation menus
5. **Block Rendering** - Create reusable components for each block type
6. **Handle Missing Blocks** - Gracefully handle unknown block types in your frontend

---

## Notes

- All endpoints return **published pages only** (status = 'published')
- Pagination uses Laravel's standard format (links + meta)
- `blocks` field is JSON - can be null if using legacy `content` field
- `url` attribute is automatically generated based on slug
- Parent/child relationships support unlimited nesting depth
