<?php
<<<<<<< HEAD

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
}
=======
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Banner extends Model
{
    use HasFactory;
    protected $fillable=['title','description','image','link','status'];
}
>>>>>>> d9586df37e91cc585d95c2d4962fea5f00191192
