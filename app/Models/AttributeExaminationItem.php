<?php

namespace App\Models;

use App\Http\Traits\UsesUuid;
use App\Models\AttributeExamination;
use Illuminate\Database\Eloquent\Model;

class AttributeExaminationItem extends Model
{
    use UsesUuid;
    public function attributeExamination()
    {
        return $this->belongsTo(AttributeExamination::class, 'examination_id');
    }
}
