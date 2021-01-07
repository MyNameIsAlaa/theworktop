@foreach($catalogs as $catalog)
<div class="category_btn_wrap">

<a href="{{ url('catalog/'. $catalog->id) }}">
        <div class="image_wrap">
            <img src="{{$catalog->picture_url}}" onerror="this.src='https://placeimg.com/640/480/tech?{{$catalog->id}}' "
                alt="">
        </div>
        <span>{{ $catalog->catalog_name }}</span>
    </a>
    <div class="btnwrap">
        <div id="add_btn_{{$catalog->id}}" class="addtocard addtocardbtn" tag="{{$catalog->id}}">
            <i class="far fa-plus-square"></i>
            Add To Quote
        </div>
        <div id="done_btn_{{$catalog->id}}" class="addtocardbtn_done" tag="{{$catalog->id}}">
            <i class="far fa-check-square"></i>
            Added To Quote
        </div>
        <div class="fav_btn" tag="{{$catalog->id}}">
            <i class="fa fa-heart"></i>
            Add To Favorite
        </div>

    </div>
</div>
@endforeach



<div class="btngroup text-center">
    {{ $catalogs->links() }}
</div>

  </ul>
</nav>

@foreach($cart_catalogs as $cat)
  <script>
  document.getElementById("add_btn_{{$cat}}").style.display = 'none';
  document.getElementById("done_btn_{{$cat}}").style.display = 'inline-block';
  </script>
@endforeach
