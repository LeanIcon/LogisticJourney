<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Filament\Facades\Filament; 

class CustomLogin extends Component
{
    public $email = '';
    public $password = '';
    public $isLoading = false;  

    protected $rules = [
        'email' => ['required', 'email'],
        'password' => ['required', 'string', 'min:8'],
    ];

    public function authenticate()
    {
        $this->validate();
        $this->isLoading = true;  // Start loading

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials, true)) {
            session()->regenerate();
            return redirect()->intended(Filament::getUrl());  // Now uses correct Filament facade
        }

        $this->addError('email', 'The provided credentials do not match our records.');
        $this->isLoading = false;  // Stop loading on error
    }

    public function render()
    {
        return view('livewire.admin.custom-login')
            ->layout('layouts.custom-login');
    }
}