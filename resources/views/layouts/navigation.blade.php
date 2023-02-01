<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-end h-16 items-center">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Kilépés</button>
            </form>
        </div>
    </div>
</nav>
