<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImageGetterController extends Controller
{
    public function __invoke(Request $request, $context)
    {
        // $user = User::with(['superadmin','finance','admin'
        //                     ,'agen','customer'])
        //                 ->find(Auth::user()->id);

        if ($context) {
            switch ($context) {
                case 'profile':
                    // $imagePath = 'img/profile' .$user[$user->role]->first_name.'.jpg';
                    $imagePath = $request->profile ? $request->profile : 'img/profile/default-profile.jpg';
                    if (!Storage::exists($imagePath)) {
                        $imagePath = 'img/profile/default-profile.jpg';
                    }
                    break;
                case 'parcel':
                    $imagePath = $request->parcel ? $request->parcel : 'img/parcel-proof/default-parcel.png';
                    if (!Storage::exists($imagePath)) {
                        $imagePath = 'img/parcel-proof/default-parcel.png';
                    }
                    break;
                case 'merch':
                    $imagePath = $request->merch ? $request->merch : 'img/merch/default-merch.png';
                    if (!Storage::exists($imagePath)) {
                        $imagePath = 'img/merch/default-merch.png';
                    }
                    break;
                default:
                    $imagePath = 'img/services-providers/' . $request->service . '.png';
                    break;
            }
            // return response()->json([
            //     'Image-path' => Storage::url($imagePath),
            // ]);
            return Storage::response($imagePath);
        }
    }
}
