<form action="{{ route('article.search') }}" method="GET" class="d-flex justify-content-end mt-md-2 mb-2 mb-md-2"
role="search">
<input class="form-control me-2" type="search" placeholder="{{__('ui.Search')}}" aria-label="Search" name="query">
<button class="btn btn-outline-secondary" type="submit">{{__('ui.Go')}}</button>
</form>