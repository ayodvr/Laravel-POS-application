<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customers List</title>
</head>
<body>
    <table class="blueTable">
        <thead>
        <tr>
        <th>Id</th>
        <th>Image</th>
        <th>Fullname</th>
        <th>Email</th>
        <th>Phone</th>
        </tr>
        </thead>
        <tbody>
            @if(!empty($customer_pdf))
            @foreach($customer_pdf as $customer)
          <tr>
            <td style="text-align: center;width: 50px">{{$customer->id}}</td>
            <td><img src="/storage/avatar/{{$customer->avatar}}" style ="width:100px" alt="" class="img-fluid"></td>
            <td style="width: 300px;text-align:center">{{$customer->name}}</td>
            <td  style="width: 300px;text-align: center">{{$customer->email}}</td>
            <td  style="width: 300px;text-align: center">{{$customer->phone_number}}</td>
          </tr>
          @endforeach
          @endif
        </tbody>
        </table>
</body>
</html>
                 
        