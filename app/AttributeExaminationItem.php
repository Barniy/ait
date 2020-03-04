<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeExaminationItem extends Model
{
    public function attributeExamination()
    {
        return $this->belongsTo(AttributeExamination::class);
    }
}
