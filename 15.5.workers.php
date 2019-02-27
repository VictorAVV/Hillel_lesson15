<?php
/**
 * <?xml version='1.0'?>
 * <workers>
 *   <worker>
 *   	<name>Коля</name>
 *   	<age>25</age>
 *   	<salary>1000</salary>
 *   </worker>
 *   <worker>
 *   	<name>Вася</name>
 *   	<age>26</age>
 *   	<salary>2000</salary>
 *   </worker>
 *   <worker>
 *   	<name>Петя</name>
 *   	<age>27</age>
 *   	<salary>3000</salary>
 *   </worker>
 * </workers>
 * Вывести информацию о самом младшем сотруднике и о сотруднике с самой высокой зарплатой.
 */

$xmlFile = 'workers.xml';

try {
    $workers = simplexml_load_file($xmlFile);
    $countOfWorkers = $workers->count();
    if ($countOfWorkers == 0) {
        throw new Exception('NOTICE: XML-file does not contain workers');
    } 

    $maxSalary = $workers->worker[0]->salary;
    $minAge = $workers->worker[0]->age;
    $indexOfWorkerWithMaxSalary = $indexOfWorkerWithMinAge = 0;

    for ($i = 1; $i < $countOfWorkers; $i++) {
        if ((string) $workers->worker[$i]->salary > $maxSalary) {
            $maxSalary = $workers->worker[$i]->salary;
            $indexOfWorkerWithMaxSalary = $i;
        }
        if ((string) $workers->worker[$i]->age < $minAge) {
            $minAge = $workers->worker[$i]->age;
            $indexOfWorkerWithMinAge = $i;
        }
    }

    echo '<p>';
    echo 'The youngest worker: ' . $workers->worker[$indexOfWorkerWithMinAge]->name . 
         '. Age: ' . $workers->worker[$indexOfWorkerWithMinAge]->age . 
         '. Salary: ' . $workers->worker[$indexOfWorkerWithMinAge]->salary;
    echo '</p>';

    echo '<p>';
    echo 'Worker with highest salary: ' . $workers->worker[$indexOfWorkerWithMaxSalary]->name . 
         '. Age: ' . $workers->worker[$indexOfWorkerWithMaxSalary]->age . 
         '. Salary: ' . $workers->worker[$indexOfWorkerWithMaxSalary]->salary;
    echo '</p>';

} catch (Exception $err) {
    echo $err->getMessage();
    echo ' on line: ' . $err->getLine();
}
