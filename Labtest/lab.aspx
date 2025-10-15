<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="lab.aspx.cs" Inherits="Grading.lab" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
</head>
<body>
    <h3>Grade Management System</h3>
    <form id="form1" runat="server">
        <div>
            <asp:Label runat="server" Text="Student ID "></asp:Label>
            <asp:TextBox runat="server" Placeholder="Enter student ID"></asp:TextBox><br />
            <asp:Label runat="server" ID="Number" Text="Number "></asp:Label>
            <asp:TextBox runat="server" ID="mark" Placeholder="Enter mark here"></asp:TextBox><br /><br />
            <asp:Button runat="server" ID="submit" Text="Submit" Onclick="SubmitBtn" /><br /><br />
            <p><asp:label runat="server" id="a" Text="Current Number of A+: 0" ></asp:label></p>
            <p><asp:label runat="server" id="b" Text="Current Number of B+: 0" ></asp:label></p>
            <p><asp:label runat="server" id="c" Text="Current Number of C+: 0" ></asp:label></p>
            <p><asp:label runat="server" id="f" Text="Current Number of F: 0" ></asp:label></p>
        </div>
    </form>
</body>
</html>
