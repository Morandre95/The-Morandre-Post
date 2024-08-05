<x-layout title="Faq's">

    <div class="container text-center mt-5 pt-5">
        <h1>Frequently Asked Questions</h1>
    </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 mt-3">
        <ul class="list-group">
            @foreach ($faqs as $faq)
                <li class="list-group-item">
                    <strong>{{ $faq->question }}</strong>
                    <p>{{ $faq->answer }}</p>
                </li>
            @endforeach
        </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-5">
            <div class="row ">
                <div class="col-12 d-flex flex-column align-items-center">
                    <h2>Do You Have Any Questions?</h2>
                    <form action="{{route('faq.request')}}" method="GET">
                        @csrf
                        <button type="submit " href="{{route('faq.request')}}" class="btn btn-primary mt-4">Request Form</button>
                    </form>

                </div>
            </div>
        </div>
</x-layout>
