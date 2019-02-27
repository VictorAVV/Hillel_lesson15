# Hillel_lesson15
Домашнее задание к уроку 15

1. Есть массив вида { ‘song1.mp3’=>’Track1 -Track Title’, ‘song2.mp3’=>’Track2 -Track Title’,‘song3.mp3’=>’Track3 -Track Title’}. Нужно динамически создать xml (songs.xml) вида:
```php
<?xml version="1.0" encoding="UTF-8"?>
<xml>
 <track>
     <path>song1.mp3</path>
     <title>Track 1 - Track Title</title>
 </track>
 <track>
     <path>song2.mp3</path>
     <title>Track 2 - Track Title</title>
 </track>
 <track>
     <path>song3.mp3</path>
     <title>Track 3 - Track Title</title>
 </track>
```
2.  В файле ‘name.xml’ создайте xml-файл с информацией о 3-ех студентах (поля: имя,фамилия, отчество, дата рождения и e-mail). Выведите полную информацию о первом и 3-ем студенте из данного xml-файла.

3. Дан xml-файл с информацией о 10 товарах (Поля: наименование товара, категория товара, количество и цена). Найти товар с максимальной ценой и вывести всю информацию о данном товаре в файл “max_price.txt”.

4. Используя xml-файл с задания 3 необходимо вывести информацию о категориях и товарах в следующем виде: Категория 1: список товаров данной категории(через запятую);Категория 2: список товаров данной категории.

5.  
```php 
<?xml version='1.0'?>
<workers>
	<worker>
		<name>Коля</name>
		<age>25</age>
		<salary>1000</salary>
	</worker>
<worker>
		<name>Вася</name>
		<age>26</age>
		<salary>2000</salary>
	</worker>
	<worker>
		<name>Петя</name>
		<age>27</age>
		<salary>3000</salary>
	</worker>
</workers>
```
Вывести информацию о самом младшем сотруднике и о сотруднике с самой высокой зарплатой.
