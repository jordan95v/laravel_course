@if (session('success'))
    <div class="flex justify-center">
        <div class="alert alert-success shadow-lg max-w-lg">
            <i class="fa-solid fa-circle-check"></i>
            <span>{{ session('success') }}</span>
        </div>
    </div>
@endif

@if (isset($error))
    @if ($error->any())
        <div class="flex justify-center">
            <div class="alert alert-error shadow-lg max-w-lg">
                <div>
                    <i class="fa-solid fa-badge-cross"></i>
                    @foreach ($error->all() as $error)
                        <span>{{ $error }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endif
