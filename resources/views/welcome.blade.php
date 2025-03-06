<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Styled Table</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-dark text-light d-flex justify-content-center align-items-center vh-100">
    <div class="container bg-secondary p-5 rounded shadow-lg">
        <h2 class="text-center mb-4 text-warning text-uppercase">Links Table</h2>
        <div class="table-responsive">
            <table class="table table-dark table-hover table-bordered text-center align-middle">
                <thead class="bg-warning text-dark">
                    <tr>
                        <th>Link 1</th>
                        <th>Link 2</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <a href="{{ route('first') }}" class="btn btn-primary fw-bold shadow" target="_blank">First</a>
                        </td>
                        <td>
                            <a href="{{ route('second') }}" class="btn btn-secondary fw-bold shadow" target="_blank">Second</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
