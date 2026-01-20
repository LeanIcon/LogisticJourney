
<div x-data="{ tab: 'getting-started' }" class="min-h-screen bg-white">
    <div class="flex flex-col md:flex-row">
        <!-- Tabs Navigation -->
        <nav class="flex md:flex-col gap-2 bg-[#052148] text-white py-4 px-4 md:py-8 md:px-6 shadow-lg md:w-64 md:h-screen md:sticky md:top-0 overflow-auto">
              <button @click="tab = 'getting-started'" :class="tab === 'getting-started' ? 'bg-[#ff751f] text-white' : 'hover:bg-[#ff751f] hover:text-white'" class="w-full px-4 py-2 font-semibold text-left transition-colors rounded-lg">Getting Started</button>
              <button @click="tab = 'general'" :class="tab === 'general' ? 'bg-[#ff751f] text-white' : 'hover:bg-[#ff751f] hover:text-white'" class="w-full px-4 py-2 font-semibold text-left transition-colors rounded-lg">General</button>
              <button @click="tab = 'developer-docs'" :class="tab === 'developer-docs' ? 'bg-[#ff751f] text-white' : 'hover:bg-[#ff751f] hover:text-white'" class="w-full px-4 py-2 font-semibold text-left transition-colors rounded-lg">Developer Docs</button>
        </nav>

        <!-- Main Content -->
        <main class="flex-1 p-6 md:p-10 bg-white text-[#052148]">
            <div class="max-w-4xl mx-auto leading-relaxed text-slate-800">
                <h1 class="mb-8 text-3xl font-bold text-slate-900">Admin Panel Documentation</h1>

            <!-- Getting Started Tab -->
            <section x-show="tab === 'getting-started'" class="mb-10 space-y-4" x-cloak>
                <h2 id="getting-started" class="flex items-center mb-3 text-2xl font-semibold text-slate-900">Getting Started<a href="#getting-started" class="ml-2 text-[#ff751f] no-underline">#</a></h2>
                <p class="mb-2 text-base">Welcome to the Logistics Journey Admin Panel. This guide will get you productive quickly and point out the main admin features.</p>

                <h3 id="quick-start" class="flex items-center mt-6 mb-2 text-xl font-semibold text-slate-800">Quick Start<a href="#quick-start" class="ml-2 text-[#ff751f] no-underline">#</a></h3>
                <ul class="pl-6 mb-2 list-disc">
                    <li>Sign in with your admin account via the login page.</li>
                    <li>Open the <strong>Dashboard</strong> to view system health and recent activity.</li>
                    <li>Use the sidebar to jump to Resources (Blog, Pricing, Website, Blocks), Users, and Settings.</li>
                </ul>

                <h3 id="core-admin-features" class="flex items-center mt-6 mb-2 text-xl font-semibold text-slate-800">Core Admin Features<a href="#core-admin-features" class="ml-2 text-[#ff751f] no-underline">#</a></h3>
                <ul class="pl-6 mb-2 list-disc">
                    <li><strong>Dashboard</strong> — high-level metrics, recent events, and quick actions.</li>
                    <li><strong>Users</strong> — manage user accounts, roles, and permissions.</li>
                    <li><strong>Content / Modules</strong> — create and edit items in Blog, Pricing, Website, and Blocks modules.</li>
                    <li><strong>Settings</strong> — update branding, mail, integrations, and environment-related configuration.</li>
                    <li><strong>Jobs & Health</strong> — monitor queue heartbeats and database health checks.</li>
                </ul>
            </section>

            <!-- General Tab -->
            <section x-show="tab === 'general'" class="mb-10 space-y-4" x-cloak>
                <h2 id="user-guide" class="flex items-center mb-3 text-2xl font-semibold text-slate-900">User Guide &amp; Feature Documentation<a href="#user-guide" class="ml-2 text-[#ff751f] no-underline">#</a></h2>

                <p class="mb-4 text-base">Welcome to the LogisticJourney CMS user documentation. This guide explains how to navigate the system, manage content, and work efficiently with pages, blocks, and developer APIs.</p>

                <ol class="pl-6 mb-4 list-decimal">
                    <li class="mb-3">
                        <h3 id="accessing-the-system" class="flex items-center text-lg font-semibold text-slate-800">Accessing the System<a href="#accessing-the-system" class="ml-2 text-[#ff751f] no-underline">#</a></h3>
                        <p class="mb-2 text-base"><strong>Logging In</strong></p>
                        <ul class="pl-6 mb-2 list-disc">
                            <li>Visit <code>/app/login</code> in your browser.</li>
                            <li>Enter your administrator credentials.</li>
                            <li>You will be redirected to the Filament Admin Dashboard.</li>
                        </ul>
                    </li>

                    <li class="mb-3">
                        <h3 id="managing-pages" class="flex items-center text-lg font-semibold text-slate-800">Managing Pages<a href="#managing-pages" class="ml-2 text-[#ff751f] no-underline">#</a></h3>
                        <p class="mb-2 text-base">The Pages module allows you to create and maintain dynamic webpages using reusable content blocks.</p>

                        <h4 class="mt-3 font-semibold">Creating a New Page</h4>
                        <ol class="pl-6 mb-2 list-decimal">
                            <li>From the Filament sidebar, select <strong>Pages</strong>.</li>
                            <li>Click <strong>Create</strong>.</li>
                            <li>Complete required fields: <strong>Page Title</strong>, <strong>Slug</strong> (URL path), and <strong>Metadata</strong> (if available).</li>
                            <li>Scroll to the <strong>Blocks</strong> section and add content blocks as needed.</li>
                            <li>Click <strong>Save</strong> to publish the new page.</li>
                        </ol>

                        <h4 class="mt-3 font-semibold">Editing an Existing Page</h4>
                        <ol class="pl-6 mb-2 list-decimal">
                            <li>Navigate to <strong>Pages</strong> in the sidebar.</li>
                            <li>Locate the page you wish to update and click the <strong>Edit</strong> (pencil) icon.</li>
                            <li>Adjust the page title, slug, metadata, or blocks.</li>
                            <li>Click <strong>Save</strong> to apply your updates.</li>
                        </ol>
                    </li>

                    <li class="mb-3">
                        <h3 id="content-blocks" class="flex items-center text-lg font-semibold text-slate-800">Content Blocks<a href="#content-blocks" class="ml-2 text-[#ff751f] no-underline">#</a></h3>
                        <p class="mb-2 text-base">Blocks are modular, reusable content components that allow you to construct rich pages without custom coding.</p>
                        <p class="mb-2 text-base"><strong>Examples:</strong> Hero banners, FAQs, Testimonials, Newsletter sections.</p>

                        <h4 class="mt-3 font-semibold">Adding a Block to a Page</h4>
                        <ol class="pl-6 mb-2 list-decimal">
                            <li>Open a page in Edit mode.</li>
                            <li>Scroll to the <strong>Blocks</strong> section.</li>
                            <li>Click <strong>Add Block</strong> and select a block type (e.g., <em>HeroBlock</em>, <em>FaqsBlock</em>).</li>
                            <li>Complete the displayed fields (text, images, links, etc.).</li>
                            <li>Click <strong>Save</strong> or <strong>Add</strong>.</li>
                        </ol>

                        <h4 class="mt-3 font-semibold">Editing, Reordering &amp; Deleting Blocks</h4>
                        <ul class="pl-6 mb-2 list-disc">
                            <li><strong>Editing:</strong> Click the Edit (pencil) icon next to a block, update fields, and save.</li>
                            <li><strong>Reordering:</strong> Drag and drop blocks to change order, then click Save.</li>
                            <li><strong>Deleting:</strong> Click the Delete (trash) icon, confirm, and save the page.</li>
                        </ul>
                    </li>

                    <li class="mb-3">
                        <h3 id="block-types" class="flex items-center text-lg font-semibold text-slate-800">Block Types &amp; Usage<a href="#block-types" class="ml-2 text-[#ff751f] no-underline">#</a></h3>
                        <p class="mb-2 text-base">The CMS includes several predesigned block layouts. Each block type has its own field structure and purpose.</p>

                        <h4 class="mt-3 font-semibold">Available Blocks</h4>
                        <ul class="pl-6 mb-2 list-disc">
                            <li><strong>HeroBlock</strong> — prominent page introductions: headline, description, image, and CTA buttons.</li>
                            <li><strong>FaqsBlock</strong> — interactive question &amp; answer lists.</li>
                            <li><strong>NewsLetterSubscription Block</strong> — capture emails for newsletters.</li>
                            <li><strong>TestimonialBlock</strong> — display user feedback and reviews.</li>
                        </ul>

                        <p class="mb-2 text-base">Fill in each block’s fields as instructed in its form, then click <strong>Save</strong>. Use <strong>Publish</strong> if using a staged or scheduled workflow.</p>
                    </li>
                    <li class="mb-3">
                        <h3 id="forms" class="flex items-center text-lg font-semibold text-slate-800">Forms &amp; Form Submissions<a href="#forms" class="ml-2 text-[#ff751f] no-underline">#</a></h3>
                        <p class="mb-2 text-base">Forms allow you to build contact, signup, feedback, or any custom submission forms. Each form defines fields, validation rules, and optional notification/webhook settings.</p>

                        <h4 class="mt-3 font-semibold">How Submissions Work</h4>
                        <ul class="pl-6 mb-2 list-disc">
                            <li>When a user submits a form, the data is stored in the <strong>FormSubmissions</strong> resource/table.</li>
                            <li>Submissions can trigger email notifications or webhooks if configured on the form settings.</li>
                            <li>Developers can access submissions via the <strong>FormSubmission</strong> model or the database table for integrations.</li>
                        </ul>

                        <h4 class="mt-3 font-semibold">Viewing & Managing Submissions</h4>
                        <ol class="pl-6 mb-2 list-decimal">
                            <li>Open Filament and navigate to the <strong>Forms</strong> or <strong>Form Submissions</strong> section.</li>
                            <li>Click a submission to view full details and any uploaded files.</li>
                            <li>Use actions to mark processed, export as CSV, or delete entries as needed.</li>
                        </ol>

                        <h4 class="mt-3 font-semibold">Developer Notes</h4>
                        <p class="mb-2 text-base">To consume submissions programmatically, query the <code>form_submissions</code> table or use the `App\Models\FormSubmission` model. Ensure input validation and file size limits are enforced to prevent abuse.</p>
                    </li>
                </ol>
            </section>

            <!-- Developer Docs Tab -->
            <section x-show="tab === 'developer-docs'" class="mb-10 space-y-4" x-cloak>
                <h2 id="developer-docs" class="flex items-center mb-3 text-2xl font-semibold text-slate-900">Developer Docs<a href="#developer-docs" class="ml-2 text-[#ff751f] no-underline">#</a></h2>
                <h3 id="project-structure" class="flex items-center mt-6 mb-2 text-xl font-semibold text-slate-800">Project Structure<a href="#project-structure" class="ml-2 text-[#ff751f] no-underline">#</a></h3>
                <p class="mb-2 text-base">The app follows a modular Laravel structure. Key folders include:</p>
                <ul class="pl-6 mb-2 list-disc">
                    <li><strong>app/</strong> – Core application logic, including Filament, Livewire, Models, Services, etc.</li>
                    <li><strong>Modules/</strong> – Feature modules (e.g., Blog, Pricing, Website, Blocks).</li>
                    <li><strong>resources/views/</strong> – Blade templates for UI.</li>
                    <li><strong>routes/</strong> – Route definitions for web, console, and Filament.</li>
                    <li><strong>database/</strong> – Migrations, seeders, and factories.</li>
                </ul>
                <h3 id="developer-getting-started" class="flex items-center mt-6 mb-2 text-xl font-semibold text-slate-800">Getting Started for Developers<a href="#developer-getting-started" class="ml-2 text-[#ff751f] no-underline">#</a></h3>
                <ol class="pl-6 mb-2 list-decimal">
                    <li>Clone the repository and run <code>composer install</code> and <code>npm install</code>.</li>
                    <li>Copy <code>.env.example</code> to <code>.env</code> and set your environment variables.</li>
                    <li>Run <code>php artisan migrate --seed</code> to set up the database.</li>
                    <li>Build assets with <code>npm run build</code>.</li>
                    <li>Start the local server with <code>php artisan serve</code> or use Herd/Valet.</li>
                </ol>
                <h3 id="readme" class="flex items-center mt-6 mb-2 text-xl font-semibold text-slate-800">README & Further Docs<a href="#readme" class="ml-2 text-[#ff751f] no-underline">#</a></h3>
                <p class="mb-2 text-base">See the <a href="https://github.com/LeanIcon/LogisticJourney/blob/main/README.md" class="text-[#ff751f] underline" target="_blank">README</a> for more details on setup, deployment, and contribution guidelines.</p>

                <div class="mt-4">
                    <details class="p-4 bg-white border rounded-lg border-slate-200">
                        <summary class="font-semibold cursor-pointer text-slate-800">README Preview</summary>
                        <div class="mt-3 overflow-auto prose max-w-none text-slate-800 max-h-96">
                            {!! \Illuminate\Support\Str::markdown(file_get_contents(base_path('README.md'))) !!}
                        </div>
                        <div class="mt-3">
                            <a href="/docs/readme" target="_blank" class="inline-block bg-[#ff751f] text-white px-4 py-2 rounded">Open Full README</a>
                        </div>
                    </details>
                </div>
            </section>
            </div>
        </main>
    </div>
</div>
