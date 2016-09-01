<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/src/config/database.php';

use Hamato\NaiveBayes\Models\DataSet;
use Hamato\NaiveBayes\Repositories\DataSetRepository;
use Hamato\NaiveBayes\Classifiers\NaiveBayesClassifier;

$dataSet = new DataSetRepository(
    new DataSet()
);

$classifier = new NaiveBayesClassifier($dataSet);

/**
 * We're checking to see which gender the person with the following attributes
 * is likely to be.
 *
 * Possible outcomes: M or F
 */

$classificationFactor = 'Sex';

$testCase = [
    'Education' => 'Masters',
    'Work' => 35,
    'Disease' => 'Flu',
    'Salary' => 2000
];


$allClasses = $dataSet->fetchCountOfIndividualClasses($classificationFactor);
$totalNumberOfClasses = $dataSet->fetchTotalNumberOfTrainingClasses($classificationFactor);
$probabilityForEachClass = $classifier->calculateProbabilityForEachClass($allClasses, $totalNumberOfClasses);


$probability = $classifier->predict($testCase,
    $allClasses,
    $totalNumberOfClasses,
    $probabilityForEachClass,
    $classificationFactor);

echo $probability;
