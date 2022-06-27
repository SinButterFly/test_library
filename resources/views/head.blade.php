<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="menu">
			<a href="{{route('index_page')}}" class="menu_item">Главная</a>
			<a href="{{route('shelves_page')}}" class="menu_item">Полки</a>
			<a href="{{route('categories_page')}}" class="menu_item">Категории</a>
			<a href="{{route('tags_page')}}" class="menu_item">Теги</a>
			<a href="{{route('books_page')}}" class="menu_item">Книги</a>
			<a href="{{route('readers_page')}}" class="menu_item">Читатели</a>
		</div>
	
		@yield('content')
	</div>
	
</body>
</html>