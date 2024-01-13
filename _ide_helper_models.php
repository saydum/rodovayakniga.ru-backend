<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Human
 *
 * @property int $id
 * @property string $name
 * @property string|null $f_name
 * @property string|null $o_name
 * @property string|null $gender
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $data_birth
 * @property string|null $location_birth
 * @property int|null $height
 * @property string|null $eye_color
 * @property string|null $hair_color
 * @property string|null $nationality
 * @property int|null $generation
 * @property string|null $text
 * @property int|null $rod_id
 * @property int|null $father_id
 * @property int|null $mather_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Human|null $father
 * @property-read Human|null $mather
 * @property-read \App\Models\ShareTreeLink|null $shareTreeLink
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Tree> $trees
 * @property-read int|null $trees_count
 * @method static \Database\Factories\HumanFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Human newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Human newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Human query()
 * @method static \Illuminate\Database\Eloquent\Builder|Human whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Human whereDataBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Human whereEyeColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Human whereFName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Human whereFatherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Human whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Human whereGeneration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Human whereHairColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Human whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Human whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Human whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Human whereLocationBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Human whereMatherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Human whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Human whereNationality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Human whereOName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Human whereRodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Human whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Human whereUpdatedAt($value)
 */
	class Human extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\HumanTreeJoin
 *
 * @property int $id
 * @property int $human_id
 * @property int $tree_id
 * @method static \Illuminate\Database\Eloquent\Builder|HumanTreeJoin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HumanTreeJoin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HumanTreeJoin query()
 * @method static \Illuminate\Database\Eloquent\Builder|HumanTreeJoin whereHumanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HumanTreeJoin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HumanTreeJoin whereTreeId($value)
 */
	class HumanTreeJoin extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Post
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string|null $image
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUserId($value)
 * @mixin \Eloquent
 */
	class Post extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property-read mixed $role_priority
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role withoutPermission($permissions)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ShareTreeLink
 *
 * @property int $human_id
 * @property string $link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read ShareTreeLink|null $human
 * @method static \Illuminate\Database\Eloquent\Builder|ShareTreeLink newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShareTreeLink newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShareTreeLink query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShareTreeLink whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShareTreeLink whereHumanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShareTreeLink whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShareTreeLink whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ShareTreeLink extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Tree
 *
 * @property int $id
 * @property string $name
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Human> $humans
 * @property-read int|null $humans_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Tree newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tree newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tree query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tree whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tree whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tree whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tree whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tree whereUserId($value)
 */
	class Tree extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Post> $posts
 * @property-read int|null $posts_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Tree> $trees
 * @property-read int|null $trees_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutRole($roles, $guard = null)
 */
	class User extends \Eloquent {}
}

