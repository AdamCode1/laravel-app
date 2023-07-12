<?php
namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class course extends Model{

    protected $table = 'course';
    protected $fillable = ['name','description'];
 
    public function students(){
        return $this->hasMany(Student::class);
    }

    use HasFactory;





}













