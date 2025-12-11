@extends('filament::layouts.app')

@section('title', 'Documentation')

@section('content')
<div class="prose max-w-3xl mx-auto py-8">
    <h1>📚 LogisticJourney CMS – User Feature Guide</h1>
    <p>Welcome! This guide explains how to use each main feature in the system, with practical steps and examples.</p>

    <h2>1. Logging In</h2>
    <ul>
        <li>Go to <code>/app/login</code> in your browser.</li>
        <li>Enter your admin credentials.</li>
        <li>You’ll be taken to the Filament admin dashboard.</li>
    </ul>

    <h2>2. Pages</h2>
    <h3>Create a New Page</h3>
    <ol>
        <li>In the admin panel, click “Pages” in the sidebar.</li>
        <li>Click the “Create” button.</li>
        <li>Fill in the page title, slug, and other details.</li>
        <li>Add blocks (see below).</li>
        <li>Click “Save” to create the page.</li>
    </ol>
    <h3>Edit an Existing Page</h3>
    <ol>
        <li>In “Pages,” find the page you want to edit.</li>
        <li>Click the “Edit” icon (pencil).</li>
        <li>Change the title, slug, or blocks as needed.</li>
        <li>Click “Save” to update.</li>
    </ol>

    <h2>3. Blocks</h2>
    <p>Blocks are reusable content sections (like Hero, FAQ, Newsletter, Testimonial).</p>
    <h3>Add a Block to a Page</h3>
    <ol>
        <li>While editing a page, scroll to the “Blocks” section.</li>
        <li>Click “Add Block.”</li>
        <li>Choose the block type (e.g., HeroBlock, FaqsBlock).</li>
        <li>Fill in the block fields (e.g., headline, content).</li>
        <li>Click “Save” or “Add” to include it on the page.</li>
    </ol>
    <h3>Update/Edit a Block</h3>
    <ol>
        <li>Edit the page containing the block.</li>
        <li>In the “Blocks” list, find the block you want to update.</li>
        <li>Click the “Edit” (pencil) icon next to the block.</li>
        <li>Change the content (e.g., update text, images, links).</li>
        <li>Click “Save” to apply your changes.</li>
    </ol>
    <h3>Reorder Blocks</h3>
    <ul>
        <li>Drag and drop blocks up or down in the list to change their order.</li>
        <li>Click “Save” to keep the new order.</li>
    </ul>
    <h3>Delete a Block</h3>
    <ul>
        <li>Click the “Delete” (trash) icon next to the block.</li>
        <li>Confirm the deletion.</li>
        <li>Click “Save” to update the page.</li>
    </ul>

    <h2>4. Block Types & Their Usage</h2>
    <ul>
        <li><strong>HeroBlock:</strong> Use for big headers with images and call-to-action buttons.</li>
        <li><strong>FaqsBlock:</strong> Use for lists of questions and answers.</li>
        <li><strong>NewsLetterSubscription:</strong> Use for email signup forms.</li>
        <li><strong>TestimonialBlock:</strong> Use for customer reviews and ratings.</li>
    </ul>
    <p>Each block type has its own fields. Fill them in as prompted.</p>

    <h2>5. Previewing & Publishing</h2>
    <ul>
        <li>After editing, use the “Preview” button (if available) to see how your page will look.</li>
        <li>Click “Save” or “Publish” to make your changes live.</li>
    </ul>

    <h2>6. API Access (for Developers)</h2>
    <ul>
        <li>Get page data (including blocks) via: <code>GET /api/v1/pages/{slug}</code></li>
        <li>Example: <code>GET /api/v1/pages/home</code> returns all blocks and their data for the page.</li>
    </ul>

    <h2>7. Tips & Troubleshooting</h2>
    <ul>
        <li>Always click “Save” after making changes.</li>
        <li>If a block isn’t showing, check that it’s added and the page is published.</li>
        <li>For help, contact your admin or support.</li>
    </ul>

    <h2>8. Support & Help</h2>
    <ul>
        <li>Company: Lean Icon Technology & Training Ltd (LITT)</li>
        <li>Email: info@leanicontechnology.com</li>
        <li>Docs: See the main README and Blocks README for more details.</li>
    </ul>
</div>
@endsection
