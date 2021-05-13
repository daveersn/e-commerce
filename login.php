<?php
include 'common/header.php';
include 'common/db_conn.php';
?>

<body class="ih-1 bg-gray-100">

<div class="min-h-85 flex items-center justify-center bg-gray-50 px-4 sm:px-6 lg:px-8 bg-gray-100">
  <div class="max-w-xs w-full space-y-8 px-3 py-10 border rounded-2xl shadow-md bg-white">
    <div class="text-center">
      <i class="far fa-user-circle text-6xl"></i>
      <h2 class="mt-3 text-center text-3xl font-extrabold text-gray-900">
        Effettua il<br>login
      </h2>
    </div>
    <form class="mt-8 space-y-6" action="#" method="POST">
      <input type="hidden" name="remember" value="true">
      <div class="rounded-md shadow-sm -space-y-px">
        <div>
          <label for="email-address" class="sr-only">Username</label>
          <input id="email-address" name="email" type="email" autocomplete="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email address">
        </div>
        <div>
          <label for="password" class="sr-only">Password</label>
          <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password">
        </div>
      </div>

      <div class="flex items-center justify-between">
        <div class="flex items-center">
          <input id="remember_me" name="remember_me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
          <label for="remember_me" class="ml-2 block text-sm text-gray-900">
            Ricordati
          </label>
        </div>

        <div class="text-sm">
          <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
            Password dimenticata?
          </a>
        </div>
      </div>

      <div>
        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md primary-btn">
          Sign in
        </button>
      </div>
    </form>
  </div>
</div>


<?php include 'common/navbar.php'; ?>
</body>

</html>