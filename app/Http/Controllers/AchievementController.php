<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AchievementController extends Controller
{
    public function craftAchievement(Request $request){
        $id = $request->achievement_id;
        $uid = auth()->user()->id;
        $achievement = Achievement::find($id);
        $achievementMtls = DB::table('achievement_mtls')->where('achievement_id', $id)->get();
        $userInventories = DB::table('materials_inventories')->where('user_id', $uid)->get();
        $hasRequired = true;



        $achievementMtlsCollection = collect($achievementMtls)->where('achievement_id', $achievement->id)->all();
        foreach($achievementMtlsCollection as $recipe){
            $userInven = collect($userInventories)->where('material_id', $recipe->material_id)->all();
            foreach($userInven as $inven){
                if($inven->material_qty < $recipe->material_qty)
                    $hasRequired = false;
            }
        }

        if(!$hasRequired){
            return 0;
        }

        foreach($achievementMtlsCollection as $recipe){
            $affectedUserInventories = DB::table('materials_inventories')->where('user_id', $uid)->where('material_id', $recipe->id)->decrement('material_qty', $recipe->material_qty);
        }

        $updateUserPoints = DB::table('users')->where('id', $uid)->increment('points', $achievement->points);

        $userAchievementInven = DB::table('achievements_inventories')->where('user_id', $uid)->where('achievement_id', $id)->get();
        if($userAchievementInven->count() == 0){
            $createUserAchievement = DB::table('achievements_inventories')->insert([
                'user_id' => $uid,
                'achievement_id' => $id,
                'achievement_qty' => 1
            ]);
        }else{
            $updateUserAchievement = DB::table('achievements_inventories')->where('user_id', $uid)->where('achievement_id', $id)->increment('achievement_qty');
        };

        return 1;
//        $addUserAchievement =
    }
}
