<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="lab.aspx.cs" Inherits="Grading.lab" %>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f8f9fa;
        }
        h2 {
            text-align: center;
            color: #2c3e50;
        }
        form {
            background: #ffffff;
            padding: 20px;
            width: 350px;
            margin: 0 auto;
            border-radius: 8px;
            box-shadow: 0px 0px 8px rgba(0,0,0,0.2);
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 6px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #2980b9;
        }
        .results {
            margin-top: 20px;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h2>Grade Management System</h2>

    <form id="form1" runat="server">
        <asp:Label runat="server" Text="Student ID "></asp:label>
        <asp:TextBox runat="server" ID="studentid" placeholder="Student ID" required></asp:TextBox>

             <asp:Label runat="server" Text="Number "></asp:label>
            <asp:TextBox runat="server" ID="mark" Placeholder="Enter mark here"></asp:TextBox><br /><br />


        <asp:Button runat="server" ID="submit" Text="Submit" OnClick="SubmitBtn"/>
    </form>

    <div class="results" runat="server">
        <p>Current Number of A+: <asp:Label ID="a" runat="server" Text="0"> </asp:Label></p>
        <p>Current Number of B+:  <asp:Label ID="b" runat="server" Text="0"> </asp:Label></p>
        <p>Current Number of C+:  <asp:Label ID="c" runat="server" Text="0"> </asp:Label></p>
        <p>Current Number of F:  <asp:Label ID="f" runat="server" Text="0"> </asp:Label></p>
    </div>

</body>
</html>
