<x-layout>

    <x-masthead  />
    
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <h1 class="text-center mb-4">{{__('ui.Register')}}</h1>
        </div>
    </div>
</div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-3">

                <form method="POST" action="{{route('register')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">{{__('ui.Name')}}</label>
                        <input type="name" class="form-control" id="name" aria-describedby="emailHelp" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">{{__('ui.E-mail')}}</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">{{__('ui.Password')}}</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">{{__('ui.Confirm Password')}}</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>
                <button type="submit" class="btn btn-primary mt-1">{{__('ui.Register')}}</button>
                <p class="mt-3">{{__('ui.Already have an account?')}} <a href="{{route('login')}}">{{__('ui.Login')}}</a></p>
            </form>
        </div>
    </div>
</div>

</x-layout>