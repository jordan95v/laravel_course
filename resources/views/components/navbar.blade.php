<div class="navbar bg-base-100">
    <div class="navbar-start">
        <div class="dropdown">
            <label tabindex="0" class="btn btn-ghost btn-circle">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                </svg>
            </label>
            <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                <li><a href="/">Homepage</a></li>
                @auth
                    <li><a href="/jobs/create">Create a gig</a></li>
                    <li><a href="">Manage gig</a></li>
                    <li><a href="/logout">Disconnect</a></li>
                @else
                    <li><a href="/register">Register</a></li>
                    <li><a href="/login">Login</a></li>
                @endauth

            </ul>
        </div>
    </div>
    <div class="navbar-center">
        <a class="btn btn-ghost normal-case text-xl" href="/">Jo Gigs</a>
    </div>
    <div class="navbar-end">
        <form action="/" method="get" class="flex">
            <input type="text" placeholder="Type here" name="search" class="input input-bordered w-full max-w-xs" />
            <button class="btn btn-ghost text-xl btn-circle">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>
    </div>
</div>
