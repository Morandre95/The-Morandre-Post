<table class="table">
  <thead class="table-dark">
      <tr>
          <th scope="col">{{__('ui.Id')}}</th>
          <th scope="col">{{__('ui.Title')}}</th>
          <th scope="col">{{__('ui.Platform')}}</th>
          <th scope="col">{{__('ui.Category')}}</th>
          <th scope="col">{{__('ui.Tags')}}</th>
          <th scope="col" class="text-center">{{__('ui.Action')}}</th>
      </tr>
  </thead>
  <tbody>
      @foreach ($articles as $article)
      <tr>
          <th scope="row">{{$article->id}}</th>
          <td>{{$article->title}}</td>
          <td>{{$article->consoles->name}}</td>
          <td>{{$article->category->name ?? "No category"}}</td>
          <td>
              @foreach ($article->tags as $tag)
                  #{{$tag->name}}
              @endforeach
          </td>
          <td class="text-center">
              <!-- Read Article Button -->
              <a href="{{route('article.show', $article)}}" class="btn btn-secondary me-2 mx-1 mx-md-3 mx-md-0 mb-1 mb-md-0" aria-label="Read article titled {{$article->title}}">{{__('ui.Read article')}}</a>

              <!-- Edit Article Button -->
              <a href="{{route('article.edit', $article)}}" class="btn btn-acc me-2 mt-2 mt-md-0" aria-label="Edit article titled {{$article->title}}">{{__('ui.Edit')}}</a>
          </td>
      </tr>
      @endforeach
  </tbody>
</table>
