<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Database</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* General Styles */
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      background: #121212;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }
    
    /* Container Styling */
    .container {
      background: #1E1E1E;
      color: #FFFFFF;
      min-width: 320px; 
      max-width: 90vw; 
      width: 100%;
      border-radius: 12px;
      padding: 30px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
      animation: fadeIn 1s ease-in-out;
      margin-top: 20px;
    }

    
    @keyframes fadeIn {
      0% {
          opacity: 0;
          transform: translateY(-20px);
      }
      100% {
          opacity: 1;
          transform: translateY(0);
      }
    }
    
    /* Heading Styling */
    h1 {
      text-align: center;
      font-size: 24px;
      margin-bottom: 20px;
      color: #FFD700;
      font-weight: bold;
    }
    
    /* Table Styling */
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      background: #2C2C2C;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
    }
    
    th, td {
      padding: 15px;
      text-align: center;
      border-bottom: 1px solid #444;
      color: #FFFFFF;
    }
    
    th {
      background: #FFD700;
      color: #121212;
      font-weight: bold;
    }
    
    tr:hover {
      background: #444;
      transition: background-color 0.3s ease;
    }

    /* General Button Styling */
    button {
      border: none;
      padding: 8px 12px;
      font-size: 14px;
      font-weight: bold;
      border-radius: 5px;
      cursor: pointer;
      transition: all 0.3s ease-in-out;
    }

    button a {
      text-decoration: none;
      color: white;
      display: block;
    }

    /* Delete Button */
    .btn-delete {
      background-color: #dc3545; /* Bootstrap Danger Color */
      border: 1px solid #dc3545;
    }

    .btn-delete:hover {
      background-color: #c82333;
      border-color: #bd2130;
    }

    /* Edit Button */
    .btn-edit {
      background-color: #ffc107; /* Bootstrap Warning Color */
      border: 1px solid #ffc107;
    }

    .btn-edit:hover {
      background-color: #e0a800;
      border-color: #d39e00;
    }
    
    /* Responsive Table */
    @media (max-width: 768px) {
      table {
        font-size: 12px;
      }

      th, td {
        padding: 10px;
      }
      
      h1 {
        font-size: 20px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 content">
        <h1 class="display-4">Saved Info</h1>

        <form method="GET" action="{{ route('dataSearch') }}" class="mb-4">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search by Name or Surname" name="search" value="{{ request()->get('search') }}">
            <button class="btn btn-primary" type="submit">Search</button>
          </div>
        </form>
        
        <table>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Gender</th>
            <th>Hobbies</th>
            <th>City</th>
            <th>File</th>
            <th>Delete</th>
            <th>Update</th>
          </tr>
          
          @foreach($allData as $value)
          
          <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->surname }}</td>
            <td>{{ $value->gender }}</td>
            <td>{{ implode(', ', explode(',', $value->hobbies)) }}</td>
            <td>{{ $value->city }}</td>
            <td>
              <img src="{{ asset('Images/' . $value->file) }}" alt="" width="100px" height="100px">
            </td>

            <td>
              <a href="{{ route('dataDelete', $value->id) }}" class="btn btn-delete">Delete</a>
            </td>
            <td>
              <a href="{{ route('dataEdit', $value->id) }}" class="btn btn-edit">Update</a>
            </td>

          </tr>
          
          @endforeach
          
        </table>
      </div>
    </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
