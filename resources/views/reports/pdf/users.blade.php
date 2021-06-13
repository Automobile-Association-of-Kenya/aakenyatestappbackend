
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Reports</title>
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
    <h2>User reports </h2>
    <div class="table-responsive">
                            <table  class="table table-hover mb-0 c_list c_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>                                    
                                        <th data-breakpoints="xs">Phone</th>
                                        <th data-breakpoints="xs">Email</th>
                                        <th data-breakpoints="xs">Date Registered</th>
                                        <th data-breakpoints="xs">Tests Done</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $item)
                                    <tr>
                                        <td>  
                                            <label for="delete_2">USER#{{$item->id}}</label>
                                        </td>
                                        <td>
                                            @if ($item->photo==null)
                                                <a class="avatar w30" href="profile.html"><i class="zmdi zmdi-account-circle zmdi-hc-2x mr-5 "></i></a>
                                            @else
                                                <img src="{{asset('Images/'.$item->photo)}}" class="avatar w30" alt="">
                                            @endif
                                            <p class="c_name">{{$item->name}}</p>
                                        </td>
                                        <td>
                                            <span class="phone"><i class="zmdi zmdi-whatsapp mr-2"></i>{{$item->phone}}</span>
                                        </td>
                                        <td>
                                            <span class="email"><a href="javascript:void(0);" title="">{{$item->email}}</a></span>
                                        </td>
                                        <td>
                                            <span>{{$item->created_at}}</span>
                                        </td>
                                        <td>
                                            <span>{{$item->results->count()}}</span>
                                        </td>
                                    </tr>
                                    @empty
                                        <td>No users to show</td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
</body>
</html>

