<?php
namespace App\Traits\Model ;

trait QueryRelations {

    /**
     * Queries a model based on a condition of a relation.
     * Example Use Case: get cards where card->age_group = 0-1
     * Example Usage: Card::whereRelation('age_group', 'name', '0-1')->get()
     *
     * @param object $query         = queryBuilder object automagically added by laravel (don't pass it manually)
     * @param string $relation      = the name of the relation used by the model e.g. 'age_group' or 'user'
     * @param string $column        = the column to compare against
     * @param string|int $value     = the value the column will be compared against
     * @param string|int $operator  = the operation to be used in comparing e.g. '>'. If blank, defaults to '='
     *
     * #whererelation
     */
    public function scopeWhereRelation($query, $relation, $column, $operatorOrValue, $valueOrOperator = null)
    {

        // The following switcheroo allows the developer to write:
        // whereRelation('age_group', 'id', 1)
        // OR
        // whereRelation('age_group', 'id' '>', 1)

        if(func_num_args() === 4) {
            $value      = $operatorOrValue ;
            $operator   = '=' ;
        }

        if(func_num_args() === 5) {
            $value      = $valueOrOperator ;
            $operator   = $operatorOrValue ;
        }


        return $query->whereHas($relation, function($q) use($column, $operator, $value) {

            $q->where($column, $operator, $value);

        });

    }

}
