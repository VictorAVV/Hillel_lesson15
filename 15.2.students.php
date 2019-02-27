<?php
/**
 * 2. В файле ‘name.xml’ создайте xml-файл с информацией о 3-ех студентах 
 * (поля: имя,фамилия, отчество, дата рождения и e-mail). 
 * Выведите полную информацию о первом и 3-ем студенте из данного xml-файла.
 */

/**
 * @whoNeed - массив. Здесь перечислены номера студентов, которых необходимо выбрать из xml-файла.
 * Нумерация начинается с 1 - это соответствует узлу student[0] в xml-файле.
 */
$whoNeed = array(1, 3);

$students = simplexml_load_file('names.xml');

// количество узлов student в xml-файле
$countOfStudents = $students->count();

foreach ($whoNeed as $id) {
    if (!is_numeric($id) || $id <= 0 || $id > $countOfStudents) {
        continue;
    }
    printf(
        "<p>$id. Студент %s %s %s родился %s. Его почта: %s</p>",
        $students->student[$id-1]->name,
        $students->student[$id-1]->patronymic,
        $students->student[$id-1]->surname,
        $students->student[$id-1]->birthday,        
        $students->student[$id-1]->email    
    );
}
