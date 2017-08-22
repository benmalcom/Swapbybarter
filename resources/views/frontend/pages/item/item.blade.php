<a href="{{ url('/items/'.$hashIds->encode($item->id).'/details') }}">
    <div class="img-parent">
        <div class="item-image text-center">
            <!--                   <img src="https://s12.postimg.org/655583bx9/item_1_180x200.png" alt="...">-->
            <img src="{{ $item->images[0]->url }}" alt="..." style='height: 100%; width: 100%; object-fit: contain'>

        </div>
        <div class="item-meta light-well">
            <div style="position: relative; top: 50%; transform: translateY(-50%); ">
                <h4 class="text-black">{{ \App\Models\Item::shorten($item->name,23) }}</h4>
                @if(!empty($item->description))
                    <p class="text-muted text-sm">{{ \App\Models\Item::shorten($item->description,65) }}</p>
                @else
                    <p class="text-danger">No available description for this item</p>
                @endif
                <p class="brand-green"><i class="fa fa-tags"></i> {{ $item->category->name }}</p>
            </div>
        </div>
        <hr class="line">
        <div class="row item-action text-center">
            <div class="col-md-6 col-sm-6 p-0">
                <h6 class="text-muted"><i class="glyphicon glyphicon-map-marker"></i> {{ $item->state->name }}</h6>
            </div>
            <div class="col-md-6 col-sm-6 p-0">
                <h6><span class="text-info"><i class="glyphicon glyphicon-time"></i> {{ $item->created_at->diffForHumans() }}</span></h6>
            </div>

        </div>
    </div>
</a>