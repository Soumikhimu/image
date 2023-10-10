<!DOCTYPE html>
<html>
<head>
    <style>
        /* Add some basic styling for the table */
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px auto;
        }
        
        /* Style table headers */
        th, td {
            border: 1px solid #685151;
            text-align: left;
            padding: 8px;
        }

        /* Add background color to header row */
        th {
            background-color: #c8e08e;
        }
    </style>
</head>
<body>
    <table>
        <div>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </div>
        <div>
            @forelse ($students as $student )
            <tr>
                
                <td>{{$student->name}}</td>
                <td>{{$student->email}}</td>
                <td><img src="{{asset('storage/category/subcategory/'.$student->image)}}" style="width: 100px" alt=""></td>
                
                <td class="px-6 py-4">
                    
                    <a href="{{route('edit', $student->id)}}" class="font-medium text-white hover:underline">Edit</a>
                    <form class="inline" action="{{route('destroy', $student->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input class="font-medium text-red-600 hover:underline dark:text-red-600" type="submit" value="Delete">
                    </form>
                </td>
                
                @empty
                    
                @endforelse
                
            </tr>
        </div>
        
    </table>
</body>
</html>