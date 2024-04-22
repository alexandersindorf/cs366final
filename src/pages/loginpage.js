import { useNavigate } from 'react-router-dom';
import React, { useState } from 'react';
import './loginpage.css';

function LoginPage() {

  const navigate = useNavigate();

  const navigateToPwRecovery = () => {
    navigate('/pwRecovery');
  };

  const navigateToSetUser = () => {
    navigate('/setUser');
  };

  const [username, setUsername] = useState('');
  const [password, setPassword] = useState('');

  const handleSubmit = (event) => {
    event.preventDefault();
    // Handle the login logic here
    console.log('Logging in with:', username, password);
    // You would typically send this data to your server for authentication
  };

  return (
    <div class="center">
      <h1>Login</h1>
      <form method="post">
        <div class="txt_field">
          <input type="text" required/>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" required/>
          <span></span>
          <label>Password</label>
        </div>
        <div class="pass">Forgot Password?</div>
        <button className="login-button" onClick={navigateToSetUser}>Create Account</button>
        <button type="submit" value="Login" className="login-button" onClick={navigateToPwRecovery}>Recover Password</button>
        <div class="signup_link">
          Not a member? <a href="#">Signup</a>
        </div>
      </form>
    </div>
  );
}

export default LoginPage;
