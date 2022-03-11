<section class="mx-auto">
  <table>
    <tr>
      <th>ID</th>
      <th>First name</th>
      <th>last name</th>
      <th>email</th>
      <th>password</th>
    </tr>

    <?php
    foreach ($users as $user) {
      echo '<tr>';
      echo '<td>' . $user->id . '</td>';
      echo '<td>' . $user->first_name . '</td>';
      echo '<td>' . $user->last_name . '</td>';
      echo '<td>' . $user->email . '</td>';
      echo '<td>' . $user->pasword . '</td>';
      echo '</tr>';
    }
    ?>
    
  </table>
</section>