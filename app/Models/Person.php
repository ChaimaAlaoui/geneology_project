<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 
        'last_name', 
        'birth_name', 
        'middle_names', 
        'date_of_birth', 
        'created_by'  
    ];

    public function children()
    {
        return $this->belongsToMany(Person::class, 'relationships', 'parent_id', 'child_id');
    }

    public function parents()
    {
        return $this->belongsToMany(Person::class, 'relationships', 'child_id', 'parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getDegreeWith($target_person_id)
    {
        $relations = DB::select("
            SELECT parent_id, child_id FROM relationships
        ");

        $graph = [];
        foreach ($relations as $relation) {
            $graph[$relation->parent_id][] = $relation->child_id;
            $graph[$relation->child_id][] = $relation->parent_id;
        }

        $visited = [];
        $queue = new \SplQueue();
        $queue->enqueue([$this->id, 0, [$this->id]]);

        while (!$queue->isEmpty()) {
            list($current_person_id, $degree, $path) = $queue->dequeue();

            if ($current_person_id == $target_person_id) {
                return ['degree' => $degree, 'path' => $path];
            }

            if ($degree >= 25) {
                return false;
            }

            $visited[$current_person_id] = true;

            if (isset($graph[$current_person_id])) {
                foreach ($graph[$current_person_id] as $related_person_id) {
                    if (!isset($visited[$related_person_id])) {
                        $visited[$related_person_id] = true;
                        $new_path = $path;
                        $new_path[] = $related_person_id;
                        $queue->enqueue([$related_person_id, $degree + 1, $new_path]);
                    }
                }
            }
        }

        return false;
    }
}