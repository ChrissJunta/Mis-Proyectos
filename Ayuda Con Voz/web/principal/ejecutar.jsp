<%-- 
    Document   : ejecutar
    Created on : 03/12/2019, 0:33:15
    Author     : Dota
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
      
         
        <%
         //   if(request.getParameter("Enviar")!=null)
           // {
                
            Runtime nueva = Runtime.getRuntime();
            
            nueva.exec("C:\\Program Files (x86)\\HeadMouse\\HeadMouse.exe");
            response.sendRedirect("index.html");
//}
            
            %>
    </body>
</html>
