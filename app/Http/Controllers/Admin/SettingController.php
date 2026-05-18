<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Agreement;
use App\Models\Admin\Config;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function config()
    {
        $config = Config::where('id', 1)->exists();
        if ($config) {
            $config = Config::where('id', 1)->first();
        } else {
            $config = [];
        }
        return view('admin.setting.config.add', compact('config'));
    }

    public function config_update(Request $request)
    {
        if ($request->type == 'store') {
            $configStore = new Config;
            $configStore->name = $request->name;
            $configStore->email = $request->email;
            $configStore->phone = $request->phone;
            $configStore->copyright = $request->copyright;
            $configStore->address = $request->address;
            $configStore->facebook = $request->facebook;
            $configStore->instagram = $request->instagram;
            $configStore->twitter = $request->twitter;
            $configStore->youtube = $request->youtube;
            if ($request->hasFile('header_logo')) {
                $headerLogo = $request->file('header_logo');
                $headerLogoPath = 'admin-assets/dynamic/image/setting/config/' . time() . '_' . $headerLogo->getClientOriginalName();
                $headerLogo->move(public_path('admin-assets/project/image/setting/config'), $headerLogoPath);
                $configStore->header_logo = $headerLogoPath;
            }
            if ($request->hasFile('footer_logo')) {
                $footerLogo = $request->file('footer_logo');
                $footerLogoPath = 'admin-assets/dynamic/image/setting/config/' . time() . '_' . $footerLogo->getClientOriginalName();
                $footerLogo->move(public_path('admin-assets/dynamic/image/setting/config'), $footerLogoPath);
                $configStore->footer_logo = $footerLogoPath;
            }
            if ($request->hasFile('favicon')) {
                $favicon = $request->file('favicon');
                $faviconPath = 'admin-assets/dynamic/image/setting/config/' . time() . '_' . $favicon->getClientOriginalName();
                $favicon->move(public_path('admin-assets/dynamic/image/setting/config'), $faviconPath);
                $configStore->favicon = $faviconPath;
            }
            if ($request->hasFile('loader')) {
                $loader = $request->file('loader');
                $loaderPath = 'admin-assets/dynamic/image/setting/config/' . time() . '_' . $loader->getClientOriginalName();
                $loader->move(public_path('admin-assets/dynamic/image/setting/config'), $loaderPath);
                $configStore->loader = $loaderPath;
            }
            if ($configStore->save()) {
                return back()->with('success', 'Config stored successfully');
            }
            return back()->with('error', 'An error occurred');
        } else {
            $configUpdate = Config::find(1);
            $configUpdate->name = $request->name;
            $configUpdate->email = $request->email;
            $configUpdate->phone = $request->phone;
            $configUpdate->copyright = $request->copyright;
            $configUpdate->address = $request->address;
            $configUpdate->facebook = $request->facebook;
            $configUpdate->instagram = $request->instagram;
            $configUpdate->twitter = $request->twitter;
            $configUpdate->youtube = $request->youtube;
            if ($request->hasFile('header_logo')) {
                if ($configUpdate->header_logo && file_exists(public_path($configUpdate->header_logo))) {
                    unlink(public_path($configUpdate->header_logo));
                }
                $headerLogo = $request->file('header_logo');
                $headerLogoPath = 'admin-assets/dynamic/image/setting/config/' . time() . '_' . $headerLogo->getClientOriginalName();
                $headerLogo->move(public_path('admin-assets/dynamic/image/setting/config'), $headerLogoPath);
                $configUpdate->header_logo = $headerLogoPath;
            }

            if ($request->hasFile('footer_logo')) {
                if ($configUpdate->footer_logo && file_exists(public_path($configUpdate->footer_logo))) {
                    unlink(public_path($configUpdate->footer_logo));
                }
                $footerLogo = $request->file('footer_logo');
                $footerLogoPath = 'admin-assets/dynamic/image/setting/config/' . time() . '_' . $footerLogo->getClientOriginalName();
                $footerLogo->move(public_path('admin-assets/dynamic/image/setting/config'), $footerLogoPath);
                $configUpdate->footer_logo = $footerLogoPath;
            }

            if ($request->hasFile('favicon')) {
                if ($configUpdate->favicon && file_exists(public_path($configUpdate->favicon))) {
                    unlink(public_path($configUpdate->favicon));
                }
                $favicon = $request->file('favicon');
                $faviconPath = 'admin-assets/dynamic/image/setting/config/' . time() . '_' . $favicon->getClientOriginalName();
                $favicon->move(public_path('admin-assets/dynamic/image/setting/config'), $faviconPath);
                $configUpdate->favicon = $faviconPath;
            }

            if ($request->hasFile('loader')) {
                if ($configUpdate->loader && file_exists(public_path($configUpdate->loader))) {
                    unlink(public_path($configUpdate->loader));
                }
                $loader = $request->file('loader');
                $loaderPath = 'admin-assets/dynamic/image/setting/config/' . time() . '_' . $loader->getClientOriginalName();
                $loader->move(public_path('admin-assets/dynamic/image/setting/config'), $loaderPath);
                $configUpdate->loader = $loaderPath;
            }
            if ($configUpdate->save()) {
                return back()->with('success', 'Config updated successfully');
            }
            return back()->with('error', 'An error occurred');
        }
    }

    public function maintenance_mode($checked)
    {
        $update = Config::where('id', 1)->update(['maintenance_mode' => $checked]);
        if ($update) {
            return response()->json(['status' => true, 'message' => 'maintenance mode updated'], 200);
        }
        return response()->json(['status' => false, 'message' => 'unable to update maintenance mode'], 400);
    }

    public function agreement()
    {
        $agreements = Agreement::all();
        return view('admin.setting.agreement.add', compact('agreements'));
    }

    public function agreement_update(Request $request)
    {
        $exists = Agreement::where('name',$request->name)->exists();
        if(!$exists){
            $agreementStore = new Agreement;
            $agreementStore->name = $request->name;
            $agreementStore->description = $request->description;
            if($agreementStore->save()){
                return back()->with('success', 'Agreement saved');        
            } else{
                return back()->with('error', 'An error occured');
            }
        } else{
            $agreementUpdate = Agreement::where('name',$request->name)->first();
            $agreementUpdate->description = $request->description;
            if($agreementUpdate->save()){
                return back()->with('success', 'Agreement updated');        
            } else{
                return back()->with('error', 'An error occured');
            }
        }
    }

    // --------------------- slider --------------------

    // public function slider_list()
    // {
    //     $sliders = Slider::orderBy('created_at', 'desc')->get();
    //     if ($sliders) {
    //         return view('admin-views.pages.setting.slider.list', compact('sliders'));
    //     }
    //     return back()->with('error', 'An error occured');
    // }

    // public function slider_store(Request $request)
    // {
    //     if ($request->hasFile('file')) {
    //         $slider = $request->file('file');

    //         $sliderName = time() . '_' . $slider->getClientOriginalName();
    //         $destinationPath = public_path('assets/image/setting/slider');

    //         $mimeType = $slider->getMimeType();
    //         $slider->move($destinationPath, $sliderName);

    //         if (str_starts_with($mimeType, 'image/')) {
    //             $type = 'image';
    //         } elseif (str_starts_with($mimeType, 'video/')) {
    //             $type = 'video';
    //         } else {
    //             return back()->with('error', 'Unsupported file type');
    //         }

    //         $sliderStore = new Slider;
    //         $sliderStore->file = 'assets/image/setting/slider/' . $sliderName;
    //         $sliderStore->type = $type;
    //         $sliderStore->url = $request->url;
    //         if ($sliderStore->save()) {
    //             return back()->with('success', 'Slider added successfully');
    //         }

    //         return back()->with('error', 'An error occurred');
    //     }
    // }

    // public function slider_update(Request $request)
    // {
    //     $sliderUpdate = Slider::find($request->id);
    //     if ($request->hasFile('file')) {
    //         $slider = $request->file('file');

    //         $sliderName = time() . '_' . $slider->getClientOriginalName();
    //         $destinationPath = public_path('assets/image/setting/slider');

    //         $mimeType = $slider->getMimeType();
    //         $slider->move($destinationPath, $sliderName);

    //         if (str_starts_with($mimeType, 'image/')) {
    //             $type = 'image';
    //         } elseif (str_starts_with($mimeType, 'video/')) {
    //             $type = 'video';
    //         } else {
    //             return back()->with('error', 'Unsupported file type');
    //         }
    //         $sliderUpdate->file = 'assets/image/setting/slider/' . $sliderName;
    //         $sliderUpdate->type = $type;
    //     }

    //     $sliderUpdate->url = $request->url;
    //     if ($sliderUpdate->save()) {
    //         return back()->with('success', 'Slider updated successfully');
    //     }
    //     return back()->with('error', 'An error occurred');
    // }

    // public function slider_status(Request $request)
    // {
    //     $sliderStatus = Slider::where('id', $request->id)->update(['status' => $request->status]);
    //     if ($sliderStatus) {
    //         return response()->json(['status' => true, 'message' => 'Status changed successfully']);
    //     }
    //     return response()->json(['status' => false, 'message' => 'Unable to get data']);
    // }

    // public function slider_delete(Request $request)
    // {
    //     $sliderDelete = Slider::where('id', $request->id)->delete();
    //     if ($sliderDelete) {
    //         return back()->with('success', 'Slider deleted successfully');
    //     }
    //     return back()->with('error', 'An error occurred');
    // }
}
