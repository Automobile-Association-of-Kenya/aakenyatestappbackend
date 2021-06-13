
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Video Reports</title>
    <style>
        table {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
          text-decoration: none;
        }
        
         td,th {
          border: 1px solid #ddd;
          padding: 8px;
        
        }
        
         tr:nth-child(even){background-color: #f2f2f2;}
        
         tr:hover {background-color: #ddd;}
        
        th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #055F43;
          color: white;
        }
        h1{
            background-color: #055F43;
            text-align: center;
            color: white;
        }

        </style>
</head>

<body>
    <h1>AAK Kenya</h1>
    <h2>Video reports </h2>
    
    <div class="table-responsive">
        <table class="table table-hover mb-0 c_table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th data-breakpoints="xs">Number of Views</th>
                    <th data-breakpoints="xs sm md">Date Created</th>
                    <th data-breakpoints="xs">File size</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($videos as $item)
                <tr>
                    
                    <td><span><i class="zmdi zmdi-collection-video w25"></i> {{$item->title}}</span></td>
                    <td><span class="owner">{{$item->views->count()}}</span></td>
                    <td><span class="date">{{$item->created_at}}</span></td>
                    <td><span class="size">{{number_format((float)(\File::size(public_path('uploads/'.$item->video)))/1048576,2,'.','')}} MB</span></td>
                </tr> 
                @empty
                    <td>No videos to display</td>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>

