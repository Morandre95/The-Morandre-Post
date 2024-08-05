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
            <h1 class="text-center mb-4">Login</h1>
        </div>
    </div>
</div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-3">

            <form method="POST" action="{{route('login')}}">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                </div>
                <button type="submit" class="btn btn-primary mt-1">Login</button>
                <p class="mt-3">Don't have an account? <a href="{{route('register')}}">Register</a></p>
            </form>

        </div> 
    </div>
</div>

</x-layout>