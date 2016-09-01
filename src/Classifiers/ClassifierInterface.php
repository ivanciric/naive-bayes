<?php

namespace Hamato\NaiveBayes\Classifiers;


interface ClassifierInterface
{

    public function predict($testCase,
                            $allClasses,
                            $totalNumberOfClasses,
                            $probabilityForEachClass,
                            $classificationFactor);
}