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
        <input type="submit" value="Login"/>
        
        <div class="signup_link">
          <a onClick={navigateToSetUser}>Create Account/Set Account Info</a>
          <br></br><br></br>
          <a onClick={navigateToPwRecovery}>Forgot Password?</a>
        </div>
      </form>
    </div>
  );
}

export default LoginPage;
