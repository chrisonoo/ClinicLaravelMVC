<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Laravel\Scout\Searchable;

    /**
     * @mixin Builder
     */

    class Doctor extends Model
    {
        use HasFactory;

        protected $table = "doctors";
        protected $primaryKey = 'id';
        const CREATED_AT = null;
        const UPDATED_AT = null;
    }
