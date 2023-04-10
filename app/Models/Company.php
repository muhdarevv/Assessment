<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'logo', 'website'];
    
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function setLogoAttribute($value)
    {
        if ($value instanceof UploadedFile) {
            // Delete the old logo
            if ($this->attributes['logo']) {
                Storage::disk('public')->delete($this->attributes['logo']);
            }
            // Upload the new logo
            $this->attributes['logo'] = $value->store('Logos', 'public');
        } else {
            $this->attributes['logo'] = $value;
        }
    }
    

}
