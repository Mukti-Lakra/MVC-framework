<div class="content">
  <h3>Add Category</h3> <hr/>
    <form action="http://localhost/muk/Index/insertCategory" method="post">
      <table>
        <tr>
          <td>Category Name</td>
          <td><input type="text" name="name" required="1"/></td>
        </tr>

        <tr>
          <td>Category Title</td>
          <td><input type="text" name="title" required="1"/></td>
        </tr>

        <tr>
          <td></td>
          <td><input type="submit" name="submit" value="Save"/></td>
        </tr>
      </table>
    </form>
</div>