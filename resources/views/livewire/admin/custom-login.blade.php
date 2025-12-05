<div class="custom-login-wrapper">
    <style>
        @font-face {font-family:'Gilroy';src:url('/fonts/gilroy/Gilroy-Regular.ttf') format('truetype');font-weight:400;font-display:swap;}
        @font-face {font-family:'Gilroy';src:url('/fonts/gilroy/Gilroy-Medium.ttf') format('truetype');font-weight:500;font-display:swap;}
        @font-face {font-family:'Gilroy';src:url('/fonts/gilroy/Gilroy-SemiBold.ttf') format('truetype');font-weight:600;font-display:swap;}
        @font-face {font-family:'Gilroy';src:url('/fonts/gilroy/Gilroy-Bold.ttf') format('truetype');font-weight:700;font-display:swap;}

        *,*::before,*::after {font-family:'Gilroy',sans-serif !important;}
        body{overflow:hidden;}
        *{margin:0;padding:0;box-sizing:border-box;}
        .fi-simple-page,.fi-simple-main,.fi-simple-main > *:not(.custom-login-wrapper){display:none !important;}

        .custom-login-wrapper{
            display:grid;grid-template-columns:1fr 1fr;
            min-height:100vh;position:fixed;inset:0;z-index:9999;
        }

        /* LEFT SIDE — EXACTLY LIKE YOUR IMAGE */
        .gradient-section{
            background:linear-gradient(180deg,#0d47a1 0%,#1976d2 50%,#42a5f5 100%);
            padding:90px 100px 0 100px;
            position:relative;
            overflow:hidden;
            display:flex;
            flex-direction:column;
        }

        .gradient-section::before{
            content:'';position:absolute;
            bottom:-150px;right:-150px;
            width:700px;height:700px;
            background:#5e35b1;border-radius:50%;
            opacity:0.7;
        }

        .hero-content{
            position:relative;
            z-index:10;
        }

        .small-text{
            font-size:22px;
            color:rgba(255,255,255,0.8);
            margin-bottom:20px;
            font-weight:500;
        }

        .play-btn{
            width:40px;height:40px;
            background:#f97316;
            border-radius:50%;
            display:flex;align-items:center;justify-content:center;
            box-shadow:0 25px 50px rgba(249,115,22,0.5);
            margin-top:120px 
        }

        .play-btn svg{
            width:30px;height:30px;
            fill:white;
        }

        .main-title{
            font-size:25px;
            font-weight:300;
            line-height:0.9;
            color:white;
            margin-top: 120px;
            margin-left: 20px;
        }

        .journey{
            color:#fb923c;
        }

        .journey2{
            font-size: 72px;
        }

        /* RIGHT SIDE */
        .form-section{background:#fff;display:flex;align-items:center;justify-content:center;padding:40px;}
        .form-container{max-width:440px;width:100%;}

        .brand-logo{display:flex;align-items:center;gap:14px;margin-bottom:60px;}
        .logo-image{width:36px;height:44px;}
        .brand-name{font-size:26px;font-weight:600;color:#1e40af;}

        .form-title{font-size:48px;font-weight:600;color:#1e40af;margin-bottom:12px;}
        .form-description{font-size:15px;color:#64748b;margin-bottom:40px;}

        .form-group{margin-bottom:24px;}
        .form-label{font-size:14px;font-weight:500;color:#1e40af;margin-bottom:8px;display:block;}
        .form-input{width:100%;padding:16px;border-radius:12px;border:1.5px solid #e2e8f0;background:#f8fafc;font-size:15px;transition:all .3s;}
        .form-input:focus{background:white;border-color:#1e40af;outline:none;box-shadow:0 0 0 4px rgba(30,64,175,.1);}

        .signin-button{
            width:100%;padding:18px;font-size:16px;font-weight:600;
            border-radius:12px;background:#f97316;color:white;border:none;
            cursor:pointer;transition:all .3s;
        }
        .signin-button:hover{background:#ea580c;transform:translateY(-2px);}

        .spinner{width:18px;height:18px;border:2.5px solid #fff;border-top-color:transparent;border-radius:50%;animation:spin 1s linear infinite;}
        @keyframes spin{to{transform:rotate(360deg)}}

        @media(max-width:1024px){
            .custom-login-wrapper{grid-template-columns:1fr;}
            .gradient-section{display:none;}
        }
    </style>

    
    <div class="gradient-section">
        <div class="hero-content">
            <div class="small-text">Start managing your<br>
                <span class="journey2">Journey</span>
            </div>
            <div class="flex">
                <div class="play-btn">
                    <svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                </div>

                <div class="main-title">
                    Making Every Journey<br>
                    <span class="journey">Count</span>
                </div>
            </div>
        </div>
    </div>

    <!-- RIGHT SIDE — LOGIN FORM -->
    <div class="form-section">
        <div class="form-container">
            <div class="brand-logo">
                <img src="{{ asset('images/LogisticsJourneyLogo.png') }}" alt="Logo" class="logo-image">
                <span class="brand-name">Logistic Journey</span>
            </div>

            <h2 class="form-title">Welcome Back</h2>
            <p class="form-description">Enter your email and password to access your account</p>

            <form wire:submit="authenticate">
                @csrf
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" wire:model="email" class="form-input" placeholder="Enter your email" required autofocus>
                    @error('email') <span class="error text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" wire:model="password" class="form-input" placeholder="Enter your password" required>
                    @error('password') <span class="error text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="signin-button" wire:loading.attr="disabled">
                    <span wire:loading.remove>Sign In</span>
                    <span wire:loading class="flex items-center justify-center gap-3">
                        Signing In... <div class="spinner"></div>
                    </span>
                </button>
            </form>
        </div>
    </div>
</div>