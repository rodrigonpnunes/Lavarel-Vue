<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Agenda extends Model
{
    use SoftDeletes;
    protected $fillable = ['titulo','conteudo','datai','dataf'];
    protected $dates = ['deleted_at'];
}
