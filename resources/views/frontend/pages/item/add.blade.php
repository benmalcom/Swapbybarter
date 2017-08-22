@extends('frontend.layouts.default')
@section('content')

    <div class="col-sm-8 col-sm-offset-2 mt-30 mb-20">
        <h3>Swap your item</h3>
        <h5 class="mt-10 mb-10 text-danger text-muted">The images cannot be changed later!</h5>
        <form class="form-horizontal" method="post" action="{{url('/items/swap')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="container-fluid">
                <div class="p-10 pt-30 shadow-lite light-well row">
                    <div class="col-md-6 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <div class="col-sm-12">
                            <input type="text" class="form-control simplebox" maxlength="22" required name="name"
                                   value="{{ old('name') }}" placeholder="Type the name" autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">

                        <div class="col-sm-12">
                            <select class="form-control simplebox" name="category_id" required>
                                <option value=""> -- Category --</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"> {{ucfirst($category->name)}}</option>
                                @endforeach

                            </select>

                            @if ($errors->has('category_id'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 form-group{{ $errors->has('item_condition') ? ' has-error' : '' }}">

                        <div class="col-sm-12">
                            <select class="form-control simplebox" name="item_condition" required>
                                <option value=""> -- Item Condition --</option>
                                @foreach(\App\Models\Item::itemConditions() as $condition)
                                    <option value="{{$condition}}"> {{ucfirst($condition)}}</option>
                                @endforeach

                            </select>

                            @if ($errors->has('category_id'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6 form-group{{ $errors->has('exchange') ? ' has-error' : '' }}">

                        <div class="col-sm-12">
                            <input type="text" class="form-control simplebox" name="exchange"
                                   placeholder="What are you exchanging it for?" required>

                            @if ($errors->has('exchange'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('exchange') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 form-group{{ $errors->has('state_id') ? ' has-error' : '' }}">

                        <div class="col-sm-12">
                            <select class="form-control simplebox" name="state_id" required>
                                <option value=""> -- Select state --</option>
                                @foreach($states as $state)
                                    <option value="{{$state->id}}"> {{ucfirst($state->name)}}</option>
                                @endforeach

                            </select>

                            @if ($errors->has('state_id'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('state_id') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 form-group{{ $errors->has('address') ? ' has-error' : '' }}">

                        <div class="col-sm-12">
                            <input type="text" class="form-control simplebox" name="address"
                                   placeholder="Additional address e.g street name">

                            @if ($errors->has('address'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 form-group{{ $errors->has('description') ? ' has-error' : '' }}">

                        <div class="col-sm-12">
                            <textarea  class="form-control simplebox" name="description"
                                      placeholder="Describe item(Optional)" rows="3"></textarea>

                            @if ($errors->has('description'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="light-well shadow-lite row mt-10 pt-10">
                    @for ($x = 0; $x < 4; $x++)
                        <div class="col-sm-3 upload-container">
                            <div class="col-sm-12">
                                <div class="file-upload">
                                    <img class="advert-image product-image-input img-responsive">
                                    <button type="button" class="btn btn-danger remove-img hidden simplebox"
                                            data-file-index="">x
                                    </button>
                                    <input type="file" class="upload product-image-input" name="images[]"
                                           accept="image/*"/>
                                </div>
                            </div>
                        </div>

                    @endfor
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="mt-5 mb-5">
                    <button type="submit" class="btn btn-danger simplebox">
                        Submit
                    </button>
            </div>

        </form>

    </div>
@endsection
@push('scripts')
{{--    <script src="{{asset('/bower_components/jquery-text-counter/textcounter.min.js')}}"></script>
    <script>
        $('input[name="name"]').textcounter({
            max: 22,
            counterText: "%d characters remaining",
            countSpaces: true,
            countDown: true
        });
    </script>--}}
@endpush
