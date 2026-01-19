<?php

declare(strict_types=1);

namespace App\Livewire\Admin;

use Filament\Facades\Filament;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.custom-login')]
final class CustomLogin extends Component
{
    public string $email = '';

    public string $password = '';

    public bool $isLoading = false;

    /** @var array<string, array<int|string, string>> */
    protected array $rules = [
        'email' => ['required', 'email'],
        'password' => ['required', 'string', 'min:8'],
    ];

    public function authenticate(): void
    {
        $this->validate();
        $this->isLoading = true;

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials, true)) {
            session()->regenerate();
            $this->redirect(Filament::getUrl());

            return;
        }

        $this->addError('email', 'The provided credentials do not match our records.');
        $this->isLoading = false;
    }

    public function render(): View
    {
        return view('livewire.admin.custom-login');
    }
}
