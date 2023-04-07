@if (session('success'))
    <div class="flex justify-center">
        <div class="alert alert-success shadow-lg max-w-lg">
            <div>
                <i class="fa-solid fa-badge-check"></i>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    </div>
@endif
