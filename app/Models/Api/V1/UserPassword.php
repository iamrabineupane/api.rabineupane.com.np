<?php

namespace App\Models\Api\V1;
use App\Models\Api\V1\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserPassword extends Model
{
    use HasFactory;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $table = 'users_passwords';
    protected $fillable = [
        'website',
        'username',
        'password',
        'created_at',
        'updated_at',
        'user_id'
    ];
    /**
     * @return [type]
     */
    public static function queryPagination() {
        $query = self::query();
        return $query;
    }
    /**
     * @param mixed $id
     * 
     * @return [type]
     */
    public static function decryptPassword($id) {
        $query = self::query()->with('user');
        $data =   $query->where('id',$id)->first();
        $data->decrypted_password = Crypt::decryptString($data->password);
        return $data;
    }

    /**
     * @return [type]
     */
    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }

}
