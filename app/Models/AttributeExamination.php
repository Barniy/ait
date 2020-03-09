<?php

namespace App\Models;

use App\Http\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use App\Models\AttributeExaminationItem;

class AttributeExamination extends Model
{
    use UsesUuid;
    public function attributeExaminationItems()
    {
        return $this->hasMany(AttributeExaminationItem::class, 'examination_id');
    }
}
