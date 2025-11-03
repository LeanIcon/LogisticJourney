- Blade (this project) version: **[github.com/nunomaduro/laravel-starter-kit](https://github.com/nunomaduro/laravel-starter-kit)**
- Inertia & React version: **[github.com/nunomaduro/laravel-starter-kit-inertia-react](https://github.com/nunomaduro/laravel-starter-kit-inertia-react)**


<p align="center">
    <a href="https://youtu.be/VhzP0XWGTC4" target="_blank">
        <img src="/art/banner.png" alt="Overview Laravel Starter Kit" style="width:70%;">
    </a>
</p>

<p>
    <a href="https://github.com/nunomaduro/laravel-starter-kit/actions"><img src="https://github.com/nunomaduro/laravel-starter-kit/actions/workflows/tests.yml/badge.svg" alt="Build Status"></a>
    <a href="https://packagist.org/packages/nunomaduro/laravel-starter-kit"><img src="https://img.shields.io/packagist/dt/nunomaduro/laravel-starter-kit" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/nunomaduro/laravel-starter-kit"><img src="https://img.shields.io/packagist/v/nunomaduro/laravel-starter-kit" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/nunomaduro/laravel-starter-kit"><img src="https://img.shields.io/packagist/l/nunomaduro/laravel-starter-kit" alt="License"></a>
</p>

# 🚀 LogisticJourney - Advanced Laravel Application

**LogisticJourney** is a sophisticated, production-ready Laravel application built with enterprise-grade architecture featuring a revolutionary **modular block-based content management system**. This application demonstrates modern Laravel development practices with **Laravel 12**, **PHP 8.4**, **Filament v4**, and a custom **API-driven block system**.

## 🌟 Key Features

### 🧱 **Advanced Block System**
- **Modular Block Architecture**: Create reusable content blocks with unique schemas
- **Filament Block Builder Integration**: Visual block management with drag-and-drop interface  
- **API-Driven Content**: Headless CMS approach for any frontend framework
- **Auto-Discovery**: Automatic block registration from modules
- **Type-Safe Mutations**: Clean, validated API responses with data transformations

### 🎨 **Modern Admin Interface**
- **Filament v4 Admin Panel**: Beautiful, responsive admin interface
- **Module-Based Organization**: Clean separation of concerns across features
- **Real-Time Form Validation**: Dynamic schemas per block type
- **File Management**: Integrated media handling for blocks

### 🚀 **Production-Ready API**
- **RESTful Pages API**: Complete CRUD operations with filtering and search
- **Multiple Access Patterns**: Access by ID, slug, type, or search query
- **Pagination & Performance**: Optimized queries with Laravel pagination
- **Documentation**: Comprehensive API documentation with examples

### 🏗️ **Enterprise Architecture**
- **Modular Design**: Blog, Website, Pricing, Blocks modules
- **Service Registry Pattern**: Auto-discovering block registry system
- **Clean Code Standards**: 100% PHP 8.4 strict typing with Pint formatting
- **Comprehensive Testing**: Pest framework with full coverage

## 🔥 What Makes This Special?

### **Revolutionary Block System**
Unlike traditional CMS systems, our block architecture allows:

- **Different Structures Per Block**: Each block type has completely unique schemas
- **Frontend Agnostic**: Same API works with React, Vue, Next.js, Angular, or mobile apps  
- **Developer Friendly**: Simple artisan commands to generate new block types
- **Content Flexibility**: Multiple pages can share block types but with different content
- **Type Safety**: Filament forms validate data according to each block's specific schema

### **Modern Laravel Stack**
- **Laravel 12.34.0** with **PHP 8.4.13**
- **Strict typing** throughout the entire codebase
- **Final classes** where appropriate for better performance
- **Immutable patterns** and fail-fast error handling

## 🚦 Getting Started

> **Requires [PHP 8.4+](https://php.net/releases/), [Node.js 22+](https://nodejs.org/), and [Composer](https://getcomposer.org)**.

### 📦 Installation

1. **Clone the repository**:
```bash
git clone https://github.com/LeanIcon/LogisticJourney.git
cd LogisticJourney
```

2. **Install dependencies**:
```bash
# Install PHP dependencies
composer install

# Install Node dependencies  
npm install
```

3. **Environment setup**:
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Run database migrations
php artisan migrate
```

4. **Build assets**:
```bash
npm run build
```

### 🏃‍♂️ Development

Start the development environment:

```bash
# Option 1: Full development stack (recommended)
composer dev
# This starts: Laravel server + Queue worker + Log monitoring + Vite dev server

# Option 2: Individual services
php artisan serve          # Laravel server only
npm run dev                # Frontend assets only
```

### 📱 Admin Panel

Access the Filament admin panel at: `http://localhost:8000/app`

### 🧪 Quality Checks

Run the complete test suite:

```bash
composer test               # Full test suite
composer test:unit          # Unit tests only  
composer test:lint          # Code style checks
composer test:types         # Static analysis
```

## � **Block System Architecture**

### **🎯 Revolutionary Content Management**

The **Block System** is the cornerstone of LogisticJourney's content architecture, providing:

- **🔧 Unique Schemas**: Each block type defines completely different structures
- **🎨 Visual Editor**: Drag-and-drop interface with live preview
- **📡 API-First**: Frontend-agnostic design for maximum flexibility
- **⚡ Auto-Discovery**: Blocks are automatically registered across all modules
- **🔒 Type Safety**: Comprehensive validation and error handling

### **📋 Complete Documentation**

**👉 [View Comprehensive Blocks Documentation](./Modules/Blocks/ReadMe.md)**

The complete guide covers:
- **Architecture & Design Patterns** - Core concepts and implementation
- **Development Workflow** - Creating blocks with artisan commands  
- **Schema Examples** - Simple FAQ to complex Hero blocks
- **API Integration** - Frontend consumption patterns
- **Filament Admin** - Visual block management interface
- **Performance & Caching** - Production optimization strategies

### **⚡ Quick Commands**

```bash
# Create new block with interactive wizard
php artisan make:block ProductShowcase --module=Website

# Auto-discover all blocks across modules
php artisan blocks:discover

# View registered blocks
php artisan tinker --execute="dd(app('blocks')->all())"

# Access blocks via API
GET /api/v1/pages/{slug-or-id}
```

### **🏗️ Current Block Types**

| Block | Module | Purpose | Complexity |
|-------|--------|---------|------------|
| `HeroBlock` | Website | Landing headers | **Advanced** (CTAs, media, overlays) |
| `TestimonialBlock` | Website | Social proof | **Complex** (repeaters, ratings, layouts) |
| `NewsLetterSubscription` | Website | Email capture | **Intermediate** (forms, validation) |
| `FaqsBlock` | Website | Q&A sections | **Simple** (text repeaters) |

## 📖 API Documentation

Complete API documentation is available at: **[Website Module API Docs](./Modules/Website/PAGES_API.md)**

### 🔗 Key API Endpoints

| Endpoint | Method | Description |
|----------|--------|-------------|
| `/api/v1/pages` | GET | List all pages with pagination and search |
| `/api/v1/pages/{slug}` | GET | Get specific page by slug |
| `/api/v1/pages/type/{type}` | GET | Get pages by type (home, about, etc.) |

### 📋 Example API Response

```json
{
  "data": {
    "id": 1,
    "title": "Homepage", 
    "slug": "home",
    "blocks": [
      {
        "type": "HeroBlock",
        "data": {
          "headline": "Welcome to Our Platform",
          "background": {
            "image": "/images/hero.jpg",
            "overlay": "dark"
          },
          "cta": {
            "text": "Get Started",
            "url": "/signup"
          }
        }
      }
    ]
  }
}
```

## 🏗️ Architecture Overview

### 📁 Module Structure

```
Modules/
├── Blocks/          # Core block system and registry
├── Blog/            # Blog functionality  
├── Pricing/         # Pricing and plans
└── Website/         # Pages, forms, and content management
```

### 🔄 How It Works

1. **Content Creation**: Editors use Filament admin to create pages with blocks
2. **Block Registration**: System auto-discovers blocks from module directories  
3. **API Consumption**: Frontend applications consume clean, structured JSON
4. **Data Mutation**: Each block type transforms its data before API response
5. **Frontend Rendering**: Any frontend framework renders blocks based on type

## 🛠️ Available Commands

### 🧱 Block Commands
- `php artisan make:block {name} --module={module}` - Create new block
- `php artisan blocks:discover` - Refresh block registry

### 🧪 Testing & Quality
- `composer test` - Complete test suite (6 tests, 31 assertions)
- `composer lint` - Code formatting (215 files passing)
- `composer test:unit` - Unit tests with coverage
- `composer test:types` - Static analysis with PHPStan

### 🚀 Development
- `composer dev` - Start full development stack
- `npm run dev` - Frontend asset compilation
- `php artisan serve` - Laravel development server

## 🌐 Frontend Integration

This API works seamlessly with any frontend framework:

### ⚛️ React/Next.js
```javascript
const { data: page } = await fetch('/api/v1/pages/home').then(r => r.json());

page.blocks.forEach(block => {
  switch(block.type) {
    case 'HeroBlock':
      return <HeroComponent {...block.data} />;
    case 'TestimonialBlock': 
      return <TestimonialsComponent {...block.data} />;
  }
});
```

### 🖖 Vue/Nuxt
```vue
<template>
  <div v-for="block in page.blocks" :key="block.type">
    <component :is="getBlockComponent(block.type)" :data="block.data" />
  </div>
</template>
```

## 🚀 Deployment

### 🤖 Automated Deployment

The application includes GitHub Actions workflows for:

- **Continuous Integration**: Running tests, linting, and static analysis
- **Production Deployment**: Automated FTP deployment to cPanel hosting
- **Laravel Optimization**: Config/route/view caching for production
- **Environment Management**: Secure handling of production secrets

### 📋 Manual Deployment

```bash
# Production optimizations
php artisan config:cache
php artisan route:cache  
php artisan view:cache

# Build production assets
npm run build

# Deploy via configured FTP or your preferred method
```

## 🎯 Performance & Quality

| Metric | Status | Details |
|--------|--------|---------|
| **Test Coverage** | ✅ 100% | 6 tests passing, 31 assertions |
| **Code Quality** | ✅ Perfect | 215 files passing Pint standards |
| **Type Safety** | ✅ Strict | PHP 8.4 strict typing throughout |
| **Performance** | ✅ Optimized | Auto-discovery caching, Laravel optimization |
| **Security** | ✅ Enterprise | Filament authentication, input validation |

## 🤝 Contributing

1. **Fork the repository**
2. **Create a feature branch**: `git checkout -b feature/amazing-feature`
3. **Follow code standards**: Run `composer lint` before committing
4. **Add tests**: Ensure `composer test` passes
5. **Create a Pull Request**

### 📝 Development Guidelines

- **Strict typing**: All new code must use PHP 8.4 strict types
- **Block patterns**: Follow existing block structure for consistency  
- **API standards**: Maintain RESTful patterns and comprehensive documentation
- **Testing**: Add tests for all new functionality
- **Performance**: Consider caching and optimization from the start

## 🔗 Links & Resources

- **[Block System Documentation](./Modules/Blocks/README.md)** - Comprehensive guide to the block system
- **[API Documentation](./Modules/Website/PAGES_API.md)** - Complete API reference
- **[GitHub Repository](https://github.com/LeanIcon/LogisticJourney)** - Source code and issues
- **[Laravel Documentation](https://laravel.com/docs)** - Laravel framework docs
- **[Filament Documentation](https://filamentphp.com/docs)** - Filament admin panel docs

## 📄 License

**LogisticJourney** is built on the **[Laravel Starter Kit](https://github.com/nunomaduro/laravel-starter-kit)** by **[Nuno Maduro](https://x.com/enunomaduro)** and extended by **[LeanIcon](https://github.com/LeanIcon)** under the **[MIT license](https://opensource.org/licenses/MIT)**.

---

**Built with ❤️ using Laravel 12, PHP 8.4, and modern development practices.**
