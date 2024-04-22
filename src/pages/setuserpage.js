import { useNavigate } from 'react-router-dom';
import React, { useState } from 'react';
import './loginpage.css';

function SetUser() {

    const navigate = useNavigate();

    const navigateToLogin = () => {
      navigate('/login');
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
        <div class="txt_field">
          <input type="password" required/>
          <span></span>
          <label>Password</label>
        </div>
        <div class="txt_field">
          <input type="password" required/>
          <span></span>
          <label>Password</label>
        </div>
        <div class="pass">Forgot Password?</div>
            <button type="submit" value="Login" className="login-button" onClick={navigateToLogin}>Set</button>
        <div class="signup_link">
          Not a member? <a href="#">Signup</a>
        </div>
      </form>
    </div>
  );
}

export default SetUser;