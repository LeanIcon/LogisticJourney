
<div x-data="{ tab: 'getting-started' }" class="min-h-screen bg-white">
    <div class="flex flex-col md:flex-row">
        <!-- Tabs Navigation -->
        <nav class="flex md:flex-col gap-2 bg-[#052148] text-white py-4 px-4 md:py-8 md:px-6 shadow-lg md:w-64">
            <button @click="tab = 'getting-started'" :class="tab === 'getting-started' ? 'bg-[#ff751f] text-white' : 'hover:bg-[#ff751f] hover:text-white'" class="px-4 py-2 rounded-lg transition-colors font-semibold text-left">Getting Started</button>
            <button @click="tab = 'general'" :class="tab === 'general' ? 'bg-[#ff751f] text-white' : 'hover:bg-[#ff751f] hover:text-white'" class="px-4 py-2 rounded-lg transition-colors font-semibold text-left">General</button>
            <button @click="tab = 'developer-docs'" :class="tab === 'developer-docs' ? 'bg-[#ff751f] text-white' : 'hover:bg-[#ff751f] hover:text-white'" class="px-4 py-2 rounded-lg transition-colors font-semibold text-left">Developer Docs</button>
        </nav>

        <!-- Main Content -->
        <main class="flex-1 p-6 md:p-10 bg-white text-[#052148]">
            <h1 class="text-3xl font-bold mb-8 text-[#052148]">Admin Panel Documentation</h1>

            <!-- Getting Started Tab -->
            <section x-show="tab === 'getting-started'" class="mb-10" x-cloak>
                <h2 class="text-2xl font-semibold mb-3 text-[#ff751f]">Getting Started</h2>
                <p class="mb-2 text-base">Welcome to the Logistics Journey Admin Panel! This documentation will help you understand the features and workflows available to you as an admin user.</p>
                <h3 class="text-xl font-semibold mt-6 mb-2 text-[#052148]">Navigation</h3>
                <p class="mb-2 text-base">Use the sidebar to access different sections of the admin panel. Each section is designed for quick access to your most-used features.</p>
                <h3 class="text-xl font-semibold mt-6 mb-2 text-[#052148]">Managing Content</h3>
                <p class="mb-2 text-base">You can create, edit, and delete content using the resources in the admin panel. All changes are saved automatically and reflected in real time.</p>
                <h3 class="text-xl font-semibold mt-6 mb-2 text-[#052148]">User Roles</h3>
                <p class="mb-2 text-base">Admins have full access to all features. If you need to manage user roles or permissions, visit the Users section in the sidebar.</p>
                <h3 class="text-xl font-semibold mt-6 mb-2 text-[#052148]">Settings</h3>
                <p class="mb-2 text-base">Configure system settings, branding, and integrations from the Settings page. Changes here affect the entire admin panel.</p>
                <h3 class="text-xl font-semibold mt-6 mb-2 text-[#052148]">Support</h3>
                <p class="mb-2 text-base">Need help? Contact support or refer to this documentation for guidance on using the admin panel.</p>
            </section>

            <!-- General Tab -->
            <section x-show="tab === 'general'" class="mb-10" x-cloak>
                <h2 class="text-2xl font-semibold mb-3 text-[#ff751f]">General</h2>
                <p class="mb-2 text-base">This section covers basic use cases and tips for all users, such as logging in, resetting your password, and navigating the dashboard. (Add more general user guidance here.)</p>
            </section>

            <!-- Developer Docs Tab -->
            <section x-show="tab === 'developer-docs'" class="mb-10" x-cloak>
                <h2 class="text-2xl font-semibold mb-3 text-[#ff751f]">Developer Docs</h2>
                <h3 class="text-xl font-semibold mt-6 mb-2 text-[#052148]">Project Structure</h3>
                <p class="mb-2 text-base">The app follows a modular Laravel structure. Key folders include:</p>
                <ul class="pl-6 mb-2 list-disc">
                    <li><strong>app/</strong> – Core application logic, including Filament, Livewire, Models, Services, etc.</li>
                    <li><strong>Modules/</strong> – Feature modules (e.g., Blog, Pricing, Website, Blocks).</li>
                    <li><strong>resources/views/</strong> – Blade templates for UI.</li>
                    <li><strong>routes/</strong> – Route definitions for web, console, and Filament.</li>
                    <li><strong>database/</strong> – Migrations, seeders, and factories.</li>
                </ul>
                <h3 class="text-xl font-semibold mt-6 mb-2 text-[#052148]">Getting Started for Developers</h3>
                <ol class="pl-6 mb-2 list-decimal">
                    <li>Clone the repository and run <code>composer install</code> and <code>npm install</code>.</li>
                    <li>Copy <code>.env.example</code> to <code>.env</code> and set your environment variables.</li>
                    <li>Run <code>php artisan migrate --seed</code> to set up the database.</li>
                    <li>Build assets with <code>npm run build</code>.</li>
                    <li>Start the local server with <code>php artisan serve</code> or use Herd/Valet.</li>
                </ol>
                <h3 class="text-xl font-semibold mt-6 mb-2 text-[#052148]">README & Further Docs</h3>
                <p class="mb-2 text-base">See the <a href="/README.md" class="text-[#ff751f] underline" target="_blank">README</a> for more details on setup, deployment, and contribution guidelines.</p>
            </section>
        </main>
    </div>
</div>
