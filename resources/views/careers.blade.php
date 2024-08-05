<x-layout title="{{__('ui.Work whit Us')}}">

    <x-masthead/>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-2 text-center">
                <h1>{{__('ui.Work whit Us')}}</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 mb-3">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-5">
                <form action="{{route('careers.submit')}}" method="POST" class="card p-5 shadow">
                    @csrf
                    <div class="mb-3">
                        <label for="role" class="form-label">{{__('ui.What role are you interested in?')}}</label>
                        <select class="form-control" id="role" name="role">
                            <option value="" selected disable>{{__('ui.Select Role')}}</option>
                            @if (!Auth::user()->is_admin)
                            <option value="admin">{{__('ui.Administrator')}}</option>
                            @endif
                            @if (!Auth::user()->is_revisor)
                            <option value="revisor">{{__('ui.Revisor')}}</option>
                            @endif
                            @if (!Auth::user()->is_writer)
                            <option value="writer">{{__('ui.Writer')}}</option> 
                            @endif
                        </select>
                        @error('role')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">{{__('ui.E-mail')}}</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{Auth::user()->email}}">
                        @error('mail')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">{{__('ui.Why are you interested in this role?')}}</label>
                        <textarea class="form-control" id="message" name="message" cols="30" rows="7">{{old('message')}}</textarea>
                        @error('message')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mt-3 d-flex justify-content-center ">
                        <button type="submit" class="btn btn-primary">{{__('ui.Send Candidature')}}</button>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-4 p-5">
                <h3>{{__('ui.Work as an administrator')}}</h3>
                <p>{{__('ui.By choosing to work as an administrator, you will be responsible for managing job requests and adding and editing categories')}}</p>
                <h3>{{__('ui.Work as a writer')}}</h3>
                <p>{{__('ui.By choosing to work as a writer, you will decide whether an article can be published on the platform or not')}}</p>
                <h3>{{__('ui.Work as a reviewer')}}</h3>
                <p>{{__('ui.By choosing to work as a reviewer, you will be able to write the articles that will be published')}}</p>
            </div>
        </div>
    </div>

</x-layout>
