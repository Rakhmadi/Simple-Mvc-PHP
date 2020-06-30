 
 <div class="container">
  <div class="row">
    <div class="col-sm">

    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">class</th>
      <th scope="col">created</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   <?php
   
   foreach ($data as $uu) {
     echo "<tr>";
     echo "<th>{$uu['id']}</th>";
     echo "<td>{$uu['name']}</td>";
     echo "<td>{$uu['class']}</td>";
     echo "<td>{$uu['created']}</td>";
     echo '<td> 
     <a name="" id="" class="btn  btn-sm btn-danger" href="delete?id='.$uu['id'].'" role="button">Delete</a>
     <a name="" id="" class="btn btn-sm btn-primary" href="edit?id='.$uu['id'].'" role="button">Edit</a>
     </td>';
     echo "</tr>";
   }
   ?>
  </tbody>

</table>
    </div>
  </div>
</div>

