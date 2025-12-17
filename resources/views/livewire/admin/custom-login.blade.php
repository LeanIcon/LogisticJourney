
<div class="grid min-h-screen grid-cols-1 lg:grid-cols-2">
    <!-- LEFT: Illustration & Welcome -->
    <div class="hidden lg:flex flex-col justify-between bg-[#052148] relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-[#052148] via-[#052148] to-[#041a35] opacity-90"></div>
        <div class="absolute top-20 right-20 w-64 h-64 bg-[#ff751f] rounded-full opacity-5 blur-3xl"></div>
        <div class="absolute bottom-20 left-10 w-96 h-96 bg-[#ff751f] rounded-full opacity-5 blur-3xl"></div>
        <div class="absolute right-0 top-1/2 -translate-y-1/2 w-[480px] xl:w-[520px] pointer-events-none opacity-90">
            <img src="{{ asset('images/lj.svg') }}" alt="Logistics Journey Illustration" class="w-full h-auto drop-shadow-2xl">
        </div>
        <div class="relative z-10 flex flex-col justify-end h-full pb-16 pl-12 pr-12 xl:pl-16">
            <div class="max-w-lg">
                <h1 class="text-5xl xl:text-6xl font-bold text-[#ff751f] tracking-tight leading-tight mb-4">Making Every Journey Count</h1>
                <p class="text-xl font-light leading-relaxed xl:text-2xl text-white/90">Welcome to the Logistics Journey Admin Portal</p>
                <div class="flex items-center gap-2 mt-8">
                    <div class="w-16 h-1 bg-[#ff751f] rounded-full"></div>
                    <div class="w-8 h-1 bg-[#ff751f]/50 rounded-full"></div>
                    <div class="w-4 h-1 bg-[#ff751f]/30 rounded-full"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- RIGHT: Login Form -->
    <div class="flex items-center justify-center px-4 py-10 sm:px-6 lg:px-12 bg-gradient-to-br from-slate-50 to-white">
        <div class="w-full max-w-md md:max-w-lg">
            <div class="flex items-center gap-3 mb-12">
                <div class="w-11 h-11 bg-gradient-to-br from-[#1e40af] to-[#1e3a8a] rounded-xl flex items-center justify-center shadow-lg">
                    <img src="{{ asset('images/LogisticsJourneyLogo.png') }}" alt="Logo" class="object-contain h-8 w-7">
                </div>
                <span class="text-2xl font-semibold text-[#052148]">Logistic Journey</span>
            </div>
            <div class="mb-10">
                <h2 class="text-4xl font-bold text-[#052148] mb-3 tracking-tight">Welcome back</h2>
                <p class="text-base leading-relaxed text-slate-600">Enter your work email and password to sign in to your admin dashboard.</p>
            </div>
            <form wire:submit.prevent="authenticate" class="space-y-6">
                @csrf
                <div>
                    <label for="email" class="block mb-2.5 text-sm font-semibold text-[#052148]">Email address</label>
                    <input type="email" id="email" wire:model.defer="email" required autofocus placeholder="you@company.com"
                        class="w-full px-4 py-4 rounded-xl border-2 border-slate-200 bg-white text-base text-slate-900 placeholder:text-slate-400 focus:border-[#1e40af] focus:ring-4 focus:ring-[#1e40af]/10 transition-all duration-200 outline-none">
                    @error('email')<p class="mt-2 text-xs text-red-500">{{ $message }}</p>@enderror
                </div>
                <div>
                    <div class="flex items-center justify-between mb-2.5">
                        <label for="password" class="block text-sm font-semibold text-[#052148]">Password</label>
                        <a href="#" class="text-sm font-medium text-[#1e40af] hover:text-[#ff751f] transition-colors duration-200">Forgot password?</a>
                    </div>
                    <input type="password" id="password" wire:model.defer="password" required placeholder="Enter your password"
                        class="w-full px-4 py-4 rounded-xl border-2 border-slate-200 bg-white text-base text-slate-900 placeholder:text-slate-400 focus:border-[#1e40af] focus:ring-4 focus:ring-[#1e40af]/10 transition-all duration-200 outline-none">
                    @error('password')<p class="mt-2 text-xs text-red-500">{{ $message }}</p>@enderror
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="remember" class="w-4 h-4 rounded border-slate-300 text-[#ff751f] focus:ring-2 focus:ring-[#ff751f]/20 transition-colors cursor-pointer">
                    <label for="remember" class="ml-2.5 text-sm text-slate-600 cursor-pointer select-none">Remember me for 30 days</label>
                </div>
                <button type="submit" wire:loading.attr="disabled" wire:target="authenticate"
                    class="w-full h-14 flex items-center justify-center gap-3 text-white text-lg font-semibold rounded-xl bg-gradient-to-r from-[#ff751f] to-[#ff8c3a] hover:from-[#e86a13] hover:to-[#ff751f] focus:outline-none focus:ring-4 focus:ring-[#ff751f]/30 shadow-lg shadow-[#ff751f]/25 hover:shadow-xl hover:shadow-[#ff751f]/30 active:scale-[0.98] disabled:opacity-70 disabled:cursor-not-allowed transition-all duration-200">
                    <span wire:loading.remove wire:target="authenticate" class="flex items-center gap-3">
                        <span>Sign In</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                    </span>
                    <span wire:loading wire:target="authenticate" class="flex items-center gap-3">
                        <span>Signing In…</span>
                        <svg class="w-5 h-5 text-white animate-spin" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path></svg>
                    </span>
                </button>
                <div class="relative my-8">
                    <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-slate-200"></div></div>
                    <div class="relative flex justify-center text-sm"><span class="px-4 font-medium bg-white text-slate-500">Need help?</span></div>
                </div>
                <div class="text-center">
                    <p class="text-sm text-slate-600">Having trouble signing in? <a href="#" class="font-semibold text-[#1e40af] hover:text-[#ff751f] transition-colors duration-200">Contact support</a></p>
                </div>
            </form>
            <div class="pt-8 mt-12 border-t border-slate-200">
                <p class="text-xs text-center text-slate-500">© {{ date('M, Y') }} Logistics Journey. All rights reserved.</p>
            </div>
        </div>
    </div>
</div>
