<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeExamination extends Model
{
    public function attributeExaminationItems()
    {
        return $this->hasMany(AttributeExaminationItem::class);
    }
}
