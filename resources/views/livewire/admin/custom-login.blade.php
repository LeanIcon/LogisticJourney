<div class="custom-login-wrapper">
    <style>
        [x-cloak] { display: none !important; }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            overflow: hidden;
        }

        /* Hide default Filament login */
        .fi-simple-page,
        .fi-simple-main,
        .fi-simple-main > *:not(.custom-login-wrapper) {
            display: none !important;
        }

        .custom-login-wrapper {
            display: grid !important;
            grid-template-columns: 1fr 1fr;
            min-height: 100vh;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 9999;
        }

        /* Left Side - Modern Blue Section */
        .gradient-section {
            position: relative;
            background: linear-gradient(180deg, #0d47a1 0%, #1976d2 50%, #42a5f5 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 80px 60px;
            overflow: hidden;
        }

        .gradient-section::before {
            content: '';
            position: absolute;
            bottom: -20%;
            left: -10%;
            width: 600px;
            height: 600px;
            background: #5e35b1;
            border-radius: 50%;
            opacity: 0.6;
            z-index: 1;
        }

        .gradient-section::after {
            content: '';
            position: absolute;
            top: 50%;
            right: -15%;
            width: 500px;
            height: 500px;
            background: #1565c0;
            border-radius: 50%;
            opacity: 0.4;
            z-index: 1;
        }

        .gradient-content {
            position: relative;
            z-index: 10;
            color: white;
            max-width: 500px;
            text-align: center;
        }

        .main-text {
            margin-bottom: 40px;
        }

        .small-label {
            font-size: 16px;
            font-weight: 400;
            letter-spacing: 1px;
            margin-bottom: 24px;
            opacity: 0.95;
            display: block;
        }

        .main-title {
            font-size: 90px;
            font-weight: 600;
            line-height: 1.1;
            letter-spacing: -2px;
            color: white;
            margin-bottom: 0;
        }

        .sub-text {
            font-size: 18px;
            line-height: 1.7;
            opacity: 0.95;
            font-weight: 300;
            color: white;
            max-width: 450px;
            margin: 0 auto;
        }

        /* Right Side - Form Section */
        .form-section {
            background: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            overflow-y: auto;
        }

        .form-container {
            width: 100%;
            max-width: 440px;
        }

        .brand-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 60px;
        }

        .logo-image {
            width: 29px;
            height: 36px;
        }

        .brand-name {
            font-size: 20px;
            font-weight: 600;
            color: #1e40af;
        }

        .form-header {
            margin-bottom: 40px;
        }

        .form-title {
            font-size: 48px;
            font-weight: 600;
            color: #1e40af;
            margin-bottom: 12px;
            letter-spacing: -1px;
        }

        .form-description {
            font-size: 15px;
            color: #64748b;
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: #1e40af;
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            padding: 14px 16px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            font-size: 15px;
            background: #f8fafc;
            transition: all 0.3s ease;
        }

        .form-input:focus {
            background: white;
            border-color: #1e40af;
            outline: none;
        }

        .error {
            color: #ef4444;
            font-size: 14px;
            margin-top: 8px;
            display: block;
        }

        .signin-button {
            width: 100%;
            padding: 16px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 8px;
            background: #f97316;
            border: none;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .signin-button:hover {
            background: #ea580c;
            transform: translateY(-1px);
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .custom-login-wrapper {
                grid-template-columns: 1fr;
            }

            .gradient-section {
                display: none;
            }
        }

        @media (max-width: 640px) {
            .form-title {
                font-size: 36px;
            }

            .main-title {
                font-size: 48px;
            }
        }
        
        .spinner {
            width: 16px;
            height: 16px;
            border: 2px solid #ffffff;
            border-top: 2px solid transparent;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>

    <!-- Left Side - Modern Blue Background -->
    <div class="gradient-section">
        <div class="gradient-content">
            <span class="small-label">Start planning your</span>
            <div class="main-text">
                <h1 class="main-title">Journey</h1>
            </div>
            
            <p class="sub-text">Streamline your logistics operations with our comprehensive management platform</p>
        </div>
    </div>

    <!-- Right Side - Login Form -->
    <div class="form-section">
        <div class="form-container">
            <!-- Logo -->
            <div class="brand-logo">
                <img src="{{ asset('images/LogisticsJourneyLogo.png') }}" alt="Logistic Journey" class="logo-image">
                <span class="brand-name">Logistic Journey</span>
            </div>

            <!-- Welcome Text -->
            <div class="form-header">
                <h2 class="form-title">Welcome Back</h2>
                <p class="form-description">Enter your email and password to access your account</p>
            </div>

            <!-- Login Form -->
            <form wire:submit="authenticate">
                @csrf
                
                <!-- Email -->
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        wire:model="email"
                        class="form-input" 
                        placeholder="Enter your email"
                        required 
                        autofocus
                    >
                    @error('email') 
                        <span class="error">{{ $message }}</span> 
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        wire:model="password"
                        class="form-input" 
                        placeholder="Enter your password"
                        required
                    >
                    @error('password') 
                        <span class="error">{{ $message }}</span> 
                    @enderror
                </div>

                <!-- Sign In Button -->
                <button type="submit" class="signin-button" wire:loading.attr="disabled" wire:loading.class="opacity-50 cursor-not-allowed">
                    <span wire:loading.remove>Sign In</span>
                    <span wire:loading>
                        <div class="inline-flex items-center gap-3">
                            Signing In...
                            <div class="spinner"></div>
                        </div>
                    </span>
                </button>
            </form>
        </div>
    </div>

    <script>
        // Optional: Hide any conflicting Filament elements on load
        document.addEventListener('DOMContentLoaded', function() {
            const filamentForms = document.querySelectorAll('form:not(.custom-login-wrapper form)');
            filamentForms.forEach(form => {
                if (!form.closest('.custom-login-wrapper')) {
                    form.style.display = 'none';
                }
            });
            
            const simplePage = document.querySelector('.fi-simple-page');
            if (simplePage && !simplePage.querySelector('.custom-login-wrapper')) {
                Array.from(simplePage.children).forEach(child => {
                    if (!child.classList.contains('custom-login-wrapper')) {
                        child.style.display = 'none';
                    }
                });
            }
        });
    </script>
</div>