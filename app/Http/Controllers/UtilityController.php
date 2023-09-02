<?php

namespace App\Http\Controllers;

use App\Models\ActiveUtility;
use App\Models\Tenant;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;

class UtilityController extends Controller
{
    public function updateUtility(Tenant $tenant, Request $request)
    {
        $final_utils = [];
        $hasUtilities = ActiveUtility::where('tenant_name', $tenant->full_names)->where('property_name', $tenant->property_name)->get();


        if ($hasUtilities->isNotEmpty()) {
            $current_utils = $hasUtilities->first()->active_utilities;

            if ($request->has('items')) {
                //IF THERE IS SOME UTILITIES THEN DO THE UPDATE
                $new_utils = $request->except(['_token'])['items'];

                foreach ($new_utils as $key => $value) {
                    if (!in_array($value, $current_utils)) {
                        array_push($current_utils, $value);
                    }
                }

                foreach ($current_utils  as $key => $value) {
                    if (!in_array($value, $new_utils)) {
                        $key = array_search($value, $current_utils);
                        if ($key !== false) {
                            unset($current_utils[$key]);
                        }
                    }
                }

                foreach ($current_utils  as $key => $value) {
                    array_push($final_utils, $value);
                }


                $activeUtils = ActiveUtility::find($hasUtilities->first()->id)->update([
                    'active_utilities' => $final_utils
                ]);
            } else {
                $activeUtils = ActiveUtility::find($hasUtilities->first()->id)->update([
                    'active_utilities' => []
                ]);
            }

            if ($activeUtils) {
                Notification::make()->success()->body('Utilities updated successfully.')->send();

                return back();
            } else {
                Notification::make()->warning()->body('Unable to update utilities.')->send();
                return back();
            }
        } else {

            $activeUtils = ActiveUtility::create(
                [
                    'tenant_id' => $tenant->id,
                    'tenant_name' => $tenant->full_names,
                    'property_name' => $tenant->property_name,
                    'active_utilities' => $request->except(['_token'])['items']
                ]
            );

            if ($activeUtils) {
                Notification::make()->success()->body('Utilities updated successfully.')->send();

                return back();
            } else {
                Notification::make()->warning()->body('Unable to create utilities.')->send();
                return back();
            }
        }
    }
}
