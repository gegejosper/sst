<h3>By Category</h3>
          <div class="list-group">
            @foreach($dataCategory as $Category)
              <a href="/category/{{$Category->id}}"class="name">{{$Category->cat_name}}</a>
            @endforeach
          </div>
          <h3 class="my-4">By Brand</h3>
          <div class="list-group">
            @foreach($dataBrand as $Brand)
              <a href="/brand/{{$Brand->id}}"class="name">{{$Brand->brand_name}}</a>
            @endforeach
          </div>

          <h3 class="my-4">Popular Tags</h3>
          <div class="list-group">
            @foreach ($dataTags as $tag)
                  <li><a class="" href="/tags/{{$tag->slug}}">{{ $tag->name }} ({{ $tag->count}})</a></li>
            @endforeach
        </div>