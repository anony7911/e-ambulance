<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'pelanggans';

    protected $fillable = ['nama','email','no_telp','user_id'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pesanans()
    {
        return $this->hasMany('App\Models\Pesanan', 'pelanggan_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    
}
