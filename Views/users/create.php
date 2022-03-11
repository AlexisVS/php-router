<section>
  <h1>Create user</h1>
  <form class="block" action="/users/store" method="POST">
    <input class="bg-gray-700 text-white" placeholder="first_name" name="first_name" type="text">
    <input class="bg-gray-700 text-white" placeholder="last_name" name="last_name" type="text">
    <input class="bg-gray-700 text-white" placeholder="email" name="email" type="email">
    <input class="bg-gray-700 text-white" placeholder="password" name="password" type="password">
    <input class="cursor-pointer px-3 py-1 bg-green-500" type="submit" value="Save">
  </form>
</section>