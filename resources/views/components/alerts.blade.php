@if (session('success'))
    <div class="flex justify-center">
        <div class="alert alert-success shadow-lg max-w-lg">
            <div class="flex justify-start">
                <i class="fa-solid fa-circle-check"></i>
                {{ session('success') }}
            </div>
        </div>
    </div>
@endif
