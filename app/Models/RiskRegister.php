<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiskRegister extends Model
{
    use HasFactory;

    protected $table = 'risk_registers';

    protected $fillable = [
        'code_id',
        'proceso',
        'asset',
        'tipo_vulnerabilidad',
        'vulnerabilidad',
        'tipo_amenaza',
        'amenaza',
        'risk_description',
        'risk_owner',
        'impact_description',
        'prob',
        'impact',
        'categoria_control',
        'mitigation_description',
        'mitigation_description_2',
        'm_cost',
        'm_status',
        'treatment_plan',
        'prob_2',
        'impact_2',
        'current_risk_rating',
        'comentarios_residuales',
        'date_last_reviewed',
        'updated_by',
    ];

    protected $casts = [
        'prob' => 'float',
        'impact' => 'float',
        'priority' => 'float',
        'm_status' => 'float',
        'treatment_plan' => 'float',
        'prob_2' => 'float',
        'impact_2' => 'float',
        'priority_2' => 'float',
        'current_risk_rating' => 'float',
        'date_last_reviewed' => 'date',
    ];
}