<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Item;
use Vinkla\Hashids\HashidsManager;
use App\Models\Category;
use App\Models\State;
use App\Utils\ImageUploader;
use Auth;




class ItemController extends Controller
{
    protected $hashids;
    const ITEMS_PER_PAGE =  12;
    const SEARCH_RESULTS_PER_PAGE =  16;


    public function __construct(HashidsManager $hashids)
    {
        $this->hashids = $hashids;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $states = State::all();
        $categories = Category::all();
        return view('frontend.pages.item.add',compact('states','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ImageUploader $uploader)
    {
        //
        $inputs = $request->all();
        $validator = Validator::make($inputs,Item::createRules());
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        $inputs['user_id'] = Auth::id();
        $item = Item::create($inputs);

        if($request->hasFile('images'))
            $images = $uploader->uploadItemImages($request->file('images'));

        if(!empty($images) && !is_null($item))
            $item->images()->saveMany($images);
        $this->setFlashMessage("You added a new item for swap",1);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $hashed_id
     * @return \Illuminate\Http\Response
     */
    public function show($hashed_id)
    {
        //
        $id = $this->getHashIds()->decode($hashed_id)[0];
        $item = Item::where('id',$id)->with('state','category','poster','images')->first();
        if(!is_null($item)){
            $item = $item->incrementViews();
        };
        return view('frontend.pages.item.details',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $hashed_id
     * @return \Illuminate\Http\Response
     */
    public function edit($hashed_id)
    {//
        $id = $this->getHashIds()->decode($hashed_id)[0];
        $states = State::all();
        $categories = Category::all();
        $item = Item::where('id',$id)->with('category','state','poster','images')->first();
        return view('frontend.pages.item.edit',compact('item','categories','states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $inputs = $request->all();
        $validator = Validator::make($inputs,Item::createRules());
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }
        $hashed_id =  $inputs['hashed_id'];
        $id = $this->getHashIds()->decode($hashed_id)[0];
        unset($inputs['hashed_id']);
        $item = Item::find($id)->update($inputs);
        if(is_null($item))
        {
            $this->setFlashMessage("Item not found!",2);
            return redirect('/');
        }
        $this->setFlashMessage("Item details updated",1);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $hashed_id
     * @return \Illuminate\Http\Response
     */
    /*public function destroy($hashed_id)
    {
        //
        $id = $this->getHashIds()->decode($hashed_id)[0];
        $item = Item::find($id);
        $user = \Auth::user();
        if($user->id != $item->user_id || !$user->isAdmin())
        {
            $this->setFlashMessage("You don't have the permission to delete this item!",2);
            return redirect('/');
        }

        if(is_null($item))
        {
            $this->setFlashMessage("Item not found!",2);
            return redirect('/');
        }
        $item_id = $item->id;
        Item::destroy($item->id);
        if(!is_null($item_id)){
            $public_ids = [];
            $images = ItemImage::where('item_id',$item_id)->get(array('public_id'));
            foreach($images as $image){
                array_push($public_ids,$image->public_id);
            }
            Cloudder::destroyImages($public_ids);
        }
        $this->setFlashMessage("Item deleted!",1);
        return redirect()->back();
    }*/

    /**
     * Display the specified resource.
     *
     * @param  int  $hashed_id
     * @return \Illuminate\Http\Response
     */
    public function getItemsByCategory($hashed_id)
    {
        //
        $id = $this->getHashIds()->decode($hashed_id)[0];
        $category = Category::find($id);
        $categories = Category::all();
        $states = State::all();
        $items = Item::where('category_id',$category->id)
            ->with('category','state','poster','images')
            ->paginate(self::ITEMS_PER_PAGE);
        return view('frontend.pages.item.category-items',compact('items','category', 'categories','states'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function getItemSearchResult(Request $request)
    {
        //
        $term = $request->get('term','');

        $query = Item::orderBy('created_at','desc');
        if(!empty($term)){
            $query->where('name', 'LIKE', '%' . $term . '%');
        }
        if($request->has('category')){
            $category_id = $this->getHashIds()->decode($request->get('category'))[0];
            $query->where('category_id', $category_id);
        }

        if($request->has('state')){
            $state_id = $this->getHashIds()->decode($request->get('state'))[0];
            $query->where('state_id', $state_id);
        }

        $items = $query->paginate(self::ITEMS_PER_PAGE);
        $items->load('state','images','category','poster');
        $categories = Category::all();
        $states = State::all();
        return view('frontend.pages.item.search-results',compact('items','states','categories','term'));
    }
}
