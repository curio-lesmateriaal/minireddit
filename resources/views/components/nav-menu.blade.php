<ul class="flex space-x-6 bg-gray-800 p-4 rounded-lg">
    <li><a href="/" class="text-white hover:text-gray-300 transition">Home</a></li>
    <li><a href="/about" class="text-white hover:text-gray-300 transition">About</a></li>
    <li><a href="/products" class="text-white hover:text-gray-300 transition">Products</a></li>
    <li><a href="/contact" class="text-white hover:text-gray-300 transition">Contact</a></li>

    <li>
        @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <input class="text-white font-bold border p-2" type="submit" value="Uitloggen">
            </form>
        @else
            <a href="/login" class="text-white font-bold border p-2">Inloggen</a>
        @endauth
    </li>

</ul>
