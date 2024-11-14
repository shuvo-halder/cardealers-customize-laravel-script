<?php

namespace Modules\Car\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Review;
use App\Models\Wishlist;
use Auth, Image, File, Str;
use Illuminate\Http\Request;
use Modules\Car\Entities\Car;

use Modules\City\Entities\City;
use Modules\Brand\Entities\Brand;
use Illuminate\Routing\Controller;
use Intervention\Image\ImageManager;
use Modules\Car\Entities\CarGallery;
use Modules\Country\Entities\Country;
use Modules\Feature\Entities\Feature;
use Modules\Language\Entities\Language;

use Modules\Car\Entities\CarTranslation;

use Modules\Car\Http\Requests\CarRequest;
use Illuminate\Contracts\Support\Renderable;
use Modules\Subscription\Entities\SubscriptionHistory;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $user = Auth::guard('web')->user();

        $cars = Car::where('agent_id', $user->id)->paginate(15);

        return view('car::frontend.index', ['cars' => $cars]);
    }

    public function select_car_purpose()
    {
        return view('car::frontend.select_car_purpose');
    }



    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request)
    {

        $countries = Country::latest()->get();

        $user = Auth::guard('web')->user();

        $active_plan = SubscriptionHistory::where('user_id', $user->id)->latest()->first();

        if(!$active_plan){
            $notification=  trans('translate.Please enroll first');
            $notification=array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->route('user.pricing-plan')->with($notification);
        }

        $expiration_date = $active_plan->expiration_date;

        if($expiration_date != 'lifetime'){
            if(date('Y-m-d') > $expiration_date){
                $notification = trans('translate.Your plan is expired, please renew or re-order');
                $notification = array('messege'=>$notification,'alert-type'=>'error');
                return redirect()->route('user.pricing-plan')->with($notification);
            }
        }

        $max_car = $active_plan->max_car;

        $total_car = Car::where('agent_id', $user->id)->count();

        if($total_car >= $max_car){
            $notification = trans('translate.Your car limitation has exceeded');
            $notification = array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->route('user.select-car-purpose')->with($notification);
        }


        if($request->purpose == 'Rent'){
            $brands = Brand::with('translate')->where('status', 'enable')->get();
            $cities = City::with('translate')->get();
            $features = Feature::with('translate')->get();
            $dealers = User::all();

            return view('car::frontend.create_rent_car', compact('brands', 'cities', 'features', 'dealers', 'countries'));
        }elseif($request->purpose == 'Sale'){
            $brands = Brand::with('translate')->where('status', 'enable')->get();
            $cities = City::with('translate')->get();
            $features = Feature::with('translate')->get();
            $dealers = User::all();

            return view('car::frontend.create_sale_car', compact('brands', 'cities', 'features', 'dealers', 'countries'));
        }else{
            abort(404);
        };

    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CarRequest $request)
    {
        $car = new Car();

        if($request->thumb_image) {

            $image_name = 'car'.date('-Y-m-d-h-i-s-').rand(999,9999).'.webp';
            $image_name = 'uploads/custom-images/'.$image_name;
            $manager = new ImageManager(['driver' => 'gd']);
            $image = $manager->make($request->thumb_image);

            $user = User::findOrFail($request->agent_id);

            $author_name = '©'. $user->name;

            $author_name = explode(' ', trim($author_name))[0];

            $image->text($author_name, $image->width() / 2, $image->height() - 50, function($font) {
                $font->file(public_path('fonts/static/Quicksand-Bold.ttf'));
                $font->size(40);
                $font->color([255, 255, 255, 0.5]);
                $font->align('center');
                $font->valign('bottom');
            });

            $image->encode('webp', 80)->save(public_path().'/'.$image_name);

            $car->thumb_image = $image_name;

        }

        if($request->video_image){
            $image_name = 'car-video-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.webp';
            $image_name ='uploads/custom-images/'.$image_name;
            Image::make($request->video_image)
                ->encode('webp', 80)
                ->save(public_path().'/'.$image_name);
            $car->video_image = $image_name;
        }

        $car->agent_id = $request->agent_id;
        $car->brand_id = $request->brand_id;
        $car->city_id = $request->city_id;
        $car->country_id = $request->country_id;
        $car->slug = $request->slug;
        $car->features = json_encode($request->features);
        $car->purpose = $request->purpose;
        $car->rent_period = $request->rent_period;
        $car->condition = $request->condition;
        $car->regular_price = $request->regular_price;
        $car->offer_price = $request->offer_price;
        $car->video_id = $request->video_id;
        $car->google_map = $request->google_map;
        $car->body_type = $request->body_type;
        $car->engine_size = $request->engine_size;
        $car->drive = $request->drive;
        $car->interior_color = $request->interior_color;
        $car->exterior_color = $request->exterior_color;
        $car->year = $request->year;
        $car->mileage = $request->mileage;
        $car->number_of_owner = $request->number_of_owner;
        $car->fuel_type = $request->fuel_type;
        $car->transmission = $request->transmission;
        $car->seller_type = $request->seller_type;
        $car->save();

        $user = Auth::guard('web')->user();

        $active_plan = SubscriptionHistory::where('user_id', $user->id)->latest()->first();

        if($active_plan->expiration_date == 'lifetime'){
            $car->expired_date = null;
            $car->save();
        }else{
            $car->expired_date = $active_plan->expiration_date;
            $car->save();
        }

        $languages = Language::all();
        foreach($languages as $language){
            $car_translate = new CarTranslation();
            $car_translate->lang_code = $language->lang_code;
            $car_translate->car_id = $car->id;
            $car_translate->title = $request->title;
            $car_translate->description = $request->description;
            $car_translate->video_description = $request->video_description;
            $car_translate->address = $request->address;
            $car_translate->seo_title = $request->seo_title ? $request->seo_title : $request->title;
            $car_translate->seo_description = $request->seo_description ? $request->seo_description : $request->title;
            $car_translate->save();
        }


        $notification= trans('translate.Created Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('user.car.edit', ['car' => $car->id, 'lang_code' => admin_lang()] )->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Request $request, $id)
    {

        $countries = Country::latest()->get();

        $user = Auth::guard('web')->user();

        $car = Car::where('agent_id', $user->id)->where('id', $id)->firstOrFail();

        $car_translate = CarTranslation::where(['car_id' => $id, 'lang_code' => $request->lang_code])->first();

        if($car->purpose == 'Rent'){

            $brands = Brand::with('translate')->where('status', 'enable')->get();
            $cities = City::with('translate')->where('country_id', $car->country_id)->get();
            $features = Feature::with('translate')->get();
            $dealers = User::all();

            $existing_features = array();
            if($car->features != 'null'){
                $existing_features = json_decode($car->features);
            }

            return view('car::frontend.edit_rent_car', compact('brands', 'cities', 'features', 'dealers', 'car', 'existing_features', 'car_translate', 'countries'));

        }elseif($car->purpose == 'Sale'){

            $brands = Brand::with('translate')->where('status', 'enable')->get();
            $cities = City::with('translate')->where('country_id', $car->country_id)->get();
            $features = Feature::with('translate')->get();
            $dealers = User::all();

            $existing_features = array();
            if($car->features != 'null'){
                $existing_features = json_decode($car->features);
            }

            return view('car::frontend.edit_sale_car', compact('brands', 'cities', 'features', 'dealers', 'car', 'car_translate', 'existing_features', 'countries'));

        }else{
            abort(404);
        };
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(CarRequest $request, $id)
    {
        $car = Car::findOrFail($id);

        if($request->lang_code == admin_lang()){

            if($request->thumb_image) {

                $old_image = $car->thumb_image;

                $image_name = 'car'.date('-Y-m-d-h-i-s-').rand(999,9999).'.webp';
                $image_name = 'uploads/custom-images/'.$image_name;
                $manager = new ImageManager(['driver' => 'gd']);
                $image = $manager->make($request->thumb_image);

                $user = User::findOrFail($car->agent_id);

                $author_name = '©'. $user->name;

                $author_name = explode(' ', trim($author_name))[0];

                $image->text($author_name, $image->width() / 2, $image->height() - 50, function($font) {
                    $font->file(public_path('fonts/static/Quicksand-Bold.ttf'));
                    $font->size(40);
                    $font->color([255, 255, 255, 0.5]);
                    $font->align('center');
                    $font->valign('bottom');
                });

                $image->encode('webp', 80)->save(public_path().'/'.$image_name);

                $car->thumb_image = $image_name;
                $car->save();

                if($old_image){
                    if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
                }

            }

            if($request->video_image){
                $old_image = $car->video_image;
                $image_name = 'car-video-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.webp';
                $image_name ='uploads/custom-images/'.$image_name;
                Image::make($request->video_image)
                    ->encode('webp', 80)
                    ->save(public_path().'/'.$image_name);
                $car->video_image = $image_name;
                $car->save();

                if($old_image){
                    if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
                }
            }

            $car->agent_id = $request->agent_id;
            $car->brand_id = $request->brand_id;
            $car->city_id = $request->city_id;
            $car->country_id = $request->country_id;
            $car->slug = $request->slug;
            $car->features = json_encode($request->features);
            $car->purpose = $request->purpose;
            $car->rent_period = $request->rent_period;
            $car->condition = $request->condition;
            $car->regular_price = $request->regular_price;
            $car->offer_price = $request->offer_price;
            $car->video_id = $request->video_id;
            $car->google_map = $request->google_map;
            $car->body_type = $request->body_type;
            $car->engine_size = $request->engine_size;
            $car->drive = $request->drive;
            $car->interior_color = $request->interior_color;
            $car->exterior_color = $request->exterior_color;
            $car->year = $request->year;
            $car->mileage = $request->mileage;
            $car->number_of_owner = $request->number_of_owner;
            $car->fuel_type = $request->fuel_type;
            $car->transmission = $request->transmission;
            $car->seller_type = $request->seller_type;
            $car->save();

        }

        $car_translate = CarTranslation::findOrFail($request->translate_id);
        $car_translate->title = $request->title;
        $car_translate->description = $request->description;
        $car_translate->video_description = $request->video_description;
        $car_translate->address = $request->address;
        $car_translate->seo_title = $request->seo_title ? $request->seo_title : $request->title;
        $car_translate->seo_description = $request->seo_description ? $request->seo_description : $request->title;
        $car_translate->save();

        $notification= trans('translate.Updated Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $old_image = $car->thumb_image;
        $old_video_image = $car->video_image;

        if($old_image){
            if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
        }

        if($old_video_image){
            if(File::exists(public_path().'/'.$old_video_image))unlink(public_path().'/'.$old_video_image);
        }

        CarTranslation::where('car_id',$id)->delete();
        Review::where('car_id',$id)->delete();
        Wishlist::where('car_id',$id)->delete();

        $galleries = CarGallery::where('car_id', $id)->get();
        foreach($galleries as $gallery){
            $old_image = $gallery->image;

            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }

            $gallery->delete();
        }

        $car->delete();

        $notification=  trans('translate.Delete Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function car_gallery($id){
        $car = Car::findOrFail($id);

        $galleries = CarGallery::where('car_id', $id)->get();

        return view('car::frontend.gallery', compact('car', 'galleries'));
    }

    public function upload_car_gallery(Request $request, $id){

        $car = Car::findOrFail($id);

        foreach ($request->file as $index => $image) {
            $gallery_image = new CarGallery();

            if($image) {

                $image_name = 'car-gallery'.date('-Y-m-d-h-i-s-').rand(999,9999).'.webp';
                $image_name = 'uploads/custom-images/'.$image_name;
                $manager = new ImageManager(['driver' => 'gd']);
                $image = $manager->make($image);

                $user = User::findOrFail($car->agent_id);

                $author_name = '©'. $user->name;

                $author_name = explode(' ', trim($author_name))[0];

                $image->text($author_name, $image->width() / 2, $image->height() - 50, function($font) {
                    $font->file(public_path('fonts/static/Quicksand-Bold.ttf'));
                    $font->size(40);
                    $font->color([255, 255, 255, 0.5]);
                    $font->align('center');
                    $font->valign('bottom');
                });

                $image->encode('webp', 80)->save(public_path().'/'.$image_name);

                $gallery_image->image = $image_name;

            }

            $gallery_image->car_id = $id;
            $gallery_image->save();
        }

        if ($gallery_image) {
            return response()->json([
                'message' => trans('translate.Images uploaded successfully'),
                'url' => route('user.car-gallery', $id),
            ]);
        } else {
             return response()->json([
                'message' => trans('translate.Images uploaded Failed'),
                'url' => route('user.car-gallery', $id),
            ]);
        }

    }

    public function delete_car_gallery($id){
        $gallery = CarGallery::findOrFail($id);
        $old_image = $gallery->image;

        if($old_image){
            if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
        }

        $gallery->delete();

        $notification=  trans('translate.Delete Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);

    }
}
