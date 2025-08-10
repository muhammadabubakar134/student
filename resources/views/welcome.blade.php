<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Laravel Auth</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">

<div class="container">
  <h2 class="mb-4">Laravel API Authentication</h2>

  <!-- Signup Form -->
  <div class="card mb-4">
    <div class="card-header">Signup</div>
    <div class="card-body">
      <form id="signupForm">
        <input type="text" class="form-control mb-2" placeholder="Name" name="name" required>
        <input type="email" class="form-control mb-2" placeholder="Email" name="email" required>
        <input type="password" class="form-control mb-2" placeholder="Password" name="password" required>
        <button class="btn btn-primary">Signup</button>
      </form>
      <div id="signupResponse" class="mt-2"></div>
    </div>
  </div>

  <!-- Login Form -->
  <div class="card">
    <div class="card-header">Login</div>
    <div class="card-body">
      <form id="loginForm">
        <input type="email" class="form-control mb-2" placeholder="Email" name="email" required>
        <input type="password" class="form-control mb-2" placeholder="Password" name="password" required>
        <button class="btn btn-success">Login</button>
      </form>
      <div id="loginResponse" class="mt-2"></div>
    </div>
  </div>

</div>

<script>
  // Signup
  document.getElementById('signupForm').addEventListener('submit', async function (e) {
    e.preventDefault();
    const formData = new FormData(e.target);
    const data = Object.fromEntries(formData);

    const res = await fetch('http://127.0.0.1:8000/api/signup', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(data)
    });

    const json = await res.json();
    document.getElementById('signupResponse').innerText = JSON.stringify(json, null, 2);

    if (res.ok) {
      // Redirect after signup
      window.location.href = 'http://127.0.0.1:8000/students';
    }
  });

  // Login
  document.getElementById('loginForm').addEventListener('submit', async function (e) {
    e.preventDefault();
    const formData = new FormData(e.target);
    const data = Object.fromEntries(formData);

    const res = await fetch('http://127.0.0.1:8000/api/login', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(data)
    });

    const json = await res.json();
    document.getElementById('loginResponse').innerText = JSON.stringify(json, null, 2);

    if (json.data && json.data.token) {
      localStorage.setItem('auth_token', json.data.token); // Store token

      // Redirect after login
      window.location.href = 'http://127.0.0.1:8000/students';
    }
  });
</script>
</body>
</html>
