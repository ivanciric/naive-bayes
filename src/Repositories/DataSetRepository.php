<?php

namespace Hamato\NaiveBayes\Repositories;

use Hamato\NaiveBayes\Models\DataSet;

class DataSetRepository implements DataSetRepositoryInterface
{
    protected $dataSet;

    public function __construct(DataSet $dataSet)
    {
        $this->dataSet = $dataSet;
    }

    public function fetchCountOfIndividualClasses($classificationFactor)
    {
        $class = $this->fetchDistinctClassificationFactor($classificationFactor);

        $allClasses = [];

        foreach($class as $c)
        {
            $m = $this->dataSet->selectRaw('count(*) as num')
                ->where($classificationFactor, $c->$classificationFactor)
                ->groupBy($classificationFactor)
                ->first();

            $allClasses[$c->$classificationFactor] = $m->num;
        }

        return $allClasses;
    }

    private function fetchDistinctClassificationFactor($classificationFactor)
    {
        return $this->dataSet->distinct()->get([$classificationFactor]);
    }

    public function fetchTotalNumberOfTrainingClasses($classificationFactor)
    {
        $m = $this->dataSet->selectRaw("count($classificationFactor) as num")->first();

        return $m->num;
    }

    public function fetchNumberOfClassesForTestCase($classificationFactor, $class, $testCaseKey, $testCaseValue)
    {
        $m = $this->dataSet->selectRaw("count($classificationFactor) as num")
            ->where($classificationFactor, $class)
            ->where($testCaseKey, $testCaseValue)
            ->first();

        return $m->num;
    }
}
