@extends('frontend.layouts.default')
@section('content')
    <div class="col-sm-8 col-sm-offset-2 mb-20 mt-40">

            <div class="row">
                <div class="col-sm-6 p-10 pt-20 shadow-lite light-well">
                    <h3 class="mb-5">Edit item</h3>

                    <form class="form-horizontal" method="post" action="{{url('/items/update')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="hashed_id" value="{{$hashIds->encode($item->id)}}">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="col-sm-12">
                                <input type="text" class="form-control simplebox" name="name" value="{{ $item->name }}"
                                       placeholder="Type the name" autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">

                            <div class="col-sm-12">
                                <select class="form-control simplebox" name="category_id" required>
                                    <option value=""> -- Category --</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" @if($item->category_id==$category->id){{"selected"}}@endif> {{ucfirst($category->name)}}</option>
                                    @endforeach

                                </select>

                                @if ($errors->has('category_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('exchange') ? ' has-error' : '' }}">

                            <div class="col-sm-12">
                                <input type="text" class="form-control simplebox" value="{{$item->exchange}}"
                                       name="exchange" placeholder="What are you exchanging it for?" required>

                                @if ($errors->has('exchange'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('exchange') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('state_id') ? ' has-error' : '' }}">

                            <div class="col-sm-12">
                                <select class="form-control simplebox" name="state_id" required>
                                    <option value=""> -- Select state --</option>
                                    @foreach($states as $state)
                                        <option value="{{$state->id}}" @if($item->state_id==$state->id){{"selected"}}@endif> {{ucfirst($state->name)}}</option>
                                    @endforeach

                                </select>

                                @if ($errors->has('state_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">

                            <div class="col-sm-12">
                                <input type="text" class="form-control simplebox" value="{{$item->address}}"
                                       name="address" placeholder="Additional address e.g street name">

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">

                            <div class="col-sm-12">
                                <textarea class="form-control simplebox" name="description"
                                           placeholder="Describe product(Optional)"
                                          rows="2">{{$item->description}}</textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12 mb-5">
                                <button type="submit" class="btn btn-transparent-success simplebox">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="col-sm-6">
                    <form>

                        <div class="row form-group">

                        @if(isset($item->images) && count($item->images) > 0)
                                @foreach($item->images as $image)
                                    <div class="col-sm-6 upload-container">
                                        <div class="col-sm-12">
                                            <div class="file-upload shadow-lite" style="background-image: url('{{$image->url}}')">
                                                {{--<img  class="advert-image img-responsive">--}}{{--
                                                <button type="button" data-bg-image="{{$image->url}}" class="btn btn-danger remove-img hidden simplebox" data-file-index="">x</button>
                                                <input type="file" class="upload product-image-input" name="images[]" accept="image/*"/>--}}
                                            </div>
                                        </div>

                                    </div>

                                @endforeach
                            @else
                                <div class="col-sm-12 col-xs-12">
                                    <p class="text-danger"><i class="fa fa-times"></i> No image uploaded for this item</p>
                                </div>
                            @endif

                            <div class="clearfix"></div>

                        </div>
                    </form>
                </div>

            </div>
            <div class="clearfix"></div>


    </div>
    <div class="clearfix"></div>

@endsection
@section('include-js')
    <script src="{{asset('/bower_components/jquery-text-counter/textcounter.min.js')}}"></script>
    <script>
        $('input[name="name"]').textcounter({
            max: 22,
            counterText: "%d characters remaining",
            countSpaces: true,
            countDown: true
        });
    </script>
@endsection
