<x-layout>

    @if (session('success'))
        <div class="mt-5 alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container mt-5 pt-5 text-center">
        <h1>Send Request</h1>
    </div>
    <form action="{{ route('faq.storeRequest') }}" method="POST">
        @csrf
        <div class="row justify-content-center">
            <div class="col-6 mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-6 mb-3">
                <label for="email" class="form-label">E-Mail</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-6 mb-3">
                <label for="message" class="form-label mt-3">Send your message to the administrator for an
                    answer</label>
                <textarea id="message" name="message" class="form-control mt-3" rows="3" required></textarea>
            </div>
            <div class="container-fluid d-flex justify-content-center">
                <button type="submit" class="btn btn-primary mt-3">Send</button>
            </div>
        </div>
    </form>
    </div>

</x-layout>
