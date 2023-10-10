<form action="{{route('update' , $students->id)}}" method="post"  enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="editid" value="{{$students->id}}">
Name<input type="text" name="name" class="form-control" placeholder="name" value="{{$students->name}}" required />
<br>
Email<input type="email" name="email" class="form-control" placeholder="email" value="{{$students->email}}" required />

<br>
<input type="file" name="image">
<img src="{{asset('storage/category/subcategory/'.$students->image)}}" style="width: 100px" alt="">
<br>
<button type="submit" >Update</button>

</form>
