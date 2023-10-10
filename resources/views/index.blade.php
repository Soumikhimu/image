<form action="{{route('store')}}" method="post"  enctype="multipart/form-data">
    @csrf
Name<input type="text" name="name" id="" >
<br>
Email<input type="email" name="email">
<br>
<input type="file" name="image">
<br>
<button type="submit">Submit</button>

</form>
