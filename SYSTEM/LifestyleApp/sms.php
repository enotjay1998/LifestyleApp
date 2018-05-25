<html>
 <body>
   <h1>My SMS form</h1>
   <form method=post action='sendsms.php'>
   <table border=0>
   <tr>
     <td>Name</td>
     <td><input type='text' name='sender'></td>
   </tr>
   <tr>
     <td>Recipient number</td>
     <td><input type='text' name='number'></td>
   </tr>
   <tr>
     <td>Message</td>
     <td><textarea rows=4 cols=40 name='message'></textarea></td>
   </tr>
   <tr>
     <td> </td>
     <td><input type=submit name=submit value=Send></td>
   </tr>
   </table>
   </form>
 </body>
</html>