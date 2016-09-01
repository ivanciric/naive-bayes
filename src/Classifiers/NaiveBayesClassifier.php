<?php

namespace Hamato\NaiveBayes\Classifiers;


use Hamato\NaiveBayes\Repositories\DataSetRepositoryInterface;

class NaiveBayesClassifier implements ClassifierInterface
{
    protected $dataSet;

    public function __construct(DataSetRepositoryInterface $dataSet)
    {
        $this->dataSet = $dataSet;
    }

    public function predict($testCase,
                            $allClasses,
                            $totalNumberOfClasses,
                            $probabilityForEachClass,
                            $classificationFactor)
    {

        foreach($allClasses as $classValue => $numberOfClassOccurrences)
        {
            foreach($testCase as $testCaseKey => $testCaseValue)
            {
                $numberOfClassesForTestCase = $this->dataSet->fetchNumberOfClassesForTestCase(
                    $classificationFactor,
                    $classValue,
                    $testCaseKey,
                    $testCaseValue
                );

                $probability[$classValue][$testCaseKey] = round($numberOfClassesForTestCase / $allClasses[$classValue],2);

                if($probability[$classValue][$testCaseKey] != 0)
                {
                    $probabilityForEachClass['argmax'][$classValue] *= $probability[$classValue][$testCaseKey];
                }

            }
            $probabilityForEachClass['argmax'][$classValue] *= $probabilityForEachClass['Pc'][$classValue];
        }

        return array_keys($probabilityForEachClass['argmax'], max($probabilityForEachClass['argmax']))[0];

    }

    public function calculateProbabilityForEachClass($allClasses, $totalNumberOfClasses)
    {
        $probabilityForClass = [];
        $argmax = [];

        foreach($allClasses as $classValue => $numberOfClassOccurrences)
        {
            $probabilityForClass[$classValue] = round($numberOfClassOccurrences / $totalNumberOfClasses,4);

            $argmax[$classValue] = 1;
        }

        return [
            'Pc' => $probabilityForClass,
            'argmax' => $argmax
        ];
    }
}