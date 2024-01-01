@include('admin.allscripts')
<form role="form" action="{{ route('admin.images.store', ['id' => $product_id]) }}" method="post"
    enctype="multipart/form-data">
    @csrf
    <table class="table table-bordered">
        <tr>
            <td>Title</td>
            <td><input type="text" name="title" class="form-control" placeholder="Enter title"></td>
            <td>File input</td>
            <td><input type="file" id="exampleInputFile" class="custom-file-input form-control" name="image"></td>
            <td><button type="submit" class="btn btn-primary">Submit</button></td>
        </tr>
    </table>

</form>
<hr>
<h1>Image Gallery</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Title</th>
            <th>Image</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($images as $rs)
            <tr>
                <td>{{$rs->title}}</td>
                <td><img src="{{Storage::url($rs->image)}}" style="width:40px;"></td>
                <td><a href="{{route('admin.images.destroy',['id'=>$rs->id])}}">Delete</a></td>
            </tr>
        @endforeach
        
    </tbody>
</table>