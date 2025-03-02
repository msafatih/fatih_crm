<?php
tes
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    //
    protected $table = 'leads';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'status',
        'sales_id',
    ];

    public function sales()
    {
        return $this->belongsTo(User::class, 'sales_id');
    }

    public function customer()
    {
        return $this->hasOne(Customer::class, 'lead_id');
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'lead_id');
    }

    public static function getTableColumns()
    {
        return [
            'ID' => 'id',
            'Lead Information' => [
                'fields' => ['name', 'company'],
                'display' => ['Name', 'Company']
            ],
            'Contact Details' => [
                'fields' => ['email', 'phone'],
                'display' => ['Email', 'Phone']
            ],
            'Status' => [
                'fields' => ['status'],
                'type' => 'badge'
            ],
        ];
    }
}
