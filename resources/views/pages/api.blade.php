@extends('default-page')
@section('title', 'Convertiverse - API')
@section('content')
    <div class="container content">
        <h1>API documentation</h1>
        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>Method</th>
                <th>URL</th>
                <th>Authentication</th>
                <th>Headers</th>
                <th>Parameters</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                <td>Register</td>
                <td>POST</td>
                <td><i>{baseApi}</i>/auth/register</td>
                <td>No</td>
                <td>Accept: application/json</td>
                <td>name: name<br>email: e@mail.kek<br>password: 1232323<br>c_password: 1232323</td>
            </tr>

            <tr>
                <td>Login</td>
                <td>POST</td>
                <td><i>{baseApi}</i>/auth/login</td>
                <td>No</td>
                <td>Accept: application/json</td>
                <td>email: kek@kek.kek<br>password: 1232323</td>
            </tr>

            <tr>
                <td>Logout</td>
                <td>POST</td>
                <td><i>{baseApi}</i>/auth/logout</td>
                <td>Yes</td>
                <td>Accept: application/json</td>
                <td></td>
            </tr>

            <tr>
                <td>User</td>
                <td>GET</td>
                <td><i>{baseApi}</i>/user</td>
                <td>Yes</td>
                <td>Accept: application/json</td>
                <td></td>
            </tr>

            <tr>
                <td>Conversions List</td>
                <td>GET</td>
                <td><i>{baseApi}</i>/user/conversions</td>
                <td>Yes</td>
                <td>Accept: application/json</td>
                <td></td>
            </tr>

            <tr>
                <td>Convert Users Xls</td>
                <td>POST</td>
                <td><i>{baseApi}</i>/user/convert-xls</td>
                <td>Yes</td>
                <td>Accept: application/json</td>
                <td>xls_file: <br>output: html<br>columns[0]: C<br>columns[B]: B<br>f_header_row: 1 or 0</td>
            </tr>

            <tr>
                <td>Convert Xls</td>
                <td>POST</td>
                <td><i>{baseApi}</i>/convert-xls</td>
                <td>No</td>
                <td>Accept: application/json</td>
                <td>output: json<br>columns[0]: C<br>columns[B]: B<br>xls_file: <br>f_header_row: 1 or 0<br>f_header_row_wr: 1 or 0
                </td>
            </tr>
            </tbody>
        </table>

        <div>
            Note: in routes with authentication you need to specify in headers bearer token, that you will get from
            login/register routes. <i>{baseApi}</i> is either this service {{env('APP_URL')}} or if you cloned git <a href="https://github.com/dealexis/xls-to-html-plus" target="_blank">repository</a>, then you need to follow its instructions and run your own service and substitute.
        </div>
    </div>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
@endsection
