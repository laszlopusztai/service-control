<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <input type="text"
                   name="email"
                   class="block mt-1 w-full rounded-full bg-cyan-700 focus:bg-cyan-700 focus:text-white border-0 text-white placeholder-white pl-8"
                   :value="old('email')"
                   placeholder="E-mail"
                   required autofocus>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <input type="password"
                   name="password"
                   class="block mt-1 w-full rounded-full bg-cyan-700 focus:bg-cyan-700 focus:text-white border-0 text-white placeholder-white pl-8"
                   :value="old('email')"
                   placeholder="Jelszó"
                   required autofocus>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
            <button type="submit" class="block mt-1 w-full rounded-full bg-emerald-400 border-0 text-white py-2 uppercase font-bold">belépés</button>
        </div>
    </form>
</x-guest-layout>
