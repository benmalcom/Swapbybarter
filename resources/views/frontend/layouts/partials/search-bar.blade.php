<div class="row m-0" style="background-color: #9CDBD0;">
    <form method="get" action="{{ url('/search') }}">

        <div class="col-md-3 pt-10 pb-10 col-sm-4">
            <strong class="pull-left">Which item do you have?</strong>
            <div>
                <input type="text" class="form-control" name="item" placeholder="Type your item name">
            </div>
        </div>

        <div class="col-md-3 pt-10 pb-10 col-sm-4">
            <strong class="pull-left">Which item do you need?</strong>
            <div>
                <input type="text" class="form-control" name="exchange" placeholder="Which item are you searching for?">
            </div>
        </div>
        <div class="col-md-2 pt-10 pb-10 col-sm-4">
            <strong class="pull-left">Include state?</strong>
            <div>
                <select class="form-control simplebox" name="state">
                    <option value="">-- select --</option>

                    @foreach($states as $state)
                        <option value="{{ $hashIds->encode($state->id) }}">
                            {{ $state->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-2 pt-10 pb-10 col-sm-4">
            <strong class="pull-left">Include category?</strong>
            <div>
                <select class="form-control simplebox bg-white" name="category">
                    <option value="">-- select --</option>
                    @foreach($categories as $category)
                        <option value="{{ $hashIds->encode($category->id) }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-2 pt-10 pb-10 col-sm-2">
            <br>
            <button type="submit" class="btn btn-custom btn-block shadow-lite search-btn">Search</button>
        </div>
    </form>
</div>
<div class="clearfix"></div>