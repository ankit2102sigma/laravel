<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\TaskController;
class Tasks extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description'];


}
