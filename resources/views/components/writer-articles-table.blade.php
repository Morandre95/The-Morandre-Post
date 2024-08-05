<table class="table">
  <thead class="table-dark">
      <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Platform</th>
          <th scope="col">Category</th>
          <th scope="col">Tags</th>
          <th scope="col" class="text-center">Action</th>
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
              <a href="{{route('article.show', $article)}}" class="btn btn-secondary me-2 mx-1 mx-md-3 mx-md-0 mb-1 mb-md-0" aria-label="Read article titled {{$article->title}}">Read article</a>

              <!-- Edit Article Button -->
              <a href="{{route('article.edit', $article)}}" class="btn btn-acc me-2 mt-2 mt-md-0" aria-label="Edit article titled {{$article->title}}">Edit</a>
          </td>
      </tr>
      @endforeach
  </tbody>
</table>
