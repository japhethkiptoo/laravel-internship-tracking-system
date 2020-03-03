<h1>Lecturer Register</h1>

{{$errors}}

<form action="{{route('lec.register')}}" method="POST" accept-charset="utf-8">
	{{csrf_field()}}
	<input type="text" name="name" placeholder="name">
	<input type="number" name="phone" placeholder="phone">
	<input type="email" name="email" placeholder="Username">
	<input type="number" name="department" placeholder="department">
	<input type="password" name="password" placeholder="password">

	<input type="submit" value="Register">
</form>