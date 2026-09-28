<x-guest-layout>
    <style>
        /* Import Font jika belum ada di layout global */
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

        /* Memaksa font Plus Jakarta Sans */
        * {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        /* 
         * TRIK MENYEMBUNYIKAN LOGO LARAVEL BAWAAN 
         * Menyembunyikan kontainer logo yang ada di guest.blade.php 
         */
        .min-h-screen > div:first-of-type {
            display: none !important;
        }
        /* Memastikan form login pas di tengah setelah logo hilang */
        .min-h-screen {
            justify-content: center !important;
        }

        /* Container & Typography Auth */
        .login-header {
            text-align: center;
            margin-bottom: 28px;
        }
        .login-title {
            font-size: 1.5rem;
            font-weight: 800;
            color: #0F172A; /* Slate 900 */
            letter-spacing: -0.5px;
            margin-bottom: 4px;
        }
        .login-subtitle {
            font-size: 0.9rem;
            color: #64748B; /* Slate 500 */
            font-weight: 500;
        }

        /* Override Komponen Input Laravel */
        .custom-input-login {
            border-radius: 12px !important;
            padding: 14px 16px !important;
            border: 1px solid #E2E8F0 !important;
            background-color: #F8FAFC !important;
            color: #0F172A !important;
            font-weight: 600 !important;
            box-shadow: inset 0 1px 2px rgba(0,0,0,0.02) !important;
            transition: all 0.2s ease !important;
        }
        .custom-input-login:focus {
            border-color: #4F46E5 !important;
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.15) !important;
            background-color: #ffffff !important;
            outline: none !important;
        }
        .custom-input-login::placeholder {
            color: #94A3B8 !important;
            font-weight: 500 !important;
        }

        /* Override Label Laravel */
        .custom-label-login {
            font-size: 0.75rem !important;
            font-weight: 700 !important;
            color: #64748B !important;
            letter-spacing: 0.5px !important;
            text-transform: uppercase !important;
            margin-bottom: 8px !important;
            display: block;
        }

        /* Override Tombol Primary Laravel */
        .btn-primary-login {
            background: linear-gradient(135deg, #4F46E5 0%, #6366F1 100%) !important;
            color: white !important;
            border-radius: 12px !important;
            font-weight: 700 !important;
            font-size: 1rem !important;
            padding: 14px 24px !important;
            border: none !important;
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.25) !important;
            transition: all 0.3s ease !important;
            text-transform: none !important;
            letter-spacing: normal !important;
            display: inline-flex !important;
            justify-content: center !important;
            align-items: center !important;
            width: 100% !important; /* Dibuat Full Width */
        }
        .btn-primary-login:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 8px 20px rgba(79, 70, 229, 0.35) !important;
        }

        /* Checkbox Styling */
        .custom-checkbox {
            border-radius: 6px !important;
            width: 1.25rem !important;
            height: 1.25rem !important;
            border-color: #CBD5E1 !important;
            color: #4F46E5 !important;
            cursor: pointer;
        }
        .custom-checkbox:focus {
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2) !important;
        }
    </style>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="px-2 py-4">
        <!-- Header Tambahan untuk Estetika -->
        <div class="login-header">
            <h2 class="login-title">Hi Jay</h2>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="custom-label-login" />
                <x-text-input id="email" class="block mt-1 w-full custom-input-login" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="masukkan email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 font-medium text-sm" />
            </div>

            <!-- Password -->
            <div class="mt-5">
                <x-input-label for="password" :value="__('Password')" class="custom-label-login" />

                <x-text-input id="password" class="block mt-1 w-full custom-input-login"
                                type="password"
                                name="password"
                                required autocomplete="current-password" placeholder="masukkan password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 font-medium text-sm" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-5">
                <label for="remember_me" class="inline-flex items-center cursor-pointer">
                    <input id="remember_me" type="checkbox" class="custom-checkbox" name="remember">
                    <span class="ms-3 text-sm font-semibold text-gray-600">{{ __('Ingat Saya') }}</span>
                </label>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col mt-8 gap-4">
                <x-primary-button class="btn-primary-login">
                    {{ __('Log in') }}
                </x-primary-button>

                <!-- @if (Route::has('password.request'))
                    <div class="text-center mt-2">
                        <a class="text-sm font-semibold text-indigo-600 hover:text-indigo-800 rounded-md focus:outline-none transition-colors" href="{{ route('password.request') }}">
                            {{ __('Lupa password?') }}
                        </a>
                    </div>
                @endif -->
            </div>
        </form>
    </div>
</x-guest-layout>