<x-layout>

    <x-masthead />

    @if ($errors->any())
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-4">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                        <ul>
                                <li>{{ $error }}</li>
                        </ul>
                        @endforeach
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <h1 class="text-center mb-4">{{ __('ui.Login') }}</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-3">

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">{{ __('ui.E-mail') }}</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">{{ __('ui.Password') }}</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary mt-1">Login</button>
                    <p class="mt-3">{{ __('ui.Don\'t have an account?') }} <a
                            href="{{ route('register') }}">{{ __('ui.Register') }}</a></p>
                </form>

            </div>
        </div>
    </div>

</x-layout>
