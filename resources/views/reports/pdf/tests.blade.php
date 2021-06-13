
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Reports</title>
    <style>
        table {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
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
          background-color: #04AA6D;
          color: white;
        }
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
    <h2>Test reports </h2>
    <div class="table-responsive">
        <table class="table table-hover c_table">
            <thead>
                <tr>
                    <th style="width:60px;">#</th>
                    <th>Title</th>
                    <th>Topic</th>
                    <th>Number of Attempts</th>                                    
                    <th>Highest score</th>   
                    <th>Lowest score</th>                                  
                    <th>Mean Score</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($all_tests as $item)
                <tr>
                    <td>{{$item->code}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->topic->title}}</td>
                    <td>{{$item->results->count()}}</td>
                    <td>{{$item->results->max('score')}}</td>
                    <td>{{$item->results->min('score')}}</td>
                    <td>{{$item->results->average('score')}}</td>
                </tr>
                @empty
                    <td>Nothing to show</td>
                @endforelse
                
            </tbody>
        </table>

    </div>
</body>
</html>

