<a href="{{ url('/items/'.$hashIds->encode($item->id).'/details') }}">
    <div class="img-parent">
        @if(Auth::check() && $item->poster->id == Auth::id())
            <a href="{{ url('/items/'.$hashIds->encode($item->id).'/edit') }}" class="btn btn-info btn-xs edit-item-btn"><i class="fa fa-edit"></i> Edit</a>
        @endif
{{--        <div class="item-image text-center">
            @if(count($item->images) > 0)
                <img src="{{ $item->images[0]->url }}" alt="..." style='height: 100%; width: 100%; object-fit: contain'>
            @else
                <img src="{{ asset('img/no-image-found.gif') }}" alt="..."
                     style='height: 100%; width: 100%; object-fit: contain'>
            @endif

        </div>--}}

            @if(isset($item->images) && count($item->images) > 0)
                <div class="item-image text-center" style="background-image: url({{ $item->images[0]->url }})"></div>
            @else
                <div class="item-image text-center" style="background-image: url({{ asset('img/no-image-found.gif') }})"></div>
            @endif
    <div class="item-meta" style="border-radius: 0;background-color: #F5F5F5;">
            <div style="position: relative; top: 50%; transform: translateY(-50%); ">
                <h4 class="name brand-green">{{ \App\Models\Item::shorten($item->name,23) }}</h4>
                @if(!empty($item->description))
                    <p class="text-muted text-sm">{{ \App\Models\Item::shorten($item->description,75) }}</p>
                @else
                    <p class="text-danger">No available description for this item</p>
                @endif
                <p class="text-black"><i class="fa fa-tags"></i> {{ $item->category->name }}</p>
            </div>
        </div>
        <hr class="line">
        <div class="row item-action text-center">
            <div class="col-md-6 col-sm-6 col-xs-6 p-0">
                <h6 class="text-muted"><i
                            class="glyphicon glyphicon-map-marker text-danger"></i> {{ $item->state->name }}</h6>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6 p-0">
                <h6><span class="text-info"><i
                                class="glyphicon glyphicon-time"></i> {{ $item->created_at->diffForHumans() }}</span>
                </h6>
            </div>

        </div>
    </div>
</a>