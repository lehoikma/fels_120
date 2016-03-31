<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Illuminate\Support\Facades\Input;
use Log;

class Follow extends Model
{
    protected $table = 'follows';

    protected $fillable = ['following_id','follower_id'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public static function isFollowing($id, $userId)
    {
        $arrFollow = Follow::where('following_id', $id)
            ->where('follower_id', $userId)->first();
        return $arrFollow;
    }

    public static function follow()
    {
        $input = Input::all();
        $isFollowingIdExisting = User::where('id', $input['following_id'])->count();
        $isFollowerIdExisting = User::where('id', $input['follower_id'])->count();
        if($isFollowingIdExisting && $isFollowerIdExisting) {
            $follow = Follow::create([
                'following_id' => $input['following_id'],
                'follower_id' => $input['follower_id'],
            ]);
            return $follow;
        }
    }

    public static function unFollow()
    {
        $input = Input::all();
        $isFollowingIdExisting = User::where('id', $input['following_id'])->count();
        $isFollowerIdExisting = User::where('id', $input['follower_id'])->count();
        if($isFollowingIdExisting && $isFollowerIdExisting) {
            $idFollowing = $input['following_id'];
            $userId = $input['follower_id'];
            $follow = Follow::isFollowing($idFollowing, $userId);
            return $follow->delete();
        }
    }

    public static function countFollowUser($arrInput)
    {
        $followerCount = Follow::where('following_id', $arrInput['following_id'])->count();
        $followingCount = Follow::where('follower_id', $arrInput['following_id'])->count();
        return ([
            'follower_count' => $followerCount,
            'following_count' => $followingCount,
        ]);
    }
}

