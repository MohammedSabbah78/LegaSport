<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\OnBoardingScreen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ads = Ad::all();
        $OnBoardingScreens = Ad::with('onBoarding')->get();
        return response()->view('cms.ads.index', ['ads' => $ads, 'OnBoardingScreens', $OnBoardingScreens]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $OnBoardingScreens = OnBoardingScreen::where('active', 1)->get();
        return response()->view('cms.ads.create', ['OnBoardingScreens' => $OnBoardingScreens]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Ad $ad)
    {
        //

        $validator = Validator($request->all(), [
            'image' => 'required|image|mimes:jpg,png',
            'on_boarding_screen_id' => 'required|integer|exists:on_boarding_screens,id',
            'active' => 'required|boolean',
        ]);
        if (!$validator->fails()) {
            $ad = new Ad();
            if ($request->hasFile('image')) {
                $imageName = time() . '_' . str_replace(' ', '', $ad->name) . '.' . $request->file('image')->extension();
                $request->file('image')->storePubliclyAs('ad', $imageName, ['disk' => 'public']);
                $ad->image = 'ad/' . $imageName;
            }
            $ad->on_boarding_screen_id = $request->get('on_boarding_screen_id');
            $ad->active = $request->input('active');
            $isSaved = $ad->save();
            return response()->json(['message' => $isSaved ?  __('cms.create_success') : __('cms.create_failed')], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $ad)
    {
        //
        $OnBoardingScreens = OnBoardingScreen::where('active', 1)->get();
        return response()->view('cms.ads.edit', ['ad' => $ad, 'OnBoardingScreens' => $OnBoardingScreens]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ad $ad)
    {
        //
        $validator = Validator($request->all(), [
            'image' => 'nullable', 'image|mimes:jpg,png',
            'on_boarding_screen_id' => 'required|integer|exists:on_boarding_screens,id',
            'active' => 'required|boolean',
        ]);
        if (!$validator->fails()) {
            if ($request->hasFile('image')) {
                $imageName = time() . '_' . str_replace(' ', '', $ad->name) . '.' . $request->file('image')->extension();
                $request->file('image')->storePubliclyAs('ad', $imageName, ['disk' => 'public']);
                $ad->image = 'ad/' . $imageName;
            }
            $ad->on_boarding_screen_id = $request->get('on_boarding_screen_id');
            $ad->active = $request->input('active');
            $isSaved = $ad->save();
            return response()->json(['message' => $isSaved ?  __('cms.create_success') : __('cms.create_failed')], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        //
        $isDeleted = $ad->delete();

        if ($isDeleted) {
            Storage::delete($ad->image);
        }
        return response()->json(['message' => __('cms.delete_success')], $isDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }
}
